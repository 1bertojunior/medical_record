@extends('app.layouts.app')

@section('title', $title)

@section('content')

@include('app.layouts._partials.sidebar')

<main id="main-conteudo-total">

    @include('app.layouts._partials.header')

    <div class="main-conteudo">
        <div class="conteudo-titulo-main">
            <h2>{{ $title }}</h2>
        </div>

        <div class="dashboard-conteudo">
            <form method="post" action="{{ route('app.user.add') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Nome completo</label>
                    <input type="text" class="form-control" id="nome" placeholder="Seu nome completo">
                </div>

                {{-- <div class="form-group">
                    <label for="gender">Gênero</label>
                    <select class="form-control" id="genero">
                        <option>Masculino</option>
                        <option>Feminino</option>
                        <option>Prefiro não informar</option>
                    </select>
                </div> --}}

                <div class="form-group">
                    <label for="email">Endereço de email</label>
                    <input type="email" class="form-control" id="email" placeholder="Seu email">
                </div>

                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" class="form-control" id="senha" placeholder="Senha">
                </div>
                <button type="submit" class="btn">Cadastrar</button>
            </form>
            <div class="dashboard-flex">
                
            </div>
        </div>

    </div>

</main>

@endsection