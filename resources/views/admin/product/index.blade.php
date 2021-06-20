@extends('admin.master')

@section('admin_active', 'kt-menu__item--open')

@section('admin_copers_sub_active', 'kt-menu__item--active')

@section('title')
    Product
@endsection

@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">
                        Products
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
                    <a href="{{ url('products/create') }}" class="btn btn-label-brand btn-bold">Create product
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
                            Products list
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <table class="table table-striped table-bordered table-hover table-checkable"
                           id="kt_table_1">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Created at</th>
                            <th>Actions</th>
                        </tr>
                        </thead>

                        <tbody>
                        @if ($products->first())
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->code }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->category && $product->category->name ? $product->category->name : '' }}</td>
                                    <td>{{ $product->created_at }}</td>
                                    <td class="d-flex">
                                        <a href="{{url("products/{$product->id}/edit")}}" title="Edit" class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                            <i class="la la-edit"></i></a>
                                        <form action="{{url("products/{$product->id}")}}" onsubmit="return confirm('Do you really want to delete?');" method="post">
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
