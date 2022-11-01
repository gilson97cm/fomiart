@extends('admin.layout')
@section('title', 'Páginas')
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-page-header title="Páginas" position="Misión y Visión"></x-page-header>
            @livewire('admin.mission-vision')
        </div>
    </div>
@endsection
