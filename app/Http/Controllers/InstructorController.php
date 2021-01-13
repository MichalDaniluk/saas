<?php

namespace App\Http\Controllers;

use App\Models\CompanyUser;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\Order;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    public function full() {
        return view('instructors.list', ['instructors'=>Instructor::all()]);
    }

    public function create() {
        return view('instructors.create');
    }

    public function store(Request $request) {

        $data = $request->all();

        $instructor = Instructor::create($data);
        $instructor->save();

        session()->flash('Wykładowca dodany');

        return redirect(route('instructors.full'));
    }

    public function update(Request $request, Instructor $instuctor, $id) {

        $instuctor = Instuctor::findOrFail($id);

        //$data = $this->validator($request->all())->validate();
        $data = $request->all();
        $instuctor->update($data);

        return redirect(route('instuctors.full'));
    }

    public function destroy($id) {

        $instuctor = Instuctor::findOrFail($id);
        $instuctor->delete();

        return redirect(route('instuctors.full'))->with('message','Wykładowca został usunięty');
    }
}
