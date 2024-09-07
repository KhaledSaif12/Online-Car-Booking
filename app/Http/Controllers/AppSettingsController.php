<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;

class AppSettingsController extends Controller
{
    //
    public function generateRoles(){
        // Role::create(['name'=>'super_admin','display_name'=>'site adminstration']);
        // Role::create(['name'=>'content_manager','display_name'=>'manager']);
       //  Role::create(['name'=>'user','display_name'=>'user']);


         $u=User::find(1);
         $u->addRole('super_admin');
     }
}
