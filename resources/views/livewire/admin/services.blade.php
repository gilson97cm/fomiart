<div class="col-lg-12">
    @include('admin.modals.services.modal')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-7">
                    <div class="form-group">
                        <input
                            wire:model="search"
                            class="form-control my-border"
                            type="text"
                            placeholder="Escriba para buscar...">
                    </div>
                </div>
                <div class="col-sm-3">
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
                <div class="col-sm-2">
                    <div class="form-group">
                        <button class="btn btn-success btn-sm btn-round has-ripple float-lg-right"
                                wire:click.prevent="resetInputFields()"
                                data-toggle="modal" data-target="#serviceModal">
                            <i class="feather icon-plus"></i>
                            Agregar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card user-profile-list">
        <div class="card-body">
            <div class="dt-responsive table-responsive">
                <table class="table table-sm  nowrap mb-2 dataTable">
                    <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Descripción Corta</th>
                        <th>Estado</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($dataService->count()>0)
                    @foreach($dataService as $data)
                            <tr>
                                <td>
                                    <img src="{{asset($data->urlImage)}}" alt="service image" class=" align-top m-r-15" style="width:70px; height: 50px">
                                </td>
                                <td> {{Illuminate\Support\Str::limit($data->name,15)}}</td>
                                <td> {{Illuminate\Support\Str::limit($data->shortDescription,30)}}</td>
                                <td>
                                    <span class="badge badge-light-{{$data->status === 1 ? 'success' : 'danger'}}">{{$data->status === 1 ? 'Activo' : 'Inactivo'}}</span>
                                    <div class="overlay-edit">

                                            <span data-toggle="modal" data-target="#serviceModal">
                                                    <button
                                                        class="btn btn-icon btn-warning"
                                                        wire:click="edit({{ $data->id }})"
                                                        type="button" data-toggle="tooltip"
                                                        title="Editar">
                                                <i class="feather icon-edit-2"></i></button>
                                            </span>

                                        <button
                                            wire:click="delete({{ $data->id }})"
                                            data-toggle="tooltip"
                                            title="Eliminar"
                                            type="button"
                                            class="btn btn-icon btn-danger">
                                            <i class="feather icon-trash-2"></i>
                                        </button>

                                    </div>
                                </td>

                            </tr>
                    @endforeach
                    @else
                        <tr>
                            <td class="text-center" colspan="4">No hay datos.</td>
                        </tr>
                    @endif
                    </tbody>

                </table>
            </div>
            {{$dataService->links()}}
        </div>
    </div>
</div>


