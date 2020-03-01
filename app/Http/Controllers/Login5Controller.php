<?php
namespace App\Http\Controllers;

use App\Services\Business\SecurityService;
use App\Services\Utility\LoggerTwo;
use App\model\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use phpDocumentor\Reflection\Types\Array_;

class Login5Controller extends Controller
{
    
    public function loginUser(Request $request)
    {
        LoggerTwo::info("Entering Login5Controller.loginUser()", array(null));
        
        
        try {
            $this->validateForm($request);
            $username = $request->input('username');
            $password = $request->input('password');
            LoggerTwo::info(" Paramaters: ", array("username" => $username, "password" => $password));
             
            $user = new User(- 1, $username, $password);
            
            $service = new SecurityService();
            $status = $service->login($user);
            
            if ($status) {
                LoggerTwo::info("Existing loginUser() with login passed", array(null));
                $data = ['model' => $user];
                return view('loginPassed3')->with($data);
            } else {
                LoggerTwo::info("Existing loginUser() with login failed", array(null));
                return view('loginFailed3');
            }
        } catch (ValidationException $e1) {
            throw $e1;
        }  /*catch (Exception $e2) {
        LoggerTwo::error("Error : loginUser() in Login4Controller " , array("error messages" => $e2->getMessage()));
        return view("systemException");
        } */
    }
    
    private function validateForm(Request $request)
    {
        $rules = ['username' => 'Required | Between:4,20 | Alpha',
            'password' => 'Required | Between:4,20'];
        
        $this->validate($request, $rules);
    }
}
