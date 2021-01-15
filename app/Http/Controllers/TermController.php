<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyUser;
use App\Models\Course;
use App\Models\Place;
use App\Models\Term;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TermController extends Controller
{
    protected function validator($data) {
        return Validator::make($data, [
            'from'=>'date|required',
            'to'=>'date|required',
            'course_id'=>'required',
            'place_id'=>'nullable',
            'description'=>'nullable'
        ]);
    }

    public function full($id) {
        //todo: Poprawic liste tak by pokazywaly sie terminy tylko z wybranego kursu
        $course = Course::findOrFail($id);

        return view('terms.list', [
            'terms'=>Term::where('company_id','=',$course->company_id)->where('course_id','=',$id)->get(),
            'course_id'=>$course->id,
            'company'=> Company::findOrFail($course->company_id)
        ]);
    }

    public function fulljson($id,$code,$site) {
        return Term::where('course_id','=',$id)->get()->toJson(JSON_PRETTY_PRINT);
    }

    public function fullhtml($id,$code,$site) {
        return view('terms.fullhtml', [
            'terms'=>Term::where('course_id','=',$id)->get(),
            'partner_code'=>$code,
            'site'=>$site
        ]);
    }

    public function create($id) {
        return view('terms.create', ['course_id'=>$id,'places'=>Place::all()]);
    }

    public function edit($id,$course_id) {
        $term = Term::findOrFail($id);
        return view('terms.edit', ['term'=>$term, 'places'=>Place::all(), 'course_id'=>$course_id]);
    }

    public function store(Request $request) {

        $data = $this->validator($request->all())->validate();
        $data['company_id'] = CompanyUser::getCompanyId(Auth::id());
        $term = Term::create($data);

        $term->save();

        session()->flash('Termin dodany');

        return redirect(route('terms.list', $data['course_id']));
    }

    public function update(Request $request, $id) {

        $terms = Term::findOrFail($id);

        $data = $this->validator($request->all())->validate();
        $terms->update($data);

        return redirect(route('terms.list', $data['course_id']));
    }

    public function destroy(Request $request, $id) {

        $term = Term::findOrFail($id);
        $term->delete();

        return redirect(route('terms.list', $request->course_id))->with('message','Termin został usunięty');
    }
}
