<?php

/**
 * Log data module
 */

namespace App\Models;

use DB;

class LogModel
{
    /**
     * Record user activity
     *
     * @access public
     * @param Integer $userID
     * @param Integer $action
     * @return Void
     */
    public function record($userID, $action, $data)
    {
        DB::table('logs')->insert([
            'user_ID'   => $userID,
            'action'    => $action,
            'data'      => json_encode($data),
            'created'   => time()
        ]);
    }
    

    /**
    * Get all log data
    *
    * @access public
    * @return Array
    */ 
    public function getAll()
    {
        return DB::table('logs')->get();
    }

    /**
    * Get By User ID
    *
    * @access public
    * @param String $userID
    * @return Object
    */ 
    public function getByUser($userID)
    {
        return DB::table('logs')
        ->where('user_ID', $userID)
        ->orderBy('ID', 'desc')
        ->get();
    }
}
