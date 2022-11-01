@extends('admin.layout')
@section('title', 'Banners')
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-page-header title="Contenido" position="Banners"></x-page-header>
            @livewire('admin.banners')
        </div>
    </div>
@endsection
