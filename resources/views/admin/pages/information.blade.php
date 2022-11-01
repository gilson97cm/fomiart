@extends('admin.layout')
@section('title', 'Páginas')
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-page-header title="Páginas" position="Información"></x-page-header>
            @livewire('admin.information')
        </div>
    </div>
@endsection
