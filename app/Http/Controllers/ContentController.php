<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Render home page, and check session to define
     * which language should be displayed
     *
     * @access public
     * @return Response
     */
    public function home()
    {
        return redirect(env('APP_HOME_URL').env('APP_ADMIN_SECTION'));
        //return response()->view('content.home');
    }

}
