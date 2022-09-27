<?php

namespace App\Http\Requests\Merchant;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class ProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15|unique:users,phone,' . $this->user()->id,
            'email' => "required|email|unique:users,email," . $this->user()->id,
            'bio' => 'nullable|string|max:255',
            'facebook_link' => 'nullable|url|max:255',
            'youtube_vid' => 'nullable|url|max:255',
            'profile_picture' => 'nullable|mimes:png,jpeg,bmp,jpg',
        ];
    }

    public function handleRequest()
    {
        $user = User::find($this->user()->id);
        $allRequestData = $this->validated();
        if ($this->hasFile('profile_picture')) {
            if ($user['profile_picture']) {
                Storage::delete($user['product_picture']);
            }
            $picture = $this->profile_picture;
            $fileName = Storage::putFile('merchantsProfiles', $picture);
            $allRequestData['profile_picture'] = $fileName;
        }
        return $allRequestData;
    }
}
