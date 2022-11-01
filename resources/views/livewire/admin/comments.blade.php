<div class="col-lg-12">
    @include('admin.modals.comments.modal')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <select id="estate" wire:model="productFilter"
                                class="form-control text-gray-500 text-sm my-border">
                            <option value="">Seleccionar Producto</option>
                            @foreach($productList as $data)
                                <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-5">
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
                        @if($search !='' || $productFilter!=null)
                            <button wire:click="clear" class="btn btn-outline-danger ">X</button>
                        @endif
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
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Producto</th>
                        <th>Comentario</th>
                        <th>Estado</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($commentList->count() > 0)
                    @foreach($commentList as $data)
                            <tr>
                                <td>
                                    <div class="d-inline-block align-middle">
                                        <div class="d-inline-block">
                                            <h6 class="m-b-0">{{$data->name}}</h6>
                                            <p class="m-b-0">{{$data->email}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>{{\Carbon\Carbon::parse($data->created_at)->format('Y, M d H:i')}}</td>
                                <td>{{$data->commentable->name}}</td>
                                <td>
                                    <div class="d-inline-block align-middle">
                                        <div class="d-inline-block">
                                            <span class="m-b-0">
                                                <span><i class="feather {{$data->rating >= 1 ?'icon-star-on': 'icon-star'}} text-warning"></i></span>
                                                <span><i class="feather {{$data->rating >= 2 ?'icon-star-on': 'icon-star'}} text-warning"></i></span>
                                                <span><i class="feather {{$data->rating >= 3 ?'icon-star-on': 'icon-star'}} text-warning"></i></span>
                                                <span><i class="feather {{$data->rating >= 4 ?'icon-star-on': 'icon-star'}} text-warning"></i></span>
                                                <span><i class="feather {{$data->rating >= 5 ?'icon-star-on': 'icon-star'}} text-warning"></i></span>
                                            </span>
                                            <p class="m-b-0">{{Illuminate\Support\Str::limit($data->message,30)}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge badge-light-{{$data->status === 1 ? 'success' : 'danger'}}">{{$data->status === 1 ? 'Activo' : 'Inactivo'}}</span>
                                    <div class="overlay-edit">

                                            <span data-toggle="modal" data-target="#commentModal">
                                                    <button
                                                        class="btn btn-icon btn-info"
                                                        wire:click="show({{ $data->id }})"
                                                        type="button" data-toggle="tooltip"
                                                        title="Detalle">
                                                <i class="feather icon-list"></i></button>
                                            </span>

                                        @if($data->status == 1)
                                        <button
                                            wire:click="deactivate({{ $data->id }})"
                                            data-toggle="tooltip"
                                            title="Ocultar"
                                            type="button"
                                            class="btn btn-icon btn-danger">
                                            <i class="feather icon-eye-off"></i>
                                        </button>
                                        @else
                                            <button
                                                wire:click="activate({{ $data->id }})"
                                                data-toggle="tooltip"
                                                title="Mostrar"
                                                type="button"
                                                class="btn btn-icon btn-success">
                                                <i class="feather icon-eye"></i>
                                            </button>
                                        @endif

                                    </div>
                                </td>

                            </tr>
                    @endforeach
                    @else
                        <tr>
                            <td class="text-center" colspan="5">No hay datos.</td>
                        </tr>
                    @endif
                    </tbody>

                </table>
            </div>
            {{$commentList->links()}}
        </div>
    </div>
</div>


