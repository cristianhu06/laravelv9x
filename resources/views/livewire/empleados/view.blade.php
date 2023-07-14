@section('title', __('Empleados'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left"  style="display: flex; align-items: center;">
                            <div style="width: 32px; height: 32px; overflow: hidden; margin-right: 10px;">
                                <img src="{{ asset('img/livewire.png') }}" alt="Logo" style="width: 100%; height: auto;">
                            </div>
							<h4>Lista de Empleados  </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Empleados">
						</div>
						<div class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="fa fa-plus"></i>  Agregar
						</div>
					</div>
				</div>

				<div class="card-body">
						@include('livewire.empleados.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr>
								<td>#</td>
								<th>Nombre</th>
								<th>Apellidos</th>
								<th>Telefono</th>
								<th>Direccion</th>
								<th>Cargo</th>
								<th>Correo</th>
								<td>Acciones</td>
							</tr>
						</thead>
						<tbody>
							@forelse($empleados as $row)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $row->nombre }}</td>
								<td>{{ $row->apellidos }}</td>
								<td>{{ $row->telefono }}</td>
								<td>{{ $row->direccion }}</td>
								<td>{{ $row->cargo }}</td>
								<td>{{ $row->correo }}</td>
								<td width="90">
									<div class="dropdown">
										<a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Accion
										</a>
										<ul class="dropdown-menu">
											<li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a></li>
											<li><a class="dropdown-item" onclick="confirm('Confirm Delete Empleado id {{$row->id}}? \nDeleted Empleados cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Elminar </a></li>
										</ul>
									</div>
								</td>
							</tr>
							@empty
							<tr>
								<td class="text-center" colspan="100%">No data Found </td>
							</tr>
							@endforelse
						</tbody>
					</table>
					<div class="float-end">{{ $empleados->links() }}</div>
					</div>
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
