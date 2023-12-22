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
                        <label for="patient_info">Informações do Paciente</label>
                        <textarea class="form-control" id="patient_info" readonly>{{ $medicalRecord->patient->name }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="professional_info">Informações do Profissional de Saúde</label>
                        <textarea class="form-control" id="professional_info" readonly>{{ $medicalRecord->healthcareProfessional->name }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="file">Arquivo atual</label>
                        @if($medicalRecord->file_path)
                            @if(in_array(pathinfo($medicalRecord->file_path, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']))
                                <div><img class="img-preview" src="{{ asset($medicalRecord->file_path) }}" alt="Preview do Arquivo" class="img-preview"></div>
                            @elseif(in_array(pathinfo($medicalRecord->file_path, PATHINFO_EXTENSION), ['pdf']))
                                <div class="embed-responsive embed-responsive-4by3">
                                    <iframe class="embed-responsive-item" src="{{ asset($medicalRecord->file_path) }}" allowfullscreen></iframe>
                                </div>
                            @endif
                            
                        @else
                            <p>Nenhum arquivo anexado</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="file_path" class="form-label">Arquivo (JPEG, PNG, PDF - Máximo 2MB)</label>
                        <input type="file" name="file_path" class="form-control" id="file_path">
                        @error('file_path')
                            <span> {{$message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        @error('error')
                            <span> {{ $message }}</span>
                        @enderror
                        <label for="complaints">Queixa Principal</label>
                        <textarea name="complaints" class="form-control" id="complaints">{{ $medicalRecord->complaints }}</textarea>
                        @error('complaints')
                            <span> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        @error('error')
                            <span> {{ $message }}</span>
                        @enderror
                        <label for="disease_history">Histórico de doenças</label>
                        <textarea name="disease_history" class="form-control" id="disease_history">{{ $medicalRecord->disease_history }}</textarea>
                        @error('disease_history')
                            <span> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        @error('error')
                            <span> {{ $message }}</span>
                        @enderror
                        <label for="allergies">Alergias</label>
                        <textarea name="allergies" class="form-control" id="allergies">{{ $medicalRecord->allergies }}</textarea>
                        @error('allergies')
                            <span> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        @error('error')
                            <span> {{ $message }}</span>
                        @enderror
                        <label for="diagnosis">Diagnóstico</label>
                        <textarea name="diagnosis" class="form-control" id="diagnosis">{{ $medicalRecord->diagnosis }}</textarea>
                        @error('diagnosis')
                            <span> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        @error('error')
                            <span> {{ $message }}</span>
                        @enderror
                        <label for="follow_up_instructions">Instruções de acompanhamento</label>
                        <textarea name="follow_up_instructions" class="form-control" id="follow_up_instructions">{{ $medicalRecord->follow_up_instructions }}</textarea>
                        @error('follow_up_instructions')
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
