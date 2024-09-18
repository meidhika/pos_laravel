<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Sales;
use App\Models\SalesDetail;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Auth::user();
        $categories = Category::get();
        $id_transaksi = Sales::max('id');
        $id_transaksi++;
        $kode_transaksi = "SL" . date("dmY") . sprintf("%03s", $id_transaksi);
        
        return view('penjualan.index', compact('categories', 'kode_transaksi'));
    }
    public function getKode(){
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $dateFormat = date('Y-m-d');
        $sales = Sales::create([
            'trans_code' => $request->kode_transaksi,
            'trans_date' => $dateFormat,
            'trans_paid'=>$request->dibayar,
            'trans_total_price'=> $request->total_price,
            'trans_change'=>$request->kembalian,
        ]);
        foreach($request->product_id as $key => $product){
            SalesDetail::create([
                'sales_id' => $sales->id,
                'product_id'=>$request->product_id[$key],
                'qty' =>$request->qty[$key],
                'sub_total'=> $request->sub_total[$key]
            ]);
        }
        Alert::success('Yeaaay !!', 'Transaksi Anda Berhasil');
        return redirect()->to('print/'.$sales->id )->with('message', 'Transaksi Berhasil Dilakukan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getProducts($category_id){
        $products = Product::where('category_id', $category_id)->get();
        return response()->json($products);
    }

    public function getProduct($product_id){
        $product = Product::findOrFail($product_id);
        return response()->json($product);
    }

    public function print($id_sales){
        $sales = Sales::where('id', $id_sales)->first();
        $detail_sales = SalesDetail::with('product')->where('sales_id', $id_sales)->get();
        return view('penjualan.print', compact('sales', 'detail_sales'));
    }
}
