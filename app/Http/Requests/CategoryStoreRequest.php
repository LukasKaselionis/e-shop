<?php

declare(strict_type=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

/**
 * Class CategoryStoreRequest
 * @package App\Http\Requests
 */
class CategoryStoreRequest extends FormRequest
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
            'title' => [
                'required',
                'string',
                'min:5',
                'max:191',
            ],
        ];
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->input('title');
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
            $slugUnprepared = $this->getTitle();
        }

        $slug = Str::slug($slugUnprepared);
        return $slug;
    }
}
