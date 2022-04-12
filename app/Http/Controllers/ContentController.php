<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index(){
        $contents = Content::select('contents.id', 'contents.title', 'contents.type_id', 'contents.link', 'contents.status')
                    ->leftJoin('types', 'contents.type_id', '=', 'types.id')
                    ->where('status', 1)
                    ->orderBy('contents.updated_at', 'desc')
                    ->get();
        

        return view('econtent', [
            'title' => 'News',
            'contents' => $contents
        ]);        
    }

    public function register(){
        $register = Content::select('id', 'title', 'type_id', 'link', 'status')
                    ->leftJoin('types', 'contents.type_id', '=', 'types.id')
                    ->where('status', 1)
                    ->where('type_id', '=', 2)
                    ->orderBy('updated_at', 'desc')
                    ->get();

        return view('econtent.register', [
            'title' => 'Register Event',
            'contents' => $register
        ]);
    }
}
