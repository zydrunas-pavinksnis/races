@extends('layouts.app')
@section('content')
<div class="card-body">
    <form action="{{ route('bidder.index') }}" method="POST">
        @csrf
        <select name="horse_id" id="" class="form-control">
        <option value="" selected disabled>Filter by horse: </option>
        @foreach ($horses as $horse)
        <option value="{{ $horse->id }}">{{ $horse->name }}</option>
        @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<div class="card-body">
    <table class="table">
        <tr>
            <th>Name</th>
            <th>Surname</th>
            <th>Bet sum ( € )</th>
            <th>Betting horse</th>
            <th>Actions</th>
        </tr>
        @foreach ($bidders as $bidder)
        <tr>
            <td>{{ $bidder->name }}</td>
            <td>{{ $bidder->surname }}</td>
            <td>{{ $bidder->bet }}</td>
            <td>{{ $bidder->horse->name }}</td>
            <td>
                <form action={{ route('bidder.destroy', $bidder->id) }} method="POST">
                <a class="btn btn-success" href={{ route('bidder.edit', $bidder->id) }}>Edit</a>
                @csrf @method('delete')
                <input type="submit" class="btn btn-danger" value="Delete"/>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('bidder.create') }}" class="btn btn-success">Add bidder</a>
    </div>
</div>
@endsection