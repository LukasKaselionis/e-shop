<?php

declare(strict_types = 1);

namespace App\Repositories;


use App\Product;
use App\Repositories\Abstracts\Repository;

/**
 * Class ProductRepository
 * @package App\Repositories
 */
class ProductRepository extends Repository
{
    /**
     * @return string
     */
    public function model(): string
    {
        return Product::class;
    }
}