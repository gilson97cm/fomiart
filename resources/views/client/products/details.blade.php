@extends('client.layout')
@section('title','FomiArt - Productos')
@section('content')

    @livewire('client.product-details',['id' => $id])
@endsection
