<?php

namespace App\Http\Requests\Merchant;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class UpdateProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'small_description' => 'nullable|string|max:255',
            'description' => 'required|string',
            'original_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'quantity' => 'nullable|numeric',
            'status' => 'nullable',
            'keywords' => 'nullable|string|max:255',
            'product_picture' => 'nullable|mimes:png,jpeg,bmp,jpg',
            'secondary_picture' => 'nullable|mimes:png,jpeg,bmp,jpg',
            'category_id' => 'required|exists:categories,id'
        ];
    }

    public function handleRequest()
    {
        $product = Product::where('user_id', $this->user()->id)->where('slug', $this->product_id)->first();
        $allRequestData = $this->validated();
        if ($this->hasFile('product_picture')) {
            if ($product['product_picture']) {
                Storage::delete($product['product_picture']);
            }
            $picture = $this->product_picture;
            $fileName_1 = Storage::putFile('product', $picture);
            $allRequestData['product_picture'] = $fileName_1;
        }
        if ($this->hasFile('secondary_picture')) {
            if ($product['secondary_picture']) {
                Storage::delete($product['secondary_picture']);
            }
            $sec_picture = $this->secondary_picture;
            $fileName = Storage::putFile('product', $sec_picture);
            $allRequestData['secondary_picture'] = $fileName;
        }
        $allRequestData['status'] = ($this->status == 'on' ? '1' : '0');
        $product->update($allRequestData);
    }
}
