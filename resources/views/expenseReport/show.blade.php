@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col">
        <h1>Show Report</h1>
    </div>
</div>
<div class="row">
    <div class="col">
        <i>"{{ $report->title }}"</i>
    </div>
</div>
<br>
<div class="row">
    <div class="col">
        <a href="/expense_report"><button class="btn btn-secondary">Back</button></a>
    </div>
</div>
@endsection