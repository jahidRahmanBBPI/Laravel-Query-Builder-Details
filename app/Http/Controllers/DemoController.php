<?php

namespace App\Http\Controllers;

use Exception;
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

    function limit(){
        return DB::table('products')
                ->limit(3)
                ->get();
    }

    function where(){
// orWhere, whereNot, whereBetween, whereNotBetween, whereBetweenColumns, whereNotBetweenColumns, 
// whereIn, whereNotIn, wwhereNull, whereNotNull, whereDate, whereMonth, whereDay, whereYear, 
// whereTime, whereColumn, whereExists, whereNotExists 

        // return DB::table('products')->where('price', '>', 2000)->get();

        // return DB::table('products')->where('title', 'LIKE', '%new%')->get(); // For search data with keyword.

        // return DB::table('products')->where('title', 'NOT LIKE', '%car%')->get(); // This is oposit of like.

        // return DB::table('products')
        //         ->where('price', '>', 3000)
        //         ->orWhere('price', '<', 1000)
        //         ->get();

        // return DB::table('products')
        //         ->where('price', '>', 2000)
        //         ->whereNot('title', 'LIKE', '%car%')
        //         ->get();

        // return DB::table('products')
        //         ->whereBetween('price', [1, 1000])
        //         ->get();

        // return DB::table('products')
        //         ->whereNotBetween('price', [1000, 3000])
        //         ->get();

        // SELECT * FROM `products` WHERE `price` IN ('20', '20005') // this is manual sql query
        // return DB::table('products')
        //         ->whereIn('price', [500, 1000, 20005])
        //         ->get();

        // return DB::table('products')
        //         ->whereNotIn('price', [500, 1000, 20005])
        //         ->get();

        // return DB::table('products')
        //         ->whereDate('updated_at', '2026-06-07')
        //         ->get();

        // return DB::table('products')
        //         ->whereMonth('updated_at', '06')
        //         ->get();

        // return DB::table('products')
        //         ->whereBetween('updated_at', ['2026-06-01', '2026-06-30'])
        //         ->get();

        try {
            return DB::table('categories')
                    ->where('id', '=', 3)->delete();
        }
        catch(Exception $exception){
            return $exception->getMessage();

            // This is demo.
            // return response()->json([
            //     'message' => 'Cannot delete category with id 3 because it is referenced by products.',
            //     'error' => $exception->getMessage()
            // ], 400);
        }

    }

}
