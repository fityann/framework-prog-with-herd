<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    public static function getAll($request)
    {
    //    $categories = DB::table("categories")->get();
        $query = DB::table('categories');
        if(!empty($request->category_name)) {
            $query->where('category_name', 'like', '%' . $request->category_name . '%');
        } elseif (!empty($request->id)) {
            $query->where('id', $request->id);
        }
       return $query->get();
    }

    public static function store($data)
    {
        return DB::table('categories')->insert($data);
    }

    public static function getCategoryById($id)
    {
        return DB::table('categories')->where('id', $id)->first();
    }

    public static function updateData($id, $data)
    {
        return DB::table('categories')->where('id', $id)->update($data);
    }

        public static function destroy($id)
        {
            return DB::table('categories')->where('id', $id)->delete();
        }
}
