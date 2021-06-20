@extends('admin.master')

@section('title')
    Update supplier
@endsection

@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <!-- begin:: Content Head -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">

                    <h3 class="kt-subheader__title">
                        Update Supplier
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
                                <form class="kt-form" id="kt_user_add_form" novalidate="novalidate" action="{{url("suppliers/{$supplier->id}")}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                                        <div class="kt-heading kt-heading--md">Supplier:</div>
                                        <div class="kt-section kt-section--first">
                                            <div class="kt-wizard-v4__form">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="kt-section__body">
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Name</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input class="form-control" type="text" value="{{$supplier->name}}" name="name" required>
                                                                    @if ($errors->has('name'))
                                                                        <span class="error invalid-feedback d-block">{{ $errors->first('name') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Supplier code</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input class="form-control" type="text" value="{{$supplier->code}}" name="code">
                                                                    @if ($errors->has('code'))
                                                                        <span class="error invalid-feedback d-block">{{ $errors->first('code') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Email</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input class="form-control" type="email" value="{{$supplier->email}}" name="email">
                                                                    @if ($errors->has('email'))
                                                                        <span class="error invalid-feedback d-block">{{ $errors->first('email') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Phone</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input class="form-control" type="text" value="{{$supplier->phone}}" name="phone">
                                                                    @if ($errors->has('phone'))
                                                                        <span class="error invalid-feedback d-block">{{ $errors->first('phone') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Address</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input class="form-control" type="text" value="{{$supplier->address}}" name="address">
                                                                    @if ($errors->has('address'))
                                                                        <span class="error invalid-feedback d-block">{{ $errors->first('address') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Date of birth</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input class="form-control" type="date" value="{{$supplier->dob}}" name="dob">
                                                                    @if ($errors->has('dob'))
                                                                        <span class="error invalid-feedback d-block">{{ $errors->first('dob') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Gender</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <select name="sex" class="form-control">
                                                                        <option value="">Please select one</option>
                                                                        <option {{$supplier->sex == 0 ? 'selected' : '' }} value="0">Male</option>
                                                                        <option {{$supplier->sex == 1 ? 'selected' : '' }} value="1">Female</option>
                                                                    </select>
                                                                    @if ($errors->has('sex'))
                                                                        <span class="error invalid-feedback d-block">{{ $errors->first('sex') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Active</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <select name="is_active" class="form-control">
                                                                        <option value="">Please select one</option>
                                                                        <option {{$supplier->is_active == 0 ? 'selected' : '' }} value="0">Inactive</option>
                                                                        <option {{$supplier->is_active == 1 ? 'selected' : '' }} value="1">Active</option>
                                                                    </select>
                                                                    @if ($errors->has('is_active'))
                                                                        <span class="error invalid-feedback d-block">{{ $errors->first('is_active') }}</span>
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
