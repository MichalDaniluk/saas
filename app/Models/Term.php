<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'from',
        'to',
        'course_id',
        'description',
        'place_id',
        'company_id',
        'city'
    ];

//    protected $attributes = [
//        'place_id' => NULL
//    ];

    public function course() {
        return $this->belongsTo(Course::class);
    }

    public function places() {
        return $this->hasMany(Place::class);
    }

//    public function setCourse_IdAttribute($value) {
//        $this->attributes['course_id'] = Course::first()->terms()->where('course_id','=',$value)->value('id');
//    }


}
