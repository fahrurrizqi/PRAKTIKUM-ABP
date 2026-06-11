@extends('template')

@section('title', 'Form ' . $title . ' Produk')

@section('content')
<div class="col-md-6 mt-4"> 
    <div class="card-custom">
        <h4 class="mb-4 fw-bold">Form {{ $title }} Produk</h4> 
        <form method="POST" action="{{ $route }}"> 
            @csrf 
            @if($method === 'PUT') 
                @method('PUT') 
            @endif 
            <div class="mb-3"> 
                <label for="name" class="form-label text-secondary">Nama Produk</label> 
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product->name) }}" style="background: rgba(15, 23, 42, 0.6); color: #fff; border: 1px solid rgba(255, 255, 255, 0.1);"> 
                @error('name') 
                    <div class="invalid-feedback">{{ $message }}</div> 
                @enderror 
            </div> 
            <div class="mb-4"> 
                <label for="price" class="form-label text-secondary">Harga</label> 
                <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $product->price) }}" style="background: rgba(15, 23, 42, 0.6); color: #fff; border: 1px solid rgba(255, 255, 255, 0.1);"> 
                @error('price') 
                    <div class="invalid-feedback">{{ $message }}</div> 
                @enderror 
            </div> 
            <div class="d-flex justify-content-between"> 
                <a href="{{ route('product.index') }}" class="btn btn-outline-secondary px-4">Kembali</a> 
                <button type="submit" class="btn btn-success px-4">Simpan</button> 
            </div> 
        </form> 
    </div> 
</div> 
@endsection
