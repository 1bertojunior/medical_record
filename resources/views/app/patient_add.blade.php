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
            <form method="post" action="{{ route('app.patient.add') }}">
                @csrf
                
                <div class="form-group">
                    @error('error')
                        <span> {{$message }}</span>
                    @enderror
                    <label for="name">Nome completo</label>
                    <input type="text" name="name" class="form-control" id="nome" placeholder="Seu nome completo" value="{{ old('name', $oldValues['name'] ?? '') }}">
                    @error('name')
                        <span> {{$message }}</span>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" class="form-control" id="cpf" placeholder="Seu CPF" minlength="11" maxlength="11" value="{{ old('cpf', $oldValues['cpf'] ?? '') }}">
                    @error('cpf')
                        <span> {{$message }}</span>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="sus_card">Número do SUS</label>
                    <input type="text" name="sus_card" class="form-control" id="sus_card" placeholder="Seu número do SUS" minlength="15" maxlength="15" value="{{ old('sus_card', $oldValues['sus_card'] ?? '') }}">
                    @error('sus_card')
                        <span> {{$message }}</span>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="phone">Telefone</label>
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Seu telefone" minlength="10" maxlength="15" value="{{ old('phone', $oldValues['phone'] ?? '') }}">
                    @error('phone')
                        <span> {{$message }}</span>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="birth_date">Data de Nascimento</label>
                    <input type="date" name="birth_date" class="form-control" id="birth_date" value="{{ old('birth_date', $oldValues['birth_date'] ?? '') }}">
                    @error('birth_date')
                        <span> {{$message }}</span>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="notes">Anotações</label>
                    <textarea name="notes" class="form-control" id="notes" placeholder="Suas anotações">{{ old('notes', $oldValues['notes'] ?? '') }}</textarea>
                    @error('notes')
                        <span> {{$message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-secondary ">Cadastrar</button>
            </form>
            <div class="dashboard-flex">
                
            </div>
        </div>

    </div>

</main>

@endsection