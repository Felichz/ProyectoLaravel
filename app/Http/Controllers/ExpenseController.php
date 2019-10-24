<?php

namespace App\Http\Controllers;

use App\Expense;
use App\ExpenseReport;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ExpenseReport $expenseReport)
    {
        return view('expense.create', [
            'report' => $expenseReport
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ExpenseReport $expenseReport)
    {
        $valData = $request->validate([
            // The third validation of description means that must be unique in the respective expense report
            'description' => "required|min:3|unique:expenses,description,NULL,id,expense_report_id,{$expenseReport->id}",
            'amount' => 'required|numeric|between:0,999999.99'
        ]);

        $expense = new Expense;
        $expense->description = $valData['description'];
        $expense->amount = $valData['amount'];
        $expense->expense_report_id = $expenseReport->id;
        $expense->save();

        return redirect("/expense_report/{$expenseReport->id}");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpenseReport $expenseReport, Expense $expense)
    {
        return view('expense.edit', [
            'report' => $expenseReport,
            'expense' => $expense
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExpenseReport $expenseReport, Expense $expense)
    {
        $valData = $request->validate([
            // The third validation of description means that must be unique in the respective expense report
            'description' => "required|min:3|unique:expenses,description,{$expense->id},id,expense_report_id,{$expenseReport->id}",
            'amount' => 'required|numeric|between:0,999999.99'
        ]);

        $expense->description = $valData['description'];
        $expense->amount = $valData['amount'];
        $expense->expense_report_id = $expenseReport->id;
        $expense->save();

        return redirect("/expense_report/{$expenseReport->id}");
    }

    /**
     * Confirm before remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirmDelete(ExpenseReport $expenseReport, Expense $expense)
    {
        return view('expense.confirmDelete', [
            'report' => $expenseReport,
            'expense' => $expense
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpenseReport $expenseReport, Expense $expense)
    {
        $expense->delete();
        return redirect("/expense_report/{$expenseReport->id}");
    }
}
