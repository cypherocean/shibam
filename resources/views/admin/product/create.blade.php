@extends('admin.layouts.app')

@section('meta')
@endsection

@section('title')
Product Insert
@endsection

@section('styles')
<link href="{{ asset('backend/assets/css/dropify.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/assets/css/sweetalert2.bundle.css') }}" rel="stylesheet">
<link href="{{ asset('backend/assets/css/select2.css') }}" rel="stylesheet">
<link href="{{ asset('backend/assets/css/select2_bootstrap.css') }}" rel="stylesheet">
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
                        <li class="breadcrumb-item text-muted active" aria-current="page">Insert</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.product.insert') }}" name="form" id="form" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="category">Category</label>
                                <select name="category" id="category" class="form-control category_dd" data-placeholder="Select Category">
                                    <option value="">Select Category</option>
                                    @if(!empty($data))
                                    @foreach($data AS $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                <span class="kt-form__help error category"></span>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Plese enter title" value="{{ @old('title') }}">
                                <span class="kt-form__help error title"></span>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="product_description">Description</label>
                                <textarea type="text" name="product_description" id="product_description" placeholder="Plese enter description">{{ @old('product_description') }}</textarea>
                                <span class="kt-form__help error product_description"></span>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="photo">Image</label>
                                <input type="file" class="form-control dropify" id="photo" name="photo[]" data-allowed-file-extensions="jpg png jpeg" data-max-file-size-preview="2M" multiple>
                                <span class="kt-form__help error photo"></span>
                            </div>
                            <div class="form-group col-sm-12" id="variant-template-1">
                                <div class="row">
                                    <div class="form-group col-sm-10">
                                        <label for="variant">Variant</label>
                                        <input type="text" class="form-control" id="variant" name="variant[]" placeholder="Please enter variant" value="{{ @old('variant') }}">
                                        <span class="kt-form__help error variant"></span>
                                    </div>
                                    <div class="form-group col-sm-2">
                                        <label for="variant"></label>
                                        <span class="btn waves-effect waves-light btn-rounded btn-outline-primary clone-add"><i class="fa fa-plus"></i></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn waves-effect waves-light btn-rounded btn-outline-primary" id="submit">Submit</button>
                            <a href="{{ route('admin.product.index') }}" class="btn waves-effect waves-light btn-rounded btn-outline-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Theme JS -->
<script src="{{ asset('backend/assets/js/dropify.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/promise.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/sweetalert2.bundle.js') }}"></script>
<script src="{{ asset('backend/assets/js/select2.js') }}"></script>
<script src="{{ asset('backend/assets/js/ckeditor.js') }}"></script>
<script src="{{ asset('assets/js/validate.js') }}"></script>

<!-- Page JS -->
<script src="{{ asset('backend/project/product/create.js') }}"></script>
@endsection