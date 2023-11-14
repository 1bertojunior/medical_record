@extends('app.layouts.app')

@section('title', $title)

@section('content')

{{-- Welcome to page admin --}}

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
                        <div class="box-icons box-peso"><i class="fas fa-weight"></i></div>
                        <div class="valor">XXX</div>
                        <div class="tipo">XX</div>
                    </div>
                </div>
                <div class="dashboard-box">
                    <div class="dashboard-box-wrapper">
                        <div class="box-icons box-pressao"><i class="fas fa-heartbeat"></i></i></div>
                        <div class="valor">XXX</div>
                        <div class="tipo">XXX</div>
                    </div>
                </div>
                <div class="dashboard-box">
                    <div class="dashboard-box-wrapper">
                        <div class="box-icons box-imc"><i class="fas fa-calculator"></i></div>
                        <div class="valor">XXX</div>
                        <div class="tipo">XXX</div>
                    </div>
                </div>
                <div class="dashboard-box">
                    <div class="dashboard-box-wrapper">
                        <div class="box-icons box-atividade"><i class="fas fa-biking"></i></div>
                        <div class="valor">XXX</div>
                        <div class="tipo">XXX</div>
                    </div>

                </div>
            </div>
        </div>

    </div>

</main>

@endsection