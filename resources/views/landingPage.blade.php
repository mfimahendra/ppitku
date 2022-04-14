@extends('layout.mainApp')

@section('menu')
    <div class="container mt-3">        
        <div class="brand mt-2 mx-2 d-flex justify-content-between">                                             
            <h2 class="mt-1"><i class='bx bx-menu'></i> PPITiongkok.ku</h2>            
        </div>                                
    </div>
    <div class="container">
        <div class="row">
            <div class="col mt-5 greetings">
                <div class="content-anim d-flex">
                    <div class="content-anim__container">                                            
                      <ul class="content-anim__container__list">
                        <li class="content-anim__container__list__item">Halo!</li>
                        <li class="content-anim__container__list__item">你好!</li>
                        <li class="content-anim__container__list__item">Hello!</li>                        
                        <li class="content-anim__container__list__item">大家好!</li>
                      </ul>
                    </div>
                  </div>
            </div>            
        </div>
        <div class="row">
            <div class="col d-flex mt-2 mb-3 justify-content-center sub-greetings">
                <p>Welcome to PPITiongkok Apps</p>
            </div>
        </div>
    </div>
    <div class="container background-menu-container">
        <div class="row mx-2 mt-2">
            <div class="col col-4 mt-4">
                <a href="{{ route('content.news') }}" class="card-menu-btn d-flex flex-column">
                    <i class="bx bxs-news"></i>                    
                    <span class="menu-notification">0</span>
                    <span class="menu-btn-title">Berita</span>
                </a>
            </div>            
            <div class="col col-4 mt-4">
                <a href="{{ route('content.register') }}" class="card-menu-btn d-flex flex-column">
                    <i class="bx bxs-file"></i>
                    <span class="menu-notification">0</span>
                    <span class="menu-btn-title">Registrasi</span>
                </a>
            </div>            
            <div class="col col-4 mt-4">
                <a href="{{ route('content.loker') }}" class="card-menu-btn d-flex flex-column">
                    <i class='bx bxs-file-find' ></i>
                    <span class="menu-notification">0</span>
                    <span class="menu-btn-title">Info Loker</span>
                </a>
            </div>            
            <div class="col col-4 mt-4">
                <a href="#" class="card-menu-btn d-flex flex-column">
                    <i class='bx bxl-twitter' ></i>                    
                    <span class="menu-notification-null"></span>
                    <span class="menu-btn-title">Twitter</span>
                </a>
            </div> 
            <div class="col col-4 mt-4">
                <a href="#" class="card-menu-btn d-flex flex-column">
                    <i class='bx bxl-tiktok' ></i>            
                    <span class="menu-notification-null"></span>        
                    <span class="menu-btn-title">Tiktok</span>
                </a>
            </div> 
            <div class="col col-4 mt-4">
                <a href="https://www.youtube.com/c/PPITChannel" class="card-menu-btn d-flex flex-column">
                    <i class='bx bxl-youtube' ></i>               
                    <span class="menu-notification-null"></span>                           
                    <span class="menu-btn-title">Youtube</span>
                </a>
            </div>             
        </div>
        <br>            
        <div class="null-content" style="height: 120px">

        </div>
        <div class="copyright">                
            <p>Copyright © 2022 PPI Tiongkok</p>                
        </div>
    </div>    
@endsection