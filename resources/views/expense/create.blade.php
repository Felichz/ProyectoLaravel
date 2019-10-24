@extends('layouts.base')

@section('content')

<div class="row">
    <div class="col">
        <h1>New Expense</h1>
    </div>
</div>
<div class="row">
    <div class="col">
        <h4><i>For: "{{ $report->title }}"</i></h4>
    </div>
</div>
<br>
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
    <form action="/expense_report/{{ $report->id }}/expense" method="POST">
            @csrf
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" name="description" id="description" placeholder="Type a description" value='{{ old('description') }}'>
            </div>
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input step=".01" type="number" class="form-control" name="amount" id="amount" value='{{ old('amount') }}'>
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
            <a class='btn btn-secondary' href="/expense_report/{{ $report->id }}">Back</a>
        </form>
    </div>
</div>
@endsection