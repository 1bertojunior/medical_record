@extends('app.layouts.app')

@section('title', $title)

@section('content')

@include('app.layouts._partials.sidebar')

<main id="main-conteudo-total">

    @include('app.layouts._partials.header')

    <div class="main-conteudo">
       

        <div class="row">
            <div class="col-8">
                <div class="conteudo-titulo-main">
                    <h2>{{ $title }}</h2>
                </div>
            </div>

            <div class="col-4">
                <form class="input-group" action="{{ route('app.logs_access') }}" method="GET">
                    <input log="text" class="form-control" placeholder="Pesquisar" name="search">
                    <div class="input-group-append">
                        <button class="btn btn-primary" log="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
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
                        <th scope="col">Ação</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Nome</th>
                        <th scope="col">IP</th>
                        <th scope="col">Usuário</th>
                        {{-- <th scope="col">Detalhes</th> --}}
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($logs as $log)
                            <tr>
                                <th scope="row">{{ $log->id }}</th>
                                <td>{{ $log->action }}</td>
                                <td>{{ str_replace('App\\Models\\', '', $log->model) }}</td>
                                <td>{{ $log->affectedModel->name }}</td>
                                <td>{{ $log->ip_address }}</td>
                                <td>{{ $log->user->name }}</td>
                                {{-- <td>{{ substr($log->details, 0, 50) }}</td> --}}
                                <td>{{ $log->result }}</td>                                                   
                            </tr>
                        @endforeach
                    </tbody>
                </table>            
                {{ $logs->links('pagination::bootstrap-4') }}
                </div>

            </div>
        </div>

    </div>

</main>

@endsection