<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
   
    public function index()
    {
        // Fetch all banners from the database
        $banners = Banner::all();

        // Return the banners data as JSON response
        return response()->json($banners);
    }

    public function edit(BannerRequest $request, $id)
    {
        // Find the banner by ID
        $banner = Banner::findOrFail($id);

        // Validate the incoming request using BannerRequest
        
        // Update the banner with the validated data
        $banner->update($request->validated());

        // Optionally, return a response indicating success
        return response()->json(['message' => 'Banner updated successfully']);
    }

    public function show($id)
{
    try {
        // Find the banner by ID
        $banner = Banner::findOrFail($id);

        // Return the banner data as JSON response
        return response()->json($banner);
    } catch (\Exception $e) {
        // Handle any exceptions, such as banner not found
        return response()->json(['message' => 'Banner not found'], 404);
    }
}

}

