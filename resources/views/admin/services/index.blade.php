@extends('admin.layout')
@section('title', 'Servicios')
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-page-header title="Services" position="Services"></x-page-header>
            @livewire('admin.services')
        </div>
    </div>
@endsection
