<?php

namespace App\Http\Requests\Admin;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class ProductUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'small_description' => 'nullable|string|max:255',
            'description' => 'required|string',
            'original_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'tax' => 'nullable|numeric',
            'quantity' => 'required|numeric',
            'status' => 'nullable',
            'trending' => 'nullable',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string|max:255',
            'meta_keywords' => 'required|string|max:255',
            'product_picture' => 'nullable|mimes:png,jpeg,bmp,jpg',
            'category_id' => 'required|exists:categories,id'
        ];
    }

    public function handleRequest($product_id)
    {
        $product = Product::find($product_id);
        $allRequestData = $this->validated();
        if ($this->hasFile('product_picture')) {
            if ($product['product_picture']) {
                Storage::delete($product['product_picture']);
            }
            $picture = $this->product_picture;
            $fileName = Storage::putFile('product', $picture);
            $allRequestData['product_picture'] = $fileName;
        }
        $allRequestData['status'] = ($this->status == 'on' ? '1' : '0');
        $allRequestData['trending'] = ($this->trending == 'on' ? '1' : '0');
        return $allRequestData;
    }
}
