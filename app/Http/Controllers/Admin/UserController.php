<?php

namespace App\Http\Controllers\Admin;

use App;
use Hash;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserModel as User;
use App\Models\LogModel as Log;
use App\Models\UserMetaModel;

class UserController extends Controller
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
     * Class constructor
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
     * Render list of all user
     *
     * @access public
     * @return Response
     */
    public function index()
    {
        $data = $this->user->getAll();
        return view('admin.users.userIndex', ['users' => $data]);
    }

    /**
     * Render create Page
     *
     * @access public
     * @return Response
     */
    public function createRender()
    {
        return view('admin.users.userCreate');
    }

    /**
     * Create user handler
     *
     * @access public
     * @param Request $request
     * @return Response
     */
    public function createHandle(Request $request)
    {
        // Set input
        $input = $request->all();

        // Validate input
        $validator = Validator::make($input, [
            'fullname' => 'required|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        if ($validator->fails())
        {
            return back()->withErrors($validator)->withInput();
        }

        // Encrypt password
        $hash = Hash::make($input['password']);

        // Create user
        $resultID = $this->user->create($input['fullname'], $input['email'], $hash, $input['type']);

        // Set session
        $request->session()->flash('user-created', '');
        
        // get data Log activity record
        $data      = [
            'ID'        => $resultID,
            'fullname'  => $input['fullname'],
            'email'     => $input['email'],
            'password'  => $hash,
            'type'      => $input['type']
        ];

        // Log the record
        $userID    = $request->session()->get('user_ID');
        $action = 'Create an user';
        $this->log->record($userID, $action, $data);

        // Redirect back to user index
        return redirect(env('APP_ADMIN_SECTION').'/user');
    }

    /**
     * Render update user page
     *
     * @access public
     * @param Request $request
     * @return Response
     */
    public function updateRender(Request $request)
    {
        // Set user id
        $ID = $request->get('ID', false);
        
        if (!$ID)
        {
            return App::abort(404);
        }

        // Get user data
        $user = $this->user->getOne($ID);

        // Show 404 if user not found
        if (!$user)
        {
            return abort(404);
        }

        // Set data to render
        $data = [
            'ID'            => $ID,
            'fullname'      => $user->fullname,
            'email'         => $user->email,
            'statusNormal'  => 'selected',
            'statusAdmin'   => ''
        ];

        if ($user->type === 'admin')
        {
            $data['statusNormal']   = '';
            $data['statusAdmin']    = 'selected';
        }

        return view('admin.users.userEdit', $data);
    }

    /**
     * Update user handler
     *
     * @access public
     * @param Request $request
     * @return Response
     */
    public function updateHandle(Request $request)
    {
        // Show 404 error if request dont have user id parameter
        if (!$request->has('ID'))
        {
            return App::abort(404);
        }

        // Set input
        $input = $request->all();

        // Set user id
        $ID     = $input['ID'];
        $user   = $this->user->getOne($ID);

        // Validate input
        $validator = Validator::make($input, [
            'fullname'  => 'required|max:255',
            'email'     => 'required|email|unique:users,email,'.$ID.',ID'
        ]);

        if ($validator->fails())
        {
            return back()->withErrors($validator);
        }

        // Setup data to update
        $data = [
            'fullname'  => $input['fullname'],
            'email'     => $input['email'],
            'type'      => $input['type']
        ];

        // If password exist then encrypt password
        if ($request->has('password'))
        {
            $data['password'] = Hash::make($input['password']);
        }

        // Save Data
        $this->user->update($ID, $data);

        // Log the record
        // get data old
        $oldData = [
            'fullname'      => $user->fullname,
            'email'         => $user->email,
            'password'      => $user->password
        ];
        // get data old and new data
        $dataLog    = [
            'old-data'  => $oldData,
            'new-data'  => $data
        ];
        $userID     = $request->session()->get('user_ID');
        $action     = 'Edit an user';
        // save record
        $this->log->record($userID, $action, $dataLog);
        // Redirect back with flash session
        $request->session()->flash('user-updated', '');
        return back();
    }

    /**
     * Render remove user page
     *
     * @access public
     * @param Request $request
     * @return Response
     */
    public function removeRender(Request $request)
    {
        $ID = $request->input('ID');
        
        if (!$ID)
        {
            return App::abort(404);
        }

        $data = [
            'ID'    => $ID
        ];

        return view('admin.users.userRemove', $data);
    }

    /**
     * Remove user handler
     *
     * @param public
     * @param Request $request
     * @return Response
     */
    public function removeHandle(Request $request)
    {

        // Set user id
        $ID = $request->get('ID', false);
        
        // Show error if there is no uid parameter
        if (!$ID)
        {
            return App::abort(404);
        }

        // Cannot remove super admin
        if ($ID === '1')
        {
            return App::abort(404);
        }

        // Get user information for logging purposes
        $user = $this->user->getOne($ID);


        // Show error if user not found
        if (!$user)
        {
            return App::abort(404);
        }
        // Remove user
        $this->user->remove($ID);

        // get data Log activity record
        $data = [
            'ID'        => $ID,
            'fullname'  => $user->fullname,
            'email'     => $user->email,
            'type'      => $user->type
        ];

        // Log the record
        $userID     = $request->session()->get('user_ID');
        $action     = 'Remove an user';
        $this->log->record($userID, $action, $data);

        // Set flash session
        $request->session()->flash('user-deleted', '');

        // Redirect to user index
        return redirect(env('APP_ADMIN_SECTION').'/user');
    }
}
