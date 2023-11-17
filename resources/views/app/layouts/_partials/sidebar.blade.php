<sidebar id="sidebar">

    <div class="sidebar-titulo">
        <img src="{{ asset('img/amigos-símbolo_white.png') }}" alt="">
        <h2>Amigos da Comunidade</h2>
    </div>

    <div class="menu">
        <ul>
            <li class="{{ request()->routeIs('app.admin') ? 'selecionado' : '' }}">
                <i class="fas fa-home"></i>
                <a href="{{ route('app.admin') }}">Dashboard</a>
            </li>

            <li class="{{ request()->routeIs('app.profile') ? 'selecionado' : '' }}">
                <i class="fas fa-user"></i>
                <a href="{{ route('app.admin') }}">Perfil</a>
            </li>

            <li class="{{ request()->routeIs(['app.users', 'app.users.add', 'app.users.edit']) ? 'selecionado' : '' }}">
                <i class="fa fa-users"></i>
                <a href="{{ route('app.users') }}">Usuários</a>
            </li>

            <li>
                <i class="fas fa-heartbeat"></i>
                <a href="{{ route('app.admin') }}">Função 2</a>
            </li>

            <li>
                <i class="fas fa-snowboarding"></i>
                <a href="{{ route('app.admin') }}">Função 3</a>
            </li>

            <li>
                <i class="fas fa-utensils"></i>
                <a href="{{ route('app.admin') }}">Função 4</a>
            </li>
            <li>
                <i class="fas fa-calculator"></i>
                <a href="{{ route('app.admin') }}">Funçao 4</a>
            </li>
        </ul>
    </div>

</sidebar>