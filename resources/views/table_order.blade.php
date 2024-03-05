@extends('layouts.app')

@section('content')
<div class="welcome-container">
    <div class="table-details-container">
    <img class="plate" src="{{ asset('img/plate.svg') }}" alt="Logo" class="logo">
    <h3 class="table-number">{{ $table->id }}</h3>
    </div>
    <div class="menu-navigation-container">
        <a href="#Voorgerechten">Voorgerechten</a>
        <a href="#Hoofdgerechten">Hoofdgerechten</a>
        <a href="#Desserts">Desserts</a>
        <a href="#Dranken">Dranken</a>

    </div>
</div>
@livewire('check-location', ['tableId' => $table->id])

@endsection