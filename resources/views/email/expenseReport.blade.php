<div class="container">
    <div class="row">
            <div class="col">
                <h1 style="display: inline-block;">Expense Report:</h1>
                <h3 style="display: inline-block;"><i>"{{ $report->title }}"</i></h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table">
                    <tr>
                        <td><h3>Description</h3></td>
                        <td><h3>Created at</h3></td>
                        <td><h3>Amount</h3></td>
                    </tr>
                    @foreach ($report->expenses->reverse() as $expense)
                        <tr>
                            <td>{{ $expense['description'] }}</td>
                            <td>{{ $expense['created_at'] }}</td>
                            <td>${{ $expense['amount'] }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td><h3>Total amount: {{$report->expenses->sum('amount')}}</h3></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
</div>

<style>

.container{
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}

table tr td {
    text-align: center;
}
</style>