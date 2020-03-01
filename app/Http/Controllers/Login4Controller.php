<?php
namespace App\Http\Controllers;

use App\Services\Business\SecurityService;
use App\model\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class Login4Controller extends Controller
{
    
    public function loginUser(Request $request)
    {
        Log::info("Entering Login4Controller.loginUser()");
        
        
        try {
            $this->validateForm($request);
            $username = $request->input('username');
            $password = $request->input('password');
            
            $user = new User(- 1, $username, $password);
            
            $service = new SecurityService();
            $status = $service->login($user);
            
            if ($status) {
                Log::info("Existing loginUser() with login passed");
                $data = ['model' => $user];
                return view('loginPassed3')->with($data);
            } else {
                Log::info("Existing loginUser() with login failed");
                return view('loginFailed3');
            }
        } catch (ValidationException $e1) {
            throw $e1;
        }  /*catch (Exception $e2) {
            Log::error("Error : loginUser() in Login4Controller " , array("error messages" => $e2->getMessage()));
        return view("systemException");
        } */
    }
    
    private function validateForm(Request $request)
    {
        $rules = ['username' => 'requried | Between:4,10 | Alpha','password' => 'requried | Between:4,10'];
        
        $this->validate($request, $rules);
    }
}
