<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use DB;
use Exception;
use Log;
use Validator;
use Hash;

class UserController extends Controller
{
	protected function dashboard() {
		return view('layouts.admin');
	}
}