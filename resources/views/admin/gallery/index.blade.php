@extends('admin.layout')
@section('title','Galería')
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-page-header title="Galería" position="Galería"></x-page-header>

            @livewire('admin.gallery')

        </div>
    </div>
@endsection
