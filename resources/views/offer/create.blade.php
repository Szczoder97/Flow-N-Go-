@extends('layouts.master') {{-- używa naszego master layoutu --}}

@section ('title', 'Create offer') {{-- tytuł naszej sekcji --}}

@section('content')
    <form method="POST">
        @csrf
        Name:
        <input type="text" name="name">
        Description:
        <textarea class="form-control input-lg" type="text" name="description"></textarea>
        <input type="submit" value="Create!">
    </form>
@endsection
