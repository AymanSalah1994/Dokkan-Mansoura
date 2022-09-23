<?php

namespace App\Http\Requests\Customer;

use App\Models\Review;
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
            // Below are Names For HTML elements in the Form and Their Validation RUles
            'review_product_id' => 'required|exists:products,id',
            'product_rating' => 'required|max:5,min:1', // Radio ?
            'rating_text' => 'nullable|string|max:255'
        ];
    }

    public function handleReuqest()
    {
        $all_data = $this->validated();
        $user = $this->user(); // $this  Means/refers to the Reuqest Instanciated
        $verified_purchase  = $user->cartItems()->where('product_id', $this->review_product_id)->where('status', '4')->first();
        $previous_review = $user->reviews()->where('product_id', $this->review_product_id)->first() ;
        $final_result  = false  ;
        if ($verified_purchase) {
            // Then Create Or Update a Review
            if($previous_review) {
                // UPDATE old Review
                $previous_review->rating_stars = $all_data['product_rating']  ;
                $previous_review->rating_text = $all_data['rating_text']   ;
                $previous_review->save() ;
                $final_result = true  ;
                return $final_result;
            }
            else {
                // Create New Review For this
                $review = new Review();
                $review->user_id = $user->id ;
                $review->product_id = $all_data['review_product_id'] ;
                $review->rating_stars =$all_data['product_rating'];
                $review->rating_text = $all_data['rating_text'] ;
                $review->save() ;
                $final_result = true  ;
                return $final_result;
            }
        } else {
            $final_result = false  ;
            return $final_result;
            // $Message ="You did NOT Buy it " ;
        }
    }
}
