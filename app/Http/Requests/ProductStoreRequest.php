<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'categories' => 'nullable|array'
        ];
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
}
