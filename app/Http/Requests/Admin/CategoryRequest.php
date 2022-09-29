<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class CategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'nullable',
            'popular' => 'nullable',
            'keywords' => 'nullable|string|max:255',
            'category_picture' => 'nullable|mimes:png,jpeg,bmp'
        ];
    }

    public function handleRequest()
    {
        $allRequestData = $this->validated();
        if ($this->hasFile('category_picture')) {
            $picture = $this->category_picture;
            $fileName = Storage::putFile('category', $picture);
            $allRequestData['category_picture'] = $fileName;
        }
        $allRequestData['status'] = ($this->status == 'on' ? '1' : '0');
        $allRequestData['popular'] = ($this->popular == 'on' ? '1' : '0');
        return $allRequestData;
    }

    // public function attributes()
    // {
    //     return [
    //         'company_id' => 'Company' ,
    //         // instead of the Company id is Required , the error Message will be
    //         // the Company Field is Required
    //         // 'email' => 'email address'
    //     ] ;
    // }
    public function messages()
    {
        return [
            // field.validation_Rule => 'msg '
            //             'email.email' =>'The Email you Entered is NOT valid!' ,
            '*.required' => 'This :attribute Field Can Not be Empty !'
        ];
    }
}
