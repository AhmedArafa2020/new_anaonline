<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        if ($this->input('variant_product') == 0) {
            return [
                'name' => 'required',
                'maincategory_id' => 'required',
                'cover_image' => 'required',
                'product_image' => 'required',
                'status' => 'required',
                'variant_product' => 'required',
                'price' => 'required|numeric|min:0',
                'sale_price' => 'nullable|numeric|min:0|lt:price',
                'brand_id' => 'nullable',
                'label_id' => 'nullable',
            ];
        } else {
            return [
                'name' => 'required',
                'maincategory_id' => 'required',
                'cover_image' => 'required',
                'product_image' => 'required',
                'status' => 'required',
                'variant_product' => 'required',
                'brand_id' => 'nullable',
                'label_id' => 'nullable',
            ];
        }
    }

    public function messages()
    {
        return [
            'sale_price.lt' => __('The sale price must be less than the regular price.'),
        ];
    }
}
