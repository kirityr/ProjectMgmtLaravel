<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::where('user_id',Auth::user()->id)->get();

        $users = User::get();

        return view('companies.index',['companies'=>$companies,'users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
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
            $company = Company::create([
                'name'=>$request->input('name'),
                'description'=>$request->input('description'),
                 'user_id'=>Auth::user()->id
            ]);

            if($company){
                return redirect()->route('companies.show',['company'=>$company->id])
                    ->with('success','Company created successfully');
            }
        }

        return back()->withInput()->with('errors','Error creating a company');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $company = Company::find($company->id);
        return view('companies.show',['company'=>$company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $company = Company::find($company->id);
        return view('companies.edit ',['company'=>$company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //save data

        $companyUpdate = Company::where('id', $company->id)
            ->update([
                'name'=> $request->input('name'),
                'description'=> $request->input('description')
            ]);

        if($companyUpdate){
            return redirect()->route('companies.show', ['company'=> $company->id])
                ->with('success' , 'Company updated successfully');
        }
        //redirect
        return back()->withInput();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $findCompany = Company::find($company);
        if($findCompany-> delete()){
            return redirect()->route('companies.index')
                ->with('success','Company got deleted successfully');
        }
        return back()->withInput()->with('error','Compnay could not be deleted');
    }
}
