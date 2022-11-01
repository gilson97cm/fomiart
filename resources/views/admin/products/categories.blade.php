@extends('admin.layout')
@section('title', 'Categorías')
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-page-header title="Productos" position="Categorías"></x-page-header>
            @livewire('admin.product-categories')
        </div>
    </div>
@endsection
