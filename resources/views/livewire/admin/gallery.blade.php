<div class="row">
    <!-- subscribe start -->
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link {{$position === 1 ? 'active':''}} " id="v-pills-area-tab" wire:click="setPosition(1)" data-toggle="pill" href="#v-pills-area" role="tab" aria-controls="v-pills-area" aria-selected="{{$position === 1 ?true:false}}">Productos</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-9">

        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade {{$position === 1 ? 'show active':''}}" id="v-pills-area" role="tabpanel" aria-labelledby="v-pills-area-tab">

                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <select id="estate" wire:model="product_id"
                                    class="form-control text-gray-500 text-sm my-border">
                                <option value="">Seleccionar Producto</option>
                                @foreach($products as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="container {{$product_id == null ? 'd-none' : ''}}">
                    <div class="row">

                        <div class="col-lg-4 col-sm-6">
                            <div class="card user-card user-card-3 support-bar1">
                                <div class="card-body ">
                                    <div class="thumbnail">
                                        <div class="thumb">
                                            <img src="{{asset('images/addPicture.jpg')}}" alt="" class="img-fluid img-thumbnail">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body hover-data text-white">
                                    <div class="">
                                        <input  wire:model="url_imageProduct" type="file" class="d-none" id="inputPicture" accept="image/x-png,image/jpg,image/jpeg">
                                        <input id="btnUpload" type="button" class="d-none" wire:click="storeProduct()">
                                        <button id="btnAddPicture" type="button" class="btn waves-effect waves-light btn-success"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if($pictures != null)
                            @foreach($pictures as $data)
                                <div class="col-lg-4 col-sm-6">
                                    <div class="card user-card user-card-3 support-bar1">
                                        <div class="card-body ">
                                            <div class="thumbnail">
                                                <div class="thumb">
                                                    <img src="{{asset($data->urlImage)}}" alt="" class="img-fluid img-thumbnail">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-body hover-data text-white">
                                            <div class="">
                                                <a href="{{asset($data->urlImage)}}" data-lightbox="1" data-title="My caption 1" class="btn waves-effect waves-light btn-warning"><i class="fa fa-eye"></i></a>
                                                <button type="button" wire:click="delete({{$data->id}})" class="btn waves-effect waves-light btn-danger"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif


                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- subscribe end -->
    @section('scripts')
        <script>
            $('#btnAddPicture').on('click',function (){
                $('#inputPicture').click();
            });

            $('#inputPicture').change(()=>{
                setTimeout(() => {
                    $('#btnUpload').click();
                }, 2000)
            });
        </script>
    @endsection
</div>
