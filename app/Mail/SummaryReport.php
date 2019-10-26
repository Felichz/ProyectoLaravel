<?php

namespace App\Mail;

use App\ExpenseReport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SummaryReport extends Mailable
{
    use Queueable, SerializesModels;

    public $report;

    /**
     * Create a new message instance.
     *
     * @return ExpenseReport $expenseReport
     */
    public function __construct(ExpenseReport $expenseReport)
    {
        $this->report = $expenseReport;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // "Any public property defined on your mailable class will automatically 
        //  be made available to the view." ($this->report as 'report')
        return $this->from('expense-reports@myapp.com')
                    ->subject('Summary Report | MyApp')
                    ->view('email.expenseReport');
    }
}