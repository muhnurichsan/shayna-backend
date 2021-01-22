@extends('layouts.default')

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Ubah Barang</strong>
    </div>
    <div class="card-body card-block">
    <form action="{{route('products.update',$items->id)}}" method="POST">
      @csrf
      @method('put')
            <div class="form-group">
                <label for="name">Nama Barang</label>
                <input type="text"
                  class="form-control @error('name') is-invalid @enderror" name="name" id="name"value="{{old('name') ? old('name') : $items->name}}" placeholder="Masukkan Nama Barang">
                  @error('name')
                  <div>{{$message}}</div>
                  @enderror
              </div>
              <div class="form-group">
                <label for="type">Tipe Barang</label>
                <input type="text"
                  class="form-control @error('type') is-invalid @enderror" name="type" id="type" value="{{old('type') ? old('type') : $items->type}}" placeholder="Masukkan Tipe Barang">
                  @error('type')
                  <div>{{$message}}</div>
                  @enderror
              </div>
              <div class="form-group">
                <label for="description">deskripsi</label>
                <textarea name="description" rows="5" id="description" class="form-control @error('type') is-invalid @enderror ckeditor" value="{{$items->description}}"></textarea>
                @error('description')
                  <div>{{ $message }} </div>
                  @enderror
              </div>
              <div class="form-group">
                  <label for="price">Harga Barang</label>
                  <input type="number"
                    class="form-control @error('price') is-invalid @enderror" name="price" id="price" value="{{old('price') ? old('price') : $items->price }}" placeholder="Masukkan Harga Barang">
                    @error('price')
                    <div>{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="quantity">Stock Barang</label>
                    <input type="number"
                      class="form-control @error('quantity') is-invalid @enderror" name="quantity" id="quantity" value="{{old('quantity') ? old('quantity') : $items->quantity}}" placeholder="Masukkan Jumlah Stock Barang">
                      @error('quantity')
                      <div>{{$message}}</div>
                      @enderror
                </div>
                <button class="btn btn-primary btn-block" type="submit">Ubah Barang</button>
        </form>
    </div>
</div>
@endsection
@push('after-script')
<script src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
            .create( document.querySelector( '.ckeditor' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>
@endpush