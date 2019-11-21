<?php

declare(strict_types=1);

namespace App\Services;

use App\Product;
use App\Repositories\ProductRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductService
 * @package App\Services
 */
class ProductService
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * ProductService constructor.
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getPaginatedData(): LengthAwarePaginator
    {
        return $this->productRepository->paginate();
    }

    /**
     * @param string $name
     * @param float $price
     * @param string $description
     * @param array $categoriesIds
     * @return Product|Model
     */
    public function createNewProduct(string $name, float $price, string $description, array $categoriesIds = []): Product
    {
        /** @var Product $product */
        $product = $this->productRepository->create([
            'name' => $name,
            'price' => $price,
            'description' => $description
        ]);

        $this->syncCategories($product, $categoriesIds);

        return $product;
    }

    /**
     * @param int $id
     * @param string $name
     * @param float $price
     * @param string $description
     * @return int
     */
    public function updateById(int $id, string $name, float $price, string $description): int
    {
        $updated = $this->productRepository->update([
            'name' => $name,
            'price' => $price,
            'description' => $description
        ], $id);

        return $updated;
    }

    /**
     * @param int $id
     */
    public function destroyById(int $id)
    {
        $this->productRepository->delete($id);
    }

    /**
     * @param Product $product
     * @param array $categoriesIds
     */
    private function syncCategories(Product &$product, array $categoriesIds = []): void
    {
        $product->categories()->sync($categoriesIds);
    }
}