<?php

namespace App\Http\Controllers;

use App\Models\Errand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ErrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Errand::class);
        $filters = request()->only(
            'search',
            'min_salary',
            'max_salary',
            'experience',
            'category'
        );

        return view(
            'errands.index',
            ['errands' => Errand::with('customer')->latest()->filter($filters)->paginate(10)]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Errand::class);
        return view('errands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Errand::class);
        $request->validate([
            // Add validation rules here
        ]);

        $errand = new Errand();
        $errand->fill($request->all());
        $errand->save();

        return redirect()->route('errands.index')->with('success', 'Errand created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Errand $errand)
    {
        Gate::authorize('view', $errand);
        return view(
            'errands.show',
            ['errand' => $errand->load('customer.errands')]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Errand $errand)
    {
        Gate::authorize('update', $errand);
        return view('errands.edit', ['errand' => $errand]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Errand $errand)
    {
        Gate::authorize('update', $errand);
        $request->validate([
            // Add validation rules here
        ]);

        $errand->fill($request->all());
        $errand->save();

        return redirect()->route('errands.index')->with('success', 'Errand updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Errand $errand)
    {
        Gate::authorize('delete', $errand);
        $errand->delete();

        return redirect()->route('errands.index')->with('success', 'Errand deleted successfully.');
    }

    /**
     * Show the status of the specified resource.
     */
    public function report()
{
    $pendingErrands = Errand::where('status', 'pending')->get();
    $completedErrands = Errand::where('status', 'complete')->get();

    return view('errands.report',compact('pendingErrands', 'completedErrands'));
}
}