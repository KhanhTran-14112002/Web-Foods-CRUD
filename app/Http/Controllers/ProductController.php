<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'this is view product index';
        $x1 = 5;
        $myphone = [
            'phone' => 'ip',
            'year' => 2022
        ];

        $test = [
            [
                'property1' => 'value1',
                'property2' => 'value2',
                // Các thuộc tính khác
            ],
            [
                'property1' => 'value1',
                'property2' => 'value2',
                // Các thuộc tính khác
            ]];
        return view('products.index', compact('title', 'x1', 'myphone', 'test'));
//        return view('products.index', ['myphone1' => $myphone]);
    }

    public function detail($id,$productName)  //$productName
    {
        return 'product id = '. $id.' productName = '.$productName;
//        $myphones = [
//            'ip' => 'ip',
//            'samsung' => 'samsung'
//        ];
//        return view('products.index', ['products' => $myphones[$productName] ?? 'unknowproducts']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
