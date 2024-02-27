@extends('layouts.app')

@section('content')
<div class="welcome-container">
    <h3>Tafel {{ $table->id }}</h3>
    <h2>Welkom bij ons restaurant!</h2>
</div>
@livewire('check-location', ['tableId' => $table->id])

@endsection