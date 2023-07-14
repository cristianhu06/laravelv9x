@extends('layouts.app')
@section('title', __('Dashboard'))
@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header"><h5><span class="text-center fa fa-home"></span> @yield('title')</h5></div>
			<div class="card-body">
				<h5>Hola <strong>{{ Auth::user()->name }},</strong> {{ __('Estás conectado a ') }}{{ config('app.name', 'Laravelv9x') }}</h5>
				</br>
				<hr>
                <div style="text-align: center">
                    <h3> <strong>total</strong></h3>
                </div>
                <div class="row w-100">
					<div class="col-md-3">
						<div class="card border-info mx-sm-1 p-3">
							<div class="card border-info text-info p-3" ><span class="text-center fa fa-users" aria-hidden="true"></span></div>
							<div class="text-info text-center mt-3"><h4>Empleados</h4></div>
							<div class="text-info text-center mt-2"><h1><livewire:empleado-counter /></h1></div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card border-success mx-sm-1 p-3">
							<div class="card border-success text-success p-3 my-card"><span class="text-center fa-solid fa-briefcase" aria-hidden="true"></span></div>
							<div class="text-success text-center mt-3"><h4>Cargos</h4></div>
							<div class="text-success text-center mt-2"><h1><livewire:cargo-counter /></h1></div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card border-danger mx-sm-1 p-3">
							<div class="card border-danger text-danger p-3 my-card" ><span class="text-center fa-solid fa-earth-americas" aria-hidden="true"></span></div>
							<div class="text-danger text-center mt-3"><h4>Paises</h4></div>
							<div class="text-danger text-center mt-2"><h1><livewire:pais-counter /></h1></div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card border-warning mx-sm-1 p-3">
							<div class="card border-warning text-warning p-3 my-card" ><span class="text-center fa-solid fa-city" aria-hidden="true"></span></div>
							<div class="text-warning text-center mt-3"><h4>Comunas</h4></div>
							<div class="text-warning text-center mt-2"><h1><livewire:comuna-counter /></h1></div>
						</div>
					</div>
				 </div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection
