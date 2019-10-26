@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Edit Expense</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
        <h4><i>"{{ $report->title }}" > "{{ $expense->description }}"</i></h4>
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
            <form action="/expense_report/{{ $report->id }}/expense/{{ $expense->id }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="description">Description:</label>
                    @if( $errors->any() )
                        <input type="text" class="form-control" name="description" id="description" placeholder='Type any description' value='{{ old('description') }}'>
                    @else
                        <input type="text" class="form-control" name="description" id="description" placeholder='Type any description' value='{{ $expense->description }}'>
                    @endif
                </div>
                <div class="form-group">
                    <label for="amount">Amount:</label>
                    @if( $errors->any() )
                        <input step=".01" type="number" class="form-control" name="amount" id="amount" value='{{ old('amount') }}'>
                    @else
                        <input step=".01" type="number" class="form-control" name="amount" id="amount" value='{{ $expense->amount }}'>
                    @endif
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
                <a class='btn btn-secondary' href="/expense_report/{{ $report->id }}">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection