<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
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
        'company_id',
        'partner_code',
        'course_code'
    ];

    protected $attributes = [
        'type' => '',
        'title_short' => null,
        'title_english' => null,
    ];

//    public function setCourse_CodeAttribute() {
//        $this->attributes['course_code'] = uniqid();
//    }

    public static function importCourses(array $data)
    {
        //todo: add validation method

        for($a=0;$a<count($data['lista']);$a++)
        {
            //todo: add verification if company exists
            $data['lista'][$a]['company_id'] = CompanyUser::getCompanyId(Auth::id());
            $data['lista'][$a]['user_id'] = Auth::id();

            //dd($data['lista'][$a]);
            $course = Course::create($data['lista'][$a]);
            $course->save();
        }
    }

    public static function importTerms(array $data)
    {
        //todo: add validation method

        for($a=0;$a<count($data['lista']);$a++)
        {
            //todo: add verification if company exists
            $data['lista'][$a]['company_id'] = CompanyUser::getCompanyId(Auth::id());
            $data['lista'][$a]['course_id'] = Course::getIdFromCode($data['lista'][$a]['course_code']);

            //dd($data['lista'][$a]);
            $course = Term::create($data['lista'][$a]);
            $course->save();
        }
    }

    private static function getIdFromCode($course_code)
    {
        return Course::first()->where('course_code','=',$course_code)->value('id');
    }

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
