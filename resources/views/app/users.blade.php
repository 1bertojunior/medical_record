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
                        <th scope="col">E-mail</th>
                        <th scope="col">Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route('app.users.edit', ['id' => $user->id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
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