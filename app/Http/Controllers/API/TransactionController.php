<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function get($id){
        $product=Transaction::with(['details.product'])->find($id);
        if($product)
        return ResponseFormatter::success($product,'data transaksi berhasil diambil');
        else
        return ResponseFormatter::error(null,'data tidak ada',404);
    }
} 
