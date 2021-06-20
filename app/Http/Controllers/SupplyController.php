<?php

namespace App\Http\Controllers;

use App\Helper\PaginationHelper;
use App\Helper\ResponseMessageHelper;
use App\Http\Requests\Supply\CreateSupplyRequest;
use App\Models\Supplier;
use App\Models\Supply;
use App\Repositories\ProductRepository;
use App\Repositories\SupplierRepository;
use App\Repositories\SupplyRepository;
use Illuminate\Support\Facades\DB;

class SupplyController extends Controller
{

    private $supplyRepository;
    private $supplierRepository;
    private $productRepository;

    public function __construct(SupplyRepository $supplyRepository, SupplierRepository $supplierRepository, ProductRepository $productRepository)
    {
        $this->supplyRepository = $supplyRepository;
        $this->supplierRepository = $supplierRepository;
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        return view('admin.supply.index', ['supplies' => $this->supplyRepository->getWithPagination(PaginationHelper::MEDIUM_PAGINATION, ['products', 'supplier'])]);
    }

    public function create()
    {
        return view('admin.supply.create', ['suppliers' => $this->supplierRepository->getAll(), 'products' => $this->productRepository->getAll()]);
    }

    public function store(CreateSupplyRequest $createSupplyRequest)
    {
        DB::beginTransaction();
        try {
            $supply = $this->supplyRepository->create([
                'date' => $createSupplyRequest->date,
                'reference' => $createSupplyRequest->reference,
                'note' => $createSupplyRequest->note,
                'supplier_id' => $createSupplyRequest->supplier_id
            ]);
            $i = 0;
            foreach ($createSupplyRequest->data['product_id'] as $product_id) {
                $supply->products()->attach($product_id, ['quantity' => $createSupplyRequest->data['quantity'][$i], 'unit_price' => $createSupplyRequest->data['unit_price'][$i]]);
                $i++;
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withWarning($e->getMessage());
        }
        return redirect()->route('supplies.index')->withSuccess(sprintf(ResponseMessageHelper::$response_message['model_created'], Supply::$name));
    }

    public function destroy(Supply $supply)
    {
        try {
            $this->supplyRepository->delete($supply);
        } catch (\Exception $e) {
            return back()->withWarning($e->getMessage());
        }
        return redirect()->route('supplies.index')->withSuccess(sprintf(ResponseMessageHelper::$response_message['model_deleted'], Supplier::$name));
    }
}
