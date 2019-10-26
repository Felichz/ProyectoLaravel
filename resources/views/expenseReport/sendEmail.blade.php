@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Send Report</h1>
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
            @if ( $errors->any() )
            <div class="alert alert-danger">
                <ul style="margin: 0;">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if ( $sent == true )
            <div class="alert alert-success">
                    <ul style="margin: 0;">
                        Email sent successfully :)
                    </ul>
                </div>
            @endif
            <form action="/expense_report/{{ $report->id }}/sendEmail" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email"><h5>Email:</h5></label>
                    <input type="text" class="form-control" name="email" id="email" placeholder='Type email' value="{{ old('email') }}">
                </div>
                <button class="btn btn-primary" type="submit">Send Email</button>
                <a class='btn btn-secondary' href="/expense_report/">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection