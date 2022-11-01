<div class="row p-l-20 p-r-20">
    <div class="col-md-6 form-group">
        <small class="mr-3 text-primary">Categoría<span class="text-danger">*</span></small>
        <select class="form-control" wire:model="categoryId">
            <option value="">Seleccione</option>
            @foreach ($categories as $data)
                <option value="{{ $data->id }}">{{$data->name}}</option>
            @endforeach
        </select>
        @error('categoryId')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small class="mr-3 text-primary">Nombre<span class="text-danger">*</span></small>
        <input type="text" class="form-control" placeholder="" wire:model="name"/>
        @error('name')<li class="text-danger">{{ $message }}</li>@enderror
    </div>
    <div class="col-md-6 form-group">
        <small class="mr-3 text-primary">Descripción Corta<span class="text-danger">*</span></small>
        <textarea wire:model="shortDescription" class="form-control" cols="30" rows="4"></textarea>
        @error('shortDescription')<li class="text-danger">{{ $message }}</li>@enderror
    </div>
    <div class="col-md-6 form-group">
        <small class="mr-3 text-primary">Descripción Larga<span class="text-danger">*</span></small>
        <textarea wire:model="longDescription" class="form-control" cols="30" rows="4"></textarea>
        @error('longDescription')<li class="text-danger">{{ $message }}</li>@enderror
    </div>
    <div class="col-md-6 form-group">
        <small class="mr-3 text-primary">Descuento</small>
        <input type="text" class="form-control" placeholder="" wire:model="discountRate"/>
        @error('discountRate')<li class="text-danger">{{ $message }}</li>@enderror
    </div>
    <div class="col-md-6 form-group">
        <small class="mr-3 text-primary">Precio<span class="text-danger">*</span></small>
        <input type="text" class="form-control" placeholder="" wire:model="price"/>
        @error('price')<li class="text-danger">{{ $message }}</li>@enderror
    </div>
    <div class="col-md-6 form-group">
        <small class="mr-3 text-primary">Imagen </small>
        <div class="input-group mt-1">
            <div class="input-group-prepend">
                @if($urlImage == null)
                    <img src="{{asset('images/placeholder.jpg')}}" alt="area image"
                         class="img-radius align-top m-r-15"
                         style="width:45px; height:45px;">
                @else
                    @if($temporaryUrl)
                        <img src="{{$urlImage->temporaryUrl()}}" alt="area image"
                             class="img-radius align-top m-r-15"
                             style="width:45px; height: 45px;">
                    @else
                        <img src="{{asset($urlImage)}}" alt="area image"
                             class="img-radius align-top m-r-15"
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
        @error('urlImage')<li class="text-danger"> {{$message }}</li>@enderror
    </div>

    <div class="col-md-6 form-group">
        <small class="mr-3 text-primary">Unidad</small>
        <input type="text" class="form-control" placeholder="c/u" wire:model="unit"/>
        @error('unit')<li class="text-danger">{{ $message }}</li>@enderror
    </div>

    <div class="col-md-6 form-group">
        <small class="mr-3 text-primary">Código<span class="text-danger">*</span></small>
        <input type="text" class="form-control" placeholder="" wire:model="code"/>
        @error('code')<li class="text-danger">{{ $message }}</li>@enderror
    </div>

    <div class="col-md-6 form-group">
        <small class="mr-3 text-primary">Estado</small>
        <div class="switch switch-info m-r-10">
            <input wire:model="status" type="checkbox" id="switch-i-1" checked>
            <label for="switch-i-1" class="cr"></label>
        </div>
    </div>
</div>
