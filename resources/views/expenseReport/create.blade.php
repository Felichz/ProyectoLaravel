@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>New Report</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="margin: 0;">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="/expense_report" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Title:</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Type a title" value='{{ old('title') }}'>
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
                <a class='btn btn-secondary' href="/expense_report">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection