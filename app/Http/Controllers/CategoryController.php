<?php

namespace App\Http\Controllers;

use App\Helper\PaginationHelper;
use App\Helper\ResponseMessageHelper;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        return view('admin.category.index', ['categories' => $this->categoryRepository->getWithPagination(PaginationHelper::MEDIUM_PAGINATION)]);
    }

    public function create()
    {
        return view('admin.category.create', ['categories' => $this->categoryRepository->getAll()]);
    }

    public function store(CreateCategoryRequest $createCategoryRequest)
    {
        try {
            $this->categoryRepository->create($createCategoryRequest->validated());
        } catch (\Exception $e) {
            return back()->withWarning($e->getMessage());
        }
        return redirect()->route('categories.index')->withSuccess(sprintf(ResponseMessageHelper::$response_message['model_created'], Category::$name));
    }

    public function edit(Category $category)
    {
        return view('admin.category.update', ['category' => $category, 'categories' => $this->categoryRepository->getAll()]);
    }

    public function update(UpdateCategoryRequest $updateCategoryRequest, Category $category)
    {
        try {
            $this->categoryRepository->update($category->id, $updateCategoryRequest->validated());
        } catch (\Exception $e) {
            return back()->withWarning($e->getMessage());
        }
        return redirect()->route('categories.index')->withSuccess(sprintf(ResponseMessageHelper::$response_message['model_updated'], Category::$name));
    }

    public function destroy(Category $category)
    {
        try {
            $this->categoryRepository->delete($category);
        } catch (\Exception $e) {
            return back()->withWarning($e->getMessage());
        }
        return redirect()->route('categories.index')->withSuccess(sprintf(ResponseMessageHelper::$response_message['model_deleted'], Category::$name));
    }
}
