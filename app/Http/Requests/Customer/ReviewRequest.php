<?php

namespace App\Http\Requests\Customer;

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
            // Below are Names For HTML elements in the Form and Their Validation RUles
            'product_id' => 'required|exists:products,id',
            'product_rating' => 'required|max:5,min:1|', // Radio ? 
            'rating_text' => 'nullable|string|max:255'
        ];
    }

    public function handleReuqest() {
        $all_data = $this->validated() ;
        $user = $this->user() ; // This Means the Reuqest Instanciated

    }
}
