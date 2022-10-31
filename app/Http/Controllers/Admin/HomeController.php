<?php 

namespace App\Http\Controllers\Admin;

use App;
use Hash;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserModel as User;
use App\Models\LogModel as Log;

class HomeController extends Controller
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
	* Class Contructor
	*
	* @access public
	* @return void
	*/ 
	public function __construct()
	{
		$this->user = new User();
		$this->log 	= new Log();
	}

	/**
	* Get All user data
	*
	* @access private
	* @return Array
	*/ 
	private function _getAllUserData()
	{
		$result = $this->user->getAll();

		$data 	= [
			'0'	=> '(none)'
		];

		foreach ($result as $item)
		{
			$data[$item->ID] = $item->fullname;
		}

		return $data;
	}

	/**
	* Render list of all user
	* @access public
	* @return Response
	*/
	public function index(Request $request)
	{
		
		$ID = $request->session()->get('user_ID', false);

		$data = [
			'user'	=> $this->_getAllUserData(),
			'logs'	=> $this->log->getByUser($ID)
		];
		
		return view('admin.home', $data);
	}
}