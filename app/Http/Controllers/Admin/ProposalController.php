<?php 

namespace App\Http\Controllers\Admin;

use App;
use Hash;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserModel as User;
use App\Models\LogModel as Log;

class ProposalController extends Controller
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
	* Render list of all proposal
	* @access public
	* @return Response
	*/
	public function index(Request $request)
	{
        $data = [
            'title' => 'Proposal - Admin Panel',
        ];

		return view('admin.proposals.proposalIndex', $data);
	}

	public function createRender(Request $request)
	{
		$data = [
            'title' => 'Create Proposal - Admin Panel',
        ];

		return view('admin.proposals.proposalCreate', $data);
	}
}