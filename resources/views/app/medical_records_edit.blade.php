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
            <form method="post" action="{{ route('app.medical_records.edit', ['id' => $record->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Adicione os campos restantes conforme necessário -->

                <div class="form-group">
                    <label for="chief_complaint">Queixa Principal</label>
                    <textarea name="chief_complaint" class="form-control" id="chief_complaint">{{ old('chief_complaint', $record->chief_complaint) }}</textarea>
                    @error('chief_complaint')
                        <span> {{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="history_of_present_illness">História da Doença Atual</label>
                    <textarea name="history_of_present_illness" class="form-control" id="history_of_present_illness">{{ old('history_of_present_illness', $record->history_of_present_illness) }}</textarea>
                    @error('history_of_present_illness')
                        <span> {{ $message }}</span>
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
