@extends('app.layouts.app')

@section('title', $title)

@section('content')

@include('app.layouts._partials.sidebar')

<main id="main-conteudo-total">

    @include('app.layouts._partials.header')

    <div class="main-conteudo">
       
        <div class="row">
            <div class="col-4">
                <div class="conteudo-titulo-main">
                    <h2>{{ $title }}</h2>
                </div>
            </div>

            <div class="col-4">
                <form class="input-group" action="{{ route('app.medical_records') }}" method="GET">
                    <input type="text" class="form-control" placeholder="Pesquisar" name="search">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            
            <div class="col-4 d-flex justify-content-end">
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
                                <th scope="col">Nome</th>
                                <th scope="col">Profissional</th>
                                <th scope="col">Queixa</th>
                                <th scope="col">Histórico</th>
                                <th scope="col">Diagnóstico</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($medicalRecords as $record)
                                <tr>
                                    <th scope="row">{{ $record->id }}</th>
                                    <td>{{ $record->patient->name }}</td>
                                    <td>{{ $record->healthcareProfessional->name }}</td>
                                    <td>{{ substr($record->complaints, 0, 50) }}</td>
                                    <td>{{ substr($record->disease_history, 0, 50) }}</td>
                                    <td>{{ substr($record->diagnosis, 0, 50) }}</td>
                                    <td>
                                        <a href="#modal" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('app.medical_records.edit', ['id' => $record->id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                        <a href="#delete" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $medicalRecords->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>

    </div>

</main>


@endsection
