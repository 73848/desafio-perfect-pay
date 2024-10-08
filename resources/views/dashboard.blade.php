@extends('layout')
@section('content')
@if (session()->has('message'))
<div class="alert alert-success">
  {{session('message')}}
  {{session('user')}}

</div>
@endif
@if (session()->has('error'))
<div class="alert alert-danger">
  {{session('error')}}

</div>
@endif
@php
    $products = json_decode($products)->data;
    $sales = json_decode($sales);
    
    @endphp
<h1>Dashboard de vendas</h1>
<div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Tabela de vendas
                <a href='/sales' class='btn btn-secondary float-right btn-sm rounded-pill'><i class='fa fa-plus'></i> Nova venda</a>
            </h5>
            <form action="/search" method="GET">
                @csrf
                <div class="form-row align-items-center">
                    <div class="col-sm-5 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Clientes</div>
                            </div>
                            <input type="text" class="form-control  " id="search" name="search">
                        </div>
                    </div>
                    <div class="col-sm-1 my-1">
                        <button type="submit" class="btn btn-primary" style='padding: 14.5px 16px;'>
                            <i class='fa fa-search'></i>
                        </button>
                    </div>
                </div>
            </form>
            <form action="/searchWithDate" method="GET">
                @csrf
                <div class="form-row align-items-center">
                    <div class="col-sm-5 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Data Inicial</div>
                            </div>
                            <input type="text" class="form-control single_date_picker" id="initialDate" name="initialDate">
                        </div>
                    </div>
                    <div class="form-row align-items-center">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Data Final </div>
                                </div>
                                <input type="text" class="form-control single_date_picker" id="finalDate" name="finalDate">
                            </div>
                        </div>
                    <div class="col-sm-1 my-1">
                        <button type="submit" class="btn btn-primary" style='padding: 14.5px 16px;'>
                            <i class='fa fa-search'></i>
                        </button>
                    </div>
                </div>
            </form>
            
            <table class='table'>
                <tr>
                    <th scope="col">
                        Produto
                    </th>
                    <th scope="col">
                        Data
                    </th>
                    <th scope="col">
                        Valor
                    </th>
                    <th scope="col">
                        Ações
                    </th>
                </tr>

                @foreach ($sales as $sale)
                    <tr>
                        <td>
                            {{ $sale->products_name }}
                        </td>
                        <td>
                            {{ banco_de_dados_aplicacao($sale->date) }}
                        </td>
                        <td>
                            R${{ $sale->price_sales }},00
                        </td>
                        <td>
                            <a href='/edit-sale/{{ $sale->id }}' class='btn btn-primary'>Editar</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Resultado de vendas</h5>
            <table class='table'>
                <tr>
                    <th scope="col">
                        Status
                    </th>
                    <th scope="col">
                        Quantidade
                    </th>
                    <th scope="col">
                        Preço com desconto
                    </th>
                </tr>
                @foreach ($sales as $sale)
                    <tr>
                        <th scope="col">
                            {{ $sale->status }}
                        </th>
                        <th scope="col">
                            {{ $sale->quantity }}
                        </th>
                        <th scope="col">
                            R$ {{ $sale->products_price - $sale->discount }}
                        </th>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Produtos
                <a href='/products' class='btn btn-secondary float-right btn-sm rounded-pill'><i class='fa fa-plus'></i>
                    Novo produto</a>
            </h5>
            <table class='table'>
                <tr>
                    <th scope="col">
                        Nome
                    </th>
                    <th scope="col">
                        Valor
                    </th>@if (Session::get('role_id') === 1)
                        
                    <th scope="col">
                        Ações
                    </th>
                    <th scope="col">
                        
                    </th>
                    @endif
                </tr>

                @foreach ($products as $product)
                    <tr>
                        <td>
                            {{ $product->name }}
                        </td>
                        <td>
                            R$ {{ $product->price }}
                        </td>
                        @if (Session::get('role_id') === 1)
                            
                        <td>
                            <a href='/edit-product/{{ $product->id }}' class='btn btn-primary'>Editar</a>
                        </td>
                        <td>
                            <form action="/edit-product/{{ $product->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class='btn btn-danger'>Excluir</button>
                            </form>
                        </td>
                        @endif
                    </tr>
                @endforeach
            </table>
            <form action="/deslogar" method="GET">
                @csrf
                <button type="submit" class='btn btn-danger'>Deslogar</button>
            </form>
        </div>
    </div>
@endsection
