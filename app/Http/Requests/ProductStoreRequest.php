<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Product;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

/**
 * Class ProductStoreRequest
 * @package App\Http\Requests
 */
class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:5|max:191',
            'price' => 'required|numeric',
            'description' => 'required|string|min:10',
            'categories' => 'nullable|array',
            'cover' => 'nullable|image'
        ];
    }

    /**
     * @return Validator
     */
    protected function getValidatorInstance()
    {
        $validator = parent::getValidatorInstance();
        $validator->after(function (Validator $validator) {
            $product = $this->route()->parameter('products');
            $productId = $product ? (int)$product->id : null;
            if (
                ($this->isMethod('put') || $this->isMethod('post')) &&
                $this->slugExists($productId)
            ) {
                $validator->errors()
                    ->add('slug', 'This slug already exists');
            }
            return;
        });
        return $validator;
    }

    /**
     * @param int|null $productId
     * @return bool
     */
    private function slugExists(?int $productId = null): bool
    {
        $query = Product::query()->where('slug', '=', $this->getSlug());
        if ($productId !== null) {
            $query->where('id', '!=', $productId);
        }
        $product = $query->first();
        if (!empty($product)) {
            return true;
        }
        return false;
    }


    /**
     * @return string
     */
    public function getName(): string
    {
        return strip_tags($this->input('name'));
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return floatval($this->input('price'));
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return strip_tags($this->input('description'));
    }

    /**
     * @return array
     */
    public function getCategoriesIds(): array
    {
        return $this->input('categories', []);
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        $slugUnprepared = $this->input('slug');

        if (is_string($slugUnprepared)) {
            $slugUnprepared = trim($slugUnprepared);
        }

        if (empty($slugUnprepared)) {
            $slugUnprepared = $this->getName();
        }

        $slug = Str::slug($slugUnprepared);
        return $slug;
    }

    /**
     * @return UploadedFile|null
     */
    public function getCover(): ?UploadedFile
    {
        return $this->file('cover');
    }

    /**
     * @return int|null
     */
    public function getDeleteCoverOption(): ?int
    {
        $deleteCover = $this->input('deleteCover');
        if ($deleteCover === null) {
            return null;
        }
        return (int)$deleteCover;
    }
}
