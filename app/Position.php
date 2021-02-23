<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
        'title', 'imagen', 'description', 'skills', 'category_id', 'experience_id','location_id', 'salary_id',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function salary(){
        return $this->belongsTo(Salary::class);
    }

    public function location(){
        return $this->belongsTo(Location::class);
    }

    public function experience(){
        return $this->belongsTo(Experience::class);
    }

    public function recruiter(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function applicants(){
        return $this->hasMany(Applicant::class);
    }

}
