@extends('admin.master')

@section('title')
    Update category
@endsection

@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <!-- begin:: Content Head -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">

                    <h3 class="kt-subheader__title">
                        Update Category
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
                                <form class="kt-form" id="kt_user_add_form" novalidate="novalidate" action="{{url("categories/{$category->id}")}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                                        <div class="kt-heading kt-heading--md">Category:</div>
                                        <div class="kt-section kt-section--first">
                                            <div class="kt-wizard-v4__form">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="kt-section__body">
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Name</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input class="form-control" type="text" value="{{$category->name}}" name="name" required>
                                                                    @if ($errors->has('name'))
                                                                        <span class="error invalid-feedback d-block">{{ $errors->first('name') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Slug</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input class="form-control" type="text" value="{{$category->slug}}" name="slug">
                                                                    @if ($errors->has('slug'))
                                                                        <span class="error invalid-feedback d-block">{{ $errors->first('slug') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Details</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input class="form-control" type="text" value="{{$category->details}}" name="details">
                                                                    @if ($errors->has('details'))
                                                                        <span class="error invalid-feedback d-block">{{ $errors->first('details') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Unit</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input class="form-control" type="text" value="{{$category->unit}}" name="unit">
                                                                    @if ($errors->has('unit'))
                                                                        <span class="error invalid-feedback d-block">{{ $errors->first('unit') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Parent category</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <select name="parent_id" class="form-control">
                                                                        <option value="">Please select one</option>
                                                                        @foreach($categories as $category_single)
                                                                            <option value="{{$category_single->id}}" {{$category_single->id == $category->parent_id ? 'selected' : '' }}>{{$category_single->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @if ($errors->has('parent_id'))
                                                                        <span class="error invalid-feedback d-block">{{ $errors->first('parent_id') }}</span>
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
