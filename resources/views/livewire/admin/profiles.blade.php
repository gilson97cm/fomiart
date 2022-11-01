<div class="pcoded-content">
    <!-- [ Main Content ] start -->
    <!-- profile header start -->
    <div class="user-profile user-card mb-4">
        <div class="card-body py-0">
            <div class="user-about-block m-0">
                <div class="row">
                    <div class="col-md-4 text-center mt-n5">
                        <div class="change-profile text-center">
                            <div class="dropdown w-auto d-inline-block">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <div class="profile-dp">
                                        <div class="position-relative d-inline-block">
                                            <div wire:ignore id="loading" class=" text-primary" role="status">
                                                <span class="sr-only">Loading...</span>
                                                <img id="preview" wire:ignore class="img-radius img-fluid wid-100 "
                                                    src="{{ asset($user->urlImage) }}" alt="User image">
                                            </div>
                                        </div>
                                        <div class="overlay">
                                            <span>Foto</span>
                                        </div>
                                    </div>
                                    <div class="certificated-badge">
                                        <i class="fas fa-certificate text-c-blue bg-icon"></i>
                                        <i class="fas fa-check front-icon text-white"></i>
                                    </div>
                                </a>
                                <div class="dropdown-menu">
                                    <input type="file" id="photo_profile" class="d-none" wire:model="urlImage"
                                        accept="image/x-png,image/jpg,image/jpeg">
                                    <input wire:click="updatePhoto({{ $user->id }})" type="button"
                                        id="updatePhotoBtn" class="d-none" />
                                    <input wire:click="removePhoto({{ $user->id }})" type="button"
                                        id="removePhotoBtn" class="d-none" />
                                    <a class="dropdown-item" href="javascript:changeProfile()"><i
                                            class="feather icon-upload-cloud mr-2"></i>Subir</a>
                                    <a class="dropdown-item" href="javascript:removeImage()"><i
                                            class="feather icon-trash-2 mr-2"></i>Eliminar</a>
                                </div>
                            </div>
                        </div>
                        <h5 class="mb-1">{{ $user->name }}&nbsp;{{ $user->lastname }}</h5>
                        <p class="mb-2 text-muted">Administrador</p>
                    </div>
                    <div class="col-md-8 mt-md-4">
                        <div class="row">
                            <div class="col-md-6">

                                <a href="mailto:{{ $user->email }}"
                                    class="mb-1 text-muted d-flex align-items-end text-h-primary"><i
                                        class="feather icon-mail mr-2 f-18"></i>{{ $user->email }}</a>
                                <div class="clearfix"></div>
                                <a href="#!" class="mb-1 text-muted d-flex align-items-end text-h-primary"><i
                                        class="feather icon-phone mr-2 f-18"></i>{{ $user->phone }}</a>
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                        <ul class="nav nav-tabs profile-tabs nav-fill" id="myTab" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link text-reset {{ $position === 2 ? 'active' : '' }}"
                                    wire:click="setPosition(2)" id="profile-tab" data-toggle="tab" href="#profile"
                                    role="tab" aria-controls="profile"
                                    aria-selected="{{ $position === 2 ? true : false }}"><i
                                        class="feather icon-user mr-2"></i>Perfil</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- profile header end -->

    <!-- profile body start -->
    <div class="row">
        <div class="col-md-12">
            <div class="tab-content" id="myTabContent">


                <div class="tab-pane fade {{ $position === 2 ? 'show active' : '' }}" id="profile" role="tabpanel"
                    aria-labelledby="profile-tab">
                    <div class="card">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Información Personal</h5>
                            <button type="button" wire:click="loadData()"
                                class="btn btn-primary btn-sm rounded m-0 float-right" data-toggle="collapse"
                                data-target=".pro-det-edit" aria-expanded="false"
                                aria-controls="pro-det-edit-1 pro-det-edit-2">
                                <i class="feather icon-edit"></i>
                            </button>
                        </div>
                        <div class="card-body border-top pro-det-edit collapse {{ $profile_pos === 1 ? 'show' : '' }}"
                            id="pro-det-edit-1">
                            <form>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label font-weight-bolder">Nombre(s) y
                                        Apellido(s)</label>
                                    <div class="col-sm-9">
                                        {{ $user->name }}&nbsp;{{ $user->lastname }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label font-weight-bolder">Correo</label>
                                    <div class="col-sm-9">
                                        {{ $user->email }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label font-weight-bolder">Teléfono</label>
                                    <div class="col-sm-9">
                                        {{ $user->phone }}
                                    </div>
                                </div>


                            </form>
                        </div>
                        <div class="card-body border-top pro-det-edit collapse {{ $profile_pos === 2 ? 'show' : '' }}"
                            id="pro-det-edit-2">
                            <form>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label font-weight-bolder">Nombre(s)</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="name">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label font-weight-bolder">Apellido(s)</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="lastname">
                                        @error('lastname')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label font-weight-bolder">Email</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="email">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label font-weight-bolder">Teléfono</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="phone">
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label font-weight-bolder">Contraseña</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" wire:model="password">
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label font-weight-bolder">Confirmar
                                        Contraseña</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control"
                                            wire:model="password_confirmation">
                                        @error('password_confirmation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <button type="button" class="btn btn-outline-primary"
                                            wire:click="updateProfile()">Actualizar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
    <!-- profile body end -->

    @section('scripts')
        <script>
            function changeProfile() {
                $('#photo_profile').click();
            }
            $('#photo_profile').change(function() {
                var imgPath = this.value;
                var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg") {
                    readURL(this);
                    setTimeout(function() {
                        $('#loading').removeClass('spinner-grow');
                        $('#updatePhotoBtn').click();
                    }, 2000)
                } else {
                    notify('Elija imágenes (jpg, jpeg, png).', 'danger');
                }
            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    if (input.files[0].size > 2048576) {
                        notify('El tamaño permitido de las imágenes es de 2MB.', 'warning');
                    } else {
                        var reader = new FileReader();
                        reader.readAsDataURL(input.files[0]);
                        reader.onload = function(e) {
                            $('#preview').attr('src', e.target.result);
                            $('#loading').addClass('spinner-grow');
                        };
                    }
                }
            }

            function removeImage() {
                $('#preview').attr('src', '{{ asset('images/user.jpg') }}');
                $('#removePhotoBtn').click()
            }
        </script>
    @endsection
</div>
