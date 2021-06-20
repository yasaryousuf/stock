<?php

namespace App\Http\Controllers;

use App\Helper\PaginationHelper;
use App\Helper\ResponseMessageHelper;
use App\Http\Requests\Order\CreateOrderRequest;
use App\Models\Order;
use App\Repositories\CustomerRepository;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    private $productRepository;
    private $orderRepository;
    private $customerRepository;

    public function __construct(OrderRepository $orderRepository, CustomerRepository $customerRepository, ProductRepository $productRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->customerRepository = $customerRepository;
        $this->productRepository = $productRepository;
    }
    public function index()
    {
        return view('admin.order.index', ['orders' => $this->orderRepository->getWithPagination(PaginationHelper::MEDIUM_PAGINATION, ['products', 'customer'])]);
    }

    public function create()
    {
        return view('admin.order.create', ['customers' => $this->customerRepository->getAll(), 'products' => $this->productRepository->getAll()]);
    }

    public function store(CreateOrderRequest $createOrderRequest)
    {
        DB::beginTransaction();
        try {
            $order = $this->orderRepository->create([
                'date' => $createOrderRequest->date,
                'reference' => $createOrderRequest->reference,
                'note' => $createOrderRequest->note,
                'customer_id' => $createOrderRequest->customer_id
            ]);
            $i = 0;
            foreach ($createOrderRequest->data['product_id'] as $product_id) {
                $order->products()->attach($product_id, ['quantity' => $createOrderRequest->data['quantity'][$i], 'unit_price' => $createOrderRequest->data['unit_price'][$i]]);
                $i++;
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withWarning($e->getMessage());
        }
        return redirect()->route('orders.index')->withSuccess(sprintf(ResponseMessageHelper::$response_message['model_created'], Order::$name));
    }

    public function destroy(Order $order)
    {
        try {
            $this->orderRepository->delete($order);
        } catch (\Exception $e) {
            return back()->withWarning($e->getMessage());
        }
        return redirect()->route('orders.index')->withSuccess(sprintf(ResponseMessageHelper::$response_message['model_deleted'], Order::$name));
    }
}
