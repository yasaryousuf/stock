@extends('admin.master')

@section('admin_active', 'kt-menu__item--open')

@section('admin_copers_sub_active', 'kt-menu__item--active')

@section('title')
    Supplier
@endsection

@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">
                        Suppliers
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
                    <a href="{{ url('suppliers/create') }}" class="btn btn-label-brand btn-bold">Create supplier
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
                            Suppliers list
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
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Gender</th>
                            <th>Active</th>
                            <th>Created at</th>
                            <th>Actions</th>
                        </tr>
                        </thead>

                        <tbody>
                        @if ($suppliers->first())
                            @foreach ($suppliers as $supplier)
                                <tr>
                                    <td>{{ $supplier->id }}</td>
                                    <td>{{ $supplier->name }}</td>
                                    <td>{{ $supplier->code }}</td>
                                    <td>{{ $supplier->email }}</td>
                                    <td>{{ $supplier->phone }}</td>
                                    <td>{{ $supplier->address }}</td>
                                    <td><span class="kt-badge kt-badge--{{ $supplier->sex == 0 ? 'success' : 'danger' }} kt-badge--inline kt-badge--pill kt-badge--rounded">{{ $supplier->sex == 0 ? 'Male' : 'Female' }}</span></td>
                                    <td><span class="kt-badge kt-badge--{{ $supplier->is_active == 0 ? 'danger' : 'success' }} kt-badge--inline kt-badge--pill kt-badge--rounded">{{ $supplier->sex == 0 ? 'Inactive' : 'Active' }}</span></td>
                                    <td>{{ $supplier->created_at }}</td>
                                    <td class="d-flex">
                                        <a href="{{url("suppliers/{$supplier->id}/edit")}}" title="Edit" class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                            <i class="la la-edit"></i></a>
                                        <form action="{{url("suppliers/{$supplier->id}")}}" onsubmit="return confirm('Do you really want to delete?');" method="post">
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
