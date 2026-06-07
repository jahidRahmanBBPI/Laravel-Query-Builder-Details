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

    // INNER JOIN = Matching rows from both tables
    function innerJoin(){
        return DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->first();
    }

    // LEFT JOIN  = Keep Left 
    function leftJoin(){
        return DB::table('products')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('brands', 'products.brand_id', '=', 'brands.id')
            ->get();
    }

    // RIGHT JOIN = Keep Right 
    function rightJoin(){
        return DB::table('products')
            ->rightJoin('categories', 'products.category_id', '=', 'categories.id')
            ->rightJoin('brands', 'products.brand_id', '=', 'brands.id')
            ->get();
    }

    // CROSS JOIN = Everything × Everything
    function crossJoin(){
        return DB::table('products')
            // ->crossJoin('categories')
            ->crossJoin('brands')
            ->get();
    }

    // UNION = Combine results of multiple queries and remove duplicates
    // ইউনিয়ন একাধিক কোয়েরির ফলাফলকে একটি একক ফলাফল সেটে একত্রিত করে এবং ডুপ্লিকেট সারিগুলি সরিয়ে দেয়।
    function union(){
        $query1 = DB::table('products')->where('price', '>', 2000);
        $query2 = DB::table('products')->where('price', '=', 20)->union($query1)->get();
        return $query2;
    }

    // Pagination = Retrieve a subset of results for a specific page
    function Pagination(){
        $products = DB::table('products')->paginate(3); // 3 items per page
        return $products;
    }

    // Skip and Take = Skip a certain number of records and take a specific number of records.
    function skipTake(){
        return DB::table('users')
               ->skip(2)
               ->take(2)
               ->get();
    }

    // Latest and Oldest = Retrieve the most recent or oldest records based on a timestamp column.
    function latestOldest(){
        return DB::table('products')
                ->latest()
                ->first();

        return DB::table('products')
                ->oldest()
                ->first();
    }

    function orderBy(){
        return DB::table('users')
                // ->orderBy('email', 'desc')
                // ->orderBy('email', 'asc')
                ->get();
    }

    // In Random Order = Retrieve records in a random order.
    function inRandom(){
        return DB::table('users')
                ->inRandomOrder()
                ->first('email');
    }

}
