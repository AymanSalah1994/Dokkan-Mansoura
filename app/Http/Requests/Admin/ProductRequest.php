<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class ProductRequest extends FormRequest
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
            'trending' => 'nullable',
            'refundable' => 'nullable',
            'keywords' => 'nullable|string|max:255',
            'product_picture' => 'nullable|mimes:png,jpeg,bmp,jpg',
            'secondary_picture' => 'nullable|mimes:png,jpeg,bmp,jpg',
            'category_id' => 'required|exists:categories,id'
        ];
    }

    public function handleRequest()
    {
        $allRequestData = $this->validated();
        if ($this->hasFile('product_picture')) {
            $picture = $this->product_picture;
            $fileName = Storage::putFile('product', $picture);
            $allRequestData['product_picture'] = $fileName;
        }
        if ($this->hasFile('secondary_picture')) {
            $sec_picture = $this->secondary_picture;
            $fileName = Storage::putFile('product', $sec_picture);
            $allRequestData['secondary_picture'] = $fileName;
        }
        $allRequestData['status'] = ($this->status == 'on' ? '1' : '0');
        $allRequestData['trending'] = ($this->trending == 'on' ? '1' : '0');
        $allRequestData['refundable'] = ($this->refundable == 'on' ? '1' : '0');
        $allRequestData['user_id'] = $this->user()->id;
        return $allRequestData;
    }
}
