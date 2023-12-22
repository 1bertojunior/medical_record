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
            <form method="post" action="{{ route('app.medical_records.add') }}" enctype="multipart/form-data">
                @csrf
            
                <div class="form-group">
                    <label for="patient_id">Paciente*</label>
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
                    <label for="healthcare_professional_id">Profissional*</label>
                    <select name="healthcare_professional_id" class="form-control">
                        @foreach($professionals as $professional)
                            <option value="{{ $professional->id }}" {{ old('healthcare_professional_id') == $professional->id ? 'selected' : '' }}>
                                {{ $professional->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('healthcare_professional_id')
                        <span> {{$message }}</span>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="file_path" class="form-label">Arquivo (JPEG, PNG, PDF - Máximo 2MB)*</label>
                    <input type="file" name="file_path" class="form-control" id="file_path">
                    @error('file_path')
                        <span> {{$message }}</span>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="complaints">Queixa doença</label>
                    <textarea name="complaints" class="form-control">{{ old('complaints') }}</textarea>
                    @error('complaints')
                        <span> {{$message }}</span>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="disease_history">Histórico de doenças</label>
                    <textarea name="disease_history" class="form-control">{{ old('disease_history') }}</textarea>
                    @error('disease_history')
                        <span> {{$message }}</span>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="allergies">Alergias</label>
                    <textarea name="allergies" class="form-control">{{ old('allergies') }}</textarea>
                    @error('allergies')
                        <span> {{$message }}</span>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="diagnosis">Diagnóstico</label>
                    <textarea name="diagnosis" class="form-control">{{ old('diagnosis') }}</textarea>
                    @error('diagnosis')
                        <span> {{$message }}</span>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="follow_up_instructions">Instruções de acompanhamento</label>
                    <textarea name="follow_up_instructions" class="form-control">{{ old('follow_up_instructions') }}</textarea>
                    @error('follow_up_instructions')
                        <span> {{$message }}</span>
                    @enderror
                </div>
            
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
            
        </div>

    </div>

</main>

@endsection
