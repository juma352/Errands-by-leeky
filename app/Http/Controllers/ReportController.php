<?php

// app/Http/Controllers/ReportController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Errand;
use App\Models\User;

class ReportController extends Controller
{
    public function index()
    {
        return view('reports.index');
    }

    public function errandsApplied(Request $request)
    {
        $query = Errand::where('status', 'applied')->with('user');

        // Filtering by date range if provided
        if ($request->has('date_from') && $request->has('date_to')) {
            $query->whereBetween('date_applied', [$request->input('date_from'), $request->input('date_to')]);
        }

        $errands = $query->paginate(10); // Paginate results

        return view('reports.errands_applied', compact('errands'));
    }

    public function errandsCompleted(Request $request)
    {
        $query = Errand::where('status', 'completed')->with('user');

        // Filtering by date range if provided
        if ($request->has('date_from') && $request->has('date_to')) {
            $query->whereBetween('date_applied', [$request->input('date_from'), $request->input('date_to')]);
        }

        $errands = $query->paginate(10); // Paginate results

        return view('reports.errands_completed', compact('errands'));
    }

    public function errandsPending(Request $request)
    {
        $query = Errand::where('status', 'pending')->with('user');

        // Filtering by date range if provided
        if ($request->has('date_from') && $request->has('date_to')) {
            $query->whereBetween('date_applied', [$request->input('date_from'), $request->input('date_to')]);
        }

        $errands = $query->paginate(10); // Paginate results

        return view('reports.errands_pending', compact('errands'));
    }

    public function errandsByUser (Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        $errands = $user->errands()->paginate(10); // Paginate results

        return view('reports.errands_by_user', compact('errands', 'user'));
    }

    public function errandsByCategory(Request $request, $category)
    {
        $errands = Errand::where('category', $category)->with('user')->paginate(10); // Paginate results

        return view('reports.errands_by_category', compact('errands', 'category'));
    }

    public function errandsByStatus(Request $request, $status)
    {
        $errands = Errand::where('status', $status)->with('user')->paginate(10); // Paginate results

        return view('reports.errands_by_status', compact('errands', 'status'));
    }

    // New show method to display a specific errand
    public function show($id)
    {
        $errand = Errand::with('user')->findOrFail($id);
        return view('reports.errand_show', compact('errand'));
    }
}