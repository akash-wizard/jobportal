<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class companies extends Model
{
    protected $fillable = [
        'company_name', 'logo', 'skills',
    ];

    // public function jobs()
    // {
    //     return $this->hasMany(createJobs::class);
    // }
    public function jobs()
    {
        return $this->hasMany(createJobs::class, 'company_id'); // Define the foreign key as 'company_id'
    }
}
