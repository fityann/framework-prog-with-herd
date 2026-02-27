<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    public function category(){
        return $this->belongsTo(Category::class, 'categories_id');
}

    public static function getAll($request) {
       $query = DB::table('products')
        ->leftJoin('categories', 'products.categories_id', '=', 'categories.id')
        ->select('products.*', 'categories.category_name');

        if(!empty($request->product_name)) {
            $query->where('product_name', 'like', '%' . $request->product_name . '%');
        } elseif (!empty($request->id)) {
            $query->where('products.id', $request->id);
        }
    
        return $query->get();
    }

    public static function store($data) {
        return DB::table('products')->insert($data);
    }

    public static function getProductById($id) {
        return DB::table('products')
        ->leftJoin('categories', 'products.categories_id', '=', 'categories.id')
        ->select('products.*', 'categories.category_name')
        ->where('products.id', $id)
        ->first();
    }

    public static function updateData($id, $data) {
        return DB::table('products')->where('id', $id)->update($data);
    }

    public static function destroy($id) {
        return DB::table('products')->where('id', $id)->delete();
    }

}
