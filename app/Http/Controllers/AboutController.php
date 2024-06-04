<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutRequest;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        // Fetch all abouts from the database
        $about = About::all();

        // Return the about data as JSON response
        return response()->json($about);
    }
    public function edit(AboutRequest $request, $id)
    {
        // Find the about by ID
        $about = About::findOrFail($id);

        // Validate the incoming request using aboutrequest
        
        // Update the about with the validated data
        $about->update($request->validated());

        // Optionally, return a response indicating success
        return response()->json(['message' => 'Banner updated successfully']);
    }

    public function show($id)
{
    try {
        // Find the about by ID
        $about = About::findOrFail($id);

        // Return the about data as JSON response
        return response()->json($about);
    } catch (\Exception $e) {
        // Handle any exceptions, such as about not found
        return response()->json(['message' => 'about not found'], 404);
    }
}

}