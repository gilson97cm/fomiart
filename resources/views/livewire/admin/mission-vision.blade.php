<div class="row">
    <div class="col-md-12">
        <div class="card card-border-c-green">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6>Misión</h6>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div wire:ignore>
                                        <textarea wire:model="mission" id="mission"
                                                  class="form-control summernote"></textarea>
                                    </div>
                                    @error('mission')
                                    <li class="text-danger">{{ $message }}</li>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6>Visión</h6>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div wire:ignore>
                                        <textarea wire:model="vision" id="vision"
                                                  class="form-control summernote"></textarea>
                                    </div>
                                    @error('vision')
                                    <li class="text-danger">{{ $message }}</li>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button wire:click.prevent="update()" type="button" class="btn btn-sm btn-outline-primary"> Guardar
                    </button>
                    <button wire:click.prevent="cancel()" type="button"
                            class="btn btn-sm btn-outline-danger close-btn bl-3">Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script>

            $(document).ready(function () {
                resetEditor();
            });

            $('#mission').summernote({
                // dialogsInBody: true,
                tabsize: 2,
                height: 300,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'strikethrough', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['para', ['ul', 'ol', 'paragraph']],
                ],
                callbacks: {
                    onChange: function (contents, $editable) {
                    @this.set('mission', contents);
                    },
                }
            });
            $('#vision').summernote({
                // dialogsInBody: true,
                tabsize: 2,
                height: 300,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'strikethrough', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['para', ['ul', 'ol', 'paragraph']],
                ],
                callbacks: {
                    onChange: function (contents, $editable) {
                    @this.set('vision', contents);
                    },
                }
            });


            let resetEditor = () => {
                $("#mission").summernote("code", @this.get('mission'));
                $("#vision").summernote("code", @this.get('vision'));
            }

            window.livewire.on('loadData', () => {
                // alert('hola');
                resetEditor();
            });
        </script>
    @endsection
</div>
