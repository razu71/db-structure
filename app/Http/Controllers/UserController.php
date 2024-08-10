<?php

namespace App\Http\Controllers;

use App\Enums\UserStatus;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();   
        dd($users);
    }

    public function status()
    {
        dd(UserStatus::ACTIVE);
    }
}
