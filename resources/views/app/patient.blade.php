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
                <a href="{{ route('app.users.add') }}"> <i class="fas fa-plus"></i>
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
                {{-- Welcome to the users page --}}
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
                                <td>{{ $patient->cpf }}</td>
                                <td>{{ $patient->sus_card }}</td>
                                <td>{{ $patient->phone }}</td>
                                <td>{{ $patient->birth_date }}</td>
                                <td>{{ $patient->notes }}</td>
                                <td>
                                    <a href="{{ route('app.users.edit', ['id' => $patient->id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
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