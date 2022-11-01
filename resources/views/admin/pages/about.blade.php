@extends('admin.layout')
@section('title', 'Páginas')
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-page-header title="Páginas" position="Acerca de Nosotros"></x-page-header>
            @livewire('admin.about')
        </div>
    </div>
@endsection
