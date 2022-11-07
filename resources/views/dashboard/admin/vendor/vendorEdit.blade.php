@extends('layouts.app')

@section('contentAdmin')
    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

            <div class="card">
                <div class="card-body">
                    <h2>Edit Vendor Baru</h2>
                    <form class="row g-3" method="POST" action="/admin/vendor/{{ $vendor->id }}" autocomplete="off">
                        @method('put')
                        @csrf
                        <div class="col-md-6">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="name"
                                name="nama" value="{{ old('nama', $vendor->nama) }}" autofocus required>
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control  @error('alamat') is-invalid @enderror" id="alamat"
                                name="alamat" value="{{ old('alamat', $vendor->alamat) }}" required>
                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="nohp" class="form-label">No HP</label>
                            <input type="text" class="form-control @error('nohp') is-invalid @enderror" id="nohp"
                                name="nohp" value="{{ old('nohp', $vendor->nohp) }}" required>
                            @error('nohp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                required value="{{ old('email', $vendor->email) }}">
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
@endsection
