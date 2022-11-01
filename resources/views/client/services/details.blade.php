@extends('client.layout')
@section('title','FomiArt - Productos')
@section('content')

    @livewire('client.service-details',['id' => $id])
@endsection
