@extends('app.layouts.app')

@section('title', $title)

@section('content')

@include('app.layouts._partials.sidebar')

<main id="main-conteudo-total">

    @include('app.layouts._partials.header')

    <div class="main-conteudo">
        
        <div class="conteudo-titulo-main">
            <h2> {{ $title }}</h2>
        </div>

        <div class="col-md-12">
            <div class="d-flex flex-column align-items-center text-center">
                <img class="rounded-circle" width="150px" src="{{ asset('storage/img/default/profile.jpg') }}">
                <span class="font-weight-bold">{{ $user->name }}</span>
                <span class="text-black-50">{{ $user->email }}</span>
            </div>
        </div>
        
        <div class="col-lg-12 mt-3">
            <div class="card mb-4">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Nome</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $user->name }}</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">E-mail</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $user->email }}</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Telefone</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">(00) 00000-0000</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Endereço</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">Rua, Bairro, Cidade, Estado</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="mt-6 text-center">
                <a class="btn btn-secondary" href="{{ route('app.users.edit', ['id' => $user->id]) }}"">Editar perfil</a>
            </div>
        </div>

    </div>

</main>

@endsection