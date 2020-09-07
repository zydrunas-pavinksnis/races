@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Change bidder information</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('bidder.update', $bidder->id) }}">
                        @csrf @method("PUT")
                        <div class="form-group">
                            <label for="">Name: </label>
                            <input type="text" name="name" class="form-control" value="{{ $bidder->name }}">
                        </div>
                        <div class="form-group">
                            <label for="">Surname: </label>
                            <input type="text" name="surname" class="form-control" value="{{ $bidder->surname }}">
                        </div>

                        <div class="form-group">
                            <label for="">Bet sum ( € ): </label>
                            <input type="number" name="bet" class="form-control" value="{{ $bidder->bet }}">
                        </div>
                        <div class="form-group">
                            <label>Betting horse: </label>
                            <select name="horse_id" id="" class="form-control">
                            @foreach ($horses as $horse)
                            <option value="{{ $horse->id }}" @if($horse->id == $bidder->horse_id) selected="selected" @endif>{{ $horse->name }}</option>
                            @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Change</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection