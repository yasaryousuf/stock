@extends('admin.master')

@section('admin_active', 'kt-menu__item--open')

@section('admin_copers_sub_active', 'kt-menu__item--active')

@section('title')
    Order
@endsection

@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">
                        Orders
                    </h3>
                    <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                    <div class="kt-subheader__group" id="kt_subheader_search">
                        <span class="kt-subheader__desc" id="kt_subheader_total">
                            Please review the result below
                        </span>
                    </div>
                </div>
                <div class="kt-subheader__toolbar">
                    <a href="{{ url('/') }}" class="btn btn-default btn-bold"><i class="la la-long-arrow-left"></i> Back
                    </a>
                    <a href="{{ url('orders/create') }}" class="btn btn-label-brand btn-bold">Create order
                    </a>
                </div>
            </div>
        </div>
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <i class="kt-font-brand flaticon2-line-chart"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            Orders list
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <table class="table table-striped table-bordered table-hover table-checkable"
                           id="kt_table_1">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Reference</th>
                            <th>Note</th>
                            <th>Customer</th>
                            <th>Products</th>
                            <th>Actions</th>
                        </tr>
                        </thead>

                        <tbody>
                        @if ($orders->first())
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->date }}</td>
                                    <td>{{ $order->reference }}</td>
                                    <td>{{ $order->note }}</td>
                                    <td>{{ $order->customer->name }}</td>
                                    <td>
                                        @if($order->products)
                                            <ul>
                                                @foreach($order->products as $product)
                                                    <li>{{$product->name}} - quantity: {{$product->pivot->quantity ? $product->pivot->quantity : 0}} - unit price: {{$product->pivot->unit_price ? $product->pivot->unit_price : 0}}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </td>
                                    <td class="d-flex">
{{--                                        <a href="{{url("orders/{$order->id}/edit")}}" title="Edit" class="btn btn-sm btn-clean btn-icon btn-icon-md">--}}
{{--                                            <i class="la la-edit"></i></a>--}}
                                        <form action="{{url("orders/{$order->id}")}}" onsubmit="return confirm('Do you really want to delete?');" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                                <i class="la la-trash"></i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="6">No results found</td></tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
