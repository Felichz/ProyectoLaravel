@extends('layouts.base')

@section('content')

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
                    <td>Title</td>
                    <td></td>
                    <td></td>
                </tr>
                @foreach ($expenseReports as $expenseReport)
                <tr>
                    <td>{{ $expenseReport->title }}</td>
                    <td><a class="btn btn-secondary" href="/expense_report/{{ $expenseReport->id }}/edit">Edit</a></td>
                    <td><a class="btn btn-secondary" href="/expense_report/{{ $expenseReport->id }}/confirmDelete">Delete</a></td>
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