<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;

class ProductController extends Controller
{

    private $products = [];

    function __construct()
    {
        $this->products = [
            (object)[
                'id'    =>  1,
                'name'  =>  'New Shoes'
            ],
            (object)[
                'id'    =>  2,
                'name'  =>  'Cool T-shirt'
            ],
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->products);
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
        $product = new stdClass();
        $product->name = $request->input('name');
        $product->id = date_timestamp_get(date_create());

        array_push($this->products, $product);

        print_r($this->products);

        return response()->json([
            'success'   =>  true,
            'data'      =>  $product,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $search = array_filter($this->products, fn ($item) => $item->id === $id);
        $product = reset($search);

        return response()->json([
            'success'   =>  true,
            'data'      =>  $product,
        ]);
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
    public function update(Request $request, int $id)
    {
        $search = array_filter($this->products, fn ($item) => $item->id === $id);
        $product = reset($search);

        $product->name = $request->input('name');

        return response()->json([
            'success'   =>  true,
            'data'      =>  $product,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $search = array_filter($this->products, fn ($item) => $item->id === $id);
        $key = array_key_first($search);
        unset($this->products[$key]);

        var_dump($this->products);
    }
}
