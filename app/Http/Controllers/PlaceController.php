<?php

namespace App\Http\Controllers;

use App\Models\CompanyUser;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\Order;
use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function full() {
        return view('places.list', ['places'=>Place::all()]);
    }

    public function create() {
        return view('places.create');
    }

    public function store(Request $request) {

        $data = $request->all();

        $places = Place::create($data);
        $places->save();

        session()->flash('Wykładowca dodany');

        return redirect(route('places.full'));
    }

    public function update(Request $request, Place $places, $id) {

        $places = Place::findOrFail($id);

        //$data = $this->validator($request->all())->validate();
        $data = $request->all();
        $places->update($data);

        return redirect(route('places.full'));
    }

    public function destroy($id) {

        $places = Instuctor::findOrFail($id);
        $places->delete();

        return redirect(route('instuctors.full'))->with('message','Mijesce zostało usunięte');
    }
}
