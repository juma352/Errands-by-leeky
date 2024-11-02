<?php

namespace App\Http\Controllers;

use App\Models\ErrandApplication;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Log;
use App\Notifications\ErrandCompletedNotification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MyErrandApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'my_errand_application.index',
            [
               'applications'=> auth()->user()->errandApplication()
               ->with(['errand' =>fn($query)=>$query->withCount('errandapplication')
               ->withAvg('ErrandApplication', 'expected_salary'),'errand.customer'])

               ->latest()->get()
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ErrandApplication  $application
     * @return \Illuminate\Http\Response
     */
    public function show(ErrandApplication $application)
    {
        // Your logic to display the status of the errand application goes here
        return view('my_errand_application.status', compact('application'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ErrandApplication  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ErrandApplication $application)
    {
        $application->update($request->validate([
            'status' => 'required|in:pending,complete',
        ]));

        return redirect()->back()->with('success', 'Errand application status updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ErrandApplication  $myErrandApplication
     * @return \Illuminate\Http\Response
     */
    public function destroy(ErrandApplication $myErrandApplication)
    {
        $myErrandApplication->delete();
        return redirect()->back()->with(
            'success',
            'Errand Application deleted successfully'
        );
    }
    public function status(ErrandApplication $application)
    {
        // Logic to get the status of the application
        return view('my_errand_application.status', compact('application'));
    }
    public function updateStatus(Request $request, ErrandApplication $application)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);
    
        $application->update(['status' => $request->status]);
    
        if ($request->status === 'approved') {
            return redirect()->route('my-errand-applications.report')->with('success', 'Application approved and redirected to reports.');
        }
    
        return redirect()->route('my-errand-applications.index')->with('success', 'Status updated successfully.');
    
        // Redirect back with a success message
}
}