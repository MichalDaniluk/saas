<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CompanyUser extends Model
{
    use HasFactory;

    private const role = ['SuperAdmin','Admin','LocalAdmin','Editor'];

    protected $fillable = ['company_id','user_id','role'];
    protected $attributes = [
        'role'=>'Editor'
    ];

    protected $table = 'company_user';

    public static function getCompanyId()
    {
        //DB::enableQueryLog();
        $company_id = CompanyUser::first()->where('user_id', '=', Auth::id())->value('company_id');
        return $company_id;
        //dd($company_id);
        //dd(DB::getQueryLog());
    }

    public function company() {
        return $this->belongsToMany(Company::class);
    }

    public static function getLastCompanyId()
    {
        return User::first()->where('id', '=', Auth::id())->value('last_company');
    }

    public static function getRole() {
        return self::role;
    }

}
