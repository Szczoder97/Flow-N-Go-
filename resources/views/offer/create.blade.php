@extends('layouts.master') {{-- używa naszego master layoutu --}}

@section ('title', 'Create offer') {{-- tytuł naszej sekcji --}}

@section('content')

<form method="POST" style="margin: 30px">
    CREATE NEW OFFER!
    <br />
    @csrf
    {{-- obrazki, obrazek główny --}}
    <div style="display:inline">Name:</div>
    <input type="text" name="name" style="margin: 10px">
    <br />
    {{-- Lokalizacja + mapka google --}}
    <div style="display:inline">Description:</div>
    <textarea name="description" style="margin: 10px; float: left"></textarea>
    <br />
    <input type="submit" value="Create!" style="margin: 10px">
    {{-- Cena --}}
    {{-- dodatkowe uwagi --}}
    {{-- kalendarz z dostępnością --}}
</form>
@endsection