@extends('app.layouts.app')

@section('title', $title)

@section('content')

@include('app.layouts._partials.sidebar')

<main id="main-conteudo-total">

    @include('app.layouts._partials.header')

    <div class="main-conteudo">
       
        <div class="row">
            <div class="col-6">
                <div class="conteudo-titulo-main">
                    <h2>{{ $title }}</h2>
                </div>
            </div>

            <div class="col-6 d-flex justify-content-end">
                <a href="{{ route('app.medical_records.add') }}"> <i class="fas fa-plus"></i>
                    Adicionar Prontuário
                </a>
            </div>
        </div>
        
        @success
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endsuccess

        @error('error')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror

        <div class="dashboard-conteudo">
            <div class="dashboard-flex">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome do Paciente</th>
                                <th scope="col">Profissional de Saúde</th>
                                <th scope="col">Queixa Principal</th>
                                <th scope="col">História da Doença Atual</th>
                                <!-- Adicione outros cabeçalhos conforme necessário -->
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($medicalRecords as $record)
                                <tr>
                                    <th scope="row">{{ $record->id }}</th>
                                    <td>{{ $record->patient->name }}</td>
                                    <td>{{ $record->healthcareProfessional->name }}</td>
                                    <td>{{ $record->chief_complaint }}</td>
                                    <td>{{ $record->history_of_present_illness }}</td>
                                    <td>
                                        <a href="{{ route('app.medical_records.edit', ['id' => $record->id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                        <a href="#" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</main>

@endsection
