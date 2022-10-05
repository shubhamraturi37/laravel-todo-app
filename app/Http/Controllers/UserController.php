<?php
namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
/**
* Show the profile for a given user.
*
* @param int $id
* @return string
 */
public function show(): string
{


return view('user', [
'user' => User::all()
]);
}
}
