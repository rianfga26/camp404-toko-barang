<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->search != null){
            $products = ProductModel::where('nama', 'like', "%".$request->search."%")->paginate(8);
        }else{
            $products = ProductModel::paginate(8);
        }
        return view('product', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = ProductModel::get();
        return view('auth.barang', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:product',
            'image' => 'required',
            'jumlah' => 'required|numeric',
            'harga' => 'required|numeric'
        ], [
            'required' => 'Field :attribute harus diisi.',
            'numeric' => 'Field :attribute harus diisi angka.',
            'unique' => ':attribute yang anda masukkan sudah tersedia.',
        ]);

        $product = $request->all();
        
        ProductModel::create($product);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductModel  $productModel
     * @return \Illuminate\Http\Response
     */
    public function show(ProductModel $productModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductModel  $productModel
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductModel $product)
    {
        return $product;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductModel  $productModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductModel $product)
    {
        $rules = [
            'image' => 'required',
            'jumlah' => 'required|numeric',
            'harga' => 'required|numeric'
        ];
        
        $message = [
            'required' => 'Field :attribute harus diisi.',
            'numeric' => 'Field :attribute harus diisi angka.',
            'unique' => ':attribute yang anda masukkan sudah tersedia.'
        ];

        if($request->nama != $product->nama){
             $rules['nama'] = 'required|unique:product';
        }

        $data = $request->validate($rules, $message);

        ProductModel::where('id', $product->id)->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductModel  $productModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductModel $product)
    {
        ProductModel::destroy($product->id);
        return redirect()->back();
    }

}
