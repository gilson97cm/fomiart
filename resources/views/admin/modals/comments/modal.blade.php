<div wire:ignore.self id="commentModal" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="commentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="commentModalLabel">Comentario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                @if($commentId != null)
                    <div class="card">
                        <div class="card-body">
                            <div class="d-inline-block align-middle">
                                <h5 class="text-center m-b-10">{{isset($comment->commentable->name) ? $comment->commentable->name : 'N/A'}}</h5>
                                <p class="text-center">{{\Carbon\Carbon::parse($comment->created_at)->format('Y, M d H:i')}}</p>
                                <div class="d-inline-block">
                                 <span class="m-b-0">
                                                <span><i
                                                        class="feather {{$comment->rating >= 1 ?'icon-star-on': 'icon-star'}} text-warning"></i></span>
                                                <span><i
                                                        class="feather {{$comment->rating >= 2 ?'icon-star-on': 'icon-star'}} text-warning"></i></span>
                                                <span><i
                                                        class="feather {{$comment->rating >= 3 ?'icon-star-on': 'icon-star'}} text-warning"></i></span>
                                                <span><i
                                                        class="feather {{$comment->rating >= 4 ?'icon-star-on': 'icon-star'}} text-warning"></i></span>
                                                <span><i
                                                        class="feather {{$comment->rating >= 5 ?'icon-star-on': 'icon-star'}} text-warning"></i></span>
                                            </span>
                                    <h6 class="m-b-0">{{$comment->name}}</h6>
                                    <p class="m-b-0">{{$comment->email}}</p>
                                    <hr>
                                    <p class="text-justify m-b-0">{{$comment->message}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <button wire:click.prevent="{{ $comment->status == 1 ? 'deactivate('.$comment->id.')' : 'activate('.$comment->id.')'  }}"
                                        class="btn btn-sm btn-{{$comment->status == 1 ? 'danger': 'success'}}">{{$comment->status == 1 ? 'Ocultar' : 'Mostrar'}}
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
