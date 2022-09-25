<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // 'search_word' =>'' ,
            // 'minimum_price' =>'' ,
            // 'maximum_price' =>'' ,
            // 'category' =>'' ,
            // 'merchant' =>'' ,
            // ''

        ];
    }
}
