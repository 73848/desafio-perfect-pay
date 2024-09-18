@extends('layout')
@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card">
    <div class='card-body'>
        <form action="/registerUser" method="POST">
            @csrf
            <h5>Cadastro de novos Vendedores</h5>
            <div class="form-group">
                <label for="name">Nome do usuário</label>
                <input type="text" class="form-control " name="name">
            </div>
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
            <div class="form-group">
                <input type="hidden" class="form-control" name="role_id" value="1" placeholder="">
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <br>
        </form>
</div>

@endsection
