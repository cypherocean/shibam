@extends('admin.layouts.app')

@section('meta')
@endsection

@section('title')
Product
@endsection

@section('styles')
<link href="{{ asset('backend/assets/css/sweetalert2.bundle.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Product</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-muted">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}" class="text-muted">Product</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">List</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">
            <div class="customize-input float-right">
                <a class="btn waves-effect waves-light btn-rounded btn-outline-primary pull-right" href="{{ route('admin.product.create') }}">Add New</a>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered data-table" id="data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Category Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Theme JS -->
<script src="{{ asset('backend/assets/js/promise.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/sweetalert2.bundle.js') }}"></script>
<!-- Page JS -->
<script src="{{ asset('backend/project/product/index.js') }}"></script>
@endsection