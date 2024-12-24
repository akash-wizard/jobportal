<?php

namespace App\Http\Controllers;


use App\Models\CreateJobs;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch jobs with related companies and skills (comma-separated skills are handled here)
        $jobs = CreateJobs::leftJoin('companies', 'create_jobs.company_id', '=', 'companies.id')
            ->leftJoin('skills', DB::raw('FIND_IN_SET(skills.id, companies.skills)'), '>', DB::raw('0')) // Handle comma-separated values in `companies.skills`
            ->select(
                'create_jobs.*', 
                'companies.company_name', 
                'companies.logo as company_logo', 
                DB::raw('GROUP_CONCAT(skills.name) as skill_names')
            )
            ->groupBy(
                'create_jobs.id', 
                'create_jobs.company_id', // Add the `company_id` from `create_jobs` table
                'create_jobs.title', 
                'create_jobs.description', 
                'create_jobs.experiance', 
                'create_jobs.salary', 
                'create_jobs.location', 
                'create_jobs.extrainfo', 
                'create_jobs.created_at',  // Include `created_at` in the GROUP BY
                'create_jobs.updated_at',  // Include `updated_at` in the GROUP BY if it's present
                'companies.company_name', 
                'companies.logo'
            )
            ->get()
            ->map(function ($job) {
                $job->skills = explode(',', $job->skill_names); // Convert skills from string to array
                $job->extrainfo = explode(',', $job->extrainfo);   // Convert extra info from string to array
                return $job;
            });

            // dd($jobs);
        // Pass the jobs data to the Inertia view
        return Inertia::render('Dashboard', [
            'jobs' => $jobs,
        ]);
    }
}
