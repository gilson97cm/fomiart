@extends('admin.layout')
@section('title', 'Mensajes')
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-page-header title="Mensajes" position="Mensajes"></x-page-header>
            @livewire('admin.messages')
        </div>
    </div>
@endsection
