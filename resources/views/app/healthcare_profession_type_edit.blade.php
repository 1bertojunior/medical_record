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
            <form method="post" action="{{ route('app.healthcare_profession_type.edit', ['id' => $type->id]) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    @error('error')
                        <span> {{$message }}</span>
                    @enderror
                    <label for="name">Nome</label>
                    <input type="text" name="name" class="form-control" id="nome" placeholder="Nome" value="{{$type->name }}">
                    @error('name')
                        <span> {{$message }}</span>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="council_type">Conselho</label>
                    <input type="text" name="council_type" class="form-control" id="council_type" placeholder="Conselho" minlength="1" maxlength="8" value="{{$type->council_type }}">
                    @error('council_type')
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