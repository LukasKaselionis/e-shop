<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductStoreRequest;
use App\Product;
use App\Services\ProductService;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * @var ProductService
     */
    private $productService;

    /**
     * ProductController constructor.
     * @param ProductService $productService
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $productsPaginated = $this->productService->getPaginatedData();
        return view('admin.product.list', [
            'products' => $productsPaginated,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductStoreRequest $request
     * @return RedirectResponse
     */
    public function store(ProductStoreRequest $request): RedirectResponse
    {
        $this->productService->createNewProduct(
            $request->getName(),
            $request->getPrice(),
            $request->getDescription()
        );

        return redirect()->route('admin.product.index')
            ->with('status', 'Product created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return View
     */
    public function show(Product $product): View
    {
        return view('admin.product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return View
     */
    public function edit(Product $product): View
    {
        return view('admin.product.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductStoreRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(ProductStoreRequest $request, int $id): RedirectResponse
    {
        $this->productService->updateById(
            $id,
            $request->getName(),
            $request->getPrice(),
            $request->getDescription()
        );

        return redirect()->route('admin.product.index')
            ->with('status', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->productService->destroyById($id);

        return redirect()->route('admin.product.index')
            ->with('status', 'Product deleted!');
    }
}
