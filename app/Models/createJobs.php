<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class createJobs extends Model
{
    protected $fillable = [
        'title', 'description', 'experiance', 'salary', 'location', 'extrainfo',
    ];

    // public function company()
    // {
    //     return $this->belongsTo(companies::class);
    // }
    public function company()
    {
        return $this->belongsTo(companies::class, 'company_id'); // Define foreign key as 'company_id'
    }
}
