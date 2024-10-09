<?php

namespace App\Http\Controllers;

use App\Models\ErrandApplication;
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
     * Show the form for creating a new resource.
     */
   
    public function destroy(ErrandApplication $myErrandApplication)
    {
        $myErrandApplication->delete();
        return redirect()->back()->with(
            'success',
            'Errand Application deleted successfully'
        );
        
    }
}
