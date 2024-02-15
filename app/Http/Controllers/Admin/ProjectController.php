<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        // Prendo tutti i Types
        $types = Type::all();

        // Prendo tutti i Technologies
        $technologies = Technology::all();


        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $data = $this->validation($request->all());

        // dd($data);

        $project = new Project();

        $project->fill($data);
        $project->slug = Str::of($project->title)->slug('-');

        $project->save();

        if (isset($data['technologies'])) {
            $project->technologies()->sync($data['technologies']);
        }

        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        // Prendo tutti i Types
        $types = Type::all();

        // Prendo tutti i Technologies
        $technologies = Technology::all();

        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $this->validation($request->all());

        $project->update($data);
        $project->slug = Str::of($project->title)->slug('-');

        if (isset($data['technologies'])) {
            $project->technologies()->sync($data['technologies']);
        } else {
            $project->technologies()->sync([]);
        }

        $project->save();


        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }

    private function validation($data)
    {
        $validator = Validator::make($data, [
            'title' => 'required|max:70',
            'visibility' => ['required', 'max:50', Rule::in(['Public', 'Private'])],
            'last_updated' => 'required|max:100',
            'main_language' => 'required|max:200',
            'slug' => 'nullable|max:70',
            'type_id' => 'nullable',
            'technologies' => 'nullable|exists:technologies,id',
        ], [
            'title.required' => 'Il titolo è obbligatorio',
            'title.max' => 'Il titolo deve avere massimo :max caratteri',
            'visibility.required' => 'Il campo visibility è obbligatorio',
            'visibility.max' => 'Il campo visibility deve avere massimo :max caratteri',
            'visibility.in' => 'Il campo visibility non accetta quel valore',
            'last_updated.required' => 'Il campo last_updated è obbligatorio',
            'last_updated.max' => 'Il campo last_updated deve avere massimo :max caratteri',
            'main_language.required' => 'Il campo main_language è obbligatorio',
            'main_language.max' => 'Il campo main_language deve avere deve avere massimo :max caratteri',
            'slug.nullable' => 'Il campo slug NON è obbligatorio',
            'slug.max' => 'Il campo slug deve avere deve avere massimo :max caratteri',
            'type_id.nullable' => 'Il campo type_id NON è obbligatorio',
            'technologies.nullable' => 'Il campo technologies NON è obbligatorio',
            'technologies.exists' => 'La tecnologia selezionata non esiste'

        ])->validate();

        return $validator;
    }
}
