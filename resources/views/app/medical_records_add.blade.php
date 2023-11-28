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
            <form method="post" action="{{ route('app.medical_records.add') }}">
                @csrf
                
                <div class="form-group">
                    <!-- Selecione o paciente -->
                    <label for="patient_id">Paciente</label>
                    <select name="patient_id" class="form-control">
                        @foreach($patients as $patient)
                            <option value="{{ $patient->id }}" {{ old('patient_id') == $patient->id ? 'selected' : '' }}>
                                {{ $patient->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('patient_id')
                        <span> {{$message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <!-- Selecione o profissional -->
                    <label for="professional_id">Profissional</label>
                    <select name="professional_id" class="form-control">
                        @foreach($professionals as $professional)
                            <option value="{{ $professional->id }}" {{ old('professional_id') == $professional->id ? 'selected' : '' }}>
                                {{ $professional->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('professional_id')
                        <span> {{$message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image_path">Imagem</label>
                    <input type="file" name="image_path" class="form-control">
                    @error('image_path')
                        <span> {{$message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="chief_complaint">Queixa Principal</label>
                    <textarea name="chief_complaint" class="form-control">{{ old('chief_complaint') }}</textarea>
                    @error('chief_complaint')
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
