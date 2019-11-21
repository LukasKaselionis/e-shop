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
     * @param string $slug
     * @param array $categoriesIds
     * @return Product|Model
     */
    public function createNewProduct(string $name, float $price, string $description, string $slug, array $categoriesIds = []): Product
    {
        /** @var Product $product */
        $product = $this->productRepository->create([
            'name' => $name,
            'price' => $price,
            'description' => $description,
            'slug' => $slug
        ]);

        $this->syncCategories($product, $categoriesIds);

        return $product;
    }

    /**
     * @param int $id
     * @param string $name
     * @param float $price
     * @param string $description
     * @param string $slug
     * @param array $categoriesIds
     * @return int
     */
    public function updateById(int $id, string $name, float $price, string $description, string $slug, array $categoriesIds = []): int
    {
        $product = $this->productRepository->makeQuery()->findOrFail($id);
        $updated = $this->productRepository->update([
            'name' => $name,
            'price' => $price,
            'description' => $description,
            'slug' => $slug
        ], $id);

        $this->syncCategories($product, $categoriesIds);

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