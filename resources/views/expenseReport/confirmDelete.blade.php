@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Confirm delete</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h4 style="display: inline-block;"><i>"{{ $report->title }}"</i></h4>
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
</div>
@endsection