<?php

namespace App\Http\Requests\Admin;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class CategoryUpdateRequest extends FormRequest
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
        $category = Category::find($this->category_);
        if ($this->hasFile('category_picture')) {
            if ($category['category_picture']) {
                // In Case it Had Old Photo
                // Because Photo is Nullable & Can Be Empty
                Storage::delete($category['category_picture']);
            }
            $picture = $this->category_picture;
            $fileName = Storage::putFile('category', $picture);
            $allRequestData['category_picture'] = $fileName;
        }
        $allRequestData['status'] = ($this->status == 'on' ? '1' : '0');
        $allRequestData['popular'] = ($this->popular == 'on' ? '1' : '0');
        return $allRequestData;
    }
}
