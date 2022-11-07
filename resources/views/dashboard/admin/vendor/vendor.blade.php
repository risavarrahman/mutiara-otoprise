@extends('layouts.app')

@section('requiredStyle')
    <link rel="stylesheet" type="text/css" href="{{ asset('theme-v1/src/assets/css/light/elements/alert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme-v1/src/assets/css/dark/elements/alert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme-v1/src/assets/css/light/scrollspyNav.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme-v1/src/assets/css/dark/scrollspyNav.css') }}">
    <script src="{{ asset('theme-v1/src/assets/js/jquery-3.6.1.min.js') }}"></script>
@endsection

@section('contentAdmin')
    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            @if (session()->has('success'))
                <div class="alert alert-light-success alert-dismissible fade show border-0 mb-4" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-x close" data-bs-dismiss="alert">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg></button>
                    <strong>{{ session('success') }}</strong></button>
                </div>
            @endif
            <div class="row">
                <div class="col">
                    <a href="/admin/vendor/create" class="btn btn-primary mb-3"> Tambah </a>
                </div>
                <div class="col">
                    <input type="text" name="search" id="search" placeholder="Search" class="form-control mb-3 ">
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="allData">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No HP</th>
                            <th scope="col">Email</th>
                            <th class="text-center" scope="col">Action</th>
                        </tr>
                        <tr aria-hidden="true" class="mt-3 d-block table-row-hidden"></tr>
                    </thead>
                    <tbody>
                        @foreach ($vendor as $vendor)
                            <tr>
                                <td>{{ $vendor->nama }}</td>
                                <td>{{ $vendor->alamat }}</td>
                                <td>{{ $vendor->nohp }}</td>
                                <td>{{ $vendor->email }}</td>
                                <td class="text-center">
                                    <a href="/admin/vendor/{{ $vendor->id }}/edit" class="btn btn-success">Edit</a>
                                    <form action="/admin/vendor/{{ $vendor->id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger border-0"
                                            onclick="return confirm('Are you sure?');">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <table id="searchData" class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No HP</th>
                            <th scope="col">Email</th>
                            <th class="text-center" scope="col">Action</th>
                        </tr>
                        <tr aria-hidden="true" class="mt-3 d-block table-row-hidden"></tr>
                    </thead>
                    <tbody id="Content">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $("#searchData").hide();
        $(document).ready(function() {
            $("#search").keyup(function() {
                let value = $(this).val();

                if (value) {
                    $("#allData").hide();
                    $("#searchData").show();
                } else {
                    $("#allData").show();
                    $("#searchData").hide();
                }

                $.ajax({
                    type: "get",
                    url: "{{ url('admin/vendor/search') }}",
                    data: {
                        'search': value
                    },
                    success: function(data) {
                        $('#Content').html(data);
                    }
                });
            });
        });
    </script>
@endsection
