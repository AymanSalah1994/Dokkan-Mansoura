<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // user_id
            'product_id' => 'required|exists:products,id',
            'rating_stars' => 'required|max:5,min:1|',
            'rating_text' => 'nullable|string|max:255'
        ];
    }

    public function handleReuqest() {
        $all_data = $this->validated() ;
        
    }
}
