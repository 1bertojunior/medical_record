@extends('app.layouts.app')

@section('title', $title)

@section('content')

@include('app.layouts._partials.sidebar')

<main id="main-conteudo-total">

    @include('app.layouts._partials.header')

    <div class="main-conteudo">
        
        <!-- Bloco de Estatísticas -->
        <div class="dashboard-conteudo">
            <div class="conteudo-titulo-main">
                <h2>Dashboard</h2>
            </div>
            
            <div class="dashboard-flex">
                @foreach ($data['statistics'] as $statistic)
                    <div class="dashboard-box">
                        <div class="dashboard-box-wrapper">
                            <div class="box-icons {{ $statistic['iconClass'] }}"><i class="fas {{ $statistic['icon'] }}"></i></div>
                            <div class="valor">{{ $statistic['value'] }}</div>
                            <div class="tipo">{{ $statistic['label'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Área de Introdução -->
        <div class="dashboard-conteudo">
            <div class="conteudo-titulo-main">
                <h2>Bem-vindo ao Painel de Controle</h2>
            </div>
            
            <div class="dashboard-flex">
                <div class="introduction card">
                    <div class="card-body">
                        <p class="card-text text-justify text-muted mb-0">A ONG Amigos da Comunidade é um projeto sem fins lucrativos onde todos que estão envolvidos são voluntários e visam trazer o melhor para a comunidade. Desde 2016 trabalhamos em Picos e várias cidades do interior do Piauí, onde são realizados em média 2000 atendimentos em saúde nos dias e locais do evento. Essa iniciativa se faz como grande potencializador das capacidades técnico-científicas dos alunos pertencentes à área da saúde e outras áreas. Pelo fato de propiciar aos voluntários práticas de suma importância para a sua formação. E os profissionais em questão tenham uma maior formação no sentido de contato humanista de sua profissão e experiência de trabalho em equipe.</p>
                    </div>
                </div>
            </div>
        </div>
    
    </div>

</main>

@endsection
