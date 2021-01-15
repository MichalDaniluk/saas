<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Course;
use App\Models\Log;
use App\Models\OrderLog;
use App\Models\Term;
use App\Models\User;
use App\Providers\HelperServiceProvider;
use App\Providers\UserHelpServiceProvider;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Helpers\UserHelper;

class OrderController extends Controller
{

    public function full() {

        $company_id = DB::table('users')->join('company_user','user_id','=','users.id')->where('users.id','=',Auth::id())->value('company_id');
        $company = Company::findOrFail($company_id);

        $orders = DB::table('orders')->join('courses','orders.course_id','=','courses.id')->where('orders.company_id','=',$company_id)->where('orders.partner_code','=',NULL)->get(['orders.name','courses.title','from','orders.id']);
        $partner_orders = DB::table('orders')->join('courses','orders.course_id','=','courses.id')->join('companies','orders.company_id','=','companies.id')->where('orders.company_id','=',$company_id)->where('orders.partner_code','=',$company->getPartnerCode())->whereNotNull('orders.partner_code')->get(['orders.name','courses.title','from','orders.id','orders.site']);

        return view('orders.full', ['orders'=>$orders, 'partner_orders'=>$partner_orders]);
    }

    public function days() {
        return view('orders.days', ['days'=>'']);
    }

    public function days7() {
        return view('orders.days', ['days'=>'7']);
    }

    public function days14() {
        return view('orders.days', ['days'=>'14']);
    }

    public function hidden() {
        return view('orders.days', ['days'=>'']);
    }

    public function check() {
        return view('orders.days', ['days'=>'']);
    }

    public function term() {
        return view('orders.days', ['days'=>'']);
    }

    public function last() {
        return view('orders.last', ['orders'=>Order::latest()->paginate(25)]);
    }

    public function log() {
        return view('orders.log', ['logs'=>Log::all()]);
    }

    public function noterm() {
        return view('orders.noterm');
    }

    public function edit($id) {

        return view('orders.edit', [
            'order'=>Order::findOrFail($id),
            'orderlogs'=>OrderLog::all(),
            'status'=>Order::getStatusList(),
            'installment'=>Order::getInstallment()
            ]);
    }

    public function orderAdd() {
        return view('orders.edit');
    }

    public function store(Request $request) {

        $data = $request->all();
        $data['status'] = 'Active';
        $data['installment'] = 'No';

        $course = Course::findOrFail($data['course_id']);
        $data['due'] = $course->price;
        $data['company_id'] = $course->company_id;

        $term = Term::findOrFail($data['term_id']);

        $data['from'] = $term->from;
        $data['to'] = $term->to;

        $order = Order::create($data);

        $order->save();

        session()->flash('Zamówienie dodane');

        return redirect(route('orders.full'));
    }

    public function store_notlogetuser(Request $request) {

        $data = $request->all();
        $data['status'] = 'Active';
        $data['installment'] = 'No';

        $course = Course::findOrFail($data['course_id']);
        $data['due'] = $course->price;
        $data['company_id'] = $course->company_id;

        $term = Term::findOrFail($data['term_id']);

        $data['from'] = $term->from;
        $data['to'] = $term->to;

        $order = Order::create($data);

        $order->save();

        session()->flash('Zamówienie dodane');

        return redirect(route('orders.thanks'));
    }

    public function update(Request $request, $id) {

        $order = Order::findOrFail($id);

        //$data = $this->validator($request->all())->validate();
        $data = $request->all();
        $order->update($data);

        return redirect(route('orders.full'));
    }

    public function form(Request $request, $id, $code=null, $site=null) {
        $term = Term::findOrFail($id);
        $course = Course::first()->where('id','=',$term->course_id)->first();
        $company = Company::findOrFail($course->company_id);

        return view('orders.form', [
            'term'=>$term,
            'course'=>$course,
            'company'=>$company,
            'partner_code'=>$code,
            'site'=>$site
        ]);
    }

    public function thanks() {
        return view('orders.thanks');
    }
}
