<div wire:ignore.self id="messageModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="messageModalLabel">Mensaje</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                @if ($messageId != null)
                    <div class="card">
                        <div class="card-body">
                            <div class="d-inline-block align-middle">
                                <h5 class="text-center m-b-10">{{ $message->name }} {{ $message->lastname }}</h5>
                                <p class="text-center"><span class="text-muted">Correo:</span> {{ $message->email }}</p>
                                <p class="text-center"><span class="text-muted">Teléfono:</span> {{ $message->phone }}
                                </p>
                                <p class="text-center"><span class="text-muted">Recibido:</span>
                                    {{ \Carbon\Carbon::parse($message->created_at)->format('Y, M d H:i') }}</p>
                                <hr>
                                <p class="text-center"><span class="text-muted">Código(s) de
                                        Producto(s):</span><br>{{ $message->codeProduct }}</p>
                                <hr>
                                <div class="d-inline-block">
                                    <span class="text-muted">Mensaje:</span><br>
                                    <p class="text-justify m-b-0">{{ $message->message }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <button wire:click.prevent="delete({{ $message->id }})" class="btn btn-sm btn-danger"
                                    data-dismiss="modal">Eliminar
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
