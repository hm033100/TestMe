<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\model\User;
use App\Services\Business\SecurityService;
use Exception;

class Login3Controller extends Controller
{

    public function loginUser(Request $request)
    {
        try {
            $this->validateForm($request);

            $username = $request->input('username');
            $password = $request->input('password');

            $user = new User(- 1, $username, $password);

            $service = new SecurityService();
            $status = $service->login($user);

            if ($status) {
                $data = [
                    'model' => $user
                ];
                return view('loginPassed3')->with($data);
            } else {
                return view('loginFailed3');
            }
        } catch (ValidationException $e1) {
            throw $e1;
        } catch (Exception $e2) {
            return view("systemException");
        }
    }

    private function validateForm(Request $request)
    {
        $rules = [
            'username' => 'Requried | Between:4,10 | Alpha',
            'password' => 'Requried | Between:4,10'
        ];

        $this->validate($request, $rules);
    }
}
