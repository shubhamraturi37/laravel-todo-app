<?php
namespace App\Http\Controllers\API\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\User;

class RegisterController extends Controller{

    public function __invoke(RegisterRequest $request)
    {
       $user = new User();
       $user->fill($request->payload());
       $user->save();
        return ['status'=>200];
    }
}
