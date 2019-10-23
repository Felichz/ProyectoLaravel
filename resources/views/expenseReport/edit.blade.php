@extends('layouts.base')

@section('content')

<div class="row">
    <div class="col">
        <h1>Edit Report</h1>
    </div>
</div>
<div class="row">
    <div class="col">
        <a class='btn btn-secondary' href="/expense_report">Back</a>
    </div>
</div>
<br>
<div class="row">
    <div class="col">
        @if ( $errors->any() )
        <div class="alert alert-danger">
            <ul style="margin: 0;">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="/expense_report/{{ $report->id }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title"><h5>Title:</h5></label>
                <input type="text" class="form-control" name="title" id="title" placeholder="{{ $report->title }}" value="{{ old('title') }}">
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection