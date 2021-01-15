<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyUser;
use App\Models\Course;
use App\Models\Order;
use App\Models\OrderLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    public function __construct() {
        //$this->middleware['auth'];

    }

    protected function validator($data) {
        return Validator::make($data, [
            'title'=>'required|max:255',
            'title_short'=>'nullable|max:255',
            'title_english'=>'nullable|max:255',
            'price'=>'required|numeric',
            'comments'=>'nullable',
            'content'=>'nullable'
        ]);
    }

    public function full() {
        return view('courses.list', [
            'courses'=>Course::first()->where('company_id','=',CompanyUser::getCompanyId(Auth::id()))->get(),
            'company'=>Company::findOrFail(CompanyUser::getCompanyId(Auth::id()))
        ]);
    }

    public function create() {
        return view('courses.create');
    }

    public function store(Request $request, Course $course) {

        $data = $this->validator($request->all())->validate();
        $data['user_id'] = Auth::id();
        $data['company_id'] = CompanyUser::getCompanyId(Auth::id());

        $course = Course::create($data);
        $course->save();

        session()->flash('Kurs dodany');

        return redirect(route('courses.list'));
    }

    public function update(Request $request, Course $course, $id) {

//        if ($request->user()->cannot('update', $course)) {
//            abort(403);
//        }

        $course = Course::findOrFail($id);
        $course['company_id'] = CompanyUser::getLastCompanyId(Auth::id());

        $data = $this->validator($request->all())->validate();

        $course->update($data);

        return redirect(route('courses.list'));
    }

    public function edit(Course $course) {

        return view('courses.edit', [
            'course'=>$course,
            'company'=>Company::findOrFail(CompanyUser::getCompanyId(Auth::id()))
        ]);
    }

    public function destroy($id) {

        $course = Course::findOrFail($id);
        $course->delete();

        return redirect(route('courses.list'))->with('message','Kurs został usunięty');
    }
}
