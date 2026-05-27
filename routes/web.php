<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return ['Laravel' => app()->version()];
    return view('welcome');
});

Route::get('/api', function (){
    // If you want to get all the data from the table, you can use the get() method to retrieve all records as a collection.
    // $invoice = DB::table('profiles')->get();

    // If you want to get a single record, you can use the first() method to retrieve the first matching record as an object.
    // $invoice = DB::table('profiles')->first();

    // If you want to get a specific record based on a condition, 
    // you can use the where() method to specify the condition and 
    // then call first() to retrieve the matching record.
    // $invoice = DB::table('profiles')->where('id', 2)->first();

    // First 3 records
    // $invoice = DB::table('profiles')->limit(3)->get();
    // $invoice = DB::table('profiles')->take(3)->get();

    // Multiple conditions
    // $invoice = DB::table('profiles')->where('city','Dhaka')->where('firstName', 'Rafat')->orWhere('lastName', 'Rafat')->first();

    // how may paid invoices are there in the database
    // $invoice = DB::table('invoices')->where('paid', 1)->count(); // this is example of aggregate function

    // Select specific columns from the table
    // $invoice = DB::table('profiles')->select('firstName', 'lastName')->where('id', 2)->get();
    // return response()->json($invoice);

    // Find maximum value of a column
    $max = DB::table('products')->max('price');
    // return response()->json($max);

    // Find products with maximum price
    // $products = DB::table('products')->where('price', DB::table('products')->max('price'))->first();
    //    $products = DB::table('products')->where('price', $max)->first(); // When you know the max value beforehand, you can directly use it in the where clause to find the products with that maximum price.
    // return response()->json($products);

    // All 
    // $products = DB::table('products')->get();
    // return response()->json($products);
    
    // Get the sum of the price column for products with specific conditions.
    // Spacific condition a price sum kora.
    // $products = DB::table('products')->where('title', 'New Year Special Shoe')->where('discount', 5)->sum('price');
    // return $products;

    // Dummy Query for testing join query
    //////////////////////////////////////// This is demo example of join query.
    // SELECT ID, CLIENT, TOTOAL_PRICE from INVOICES join INVOICE_ITEMS ON invoices.id = invoice_items.invoice_id WHERE invoices.id = 1

    // $invoice = DB::table('invvoices')
    // ->join('invoice_items', 'invoices.id', '=', 'invoice_items.invoice_id')
    // ->select('invoice_items.id as item_id', 'invoices.id', 'invoices.client', 'invoices.total_price', 'invoice_items.title', 'invoice_items.total_price as item_total_price')
    // ->where('invoices.id', 1)
    // ->get();
    // return $invoice;

    
    // $invoice = DB::select('SELECT invoice_items.id as item_id, invoices.id, invoices.client, invoices.total_price, invoice_items.title, invoice_items.total_price as item_total_price FROM invoices JOIN invoice_items ON invoices.id = invoice_items.invoice_id WHERE invoices.id = 1');

    
    //////////////////////////////////////////////////////////////////////
    // Products table join with product_carts table to get the product details along with the color and size from the product_carts table.
    //  $products = DB::table('products')
    // ->join('product_carts', 'products.id', '=', 'product_carts.product_id')
    // ->select(
    //     'products.id',
    //     'products.discount_price',
    //     'products.price',
    //     'product_carts.color',
    //     'product_carts.size'
    // )
    // ->get();
    // return response()->json($products);
    // ============================================

    // Products table join with product_carts table and categories table to get the product details along with the color, size and category name from the respective tables.
    // $products = DB::table('products')
    // ->join('product_carts', 'products.id', '=', 'product_carts.product_id')
    // ->join('categories', 'products.category_id', '=', 'categories.id')
    // ->select(
    //     'products.id',
    //     'products.price',
    //     'products.discount_price',
    //     'categories.categoryName as category_name'
    // )
    // ->get();
// ============================================
    // Raw SQL query for join
    // $products = DB::select('SELECT id, discount_price, price FROM products WHERE id = ?', [1]);
    // return response()->json($products);


    // ============================

    // update query
    // $updated = DB::table('products')
    // ->where('id', 1)
    // ->update(['price' => 100, 'discount_price' => 80]);
    // return response()->json($updated);
    // ============================

    // delete query
    // $deleted = DB::table('products')
    // ->where('id', 1)
    // ->delete();
    // return response()->json($deleted);   

    //===========================
    $invoice = DB::table('products')->limit(3)->offset(2)->get();
    return response()->json($invoice);

    // get dila data obj asa & first() dila data json format a asa. 58.32 baki

});
require __DIR__.'/auth.php';
