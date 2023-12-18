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
                <form class="input-group" action="{{ route('app.patient') }}" method="GET">
                    <input type="text" class="form-control" placeholder="Pesquisar" name="search">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            
            <div class="col-4 d-flex justify-content-end">
                <a href="{{ route('app.patient.add') }}"> <i class="fas fa-plus"></i>
                    Adicionar
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
                {{$message }}
            </div>
        @enderror


        <div class="dashboard-conteudo">
            <div class="dashboard-flex">
                <div class="table-responsive">
                <table class="table table-hover ">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">SUS</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Data de nascimento</th>
                        <th scope="col">Anotações</th>
                        <th scope="col">Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($patients as $patient)
                            <tr>
                                <th scope="row">{{ $patient->id }}</th>
                                <td>{{ $patient->name }}</td>
                                <td>{{ substr($patient->cpf, 0, 3) . '.' . substr($patient->cpf, 3, 3) . '.' . substr($patient->cpf, 6, 3) . '-' . substr($patient->cpf, 9, 2) }}</td>
                                <td>{{ substr($patient->sus_card, 0, 3) . ' ' . '****' . ' ' . substr($patient->sus_card, 7, 1) . ' ' . substr($patient->sus_card, 8, 3) . ' ' . substr($patient->sus_card, 11) }}</td>
                                <td>{{ $patient->phone }}</td>
                                <td>{{ date('d/m/Y', strtotime($patient->birth_date)) }}</td>
                                <td>{{ substr($patient->notes, 0, 50) }}</td>
                                <td>
                                    <a href="#modal" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('app.patient.edit', ['id' => $patient->id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $patients->links('pagination::bootstrap-4') }}
                </div>

            </div>
        </div>

    </div>

</main>

@endsection