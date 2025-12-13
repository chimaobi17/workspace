<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Job extends Model{
    use HasFactory;

    protected $table = 'job_listings'; // to pick directly from the table using eloquent

    protected $guarded = [];
    //you can also disable fillable in the app configuration

    public function employer(){
        return $this->belongsTo(Employer::class); // a job belongs to an employer
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, foreignPivotKey: "job_listing_id"); // a job belongs to an employer
    }
}