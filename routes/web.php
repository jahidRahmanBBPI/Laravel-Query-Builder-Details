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
    $invoice = DB::table('profiles')->select('firstName', 'lastName')->where('id', 2)->get();
    return response()->json($invoice);
    // return $invoice;

});
require __DIR__.'/auth.php';
