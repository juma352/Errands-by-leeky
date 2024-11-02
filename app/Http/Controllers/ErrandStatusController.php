<?php

namespace App\Http\Controllers;

use App\Models\Errand;
use App\Models\ErrandStatus;
use Illuminate\Http\Request;

class ErrandStatusController extends Controller
{
    public function update(Request $request, Errand $errand)
    {
        // Validate the request
        $request->validate([
            // Add validation rules here, if necessary
        ]);

        // Check authorization
        $this->authorize('update', $errand); // Assuming you have a policy defined

        try {
            $errandStatus = ErrandStatus::firstOrCreate([
                'errand_id' => $errand->id,
                'user_id' => auth()->id(),
            ]);

            $errandStatus->update([
                'is_read' => true,
            ]);

            return redirect()->route('some.route.name')->with('success', 'Errand status updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update errand status.');
        }
    }

    public function report()
    {
        // Fetch all errand statuses or apply necessary filters
        $applications = ErrandStatus::all(); // Adjust this as needed for your application
        return view('my_errand_application.report', compact('applications'));
    }

}