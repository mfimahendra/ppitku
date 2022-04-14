@extends('layout.mainApp')

@section('menu')
    <div class="container mt-3">
        <div class="brand mt-2 mx-2 d-flex justify-content-between">
            <h2 class="mt-1"><a href="{{ route('admin.news')}}"><i class='bx bx-chevron-left'></i> PPITiongkok.ku</a></h2>
        </div>
    </div>

    <div class="container background-menu-container">
        <div class="row mx-2 mt-2">
            <div class="col mt-3 news-title">
                <h1>{{ $title }}</h1>
            </div>
        </div>
        <div class="row mx-1 mt-1">
            <div class="col-md-12">
                <form action="{{ route('admin.contentUpdate' , $contents)}}" method="POST" enctype="multipart/form-data">
                    @csrf                    
                    <div class="div" style="display: none">
                        <input type="text" value="{{ $contents->id }}">
                    </div>
                    <div class="form-group mt-2">
                        <label for="title">Judul Konten</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $contents->title }}" placeholder="Masukkan Judul Konten">
                    </div>
                    <div class="form-group mt-2">
                        <label for="content">Subtitle</label>
                        <input type="text" class="form-control" id="content" name="subtitle" value="{{ $contents->subtitle }}" placeholder="Masukkan Subtitle" autocomplete="off" rows="3"></input>
                    </div>
                    <div class="form-group mt-2">
                        <label for="content">Link</label>
                        <small id="linkHelp" class="form-text text-muted">( Harap link langsung ke Google Form, untuk Info Loker bisa diisikan Email )</small>
                        <input class="form-control" id="content" name="link" value="{{ $contents->link }}" placeholder="Masukkan Link atau Email" autocomplete="off" rows="3"></input>
                    </div>                    
                    <div class="form-group mt-2">
                        <label for="content">Pengirim</label>
                        <small id="senderHelp" class="form-text text-muted">( Pengirim bisa dari Departemen PPITiongkok, atau pihak luar )</small>
                        <input class="form-control" id="content" name="by"  value="{{ $contents->by }}" placeholder="Masukkan Pengirim" autocomplete="off" rows="3"></input>
                    </div>
                    <div class="form-group mt-2">
                        <label for="category">Kategori</label>
                        <select class="form-control" id="content" name="type_id">                            
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" {{ $contents->type_id == $type->id ? 'selected' : '' }}>{{ $type->type }}</option>
                            @endforeach    
                        </select>
                    </div>                    
                    <div class="form-group mt-2">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">                            
                            @foreach ($status as $key => $st)                            
                                <option value="{{ $key }}" {{ $contents->status == $key ? 'selected' : '' }}>{{ $st }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="image">Gambar Thumbnail</label><br>
                        <input accept="image/*" type="file" class="form-control-file" id="imageChoosen" value="{{ $contents->image }}" name="image">
                        <img id="choosenFile" src="{{ url('images/' . $contents->image . ' ') }}" width="100px" alt="">                        
                    </div>
                    <button type="submit" class="btn btn-warning mt-2 mb-2">Update</button>                                        
                </form>
                <form action="{{ route('admin.contentDelete', $contents->id) }}" method="POST">
                    @csrf
                    <button type="submit" onclick="return confirm('{{ 'Hapus Konten ' . $contents->title . '?' }} )" class="btn btn-danger mt-2 mb-2">Delete</button>
                </form>
                <a href="{{ route('admin.news')}}" class="btn btn-primary mt-2 mb-2">Cancel</a>                    
                
            </div>
            <br>
            <hr>
            <div style="width: 400px" class="row mx-2 mt-1">
                <h5 class="mx-2">Contoh :</h5>
                <img src="{{ url('img/example.png') }}" alt="">
            </div>
            <div class="null-content" style="height: 150px">

            </div>
            <div class="copyright">
                <p>Copyright © 2022 PPI Tiongkok</p>
            </div>

            <script type="text/javascript">
                imageChoosen.onchange = evt => {
                    const [file] = imageChoosen.files
                    if (file) {
                        choosenFile.src = URL.createObjectURL(file)
                    }
                }                
            </script>            
        @endsection
