@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Expense Reports</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class='btn btn-primary' href="/expense_report/create">Create new report</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <table class='table'>
                    <tr>
                        <td><h5>Title</h5></td>
                        <td><h5>Total Amount</h5></td>
                        <td></td>
                    </tr>
                    @foreach ($reports as $report)
                    <tr>
                        <td><a href="/expense_report/{{ $report->id }}">{{ $report->title }}</a></td>
                        <td>{{ $report->expenses->sum('amount') }}</td>
                        <td>
                            <a class="btn btn-secondary" href="/expense_report/{{ $report->id }}/sendEmail">Send Email</a>
                            <a class="btn btn-secondary" href="/expense_report/{{ $report->id }}/edit">Edit</a>
                            <a class="btn btn-secondary" href="/expense_report/{{ $report->id }}/confirmDelete">Delete</a>
                        </td>
                    </tr>
                    @endforeach
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col">
                <a href="/" class="btn btn-secondary">Home</a>
        </div>
    </div>
    @endsection
</div>