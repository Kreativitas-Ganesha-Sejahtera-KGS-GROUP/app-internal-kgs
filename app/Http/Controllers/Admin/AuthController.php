<?php

namespace App\Http\Controllers\Admin;

use App;
use Hash;
use Mail;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserMetaModel;
use App\Models\UserModel as User;
use App\Models\LogModel as Log;

class AuthController extends Controller
{
    /**
     * User model container
     *
     * @access protected
     */
    protected $user;

    /**
     * Log model container
     *
     * @access protected
     */
    protected $log;

    /**
     * Object constructor
     *
     * @access public
     * @return Void
     */
    public function __construct()
    {
        $this->user         = new User();
        $this->log          = new Log();
        $this->user_meta    = new UserMetaModel();

    }

    /**
     * Render login page
     *
     * @access public
     * @param Request
     * @return Response
     */
    public function loginRender(Request $request)
    {
        $url = $request->get('status', false);
        
        // if reset password success
        if ($url == 'success')
        {
            $request->session()->flash('reset-password-success', '');
        }
        
        return view('admin.login');
    }

    /**
     * Handle login POST request
     *
     * @access public
     * @param Request
     * @return Response
     */
    public function loginHandle(Request $request)
    {
        $input = $request->all();
        
        // set validator
        $validator = Validator::make($input, [
            'email'     => 'required|email',
            'password'  => 'required|min:6'
        ]);

        // Get user
        $isValid    = true;
        
        $user       = $this->user->getByEmail($input['email']);

        // If user not found show error
        if (!$user)
        {
            $isValid = false;
        }

        // Check hash
        if ($isValid)
        {
            $isValid = Hash::check($input['password'], $user->password);
        }

        if (!$isValid)
        {
            $request
                ->session()
                ->flash('login-error', 'login-error');

            return back()->withInput($request->except('password'));
        }

        // Log the record
        $dataLog = [
            'ID'    => $user->ID,
            'email' => $user
        ];

        $action = 'Login to Admin Panel';
        $this->log->record($user->ID, $action, $dataLog);

        $request->session()->put('user_ID', $user->ID);
        $request->session()->put('user_status', $user->type);
        return redirect(env('APP_ADMIN_SECTION'));
    }

    /**
     * Handle logout GET request
     *
     * @access public
     * @param Request
     * @return Response
     */
    public function logout(Request $request)
    {
        $ID = $request->session()->get('user_ID');
        $user = $this->user->getOne($ID);
        
        // Log the record
        $data = [
            'ID'        => $ID,
            'fullname'  => $user->fullname,
            'email'     => $user->email,
            'type'      => $user->type
        ];
        
        $action = 'Logout from Admin Panel';

        $this->log->record($ID, $action, $data);

        return redirect(env('APP_ADMIN_SECTION').'/login');
    }
}
