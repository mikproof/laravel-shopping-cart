<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
  public function __construct()
  {
    $this->middleware('guest:admin');
  }
    public function showLoginForm()
    {
      return view('auth.admin-login');
    }

    public function login(Request $request)
    {
      //validate the form database
      $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required|min:6'
      ]);
      // attempt to log the user in
      // passing in array to look for the member admin
      if( Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
        return redirect()->intended(route('admin.dashboard'));
      }
      // if successful redirect to there intended locale_get_display_region
      return redirect()->back()->withInput($request->only('email', 'remember'));
      // if unsuccesful redirect  back to the login


    }
}
