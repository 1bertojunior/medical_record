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
            <form method="post" action="{{ route('app.healthcare_professionals.add') }}">
                @csrf
                
                <div class="form-group">
                    @error('error')
                        <span> {{$message }}</span>
                    @enderror
                    <label for="name">Nome completo</label>
                    <input type="text" name="name" class="form-control" id="nome" placeholder="Nome completo" value="{{ old('name', $oldValues['name'] ?? '') }}">
                    @error('name')
                        <span> {{$message }}</span>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="document_number">Número do Documento</label>
                    <input type="text" name="document_number" class="form-control" id="document_number" placeholder="Número do Documento" value="{{ old('document_number', $oldValues['document_number'] ?? '') }}">
                    @error('document_number')
                        <span> {{$message }}</span>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="profession_type_id">Tipo de Profissioanl</label>
                    <select name="profession_type_id" class="form-control" id="profession_type_id">
                        <option value="">Selecione o Tipo de Profissioanl</option>
                        @foreach($professionTypes as $type)
                            <option value="{{ $type->id }}" {{ old('profession_type_id') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                        @endforeach
                    </select>
                    @error('profession_type_id')
                        <span> {{$message }}</span>
                    @enderror
                </div>
                
            
                <button type="submit" class="btn btn-secondary">Cadastrar</button>
            </form>
            <div class="dashboard-flex">
                
            </div>
        </div>

    </div>

</main>

@endsection
