<?php

namespace App\Http\Controllers;

use App\Http\Requests\ErrandRequest;
use App\Models\errand;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class MyErrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    if (! Gate::allows('viewAnyCustomer', errand::class)) {
        abort(403); // or handle unauthorized access in your way
    }

    $user = auth()->user();
    if (!$user->customer) {
        // Handle the case where the user does not have a customer
        // For example, you could redirect them to a page to create a customer
        return redirect()->route('customer.create');
    }

    return view('my_errands.index', [
        'errands' => $user->customer->errands()
            ->with(['customer', 'errandApplication', 'errandApplication.user'])
            ->get()
    ]);
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (! Gate::allows('create', errand::class)) {
            abort(403); // or handle unauthorized access in your way
        }
        return view('my_errands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ErrandRequest $request)
    {
       

        $errand = auth()->user()->customer->errands()->create($request->validated());

        return  redirect()->route('my-errands.index')
            ->with('success','errand created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $errand = auth()->user()->customer->errands()->find($id);
        return view('my_errands.show', compact('errand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(errand $my_errand)
    {
        if (! Gate::allows('update', $my_errand)) {
           
        }
        return view('my_errands.edit',['errand' => $my_errand]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ErrandRequest $request, errand $my_errand)
    {
        if (! Gate::allows('update', $my_errand)) {
          
        }
       $my_errand->update($request->validated()); 
       return redirect()->route('my-errands.index')
       ->with('success','errand updated successfully');
      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Errand $my_errand)
    {
        $my_errand->delete();

        return redirect()->route('my-jobs.index')
            ->with('success', 'Job deleted.');
    }
}
        