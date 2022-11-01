<div class="col-lg-12">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-border-c-{{$action == 'STORE' ? 'green' : 'yellow'}}">
                <div class="card-body">
                    <h6 class="card-title">{{$action == 'STORE' ? 'Agregar' : 'Editar'}} Banner</h6>

                    <div class="form-group">
                        <small class="mr-3 text-primary">Imagen<span class="text-danger">*</span> </small>
                        <div class="input-group mt-1">
                            <div class="input-group-prepend">
                                @if($urlImage == null)
                                    <img src="{{asset('images/placeholder.jpg')}}" alt="area image"
                                         class="align-top m-r-15"
                                         style="width:45px; height:45px;">
                                @else
                                    @if($temporaryUrl)
                                        <img src="{{$urlImage->temporaryUrl()}}" alt="area image"
                                             class="align-top m-r-15"
                                             style="width:45px; height: 45px;">
                                    @else
                                        <img src="{{asset($urlImage)}}" alt="area image"
                                             class="align-top m-r-15"
                                             style="width:45px; height: 45px;">
                                    @endif

                                @endif

                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" wire:model="urlImage"
                                       accept="image/x-png,image/jpg,image/jpeg" wire:click="tempUrl()">
                                <label class="custom-file-label" for="inputGroupFile01">Subir imagen</label>
                            </div>
                        </div>
                        @error('urlImage')
                        <li class="mt-2 text-danger"> {{$message }}</li>@enderror
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
                        @if($action == 'STORE')
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
                        <div class="col-md-12">
                            <div class="form-group float-right">
                                <select wire:model="perPage" class="form-control text-gray-500 text-sm my-border mr-4">
                                    <option value="5">5 por página</option>
                                    <option value="10">10 por página</option>
                                    <option value="15">15 por página</option>
                                    <option value="20">20 por página</option>
                                    <option value="50">50 por página</option>
                                    <option value="100">100 por página</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="dt-responsive table-responsive">
                        <table class="table table-sm  nowrap mb-2 dataTable">
                            <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Estado</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($data_banner->count()>0)
                            @foreach($data_banner as $data)
                                <tr>
                                    <td>
                                        <img src="{{asset($data->urlImage)}}" alt="banner image"
                                             class=" align-top m-r-15" style="width:60px; height: 50px">
                                    </td>
                                    <td>
                                        <span
                                            class="badge badge-light-{{$data->status == 1 ? 'success': 'danger'}}">{{$data->status == 1 ? 'Activo': 'Inactivo'}}</span>

                                        <div class="overlay-edit">
                                            <a href="{{asset($data->urlImage)}}" data-lightbox="1"
                                               data-title="My caption 1" class="btn btn-sm btn-icon btn-success"
                                               data-toggle="tooltip" title="Ver"><i class="fa fa-eye"></i></a>

                                                <button
                                                    class="btn btn-sm btn-icon btn-warning"
                                                    wire:click="edit({{ $data->id }})"
                                                    type="button"
                                                    data-toggle="tooltip"
                                                    title="Editar">
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
                                    <td class="text-center" colspan="2">No hay datos.</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    {{$data_banner->links()}}
                </div>

            </div>
        </div>
    </div>

</div>
