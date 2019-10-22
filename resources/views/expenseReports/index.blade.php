@extends('layouts.base')

@section('content')
<div class="title m-b-md">
    <h1>Expense Report</h1>
</div>

<table class='table'>
    <div class="row">
        <tr>
            <td>T&iacute;tulo</td>
            <td>Columna</td>
            <td>Columna</td>
            <td>Columna</td>
            <td>Columna</td>
        </tr>
        @foreach ($expenseReports as $expenseReport)
        <tr>
            <td>{{ $expenseReport->title }}</td>
        </tr>
        @endforeach
    </div>
</table>

<br/>
<b>
    <a href="/" style="text-decoration:none;">Volver</a>
</b>
@endsection