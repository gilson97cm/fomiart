@extends('admin.layout')
@section('title', 'Productos')
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-page-header title="Productos" position="Productos"></x-page-header>
            @livewire('admin.products')
        </div>
    </div>
@endsection
