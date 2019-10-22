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
                    <td>Column</td>
                    <td>Column</td>
                    <td>Column</td>
                    <td>Column</td>
                </tr>
                @foreach ($expenseReports as $expenseReport)
                <tr>
                    <td>{{ $expenseReport->title }}</td>
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