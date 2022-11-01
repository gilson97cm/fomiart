
<div class="row">
    <div class="col-md-12">
        <div class="card card-border-c-green">
            <div class="card-header">
                <h6>Acerca de Nosotros</h6>
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
                        <small class="mr-3 text-primary">Imagen </small>
                        <div class="input-group mt-1">
                            <div class="input-group-prepend">
                                @if($urlImage == null)
                                    <img src="{{asset('images/placeholder.jpg')}}" alt="area image"
                                         class="img-radius align-top m-r-15"
                                         data-toggle="tooltip" title="Ver"
                                         style="width:45px; height:45px;">
                                    <a id="viewImg" hidden href="{{asset('images/placeholder.jpg')}}" data-lightbox="1"
                                       data-title="Imagen" class="btn btn-sm btn-icon btn-success">
                                        <i class="fa fa-eye"></i></a>
                                @else
                                    @if($temporaryUrl)
                                        <img src="{{$urlImage->temporaryUrl()}}" alt="area image"
                                             class="img-radius align-top m-r-15"
                                             data-toggle="tooltip" title="Ver"
                                             style="width:45px; height: 45px;">
                                        <a id="viewImg" hidden href="{{$urlImage->temporaryUrl()}}" data-lightbox="1"
                                           data-title="Portada" class="btn btn-sm btn-icon btn-success">
                                            <i class="fa fa-eye"></i></a>
                                    @else
                                        <img src="{{asset($urlImage)}}" alt="area image"
                                             class="img-radius align-top m-r-15"
                                             data-toggle="tooltip" title="Ver"
                                             style="width:45px; height: 45px;">
                                        <a id="viewImg" hidden href="{{asset($urlImage)}}" data-lightbox="1"
                                           data-title="Portada" class="btn btn-sm btn-icon btn-success">
                                            <i class="fa fa-eye"></i></a>
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
                        <li class="text-danger"> {{$message }}</li>@enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <small class="mr-3 text-primary">Resumen<span class="text-danger">*</span></small>
                        <textarea wire:model="abstract" class="form-control" cols="30" rows="1"></textarea>
                        @error('abstract')<li class="text-danger">{{ $message }}</li>@enderror
                    </div>
                    <div class="col-md-12 form-group">
                        <div  wire:ignore>
                            <textarea wire:model="description" id="description"   class="form-control summernote"></textarea>
                        </div>
                        @error('description')<li class="text-danger">{{ $message }}</li>@enderror
                    </div>
                </div>


                <div class="text-right">
                    <button wire:click.prevent="update()" type="button" class="btn btn-sm btn-outline-primary">Guardar</button>
                    <button wire:click.prevent="cancel()" type="button" class="btn btn-sm btn-outline-danger close-btn bl-3">Cancelar</button>
                </div>

            </div>
        </div>
    </div>
    @section('scripts')
        <script>

            $(document).ready(function(){
                resetEditor();
            });

            $('#description').summernote({
                // dialogsInBody: true,
                tabsize: 2,
                height: 350,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'strikethrough','clear']],
                    ['fontsize', ['fontsize']],
                    ['para', ['ul', 'ol', 'paragraph']],
                ],
                callbacks: {
                    onChange: function (contents, $editable) {
                    @this.set('description', contents);
                    },
                }
            });


            let resetEditor = () => {
                $("#description").summernote("code", @this.get('description'));
            }

            window.livewire.on('loadData', () => {
                // alert('hola');
                resetEditor();
            });
        </script>
    @endsection
</div>
