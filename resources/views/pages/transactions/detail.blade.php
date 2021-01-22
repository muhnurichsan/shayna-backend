@extends('layouts.default')
@section('content')
<h2>Detail Transaksi {{$item->uuid}}</h2>
<table class="table table-bordered">
    <tr>
        <th>Name
        </th>
        <td>{{$item->name}}</td>
    </tr>
    <tr>
        <th>Email
        </th>
        <td>{{$item->email}}</td>
    </tr>
    <tr>
        <th>Number
        </th>
        <td>{{$item->number}}</td>
    </tr>
    <tr>
        <th>Address
        </th>
        <td>{{$item->address}}</td>
    </tr>
    <tr>
        <th>Transaction Total
        </th>
        <td>{{$item->transaction_total}}</td>
    </tr>
    <tr>
        <th>Status
        </th>
        <td>{{$item->transaction_status}}</td>
    </tr>
    <tr>
        <th>Pembelian Produk</th>
        <td>
            <table class="table table-bordered w-100">
               <tr>
                <th>Nama</th>
                <th>Tipe</th>
                <th>harga</th>
               </tr>
               @foreach ($item->details as $item)
                   <tr>
                        <td>{{$item->product->name}}</td>
                        <td>{{$item->product->type}}</td>
                        <td>${{$item->product->price}}</td>
                   </tr>
               @endforeach
            </table>
        </td>
    </tr>
</table>
<div class="row">
    <div class="col-md-4">
        <a href="{{route('transactions.status',$item->id)}}?status=SUCCESS" class="btn btn-success">
        <i class="fa fa-check" aria-hidden="true"></i> Set Success</a>
    </div>
    <div class="col-md-4">
        <a href="{{route('transactions.status',$item->id)}}?status=FAILED" class="btn btn-danger">
        <i class="fa fa-times" aria-hidden="true"></i> Set Failed</a>
    </div>
    <div class="col-md-4">
        <a href="{{route('transactions.status',$item->id)}}?status=PENDING" class="btn btn-warning">
        <i class="fa fa-spinner" aria-hidden="true"></i> Set Pending</a>
    </div>
</div>

@endsection