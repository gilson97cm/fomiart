@extends('admin.layout')
@section('title', 'Comentarios')
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-page-header title="Comentarios" position="Comentarios"></x-page-header>
            @livewire('admin.comments')
        </div>
    </div>
@endsection
