<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class QrcodeController extends Controller
{
    public function __construct(){

        //$this->middleware('permission:qrcode-list', ['only' => ['index']]);
        $this->middleware('permission:qrcode-print', ['only' => ['index']]);

    }

    public function index(){
        $products = DB::table('product')->where('is_active', 1)
        ->select('sku_barcode_id', 'name', 'price')
        ->paginate(8);
        return view('qrcodes.index')->with('products', $products);
    }

    public function checkProduct($sku_id) {
        $product = DB::table('product')->where('sku_barcode_id', $sku_id)->first();

        if ($product == null) {
            return response()->json([
                'product' => null,
                'error' => 'Product not found.',
            ]);
        }

        return response()->json([
            'product' => $product,
            'error' => null,
        ]);
    }

    public function getProduct() {

        $products = DB::table('product')->get();

        if ($products == null) {
            return response()->json([
                'product' => null,
            ]);
        }

        return response()->json([
            'product' => $products,
        ]);
    }
}
