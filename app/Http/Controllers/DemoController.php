<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DemoController extends Controller
{
    function Demo1(){
        // Retrive all rows
        // return DB::table('users')->get(); 

        // Retrive first row
        // return DB::table('users')->first(); 

        // Retrive specific row by id
        // return DB::table('users')->find(3);  

        // Retrive List of column
        // return DB::table('users')->pluck('email');

    }
    function aggregation(){
        // return DB::table('products')->count();
        // return DB::table('products')->max('price');
        // return DB::table('products')->min('price');
        // return DB::table('products')->sum('price');
        // return DB::table('products')->avg('price');
    }

    function selectClause(){
        // return DB::table('products')->select('title', 'price')->get();
        // return DB::table('products')->select('price')->distinct()->get(); // For get unque data list.
    }

    function innerJoin(){
        return DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->first();
    }

    function leftJoin(){
        return DB::table('products')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('brands', 'products.brand_id', '=', 'brands.id')
            ->get();
    }

    function rightJoin(){
        return DB::table('products')
            ->rightJoin('categories', 'products.category_id', '=', 'categories.id')
            ->rightJoin('brands', 'products.brand_id', '=', 'brands.id')
            ->get();
    }

    function crossJoin(){
        return DB::table('products')
            ->crossJoin('categories')
            // ->crossJoin('brands')
            ->get();
    }


}
