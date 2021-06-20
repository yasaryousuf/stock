@extends('admin.master')

@section('title')
    Create order
@endsection

@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <!-- begin:: Content Head -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">

                    <h3 class="kt-subheader__title">
                        Add order
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
                                <form class="kt-form" id="kt_user_add_form" novalidate="novalidate" action="{{url('orders')}}" method="post">
                                    @csrf
                                    <div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                                        <div class="kt-heading kt-heading--md">Order:</div>
                                        <div class="kt-section kt-section--first">
                                            <div class="kt-wizard-v4__form">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="kt-section__body">
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Customer</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <select name="customer_id" class="form-control">
                                                                        <option value="">Please select one</option>
                                                                        @foreach($customers as $customer)
                                                                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @if ($errors->has('customer_id'))
                                                                        <span class="error invalid-feedback d-block">{{ $errors->first('customer_id') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <table class="table table-striped table-bordered table-hover table-checkable" id="kt_table_1">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>Product</th>
                                                                        <th>Quantity</th>
                                                                        <th>Unit price</th>
                                                                        <th>Actions</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <select name="data[product_id][]" class="form-control" required>
                                                                                <option value="">Please select one</option>
                                                                                @foreach($products as $product)
                                                                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </td>
                                                                        <td><input class="form-control" type="text" value="{{old('quantity')}}" name="data[quantity][]" required></td>
                                                                        <td><input class="form-control" type="text" value="{{old('unit_price')}}" name="data[unit_price][]" required></td>
                                                                        <td><button type="button" class="btn btn-outline-brand btn-icon copy"><i class="fa fa-plus"></i></button></td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Date</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input class="form-control" type="date" value="{{old('date')}}" name="date">
                                                                    @if ($errors->has('date'))
                                                                        <span class="error invalid-feedback d-block">{{ $errors->first('date') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Reference</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input class="form-control" type="text" value="{{old('reference')}}" name="reference">
                                                                    @if ($errors->has('reference'))
                                                                        <span class="error invalid-feedback d-block">{{ $errors->first('reference') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Note</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <textarea class="form-control" name="note">{{old('note')}}</textarea>
                                                                    @if ($errors->has('note'))
                                                                        <span class="error invalid-feedback d-block">{{ $errors->first('note') }}</span>
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

@section('script')
    <script>
        $(document).ready(function (){
            $(document).on('click', '.copy', function () {
                var $tableBody = $('#kt_table_1').find("tbody"),
                    $trLast = $tableBody.find("tr:last"),
                    $trNew = $trLast.clone();
                $trNew.find("input").val("")
                $trLast.after($trNew);
            })
        })
    </script>
@endsection
