@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Show Report</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h4><i>"{{ $report->title }}"</i></h4>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <a class='btn btn-primary' href="/expense_report/{{ $report->id }}/expense/create">Add expense</a>
            <a class='btn btn-secondary' href='/expense_report/{{ $report->id }}/sendEmail'>Send Email</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <table class="table">
                <tr>
                    <td><h5>Description</h5></td>
                    <td><h5>Created at</h5></td>
                    <td><h5>Amount</h5></td>
                    <td></td>
                    <td></td>
                </tr>
                @foreach ($report->expenses->reverse() as $expense)
                    <tr>
                        <td>{{ $expense['description'] }}</td>
                        <td>{{ $expense['created_at'] }}</td>
                        <td>${{ $expense['amount'] }}</td>
                        <td><a class="btn btn-secondary" href="/expense_report/{{ $report->id }}/expense/{{ $expense['id'] }}/edit">Edit</a></td>
                        <td><a class="btn btn-secondary" href="/expense_report/{{ $report->id }}/expense/{{ $expense['id'] }}/confirmDelete">Delete</a></td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td><h5>Total amount: {{$report->expenses->sum('amount')}}</h5></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <a href="/expense_report"><button class="btn btn-secondary">Back</button></a>
        </div>
    </div>
</div>
@endsection