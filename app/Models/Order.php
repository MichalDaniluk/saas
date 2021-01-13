<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    private const status =['Active','Decision','Graduate'];
    private const installments = ['Yes','No','ToReturn','FullPayent','NoReturn'];

    protected $fillable = [
        'name',
        'company_id',
        'course_id',
        'from',
        'to',
        'place_id',
        'email',
        'due',
        'installment',
        'status',
        'site',
        'partner_code'
    ];

    public static function getStatusList() {
        return self::status;
    }

    public static function getInstallment()
    {
        return self::installments;
    }
}
