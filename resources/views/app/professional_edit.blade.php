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
            <form method="post" action="{{ route('app.healthcare_professionals.edit', ['id' => $professional->id]) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    @error('error')
                        <span> {{$message }}</span>
                    @enderror
                    <label for="name">Nome</label>
                    <input type="text" name="name" class="form-control" id="nome" placeholder="Nome" value="{{ $professional->name }}">
                    @error('name')
                        <span> {{$message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    @error('error')
                        <span> {{$message }}</span>
                    @enderror
                    <label for="name">Documento</label>
                    <input type="text" name="document_number" class="form-control" id="document_number" placeholder="Número de conselho" value="{{ $professional->document_number }}">
                    @error('document_number')
                        <span> {{$message }}</span>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="profession_type_id">Tipo de Profissional</label>
                    <select name="profession_type_id" class="form-control" id="profession_type_id">
                        @foreach($professionTypes as $type)
                            <option value="{{ $type->id }}" {{ $professional->profession_type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                        @endforeach
                    </select>
                    @error('profession_type_id')
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
