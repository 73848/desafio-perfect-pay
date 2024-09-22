@extends('layout')
@section('content')
@if (session()->has('message'))
<div class="alert alert-success">
  {{session('message')}}
</div>
@endif
@if(session()->has('error'))
<div class="alert alert-danger">
    {{session('error')}}
  </div>
@endif
<div class="card">
    <div class='card-body'>
        <form action="/loginUsers" method="POST">
            @csrf
            <h5>Entre</h5>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="adaadaada@gmail.com">
            </div>
          {{--   <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" name="cpf" placeholder="000000000">
            </div> --}}
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Entrar</button>
            <br>
        </form>
</div>

@endsection
