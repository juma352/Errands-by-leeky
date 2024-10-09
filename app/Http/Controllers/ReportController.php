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
        $errands = Errand::where('status', 'applied')
            ->with('user')
            ->get();

        return view('reports.errands_applied', compact('errands'));
    }

    public function errandsCompleted(Request $request)
    {
        $errands = Errand::where('status', 'completed')
            ->with('user')
            ->get();

        return view('reports.errands_completed', compact('errands'));
    }

    public function errandsPending(Request $request)
    {
        $errands = Errand::where('status', 'pending')
            ->with('user')
            ->get();

        return view('reports.errands_pending', compact('errands'));
    }

    public function errandsByUser(Request $request, $userId)
    {
        $user = User::find($userId);
        $errands = $user->errands;

        return view('reports.errands_by_user', compact('errands', 'user'));
    }

    public function errandsByCategory(Request $request, $category)
    {
        $errands = Errand::where('category', $category)
            ->with('user')
            ->get();

        return view('reports.errands_by_category', compact('errands', 'category'));
    }

    public function errandsByStatus(Request $request, $status)
    {
        $errands = Errand::where('status', $status)
            ->with('user')
            ->get();

        return view('reports.errands_by_status', compact('errands', 'status'));
    }
}