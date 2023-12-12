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
                <form method="post" action="{{ route('app.medical_records.edit', ['id' => $medicalRecord->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        @error('error')
                            <span> {{ $message }}</span>
                        @enderror
                        <label for="chief_complaint">Queixa Principal</label>
                        <textarea name="chief_complaint" class="form-control" id="chief_complaint">{{ $medicalRecord->chief_complaint }}</textarea>
                        @error('chief_complaint')
                            <span> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="history_of_present_illness">História da Doença Atual</label>
                        <textarea name="history_of_present_illness" class="form-control" id="history_of_present_illness">{{ $medicalRecord->history_of_present_illness }}</textarea>
                        @error('history_of_present_illness')
                            <span> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="past_medical_history">História Médica Pregressa</label>
                        <textarea name="past_medical_history" class="form-control" id="past_medical_history">{{ $medicalRecord->past_medical_history }}</textarea>
                        @error('past_medical_history')
                            <span> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image_path">URL da Imagem</label>
                        <input type="text" name="image_path" class="form-control" id="image_path" placeholder="URL da Imagem" value="{{ $medicalRecord->image_path }}">    
                        @error('image_path')
                            <span> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image">Imagem</label>
                        <input type="file" name="image" class="form-control" id="image">
                        <!-- Adicione campo para upload de imagem -->
                        @error('image')
                            <span> {{ $message }}</span>
                        @enderror
                    
                        @if ($medicalRecord->image_path)
                            <div class="mt-2">
                                <label>Imagem Atual:</label>
                                <div class="d-flex align-items-center">
                                    <span>{{ basename($medicalRecord->image_path) }}</span>
                                    <span class="ml-2"> | </span>
                                    <label for="remove_image">Remover:</label>
                                    <input type="checkbox" name="remove_image" id="remove_image" value="1">
                                </div>
                            </div>
                        @endif
                    </div>
                    

                    <button type="submit" class="btn btn-secondary">Atualizar</button>
                </form>
                <div class="dashboard-flex">

                </div>
            </div>

        </div>

    </main>

@endsection
