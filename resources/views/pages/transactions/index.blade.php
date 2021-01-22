@extends('layouts.default')

@section('content')
<div class="orders">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Daftar Transaksi Masuk</h4>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table ">
                            <thead>
                                <tr class="text-center">
                                    <th class="serial">#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Number</th>
                                    <th>Transaction Total</th>
                                    <th>Transaction Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $item)
                                <tr class="text-center">
                                    <td>
                                        {{$item->id}}
                                    </td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->number}}</td>
                                    <td>${{$item->transaction_total}}</td>
                                    <td>
                                        @if ($item->transaction_status=='PENDING')
                                        <span class="badge badge-warning">{{$item->transaction_status}}</span>
                                        @elseif ($item->transaction_status=='SUCCESS')
                                            <span class="badge badge-success">{{$item->transaction_status}}</span>
                                        @elseif ($item->transaction_status=='FAILED')
                                            <span class="badge badge-danger">{{$item->transaction_status}}</span>
                                        @else
                                            <span></span>
                                        @endif
                                    </td>
                                    <td width="200">
                                        @if ($item->transaction_status=='PENDING')
                                            <a href="{{route('transactions.status',$item->id)}}?status=SUCCESS" class="btn btn-success">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                            </a>
                                        <a href="{{route('transactions.status',$item->id)}}?status=FAILED" class="btn btn-warning">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                        </a>
                                        @endif
                                        <a href="{{route('transactions.show',$item->id)}}"
                                        class="btn btn-info"
                                        >
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{route('transactions.edit',$item->id)}}" class="btn btn-primary">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form action="{{route('transactions.destroy',$item->id)}}" method="POST" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="12" class="text-center">
                                        Data Kosong
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div> <!-- /.table-stats -->
                </div>
            </div> <!-- /.card -->
        </div>  <!-- /.col-lg-8 -->
    </div>
</div>
@endsection