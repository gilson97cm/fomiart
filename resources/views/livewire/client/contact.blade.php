<div>
    <!-- Contact Us-->
    <section class="section novi-background section-98 section-lg-110 text-xl-left" id="form-child-care">
        <div class="container">
            <div class="row justify-content-sm-center justify-content-sm-center">
                <div class="col-xl-12">
                    <h1 class="text-uppercase font-weight-bold text-primary">Ponerse en contacto</h1>
                </div>
                <div class="col-xl-4">
                    <address class="contact-info offset-top-50">
                        <p class="h6 text-uppercase font-weight-bold text-safety-orange font-default offset-top-20">
                            Oficina FomiArt</p>
                        <p>{{ $pagesData->address }}</p>
                        <dl>
                            <dt>Teléfono:</dt>
                            <dd><a href="tel:{{ $info->phone }}">{{ $info->phone }}</a></dd>
                        </dl>
                        <dl>
                            <dt>Celular:</dt>
                            <dd><a href="tel:{{ $info->cellphone }}">{{ $info->cellphone }}</a></dd>
                        </dl>
                        <dl>
                            <dt>Correo:</dt>
                            <dd><a href="mailto:{{ $info->email }}">{{ $info->email }}</a></dd>
                        </dl>
                    </address>
                    <address class="contact-info offset-top-50">
                        <p class="h6 text-uppercase font-weight-bold text-safety-orange font-default">Horarios de
                            apertura</p>
                        <dl class="offset-top-20">
                            <dt class="font-weight-bold">Mañanas:</dt>
                            <dd>8 am – 12 pm</dd>
                        </dl>
                        <dl>
                            <dt class="font-weight-bold">Tardes:</dt>
                            <dd>1 pm – 5 pm</dd>
                        </dl>
                        <dl>
                            <dt class="font-weight-bold">Día completo:</dt>
                            <dd>8 am – 5 pm</dd>
                        </dl>
                    </address>
                </div>
                <div class="col-md-8 offset-top-66 offset-xl-top-0">
                    <!-- RD Mailform-->
                    <div class="row">
                        <div class=" mb-1 col-xl-6">
                            <div class="form-group">
                                <label wire:ignore class="form-label form-label-outside"
                                    for="contact-us-name">Nombre*:</label>
                                <input class="form-control" id="contact-us-name" type="text" name="name"
                                    wire:model="name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class=" mb-1 col-xl-6 offset-top-20 offset-xl-top-0">
                            <div class="form-group">
                                <label wire:ignore class="form-label form-label-outside"
                                    for="contact-us-lastname">Apellido*:</label>
                                <input class="form-control" id="contact-us-lastname" type="text" name="lastname"
                                    wire:model="lastname">
                                @error('lastname')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class=" mb-1 col-xl-6 offset-top-20 offset-xl-top-0">
                            <div class="form-group">
                                <label wire:ignore class="form-label form-label-outside"
                                    for="contact-us-codeProduct">Producto(s)*:</label>
                                <input class="form-control" id="contact-us-codeProduct" type="hidden"
                                    name="codeProduct" wire:model="codeProduct">
                                <select id="product" wire:model="products_selected" class="form-control select2"
                                    multiple data-placeholder="{{ __('Seleccione...') }}">
                                    @foreach ($products as $product)
                                        <option value="{{ $product->code }}">{{ $product->code }} -
                                            {{ $product->name }}</option>
                                    @endforeach
                                </select>
                                <small class="text-muted">Escriba el/los código(s). Ejemplo: PRDO1, PROD2,
                                    etc</small><br>
                                @error('codeProduct')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class=" mb-1 col-xl-6 offset-top-20 offset-xl-top-0">
                            <div class="form-group">
                                <label wire:ignore class="form-label form-label-outside"
                                    for="contact-us-email">Correo*:</label>
                                <input class="form-control" id="contact-us-email" type="email" name="email"
                                    wire:model="email">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class=" mb-1 col-xl-6 offset-top-20 offset-xl-top-0">
                            <div class="form-group">
                                <label wire:ignore class="form-label form-label-outside"
                                    for="contact-us-phone">Teléfono*:</label>
                                <input class="form-control" id="contact-us-phone" type="text" name="phone"
                                    wire:model="phone">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-12 offset-top-20">
                            <div class="form-group">
                                <label wire:ignore class="form-label form-label-outside"
                                    for="contact-us-message">Mensaje*:</label>
                                <textarea class="form-control" id="contact-us-message" name="message" wire:model="message"></textarea>
                                @error('message')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="group-sm text-center text-xl-left offset-top-30">
                        <button class="btn btn-primary" type="button" wire:click="sendMessage()">Enviar</button>
                        <button class="btn btn-default" type="button" wire:click="resetInputFields()">Cancelar</button>
                    </div>

                </div>
            </div>
        </div>
    </section>

    @section('scripts')
        <script>
            $('#product').each(function() {
                $(this).select2({
                    placeholder: "{{ __('Seleccione...') }}",
                    dropdownParent: $(this).parent()
                });
            });
            $('#product').on('change', function(e) {
                var data = $(this).select2("val");
                // console.log(data)
                @this.set('products_selected', data);
            });
            document.addEventListener("livewire:load", () => {
                Livewire.hook('message.processed', (message, component) => {
                    $('#product').each(function() {
                        $(this).select2({
                            dropdownParent: $(this).parent()
                        });
                    })
                });
            });

            window.livewire.on('resetProducts', () => {
                $('#product').val(null).trigger('change');
            });

            window.addEventListener('load', () => {
                $('#product').val(null).trigger('change');
            })
        </script>
    @endsection
</div>
