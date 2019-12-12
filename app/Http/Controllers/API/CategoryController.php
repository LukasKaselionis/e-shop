<?php

declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;

/**
 * Class CategoryController
 * @package App\Http\Controllers\API
 */
class CategoryController
{
    /**
     * @var CategoryService
     */
    private $categoryService;


    /**
     * CategoryController constructor.
     * @param CategoryService $categoryService
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $category = $this->categoryService->getPaginatedData();

        return response()->json($category);
    }
}