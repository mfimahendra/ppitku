<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Type;
use Illuminate\Http\Request;
use Ramsey\Collection\Map\AssociativeArrayMap;

class ContentController extends Controller
{
    public function news(){
        $contents = Content::select('contents.id', 'contents.title', 'contents.subtitle', 'contents.by', 'contents.type_id', 'contents.link', 'contents.status', 'contents.updated_at' , 'contents.image')
                    ->leftJoin('types', 'contents.type_id', '=', 'types.id')
                    ->where('status', 1)
                    ->orderBy('contents.updated_at', 'desc')
                    ->get();       
        
        $types = Type::all();

        return view('econtent', [
            'title' => 'Berita',
            'contents' => $contents,
            'types' => $types
        ]);        
    }

    public function register(){
        $register = Content::select('contents.id', 'contents.title', 'contents.subtitle', 'contents.by', 'contents.type_id', 'contents.link', 'contents.status', 'contents.updated_at' , 'contents.image')
                    ->leftJoin('types', 'contents.type_id', '=', 'types.id')
                    ->where('status', 1)
                    ->where('type_id', '=', 2)
                    ->orderBy('contents.updated_at', 'desc')
                    ->get();
                    
        $types = Type::all();                    

        return view('econtent', [
            'title' => 'Registrasi',
            'contents' => $register,
            'types' => $types
        ]);
    }

    public function loker(){
        $loker = Content::select('contents.id', 'contents.title', 'contents.subtitle', 'contents.by', 'contents.type_id', 'contents.link', 'contents.status', 'contents.updated_at' , 'contents.image')
                ->leftJoin('types', 'contents.type_id', '=', 'types.id')
                ->where('status', 1)
                ->where('type_id', '=', 3)
                ->orderBy('contents.updated_at', 'desc')
                ->get();

        return view('econtent',[
            'title'=> 'Info Loker',
            'contents' => $loker
        ]);
    }    

    public function adminNews()
    {
        $contents = Content::select('contents.id', 'contents.title', 'contents.subtitle', 'contents.by', 'contents.type_id', 'contents.link', 'contents.status', 'contents.updated_at' , 'contents.image')
                    ->leftJoin('types', 'contents.type_id', '=', 'types.id')                    
                    ->orderBy('contents.updated_at', 'desc')
                    ->get();
        $types = Type::all();

        return view('admin.admin-econtent', [
            'title' => 'Semua Berita',
            'contents' => $contents,
            'types' => $types
        ]);        
    }
    public function adminRegister(){
        $register = Content::select('contents.id', 'contents.title', 'contents.subtitle', 'contents.by', 'contents.type_id', 'contents.link', 'contents.status', 'contents.updated_at' , 'contents.image')
                    ->leftJoin('types', 'contents.type_id', '=', 'types.id')                    
                    ->where('type_id', '=', 2)
                    ->orderBy('contents.updated_at', 'desc')
                    ->get();

        return view('admin.admin-econtent', [
            'title' => 'Registrasi',
            'contents' => $register
        ]);
    }

    public function adminLoker(){
        $loker = Content::select('contents.id', 'contents.title', 'contents.subtitle', 'contents.by', 'contents.type_id', 'contents.link', 'contents.status', 'contents.updated_at' , 'contents.image')
                ->leftJoin('types', 'contents.type_id', '=', 'types.id')                
                ->where('type_id', '=', 3)
                ->orderBy('contents.updated_at', 'desc')
                ->get();

        return view('admin.admin-econtent',[
            'title'=> 'Info Loker',
            'contents' => $loker
        ]);
    }        
    
    public function createContentForm()
    {        
        $types = Type::all();

        return view('admin.admin-econtentForm', [
            'title' => 'Tambah Content',
            'types' => $types
        ]);
    }

    public function editContentForm($id)
    {           
        $contents = Content::select('contents.id', 'contents.title', 'contents.subtitle', 'contents.by', 'contents.type_id', 'contents.link', 'contents.status', 'contents.updated_at' , 'contents.image')
                    ->leftJoin('types', 'contents.type_id', '=', 'types.id')
                    ->where('contents.id', '=', $id )
                    ->orderBy('contents.updated_at', 'desc')
                    ->first();                
        
        $types = Type::all();        

        return view('admin.admin-econtentFormEdit', [
            'title' => 'Edit Content',
            'contents' => $contents,
            'types' => $types,
            'status' => [
                '1' => 'Publish',
                '0' => 'Hide'
            ],            
        ]);
    }

    public function store(Request $request){                    

        $this->validate($request, [
            'title' => 'required',
            'subtitle' => 'required',
            'link' => 'required',
            'by' => 'required',
            'type_id' => 'required',
            'status' => 'required',
            'image' => 'required'            
        ]);        

        $file = $request->file('image');             
        $fileName = time() . '.' . $file->getClientOriginalExtension();   

        $content = new Content([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'link' => $request->link,
            'by' => $request->by,
            'type_id' => $request->type_id,
            'status' => $request->status,
            'image' => $fileName
        ]);
        try {
            $content->save();            
            $request->file('image')->move("images/", $fileName);
        } catch (\Throwable $e) {
            echo $e->getMessage();
        }

        return redirect('admin/content/news');
    }
    
    public function update(Request $request, $id){        
        
        if($request->image == null){            

            try {            
                $content = Content::where('id', $id)->update([
                    'title' => $request->title,
                    'subtitle' => $request->subtitle,
                    'link' => $request->link,
                    'by' => $request->by,
                    'type_id' => $request->type_id,
                    'status' => $request->status,                    
                ]);            
                                    
                return redirect('admin/content/news');
    
            } catch (\Throwable $e) {
                $e->getMessage();
                return redirect('admin/content/register');
            }
        }else{
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();  

            try {            
                $content = Content::where('id', $id)->update([
                    'title' => $request->title,
                    'subtitle' => $request->subtitle,
                    'link' => $request->link,
                    'by' => $request->by,
                    'type_id' => $request->type_id,
                    'status' => $request->status,
                    'image' => $fileName
                ]);            
    
                $request->file('image')->move("images/", $fileName);            
                return redirect('admin/content/news');
    
            } catch (\Throwable $e) {
                $e->getMessage();
                return redirect('admin/content/register');
            }
        }                                                        
    }            
    
    public function delete($id){
        $content = Content::find($id);
        $content->delete();

        return redirect('admin/content/news');
    }
}
