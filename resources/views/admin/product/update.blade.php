@extends('admin.master')

@section('title')
    Update product
@endsection

@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <!-- begin:: Content Head -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">

                    <h3 class="kt-subheader__title">
                        Update Product
                    </h3>

                    <span class="kt-subheader__separator kt-subheader__separator--v"></span>

                    <div class="kt-subheader__group" id="kt_subheader_search">
                        <span class="kt-subheader__desc" id="kt_subheader_total">
                           Please enter the information below
                        </span>

                    </div>

                </div>
                <div class="kt-subheader__toolbar">

                    <a href="{{url('/')}}" class="btn btn-default btn-bold">
                        <i class="la la-long-arrow-left"></i> Back
                    </a>

                </div>
            </div>
        </div>
        <!-- end:: Content Head -->
        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="kt-wizard-v4" id="kt_user_add_user" data-ktwizard-state="first">
                <div class="kt-portlet">
                    <div class="kt-portlet__body kt-portlet__body--fit">
                        <div class="kt-grid">
                            <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v4__wrapper">
                                <form class="kt-form" id="kt_user_add_form" novalidate="novalidate" action="{{url("products/{$product->id}")}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                                        <div class="kt-heading kt-heading--md">Product:</div>
                                        <div class="kt-section kt-section--first">
                                            <div class="kt-wizard-v4__form">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="kt-section__body">
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Name</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input class="form-control" type="text" value="{{$product->name}}" name="name">
                                                                    @if ($errors->has('name'))
                                                                        <span class="error invalid-feedback d-block">{{ $errors->first('name') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Code</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input class="form-control" type="text" value="{{$product->code}}" name="code">
                                                                    @if ($errors->has('code'))
                                                                        <span class="error invalid-feedback d-block">{{ $errors->first('code') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Description</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input class="form-control" type="text" value="{{$product->description}}" name="description">
                                                                    @if ($errors->has('description'))
                                                                        <span class="error invalid-feedback d-block">{{ $errors->first('description') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Category</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <select name="category_id" class="form-control" required>
                                                                        <option value="">Please select one</option>
                                                                        @foreach($categories as $category)
                                                                            <option value="{{$category->id}}" {{$category->id == $product->category_id ? 'selected' : '' }}>{{$category->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @if ($errors->has('category_id'))
                                                                        <span class="error invalid-feedback d-block">{{ $errors->first('category_id') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-form__actions">
                                        <button class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" type="submit">
                                            Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
