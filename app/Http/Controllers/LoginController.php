<?php 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\User;
use App\Services\Business\SecurityService;

class LoginController extends Controller {
    public function index(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        
        $user = new User(-1, $username, $password);
        
        $service = new SecurityService();
        $status = $service->login($user);
        
        if ($status){
            $data = ['model' => $user];
            return view('loginPassed')->with($data);
        } else {
            return view('loginFailed');
        }
    }
}
