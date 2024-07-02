@extends('layout')

@section('content')
    <h1>Adicionar / Editar Venda</h1>
    <div class='card'>
        <div class='card-body'>
            <form action="/register" method="POST">
                @csrf
                <h5>Cadastrando novos clientes</h5>
                <div class="form-group">
                    <label for="name">Nome do cliente</label>
                    <input type="text" class="form-control " name="name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" name="cpf" placeholder="99999999999">
                </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <br>
            </form>
            <form action="">
                <h5 class='mt-5'>Informações da venda</h5>
                <div class="form-group">
                    <label for="product">Cliente</label>
                    <select name="client" class="form-control">
                        <option selected>Escolha...</option>
                        @foreach ($clients as $client)
                        <option>{{$client->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="product">Produto</label>
                    <select id="product" class="form-control">
                        <option selected>Escolha...</option>
                        @foreach ($products as $product)
                        <option>{{$product->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="date">Data</label>
                    <input type="text" class="form-control single_date_picker" id="date">
                </div>
                <div class="form-group">
                    <label for="quantity">Quantidade</label>
                    <input type="text" class="form-control" id="quantity" placeholder="1 a 10">
                </div>
                <div class="form-group">
                    <label for="discount">Desconto</label>
                    <input type="text" class="form-control" id="discount" placeholder="100,00 ou menor">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" class="form-control">
                        <option selected>Escolha...</option>
                        <option>Aprovado</option>
                        <option>Cancelado</option>
                        <option>Devolvido</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
@endsection
