@extends('layouts.default')

@section('content')
<div class="card">
    <div class="card-header">
      <strong>Ubah Transaksi {{$item->uuid}}</strong>
    </div>
    <div class="card-body card-block">
    <form action="{{route('transactions.update',$item->id)}}" method="POST">
      @csrf
      @method('put')
            <div class="form-group">
                <label for="name">Nama Pemesan</label>
                <input type="text"
                  class="form-control @error('name') is-invalid @enderror" name="name" id="name"value="{{old('name') ? old('name') : $item->name}}" >
                  @error('name')
                  <div>{{$message}}</div>
                  @enderror
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email"
                  class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{old('email') ? old('email') : $item->email}}">
                  @error('email')
                  <div>{{$message}}</div>
                  @enderror
              </div>
              <div class="form-group">
                  <label for="number">Nomor</label>
                  <input type="text"
                    class="form-control @error('number') is-invalid @enderror" name="number" id="number" value="{{old('number') ? old('number') : $item->number }}" >
                    @error('number')
                    <div>{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Alamat</label>
                    <input type="text"
                      class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{old('address') ? old('address') : $item->address}}">
                      @error('address')
                      <div>{{$message}}</div>
                      @enderror
                </div>
                <button class="btn btn-primary btn-block" type="submit">Ubah Transaksi</button>
        </form>
    </div>
</div>
@endsection
