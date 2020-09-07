@extends('layouts.app')
@section('content')
<div class="card-body">
<table class="table">
<tr>
<th>Horse name</th>
<th>Participated</th>
<th>Won</th>
<th>About</th>
<th>Actions</th>
</tr>
@foreach ($horses as $horse)
<tr>
<td>{{ $horse->name }}</td>
<td>{{ $horse->runs }}</td>
<td>{{ $horse->wins }}</td>
<td>{!! $horse->about !!}</td>
<td>
    <form action={{ route('horse.destroy', $horse->id) }} method="POST">
    <a class="btn btn-success" href={{ route('horse.edit', $horse->id) }}>Edit</a>
    @csrf @method('delete')
    <input type="submit" class="btn btn-danger" value="Delete"/>
    </form>
</td>
</tr>
@endforeach
</table>
<div>
<a href="{{ route('horse.create') }}" class="btn btn-success">Add horse</a>
</div>
</div>
@endsection