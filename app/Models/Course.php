<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_short',
        'title_english',
        'specialization',
        'slug',
        'specialization_english',
        'price',
        'type',
        'comments',
        'content',
        'image_small',
        'image_big',
        'user_id',
        'company_id'
    ];

    protected $attributes = [
        'type'=>''
    ];

    public function setTitleAttribute($value) {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getCompanyId(int $courseId)
    {
        return DB::table('courses')->where('course_id','=',$courseId)->value('company_id');
    }

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function terms() {
        return $this->hasMany(Term::class);
    }

}
