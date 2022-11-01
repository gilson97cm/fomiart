<div class="col-lg-12">
    @include('admin.modals.messages.modal')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-9">
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
                        <th>Mensaje</th>
                        <th>Código(s) de Producto(s)</th>
                        <th>Estado</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($messagesList->count() > 0)
                        @foreach($messagesList as $data)
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
                                <td>{{Illuminate\Support\Str::limit($data->message,30)}}</td>
                                <td>{{$data->codeProduct}}</td>
                                <td>
                                    <span class="badge badge-light-{{$data->read === 1 ? 'success' : 'info'}}">{{$data->read === 1 ? 'No Leído' : 'Leído'}}</span>
                                    <div class="overlay-edit">
                                            <span data-toggle="modal" data-target="#messageModal">
                                                    <button
                                                        class="btn btn-icon btn-info"
                                                        wire:click="read({{ $data->id }})"
                                                        type="button" data-toggle="tooltip"
                                                        title="Leer">
                                                <i class="feather icon-eye"></i></button>
                                            </span>

                                            <button
                                                wire:click="delete({{ $data->id }})"
                                                data-toggle="tooltip"
                                                title="Eliminar"
                                                type="button"
                                                class="btn btn-icon btn-danger">
                                                <i class="feather icon-trash"></i>
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
            {{$messagesList->links()}}
        </div>
    </div>
</div>


