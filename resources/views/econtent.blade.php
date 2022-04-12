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
                <h1>News List</h1>
            </div>
        </div>
        <div class="row mx-1 mt-1">
            <div class="col search_field">
                <i class='bx bx-search search_field_icon'></i>
                <input type="text" class="search_field_input" onkeyup="searchByName()" placeholder="Cari Berita...">                
            </div>
        </div>
        <hr>    
        <div class="row mx-3 mt-2 news-lists">            
            <a class="mt-2" href="#">
                <div class="newsContent-container">                    
                    <div class="content-text">
                        <b class="content-title">~INTERACTIVE TALKSHOW~</b><br>
                        <span class="content-subtitle">"Train to be a Professional"</span><br>
                        <span class="content-by">By Pendataan</span>
                        <span> - </span>
                        <span class="content-time">1 Hari yang lalu</span>
                    </div>
                    <div class="content-img">
                        <img src="{{ url('img/content1.jpg') }}" alt="">
                    </div>
                </div>                
            </a>                        
        </div>        
        <br>            
        <div class="null-content" style="height: 120px">

        </div>
    </div>
@endsection
