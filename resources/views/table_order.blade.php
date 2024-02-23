@extends('layouts.app')

@section('content')
<h3>Tafel {{ $table->id }}</h3>
@livewire('check-location')
@endsection