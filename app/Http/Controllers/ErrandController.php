<?php

namespace App\Http\Controllers;

use App\Models\errand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ErrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny',errand::class);
        $filters = request()->only(
            'search',
            'min_salary',
            'max_salary',
            'experience',
            'category'
        );

        return view(
            'errands.index',
            ['errands' => errand::with('customer')->latest()->filter($filters)->get()]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Errand $errand)
    {
        Gate::authorize('view',$errand);
        return view(
            'errands.show',
            ['errand' => $errand->load('customer.errands')]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}