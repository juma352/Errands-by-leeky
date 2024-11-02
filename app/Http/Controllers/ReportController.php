<?php

// app/Http/Controllers/ReportController.php

namespace App\Http\Controllers;

use App\Models\ErrandApplication;
use  App\Models\errand;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function generate($id)
    {
        $application = ErrandApplication::findOrFail($id);

        // Generate the report (you can use a PDF library like DomPDF or simply return a view)
        return view('errands.report', compact('application'));
    }
    public function showErrandReport()
{
    // Assuming you have an Errand model and a way to retrieve pending and completed errands
    $pendingErrands = Errand::where('status', 'pending')->get();
    $completedErrands = Errand::where('status', 'completed')->get();

    return view('errands.report', compact('pendingErrands', 'completedErrands'));
}
}
