@extends('admin.layouts.app')

@section('meta')
@endsection

@section('title')
Product Edit
@endsection

@section('styles')
<link href="{{ asset('backend/assets/css/dropify.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/assets/css/sweetalert2.bundle.css') }}" rel="stylesheet">
<link href="{{ asset('backend/assets/css/select2.css') }}" rel="stylesheet">
<link href="{{ asset('backend/assets/css/select2_bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('backend/assets/extra-libs/prism/prism.css') }}" rel="stylesheet">
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
                        <li class="breadcrumb-item text-muted active" aria-current="page">Edit</li>
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
                    <form action="{{ route('admin.product.update') }}" name="form" id="form" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="category">Category</label>
                                <select name="category" id="category" class="form-control category" data-placeholder="Select Category">
                                    <option value="">Select Category</option>
                                    @if(!empty($categories))
                                    @foreach($categories AS $category)
                                    <option value="{{ $category->id }}" @if ($category->id == $data->product_category_id) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                <span class="kt-form__help error category"></span>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Plese enter title" value="{{ $data->title ?? '' }}">
                                <span class="kt-form__help error title"></span>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="product_description">Description</label>
                                <textarea type="text" name="product_description" id="product_description" class="form-control" placeholder="Plese enter description">{{ $data->product_description ?? '' }}</textarea>
                                <span class="kt-form__help error product_description"></span>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="photo">Image</label>
                                <input type="file" class="form-control dropify" id="photo" name="photo[]" data-default-file="{{ $data->image ??'' }}" data-allowed-file-extensions="jpg png jpeg" data-max-file-size-preview="2M" multiple>
                                <span class="kt-form__help error photo"></span>
                            </div>

                            <div class="form-group col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            @if(!empty($images))
                                            @foreach($images AS $image)
                                            <div class="col-lg-4 mb-4">
                                                <img src="{{ URL('/public/uploads/product') }}/{{$image->image}}" alt="image" class="rounded-circle" width="200" height="150">
                                                <p class="mt-3 mb-0">
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if(isset($data->product_variant))
                            @php
                            $product_variant = explode(",",$data->product_variant);
                            @endphp
                            @foreach($product_variant AS $key => $product_variant)
                            <div class="form-group col-sm-12" id="variant-template-{{ $key+1 }}">
                                <div class="row">
                                    <div class="form-group col-sm-10">
                                        <label for="variant">Variant</label>
                                        <input type="text" class="form-control" id="variant" name="variant[]" placeholder="Please enter variant" value="{{ $product_variant }}">
                                        <span class="kt-form__help error variant"></span>
                                    </div>
                                    <div class="form-group col-sm-2">
                                        <label for="variant"></label>
                                        @if($key+1 == 1)
                                        <span class="btn waves-effect waves-light btn-rounded btn-outline-primary clone-add"><i class="fa fa-plus"></i></span>
                                        @else
                                        <span class="btn waves-effect waves-light btn-rounded btn-outline-primary clone-minus" data-id="{{ $key+1 }}"><i class="fa fa-minus"></i></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn waves-effect waves-light btn-rounded btn-outline-primary">Submit</button>
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
<script src="{{ asset('backend/assets/extra-libs/prism/prism.js') }}"></script>
<script src="{{ asset('backend/assets/js/ckeditor.js') }}"></script>

<!-- Page JS -->
<script src="{{ asset('backend/project/product/edit.js') }}"></script>
@endsection