@extends('layouts.default')

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Tambah Foto</strong>
    </div>
    <div class="card-body card-block">
    <form action="{{route('product-gallery.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
            <div class="form-group">
                <label for="name">Nama Barang</label>
                <select name="products_id" 
                  class="form-control @error('products_id') is-invalid @enderror">
                  @foreach ($items as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                  @endforeach
                  @error('products_id')
                  <div>{{$message}}</div>
                  @enderror
                </select>
              </div>
              <div class="form-group">
                  <label for="photo">Foto Barang</label>
                  <input type="file"
                    class="form-control @error('photo') is-invalid @enderror" name="photo" id="photo" value="{{old('photo')}}"  accept="image/*">
                    @error('photo')
                    <div>{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="is_default">Default</label>
                    <br>
                    <label>
                      <input type="radio"
                      class="form-control @error('is_default') is-invalid @enderror" name="is_default" id="quantity" value="1">
                      yes
                    </label>
                    &nbsp;
                    <label>
                      <input type="radio"
                      class="form-control @error('is_default') is-invalid @enderror" name="is_default" value="0" size="10">
                      No
                    </label>
                </div>
                <button class="btn btn-primary btn-block" type="submit">Tambah Foto Barang</button>
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