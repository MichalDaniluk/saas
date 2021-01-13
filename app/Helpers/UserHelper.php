<?php

namespace App\Helpers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserHelper
{
    public static function getUser(int $userid): ?object
    {
        return User::find($userid);
    }
    public static function getCurrentUser(): ?object
    {
        return Auth::user();
    }
    public static function getUserCompany(): ?object
    {
        //$companyId = Auth::user()->comp_id;
        //return Company::find($companyId);
    }
}

//class HtmlHelper {
//    public static function select(string $name, array $items, string $selected): string {
//        $html = "<select name=\"$name\">";
//            foreach($items as $item) {
//                $html .= "<option value=\"$item\"></option>";
//            }
//        $html .= "</select>";
//        return $html;
//    }
//}
