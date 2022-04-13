<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Type;
use Illuminate\Http\Request;

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

        return view('econtent', [
            'title' => 'Registrasi',
            'contents' => $register
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
            'title' => 'Berita',
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
                    ->get();                
        
        $types = Type::all();

        return view('admin.admin-econtentFormEdit', [
            'title' => 'Edit Content',
            'contents' => $contents[0],
            'types' => $types,
            'status' => ['1' => '1 - Publish','0' => '0 - Hide']
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
            $e->getMessage();
        }

        return redirect('admin/content/news');
    }
}
