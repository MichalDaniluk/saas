<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyUser;
use App\Models\Order;
use App\Models\Term;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected function validator($data) {
        return Validator::make($data, [
            'name'=>'required|max:255',
            'company_id'=>'required|integer',
            'email'=>'required|max:255',
            'password'=>'required|max:255'
        ]);
    }

    public function edit($id) {
        $companyUser = CompanyUser::findOrFail($id);
        $user = User::findOrFail($companyUser->user_id);
        $role = CompanyUser::getRole();

        return view('company.users.edit', ['user'=>$user, 'role'=>$role]); //wybrany uzytkownik
    }

    public function store(Request $request) {
        $data = $this->validator($request->all())->validate();

        $user = new User();
        $user->password = Hash::make($data['password']);
        $user->name = $data['name'];
        $user->email = $data['email'];

        if( $user->save() ) {

            $company_user_data = $request->all();
            $company_user_data['company_id'] = $data['company_id'];
            $company_user_data['user_id'] = DB::table('users')->orderBy('id','desc')->limit(1)->value('id');

            $company_user = CompanyUser::create($company_user_data);
            $company_user->save();
        }

        session()->flash('Użytkownik dodany');

        return redirect(route('companies.users', $data['company_id']));
    }

    public function update(Request $request, $id) {

        $user = CompanyUser::findOrFail($id);

        //$data = $this->validator($request->all())->validate();
        $data = $request->all();
        $user->update($data);

        return redirect(route('companies.users', $user->company_id));
    }
}
