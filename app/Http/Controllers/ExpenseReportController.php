<?php

namespace App\Http\Controllers;

use App\Expense;
use App\ExpenseReport;
use \App\Mail\SummaryReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ExpenseReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('expenseReport.index', [
            'reports' => ExpenseReport::orderBy('updated_at', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expenseReport.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valData = $request->validate([
            'title' => 'required|min:3'
        ]);

        $reports = new ExpenseReport;
        $reports->title = $valData['title'];
        $reports->save();

        return redirect('/expense_report');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // MODEL BINDING (Se instancia el modelo automáticamente según el id de la ruta)
    public function show(ExpenseReport $expenseReport)
    {
        return view('expenseReport.show', [
            'report' => $expenseReport
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $report = ExpenseReport::findOrFail($id);
        return view('expenseReport.edit', [
            'report' => $report
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $valData = $request->validate([
            'title' => 'required|min:3'
        ]);

        $report = ExpenseReport::findOrFail($id);
        $report->title = $valData['title'];
        $report->save();

        return redirect('/expense_report');
    }

    public function confirmDelete($id)
    {
        return view('expenseReport.confirmDelete', [
            'report' => ExpenseReport::findOrFail($id)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = ExpenseReport::findOrFail($id);
        $report->delete();

        $expenses = new Expense();
        $expenses->where('expense_report_id', $id)->delete();

        return redirect('/expense_report');
    }

    public function formSendEmail(Request $request, ExpenseReport $expenseReport)
    {
        return view('expenseReport.sendEmail', [
            'report' => $expenseReport,
            'sent' => $request->get('sent')
        ]);
    }

    public function sendEmail(ExpenseReport $expenseReport, Request $request)
    {
        $valData = $request->validate([
            'email' => 'required|email'
        ]);

        Mail::to( $valData['email'] )->send( new SummaryReport($expenseReport) );

        return redirect("/expense_report/{$expenseReport->id}/sendEmail?sent=true");
    }
}
