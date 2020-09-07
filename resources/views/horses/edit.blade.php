@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit horse information</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('horse.update', $horse->id) }}">
                        @csrf @method("PUT")
                        <div class="form-group">
                            <label for="">Horse name</label>
                            <input type="text" name="name" class="form-control" value="{{ $horse->name }}">
                        </div>
                        <div class="form-group">
                            <label for="">Quantity of races:</label>
                            <input type="text" name="runs" class="form-control" value="{{ $horse->runs }}">
                        </div>
                        <div class="form-group">
                            <label for="">Won races:</label>
                            <input type="text" name="wins" class="form-control" value="{{ $horse->wins }}">
                        </div>
                        <div class="form-group">
                            <label for="">About</label>
                            <textarea id="mce" type="text" name="about" rows=5 cols=100 class="form-control">{{ $horse->about }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Change</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection