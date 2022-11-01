<div class="col-lg-12">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-border-c-{{$action == 'store' ? 'green' : 'yellow'}}">
                <div class="card-body">
                    <h6 class="card-title">{{$action == 'store' ? 'Agregar' : 'Editar'}} Categoría</h6>
                    <div class="form-group">
                        <small class="mr-3 text-primary">Nombre:<span class="text-danger">*</span> </small>
                        <input type="text"
                               class="form-control"
                               wire:model="name"
                        placeholder="Escriba un nombre...">
                        @error('name')<span class="text-danger"> {{$message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <small class="mr-3 text-primary">Descripción Corta:</small>
                        <textarea wire:model="shortDescription" class="form-control" cols="30" rows="4" placeholder="Escriba una descripción corta..."></textarea>
                        @error('shortDescription')<span class="text-danger"> {{$message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <small class="mr-3 text-primary">Estado</small>
                        <div class="switch switch-info m-r-10">
                            <input wire:model="status" type="checkbox" id="switch-i-1" checked>
                            <label for="switch-i-1" class="cr"></label>
                        </div>
                        @error('status')<span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-danger btn-sm float-right ml-2" wire:click="resetInputFields">
                            Cancelar
                        </button>
                        @if($action == 'store')
                            <button class="btn btn-outline-success btn-sm float-right" wire:click="store()">Guardar
                            </button>
                        @else
                            <button class="btn btn-outline-info btn-sm float-right" wire:click="update()">Actualizar
                            </button>
                        @endif
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-8">
            <div class="card card-border-c-green user-profile-list">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input
                                    wire:model="search"
                                    class="form-control my-border"
                                    type="text"
                                    placeholder="Escriba para buscar...">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group d-flex justify-content-between">
                                <select wire:model="perPage" class="form-control text-gray-500 text-sm my-border mr-4">
                                    <option value="5">5 por página</option>
                                    <option value="10">10 por página</option>
                                    <option value="15">15 por página</option>
                                    <option value="20">20 por página</option>
                                    <option value="50">50 por página</option>
                                    <option value="100">100 por página</option>
                                </select>
                                @if($search !='')
                                    <button wire:click="clear" class="btn btn-outline-danger ">X</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="dt-responsive table-responsive">
                        <table class="table table-sm  nowrap mb-2 dataTable">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($dataCategory->count()>0)
                            @foreach($dataCategory as $data)
                                    <tr>
                                        <td>{{ $data->name }}</td>
                                        <td> {{Illuminate\Support\Str::limit($data->shortDescription,30)}}</td>
                                        <td>
                                            <span class="badge badge-light-{{$data->status == 1 ? 'success': 'danger'}}">
                                                {{$data->status == 1 ? 'Activo': 'Inactivo'}}
                                            </span>
                                            <div class="overlay-edit">
                                                <button
                                                    class="btn btn-sm btn-icon btn-warning"
                                                    wire:click="edit({{ $data->id }})"
                                                    type="button"
                                                    data-toggle="modal" data-target="#updateModal">
                                                    <i class="feather icon-edit-2"></i></button>
                                                <button
                                                    wire:click="delete({{ $data->id }})"
                                                    data-toggle="tooltip"
                                                    title="Eliminar"
                                                    type="button"
                                                    class="btn btn-sm btn-icon btn-danger">
                                                    <i class="feather icon-trash-2"></i></button>
                                            </div>

                                        </td>
                                    </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td class="text-center" colspan="3">No hay datos.</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    {{$dataCategory->links()}}
                </div>
            </div>
        </div>
    </div>

</div>
