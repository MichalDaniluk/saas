<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyUser;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function __contruct() {
        //$this->middleware('Auth');
    }

    protected function validator($data) {
        return Validator::make($data, [
            'name'=>'required|max:255',
            'address'=>'required|max:255',
            'city'=>'required|max:255',
            'post_code'=>'required|max:6', //mozna tez napisac nullable
            'email'=>'required:max:100',
            'logo'=>'nullable|image|max:1024',
        ]);
    }

    protected function validator_partners($data) {
        return Validator::make($data, [
            'partner_code'=>'nullable',
            'site'=>'nullable'
        ]);
    }

    public function list() {
        return view('company.list', ['companies'=>Company::all()]); //tylko firmy uzytkownika
    }

    public function full() {
        return view('company.list', ['companies'=>Company::all()]);
    }

    public function edit($id) {
        $company = Company::findOrFail($id);
        return view('company.edit', ['company'=>$company]);
    }

    public function edit_partners($id) {
        $company = Company::findOrFail($id);
        return view('company.partners', ['company'=>$company]);
    }

    public function create() {
        return view('company.create');
    }

    /**
     * Store a new Company in the database.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request) {

        $data = $this->validator($request->all())->validate();

        if( isset($data['logo'])) {
            $path = $request->file('logo')->store('logos');
            $data['logo'] = $path;
        }

        //$data = Arr::add($data,'phone', '123123123');

        $company = Company::create($data);
        $company->save();

        session()->flash('Firma dodana');

        return redirect(route('companies.list'));
    }

    public function update(Request $request, $id) {
        $company = Company::findOrFail($id);

        $data = $this->validator($request->all())->validate();

        $oldlogo = $company->logo;

        if( isset($data['logo'])) {
            $path = $request->file('logo')->store('logos');
            $data['logo'] = $path;
        }

        if( isset($data['logo']) ) {
            Storage::delete($oldlogo);
        }

        $company->update($data);

        session()->flash('Dane firmy poprawione');
        return redirect(route('companies.edit', $request->id));
    }

    public function update_partners(Request $request, $id) {
        $company = Company::findOrFail($id);

        $data = $this->validator_partners($request->all())->validate();

        $company->update($data);

        session()->flash('Dane partnerskie firmy poprawione');
        return redirect(route('companies.edit', $request->id));
    }

    public function destroy($id) {
        $company = Company::findOrFail($id);
        $company->delete();

        Storage::delete($company->logo); //todo: poprawic usuwanie plikow z serwera

        return redirect(route('companies.list'))->with('message','Firma została usunięta');
    }

    public function user_destroy($id) {
        $user = User::findOrFail($id);
        $company_id = CompanyUser::first()->where('user_id','=',$user->id)->value('company_id');
        $user->delete();

        return redirect(route('companies.users', $company_id))->with('message','Użytkownik został usunięty');
    }

    public function users(Company $company) {
        $users_list = DB::table('users')->join('company_user','user_id','=','users.id')->where('company_user.company_id','=',$company->id)->get();
        //dd($users_list);
        return view('company.users.list', ['company'=>$company,'users'=>$users_list]); //uzytkownicy w wybranej firmie
    }

    public function createUser($id) {
        $role = CompanyUser::getRole();
        return view('company.users.create', ['company_id'=>$id, 'role'=>$role]);
    }

    public function permissions(Company $company) {
        return view('company.permissions', ['company'=>$company,'permissions'=>DB::table('users')->join('user_permissions','user_id','=','users.id')->where('user_permissions.company_id','=',$company->id)->get()]); //users permissions list in company
    }

    public function partners(Company $company) {
        return view('company.partners', ['company'=>$company]);
    }
}
