@extends('layout.mainApp')

@section('menu')
    @if(Session::get('error'))
        <script>
            alert('Username/Password Salah!')
        </script>
    @endif
    
    <div class="container background-menu-container">
        <div class="table-data-container mt-5">        
            <h2>Login Admin</h2>
            <form action="{{ route('loginPost') }}" method="post" class="form-container">
                @csrf
                <div class="form-group mb-2">
                    <label for="Username">Username</label>
                    <input type="text" class="form-control" name="username" id="Username" placeholder="Masukan Username" required>                
                </div>
                <div class="form-group mb-2">
                    <label for="Password">Password</label>
                    <input type="password" class="form-control" name="password" id="Password" placeholder="Masukan Password" required>                
                </div>
                <button type="submit" id="login-admin" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
    <br>
    <div class="null-content" style="height: 200px">

    </div>

@endsection