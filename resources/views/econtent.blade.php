@extends('layout.mainApp')

@section('menu')
    <div class="container mt-3">
        <div class="brand mt-2 mx-2 d-flex justify-content-between">
            <h2 class="mt-1"><a href="{{ route('landingPage.index') }}"><i class='bx bx-chevron-left'></i> PPITiongkok.ku</a></h2>
        </div>
    </div>

    <div class="container background-menu-container">
        <div class="row mx-2 mt-2">
            <div class="col mt-3 news-title">
                <h1>{{ $title }}</h1>
            </div>
        </div>
        <div class="row mx-1 mt-1">
            <div class="col search_field">
                <i class='bx bx-search search_field_icon'></i>
                <input type="text" class="search_field_input" onkeyup="search()" placeholder="Cari Berita...">                
            </div>
        </div>
        <hr>    
        <div class="row mx-3 mt-2 news-lists">            
            @foreach ($contents as $c)
            <a class="mt-2 content-list" href="{{ $c->link }}">
                <div class="newsContent-container">
                    <div class="content-text">
                        <b class="content-title">~{{ $c->title }}~</b><br>
                        <span class="content-subtitle">"{{ $c->subtitle }}"</span><br>
                        <span class="content-by">{{ $c->by }}</span>
                        <span> - </span>
                        <span class="content-time">{{ $c->updated_at->diffForHumans() }}</span>
                    </div>
                    <div class="content-img">
                        <img src="{{ url('images/' . $c->image . ' ') }}" alt="">
                    </div>
                </div>
            </a>                
            @endforeach
        </div>        
        <br>            
        <div class="null-content" style="height: 400px">

        </div>
        <div class="copyright">                
            <p>Copyright © 2022 PPI Tiongkok</p>                
        </div>
    </div>
@endsection
