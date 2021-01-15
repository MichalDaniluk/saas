<?php

namespace App\Models;

use App\Exceptions\NoCompanyUserException;
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

    public static function getCompanyId(int $userId)
    {
        if( is_null($userId) || $userId < 0 )
            return 0;

        $company_id = CompanyUser::first()->where('user_id', '=', $userId)->value('company_id');

        if( is_null($company_id))
            throw new NoCompanyUserException();

        return $company_id;
    }

    public function company() {
        return $this->belongsToMany(Company::class);
    }

    public static function getLastCompanyId(int $userId): int
    {
        if( is_null($userId) || $userId < 0 )
            return 0;

        $lastCompanyId = (integer)User::first()->where('id', '=', $userId)->value('last_company');

        if( $lastCompanyId === 0)
            return 0;

        return $lastCompanyId;
    }


    public static function getRole() {
        return self::role;
    }

}
