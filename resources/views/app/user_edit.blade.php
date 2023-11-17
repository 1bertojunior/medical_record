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
            <form method="post" action="{{ route('app.users.edit', ['id' => $user->id]) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    @error('error')
                        <span> {{$message }}</span>
                    @enderror
                    <label for="name">Nome completo</label>
                    <input type="text" name="name" class="form-control" id="nome" placeholder="Seu nome completo" value="{{$user->name }}">
                    @error('name')
                        <span> {{$message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Endereço de email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Seu email" value="{{$user->email }}">
                    @error('email')
                        <span> {{$message }}</span>
                    @enderror
                </div>


                <button type="submit" class="btn btn-secondary">Atualizar</button>
            </form>
            <div class="dashboard-flex">
                
            </div>
        </div>

    </div>

</main>

@endsection