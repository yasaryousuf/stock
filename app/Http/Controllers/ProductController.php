<?php

namespace App\Http\Controllers;

use App\Helper\PaginationHelper;
use App\Helper\ResponseMessageHelper;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Product;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    private $productRepository;
    private $categoryRepository;

    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        return view('admin.product.index', ['products' => $this->productRepository->getWithPagination(PaginationHelper::MEDIUM_PAGINATION)]);
    }

    public function create()
    {
        return view('admin.product.create', ['categories' => $this->categoryRepository->getAll()]);
    }

    public function store(CreateProductRequest $createProductRequest)
    {
        try {
            $this->productRepository->create($createProductRequest->validated());
        } catch (\Exception $e) {
            return back()->withWarning($e->getMessage());
        }
        return redirect()->route('products.index')->withSuccess(sprintf(ResponseMessageHelper::$response_message['model_created'], Product::$name));
    }

    public function edit(Product $product)
    {
        return view('admin.product.update', ['product' => $product, 'categories' => $this->categoryRepository->getAll()]);
    }

    public function update(UpdateProductRequest $updateProductRequest, Product $product)
    {
        try {
            $this->productRepository->update($product->id, $updateProductRequest->validated());
        } catch (\Exception $e) {
            return back()->withWarning($e->getMessage());
        }
        return redirect()->route('products.index')->withSuccess(sprintf(ResponseMessageHelper::$response_message['model_updated'], Product::$name));
    }

    public function destroy(Product $product)
    {
        try {
            $this->productRepository->delete($product);
        } catch (\Exception $e) {
            return back()->withWarning($e->getMessage());
        }
        return redirect()->route('products.index')->withSuccess(sprintf(ResponseMessageHelper::$response_message['model_deleted'], Product::$name));
    }
}
