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
                <a href="{{ route('app.profile') }}">Perfil</a>
            </li>

            <li class="{{ request()->routeIs(['app.users', 'app.users.add', 'app.users.edit']) ? 'selecionado' : '' }}">
                <i class="fa fa-users"></i>
                <a href="{{ route('app.users') }}">Usuários</a>
            </li>

            <li class="{{ request()->routeIs(['app.patient', 'app.patient.add', 'app.patient.edit']) ? 'selecionado' : '' }}">
                {{-- <i class="fas fa-heartbeat"></i> --}}
                <i class="fas fa-procedures"></i>
                <a href="{{ route('app.patient') }}">Pacientes</a>
            </li>

            <li class="{{ request()->routeIs(['app.healthcare_profession_type', 'app.healthcare_profession_type.add', 'app.healthcare_profession_type.edit']) ? 'selecionado' : '' }}">
                <i class="fas fa-stethoscope"></i>
                <a href="{{ route('app.healthcare_profession_type') }}">Tipos de Profissionais</a>
            </li>

            <li class="{{ request()->routeIs(['app.healthcare_professionals', 'app.healthcare_professionals.add', 'app.healthcare_professionals.edit']) ? 'selecionado' : '' }}">
                <i class="fas fa-user-md"></i>
                <a href="{{ route('app.healthcare_professionals') }}">Profissionais</a>
            </li>
            <li class="{{ request()->routeIs(['app.medical_records', 'app.medical_records.add', 'app.medical_records.edit']) ? 'selecionado' : '' }}"> 
                <i class="fas fa-notes-medical"></i>
                <a href="{{ route('app.medical_records') }}">Prontuários</a>
            </li>
            <li class="{{ request()->routeIs(['app.logs_access']) ? 'selecionado' : '' }}"> 
                <i class="fas fa-clipboard-list"></i>
                <a href="{{ route('app.logs_access') }}">Logs</a>
            </li>
        </ul>
    </div>

</sidebar>