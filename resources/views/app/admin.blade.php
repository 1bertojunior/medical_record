@extends('app.layouts.app')

@section('title', $title)

@section('content')

@include('app.layouts._partials.sidebar')

<main id="main-conteudo-total">

    @include('app.layouts._partials.header')
    

    <div class="main-conteudo">
        <div class="conteudo-titulo-main">
            <h2> Dashboard</h2>
        </div>

        <div class="dashboard-conteudo">
            <div class="dashboard-flex">
                <div class="dashboard-box">
                    <div class="dashboard-box-wrapper">
                        <div class="box-icons box-peso"><i class="fas fa-user"></i></div>
                        <div class="valor">{{ $data['totalUsers'] }}</div>
                        <div class="tipo">Usuários</div>
                    </div>
                </div>
                <div class="dashboard-box">
                    <div class="dashboard-box-wrapper">
                        <div class="box-icons box-pressao"><i class="fas fa-procedures"></i></div>
                        <div class="valor">{{ $data['totalPatients'] }}</div>
                        <div class="tipo">Pacientes</div>
                    </div>
                </div>
                <div class="dashboard-box">
                    <div class="dashboard-box-wrapper">
                        <div class="box-icons box-imc"><i class="fas fa-stethoscope"></i></div>
                        <div class="valor">{{ $data['totalProfessionTypes'] }}</div>
                        <div class="tipo">Tipos de Profissionais</div>
                    </div>
                </div>
                <div class="dashboard-box">
                    <div class="dashboard-box-wrapper">
                        <div class="box-icons box-atividade"><i class="fas fa-user-md"></i></div>
                        <div class="valor">{{ $data['totalProfessionals'] }}</div>
                        <div class="tipo">Profissionais</div>
                    </div>
                </div>
            </div>
            

        </div>

        

    </div>

</main>

@endsection