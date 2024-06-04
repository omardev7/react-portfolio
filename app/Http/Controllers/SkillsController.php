<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSkillRequest;
use App\Models\Skills;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    public function index(Request $request)
    {
        // Check if category parameter is provided in the request
        $category = $request->query('category');

        // Fetch skills based on the provided category, or fetch all if no category is provided
        $query = Skills::query();
        if ($category) {
            $query->where('category', $category);
        }
        $skills = $query->get();

        // Return the skills data as JSON response
        return response()->json($skills);
    }

    public function store(CreateSkillRequest $request)
    {
        // Validate the incoming request data using SkillRequest
        $validatedData = $request->validated();

        // Create a new skill with the validated data
        $skill = Skills::create($validatedData);

        // Return a success response with the created skill data
        return response()->json($skill, 201);
    }

    public function show($id)
    {
        // Find the skill by ID
        $skill = Skills::findOrFail($id);

        // Return the skill data as JSON response
        return response()->json($skill);
    }

    public function update(CreateSkillRequest $request, $id)
    {
        // Validate the incoming request data using SkillRequest
        $validatedData = $request->validated();

        // Find the skill by ID
        $skill = Skills::findOrFail($id);

        // Update the skill with the validated data
        $skill->update($validatedData);

        // Return a success response with the updated skill data
        return response()->json($skill, 200);
    }

    public function destroy($id)
    {
        // Find the skill by ID
        $skill = Skills::findOrFail($id);

        // Delete the skill
        $skill->delete();

        // Return a success response
        return response()->json(null, 204);
    }

}
