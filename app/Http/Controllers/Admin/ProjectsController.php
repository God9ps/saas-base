<?php

namespace App\Http\Controllers\Admin;

use App\Events\Tenant\ProjectCreated;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Exception;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\MassDestroyProjectRequest;

/**
 * Class ProjectsController
 * @package App\Http\Controllers\Admin
 */
class ProjectsController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        abort_if(Gate::denies('project_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.projects.create');
    }

    /**
     * @param StoreProjectRequest $request
     * @return RedirectResponse
     */
    public function store(StoreProjectRequest $request)
    {
        abort_if(Gate::denies('project_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project = Project::create([
            'name' => $request->name,
            'subdomain' => $request->subdomain,
            'db_name' => 'db_'.$request->subdomain,
            'db_host' => null,
            'db_user' => null,
            'db_password' => null,
            'created_by_id' => auth()->id(),
        ]);

        event(new ProjectCreated($project));

        return redirect()->route('admin.projects.index');

    }

    /**
     * @param Project $project
     * @return Factory|View
     */
    public function edit(Project $project)
    {
        $project->load('created_by');

        return view('admin.projects.edit', compact('project'));
    }

    /**
     * @param UpdateProjectRequest $request
     * @param Project $project
     * @return RedirectResponse
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->all());

        return redirect()->route('admin.projects.index');

    }

    /**
     * @param Project $project
     * @return Factory|View
     */
    public function show(Project $project)
    {
        $project->load('created_by');

        return view('admin.projects.show', compact('project'));
    }

    /**
     * @param Project $project
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return back();

    }

    /**
     * @param MassDestroyProjectRequest $request
     * @return ResponseFactory|\Illuminate\Http\Response
     */
    public function massDestroy(MassDestroyProjectRequest $request)
    {
        Project::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
