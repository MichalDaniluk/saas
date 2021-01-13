<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Company extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'city',
        'post_code',
        'logo',
        'description',
        'partner_code',
        'site'];

    protected $attributes = [
        'phone'=>''
    ];

    public function setEmailAttribute($value) {
        $this->attributes['email'] = is_null($value) ? 'test' : $value;
    }

    public function setPhoneAttribute($value) {
        $this->attributes['phone'] = is_null($value) ? '123123123' : $value;
    }

    public function getLogoAttribute() {
        return Str::startsWith($this->attributes['logo'], 'http') ? $this->attributes['logo'] : Storage::url($this->attributes['logo']);
    }

    public function courses() {
        return $this->hasMany(Course::class);
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function getPartnerCode() {
        return $this->attributes['partner_code'];
    }

    public function getSite() {
        return $this->attributes['site'];
    }

    use HasFactory;
}
