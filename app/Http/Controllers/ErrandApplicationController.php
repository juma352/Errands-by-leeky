<?php

namespace App\Http\Controllers;

use App\Models\errand;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;

class ErrandApplicationController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(errand $errand)
    {
        $this->authorize('apply',$errand);
        return view('errand_application.create', ['errand'=> $errand ]);
    }


    public function store( Errand  $errand,Request $request)
    {
        $validatedData = $request->validate([
            'expected_salary' => 'required|min:1|max:100000',
            'cv' => 'required|file|mimes:pdf|max:5048'
            ]);
            $file = $request->file('cv');
            $path = $file->store('cvs','private');

       $errand->errandApplication()->create([
        'user_id' =>  $request->user()->id,
        'expected_salary' => $validatedData['expected_salary'],
        'cv_path' => $path,
        
       ]);
    
       return redirect()->route('errands.show', $errand)
       ->with('success','Application submitted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
