<div class="row">
    <div class="col-md-12">
        <div class="card card-border-c-green">
            <div class="card-header">
                <h6>Información General</h6>
                <div class="card-header-right">
                    <div class="btn-group card-option">
                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="feather icon-more-horizontal"></i>
                        </button>
                        <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                            <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                            <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <small class="mr-3 text-primary">Correo</small>
                        <input type="email" class="form-control" placeholder="" wire:model="email"/>
                        @error('email')<li class="text-danger">{{ $message }}</li>@enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <small class="mr-3 text-primary">Teléfono</small>
                        <input type="text" class="form-control" placeholder="" wire:model="phone"/>
                        @error('phone')<li class="text-danger">{{ $message }}</li>@enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <small class="mr-3 text-primary">Celular</small>
                        <input type="text" class="form-control" placeholder="" wire:model="cellphone"/>
                        @error('cellphone')<li class="text-danger">{{ $message }}</li>@enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <small class="mr-3 text-primary">Dirección</small>
                        <input type="text" class="form-control" placeholder="" wire:model="address"/>
                        @error('address')<li class="text-danger">{{ $message }}</li>@enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <small class="mr-3 text-primary">Facebook</small>
                        <input type="text" class="form-control" placeholder="" wire:model="fb"/>
                        @error('fb')<li class="text-danger">{{ $message }}</li>@enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <small class="mr-3 text-primary">Whatsapp</small>
                        <input type="text" class="form-control" placeholder="" wire:model="wtp"/>
                        @error('wtp')<li class="text-danger">{{ $message }}</li>@enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <small class="mr-3 text-primary">Instagram</small>
                        <input type="text" class="form-control" placeholder="" wire:model="ig"/>
                        @error('ig')<li class="text-danger">{{ $message }}</li>@enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <small class="mr-3 text-primary">Twitter</small>
                        <input type="text" class="form-control" placeholder="" wire:model="tw"/>
                        @error('tw')<li class="text-danger">{{ $message }}</li>@enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <small class="mr-3 text-primary">Logo </small>
                        <div class="input-group mt-1">
                            <div class="input-group-prepend">
                                @if($urlLogo == null)
                                    <img src="{{asset('images/placeholder.jpg')}}" alt="area image"
                                         class="img-radius align-top m-r-15"
                                         data-toggle="tooltip" title="Ver"
                                         style="width:45px; height:45px;">
                                    <a id="viewImg" hidden href="{{asset('images/placeholder.jpg')}}" data-lightbox="1"
                                       data-title="Imagen" class="btn btn-sm btn-icon btn-success">
                                        <i class="fa fa-eye"></i></a>
                                @else
                                    @if($temporaryUrl)
                                        <img src="{{$urlLogo->temporaryUrl()}}" alt="area image"
                                             class="img-radius align-top m-r-15"
                                             data-toggle="tooltip" title="Ver"
                                             style="width:45px; height: 45px;">
                                        <a id="viewImg" hidden href="{{$urlLogo->temporaryUrl()}}" data-lightbox="1"
                                           data-title="Portada" class="btn btn-sm btn-icon btn-success">
                                            <i class="fa fa-eye"></i></a>
                                    @else
                                        <img src="{{asset($urlLogo)}}" alt="area image"
                                             class="img-radius align-top m-r-15"
                                             data-toggle="tooltip" title="Ver"
                                             style="width:45px; height: 45px;">
                                        <a id="viewImg" hidden href="{{asset($urlLogo)}}" data-lightbox="1"
                                           data-title="Logo" class="btn btn-sm btn-icon btn-success">
                                            <i class="fa fa-eye"></i></a>
                                    @endif

                                @endif

                            </div>

                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" wire:model="urlLogo"
                                       accept="image/x-png,image/jpg,image/jpeg" wire:click="tempUrl()">
                                <label class="custom-file-label" for="inputGroupFile01">Subir imagen</label>
                            </div>
                        </div>
                        @error('urlLogo')
                        <li class="text-danger"> {{$message }}</li>@enderror
                    </div>
                </div>

                <div class="text-right">
                   <button wire:click.prevent="update()" type="button" class="btn btn-sm btn-outline-primary">Guardar</button>
                    <button wire:click.prevent="defaultData()" type="button" class="btn btn-sm btn-outline-danger close-btn bl-3">Cancelar</button>
                </div>
            </div>
        </div>

    </div>
</div>
