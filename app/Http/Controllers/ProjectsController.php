<?php

namespace App\Http\Controllers;

use App\Company;
use App\Project;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::where('user_id',Auth::user()->id)->get();

        return view('projects.index',['projects'=>$projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id = null)
    {
        //dump([$company_id]);
        $companies = null;
        if(!$company_id){
            $companies = Company::where('user_id',Auth::user()->id)->get();
        }
        return view('projects.create',['company_id'=>$company_id,
                                            'companies'=>$companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()){
            $project = Project::create([
                'name'=>$request->input('name'),
                'company_id'=>$request->input('company_id'),
                'description'=>$request->input('description'),
                'user_id'=>Auth::user()->id
            ]);

            if($project){
                return redirect()->route('projects.show',['project'=>$project->id])
                    ->with('success','Project created successfully');
            }
        }

        return back()->withInput()->with('errors','Error creating a project');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $project = Project::find($project->id);
        //dump($project->comments());
        $comments = $project->comments;
        return view('projects.show',['project'=>$project,'comments'=>$comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $project = Project::find($project->id);
        return view('projects.edit ',['project'=>$project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //save data

        $projectUpdate = Project::where('id', $project->id)
            ->update([
                'name'=> $request->input('name'),
                'description'=> $request->input('description')
            ]);

        if($projectUpdate){
            return redirect()->route('projects.show', ['project'=> $project->id])
                ->with('success' , 'Project updated successfully');
        }
        //redirect
        return back()->withInput();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $findCompany = Project::find($project);
        if($findCompany-> delete()){
            return redirect()->route('projects.index')
                ->with('success','Project got deleted successfully');
        }
        return back()->withInput()->with('error','Compnay could not be deleted');
    }
}
