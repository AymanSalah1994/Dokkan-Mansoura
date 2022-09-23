<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReviewRequest;

class ReviewController extends Controller
{
    public function submitReview(ReviewRequest $request)
    {
        // In the View if the User Didn't Buy Tell Him So ,ignore him
        // Send the "Rating average and Total Number of Ratings for Product"
        
        // Not user ? Tell Him NO , Else ?
        // Bought  ? Save Review Data  ;didn't Buy or return  Tell Him No
        // Make Sure the ID exists and Not Hidden Product
        // What if He is Updating an Old REview  ;
        if (Auth::check()) {
        } else {
            return redirect()->back()->with('status-error', 'Please Log in First !');
        }
    }
}
