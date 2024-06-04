<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest; // Import the ProjectRequest for validation

class ProjectsController extends Controller
{
    public function index()
    {
        // Fetch all projects from the database
        $projects = Projects::all();

        // Return the projects data as JSON response
        return response()->json($projects);
    }

    public function store(ProjectRequest $request)
    {
        // Validate the incoming request data using ProjectRequest
        $validatedData = $request->validated();

        // Create a new project with the validated data
        $project = Projects::create($validatedData);

        // Return a success response with the created project data
        return response()->json($project, 201);
    }

    public function show($id)
    {
        // Find the project by ID
        $project = Projects::findOrFail($id);

        // Return the project data as JSON response
        return response()->json($project);
    }

    public function update(ProjectRequest $request, $id)
    {
        // Validate the incoming request data using ProjectRequest
        $validatedData = $request->validated();

        // Find the project by ID
        $project = Projects::findOrFail($id);

        // Update the project with the validated data
        $project->update($validatedData);

        // Return a success response with the updated project data
        return response()->json($project, 200);
    }

    public function destroy($id)
    {
        // Find the project by ID
        $project = Projects::findOrFail($id);

        // Delete the project
        $project->delete();

        // Return a success response
        return response()->json(null, 204);
    }
}
