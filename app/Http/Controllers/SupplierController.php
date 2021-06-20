<?php

namespace App\Http\Controllers;

use App\Helper\PaginationHelper;
use App\Helper\ResponseMessageHelper;
use App\Http\Requests\Supplier\CreateSupplierRequest;
use App\Http\Requests\Supplier\UpdateSupplierRequest;
use App\Models\Supplier;
use App\Repositories\SupplierRepository;

class SupplierController extends Controller
{

    private $supplierRepository;

    public function __construct(SupplierRepository $supplierRepository)
    {
        $this->supplierRepository = $supplierRepository;
    }

    public function index()
    {
        return view('admin.supplier.index', ['suppliers' => $this->supplierRepository->getWithPagination(PaginationHelper::MEDIUM_PAGINATION)]);
    }

    public function create()
    {
        return view('admin.supplier.create');
    }

    public function store(CreateSupplierRequest $createSupplierRequest)
    {
        try {
            $this->supplierRepository->create($createSupplierRequest->validated());
        } catch (\Exception $e) {
            return back()->withWarning($e->getMessage());
        }
        return redirect()->route('suppliers.index')->withSuccess(sprintf(ResponseMessageHelper::$response_message['model_created'], Supplier::$name));
    }

    public function edit(Supplier $supplier)
    {
        return view('admin.supplier.update', ['supplier' => $supplier]);
    }

    public function update(UpdateSupplierRequest $updateSupplierRequest, Supplier $supplier)
    {
        try {
            $this->supplierRepository->update($supplier->id, $updateSupplierRequest->validated());
        } catch (\Exception $e) {
            return back()->withWarning($e->getMessage());
        }
        return redirect()->route('suppliers.index')->withSuccess(sprintf(ResponseMessageHelper::$response_message['model_updated'], Supplier::$name));
    }

    public function destroy(Supplier $supplier)
    {
        try {
            $this->supplierRepository->delete($supplier);
        } catch (\Exception $e) {
            return back()->withWarning($e->getMessage());
        }
        return redirect()->route('suppliers.index')->withSuccess(sprintf(ResponseMessageHelper::$response_message['model_deleted'], Supplier::$name));
    }
}
