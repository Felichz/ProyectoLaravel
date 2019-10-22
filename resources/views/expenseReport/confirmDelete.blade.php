@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col">
        <h1>Confirm delete</h1>
    </div>
</div>
<div class="row">
    <div class="col">
        <h3 style="display: inline-block;">Report: </h3> <i>"{{ $report->title }}"</i>
    </div>
</div>
<br>
<div class="row">
    <div class="col">
        <form style='display: inline-block;' action="/expense_report/{{ $report->id }}" method="POST">
            @csrf
            @method('delete')
            <input class='btn btn-primary' type="submit" value="Confirm">
        </form>

        <a href="/expense_report"><button class="btn btn-secondary">Back</button></a>
    </div>
</div>
@endsection