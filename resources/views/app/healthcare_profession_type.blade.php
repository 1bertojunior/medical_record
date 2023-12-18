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
                <form class="input-group" action="{{ route('app.healthcare_profession_type') }}" method="GET">
                    <input type="text" class="form-control" placeholder="Pesquisar" name="search">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            
            <div class="col-4 d-flex justify-content-end">
                <a href="{{ route('app.healthcare_profession_type.add') }}"> <i class="fas fa-plus"></i>
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
                        <th scope="col">Conselho</th>
                        <th scope="col">Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($types as $type)
                            <tr>
                                <th scope="row">{{ $type->id }}</th>
                                <td>{{ $type->name }}</td>
                                <td>{{ $type->council_type }}</td>
                                <td>
                                    <a href="{{ route('app.healthcare_profession_type.edit', ['id' => $type->id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>            
                {{ $types->links('pagination::bootstrap-4') }}
                </div>

            </div>
        </div>

    </div>

</main>

@endsection