<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CookieController extends Controller
{
    public function setCookie(){
        $response = response('Cookie Set');
        $response->withCookie('name', 'value', 60); // Cookie will expire in 60 minutes
        return $response;
    }
    public function getCookie(){
        return request()->cookie('name');
    }

    public function deleteCookie(){
        return response('Deleted')->cookie('name',null);
    }


}
