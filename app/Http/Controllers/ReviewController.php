<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customer\ReviewRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function submitReview(ReviewRequest $request)
    {
        // In the View if the User Didn't Buy Tell Him So ,ignore him
        // Send the "Rating average and Total Number of Ratings for Product"

        // Bought  ? Save Review Data  ;didn't Buy or return  Tell Him No
        // Make Sure the ID exists and Not Hidden Product
        // What if He is Updating an Old REview  ;
        // dd() ;
        // dd([$request->rating_text,$request->product_rating,$request->review_product_id]) ;
        if (Auth::check()) {
            $prodcut_id  = $request->review_product_id  ;
            $final_result = $request->handleReuqest();
            if ($final_result) {
                return redirect()->route('product.details',$prodcut_id)->with('status', 'Review is Added ');
            } else {
                return redirect()->route('product.details',$prodcut_id)->with('status-error', 'You Did NOT buy this Product !');
            }
        } else {
            return redirect()->back()->with('status-error', 'Please Log in First !');
        }
    }
}
