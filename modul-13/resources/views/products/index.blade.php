@extends('template') 
 
@section('title', 'Daftar Produk') 
 
@section('content') 
<div class="col-md-11 mt-4"> 
    <div class="card-custom">
        @if(session('success')) 
            <div class="alert alert-success border-0 bg-success text-white bg-opacity-75 mb-4">{{ session('success') }}</div> 
        @endif 
        <div class="d-flex justify-content-between align-items-center mb-4"> 
            <h4 class="mb-0 fw-bold">Daftar Produk</h4>
            <a href="{{ route('product.create') }}" class="btn btn-primary px-4">Tambah Produk</a> 
        </div> 
        <table class="table table-bordered table-striped align-middle"> 
            <thead> 
                <tr> 
                    <th>Nama</th> 
                    <th>Harga</th> 
                    <th>Variant & Spesifikasi</th> 
                    <th style="width: 120px;" class="text-center">Aksi</th> 
                </tr> 
            </thead> 
            <tbody> 
                @forelse($products as $product) 
                <tr> 
                    <td class="fw-bold">{{ $product->name }}</td> 
                    <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td> 
                    <td>
                        @if($product->variants->isNotEmpty())
                            <ul class="mb-2 text-start" style="padding-left: 20px;">
                                @foreach($product->variants as $var)
                                    <li class="mb-2">
                                        <span class="text-info fw-bold">{{ $var->name }}</span><br>
                                        <small class="text-secondary">
                                            Desc: {{ $var->description }} <br /> 
                                            Proc: {{ $var->processor }} | RAM: {{ $var->memory }} | Strg: {{ $var->storage }} <br /> 
                                            Product: <span class="text-warning">{{ $var->product->name }}</span>
                                        </small>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <span class="text-secondary d-block mb-2"><small>Belum ada variant.</small></span>
                        @endif

                        <!-- Collapsible Form to Add Variant -->
                        <button class="btn btn-sm btn-outline-success py-1 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#addVar-{{ $product->id }}">
                            + Tambah Variant
                        </button>
                        <div class="collapse mt-3" id="addVar-{{ $product->id }}">
                            <form action="{{ route('product.variant.store', $product->id) }}" method="POST" class="border p-3 rounded text-start" style="background: rgba(15, 23, 42, 0.4); border-color: rgba(255, 255, 255, 0.1) !important;">
                                @csrf
                                <h6 class="mb-3 fw-bold text-success">Tambah Variant Baru</h6>
                                <div class="mb-2">
                                    <input type="text" name="name" class="form-control form-control-sm text-white bg-dark bg-opacity-50 border-secondary" placeholder="Nama Variant (e.g. Ryzen Edition)" required>
                                </div>
                                <div class="mb-2">
                                    <textarea name="description" class="form-control form-control-sm text-white bg-dark bg-opacity-50 border-secondary" placeholder="Deskripsi Singkat" rows="2" required></textarea>
                                </div>
                                <div class="row g-2 mb-2">
                                    <div class="col-md-4">
                                        <input type="text" name="processor" class="form-control form-control-sm text-white bg-dark bg-opacity-50 border-secondary" placeholder="Processor" required>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="memory" class="form-control form-control-sm text-white bg-dark bg-opacity-50 border-secondary" placeholder="RAM" required>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="storage" class="form-control form-control-sm text-white bg-dark bg-opacity-50 border-secondary" placeholder="Storage" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-sm btn-success px-4 mt-2">Simpan Variant</button>
                            </form>
                        </div>
                    </td>
                    <td class="text-center"> 
                        <div class="d-flex flex-column gap-2 justify-content-center">
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-outline-primary">Edit</a> 
                            <form method="POST" action="{{ route('product.destroy', $product->id) }}" style="display:inline" onsubmit="return confirm('Yakin hapus?')"> 
                                @csrf  
                                @method('DELETE') 
                                <button class="btn btn-sm btn-outline-danger w-100">Hapus</button> 
                            </form> 
                        </div>
                    </td> 
                </tr>  
                @empty
                <tr>
                    <td colspan="4" class="text-center text-secondary py-4">Belum ada data produk.</td>
                </tr>
                @endforelse
            </tbody> 
        </table> 
    </div>
</div> 
@endsection
