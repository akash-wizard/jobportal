<?php

namespace App\Http\Controllers;

use App\Models\createJobs;
use App\Models\companies;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request){    ///this function is not used please see livewire index
        $jobs = createJobs::leftJoin('companies', 'create_jobs.company_id', '=', 'companies.id')
        ->leftJoin('skills', 'companies.skills', '=', 'skills.id')
        ->select('create_jobs.*', 'companies.company_name', 'companies.logo', 'companies.skills')
        ->get();
        // dd($jobs);
           return view('livewire.pages.jobs.index', compact('jobs'));
    }
    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'experiance' => 'required|string',
            'salary' => 'required|numeric',
            'location' => 'required|string',
            'extrainfo' => 'required|string',
            'company_name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'skills' => 'required|string',
        ]);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
        } else {
            $logoPath = null;
        }
 

        $company = new companies();
        $company->company_name = $request->company_name;
        $company->logo = $logoPath; // If there's a logo uploaded
        $company->skills = implode(',',$request->skills);
        $company->save();



        $job = new createJobs();
        $job->title = $request->title;
        $job->description = $request->description;
        $job->experiance = $request->experiance;
        $job->salary = $request->salary;
        $job->location = $request->location;
        $job->extrainfo = $request->extrainfo;
        $job->company_id = $company->id;
        $job->save();
       

        return redirect()->route('admin.jobs.index')->with('success', 'Job posting created successfully!');
    }


}
