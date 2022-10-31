<?php

namespace App\Models;

use DB;

class ProjectModel
{
    public function create($result)
    {
        $data = DB::table('projects')->insertGetid($result);
        
        return $data;
    }

    public function getOne($id)
    {
        $data = DB::table('projects')
                ->where('id', $id)
                ->first();
        return $data;
    }

    public function getAll()
    {
        $data = DB::table('projects')->get();
        return $data;
    }

    public function getBySlug($slug)
    {
        $data = DB::table('projects')->where('slug', $slug)->first();

        return $data;
    }

    public function update($id, $result)
    {

        $data = DB::table('projects')
            ->where('id', $id)
            ->update($result);

        return $data;
    }

    public function remove($id)
    {
        $data = DB::table('projects')
            ->where('id', $id)
            ->delete();

        return $data;
    }

}
