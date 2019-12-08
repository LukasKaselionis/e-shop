<?php

declare(strict_types=1);

namespace App\Services;

use App\Product;
use App\Repositories\ProductRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

/**
 * Class ProductService
 * @package App\Services
 */
class ProductService
{
    const FILE_DIR = 'product';
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
     * @param UploadedFile|null $cover
     * @return Product|Model
     */
    public function createNewProduct(
        string $name,
        float $price,
        string $description,
        string $slug,
        array $categoriesIds = [],
        ?UploadedFile $cover = null
    ): Product
    {
        /** @var Product $product */
        $product = $this->productRepository->create([
            'name' => $name,
            'price' => $price,
            'description' => $description,
            'slug' => $slug
        ]);

        $this->syncCategories($product, $categoriesIds);

        if ($cover !== null) {
            $uploadedFile = $this->uploadImage($cover, $product->id);
            $product->cover = $uploadedFile;
            $product->save();
        }

        return $product;
    }

    /**
     * @param int $id
     * @param string $name
     * @param float $price
     * @param string $description
     * @param string $slug
     * @param array $categoriesIds
     * @param int|null $deleteCover
     * @param UploadedFile|null $cover
     * @return int
     */
    public function updateById(
        int $id,
        string $name,
        float $price,
        string $description,
        string $slug,
        array $categoriesIds = [],
        ?int $deleteCover = null,
        ?UploadedFile $cover = null
    ): int
    {
        $product = $this->productRepository->makeQuery()->findOrFail($id);

        $uploadedFile = $product->cover;
        if ($deleteCover !== null) {
            Storage::delete($product->cover);
            $uploadedFile = null;
        }
        if ($cover !== null) {
            $uploadedFile = $this->uploadImage($cover, $product->id);
        }

        $updated = $this->productRepository->update([
            'name' => $name,
            'price' => $price,
            'description' => $description,
            'slug' => $slug,
            'cover' => $uploadedFile
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
     * @param UploadedFile|null $image
     * @param int $productId
     * @return string|null
     */
    private function uploadImage(?UploadedFile $image, int $productId): ?string
    {
        if ($image === null) {
            return null;
        }
        return $image->store(self::FILE_DIR . '/' . $productId);
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