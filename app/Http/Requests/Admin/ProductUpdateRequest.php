<?php

namespace App\Http\Requests\Admin;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class ProductUpdateRequest extends FormRequest
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
            'youtube_vid' =>'nullable|url' , 
            'keywords' => 'nullable|string|max:255',
            'product_picture' => 'nullable|mimes:png,jpeg,bmp,jpg',
            'secondary_picture' => 'nullable|mimes:png,jpeg,bmp,jpg',
            'category_id' => 'required|exists:categories,id'
        ];
    }

    public function handleRequest()
    {
        $product = Product::find($this->product->id);
        $allRequestData = $this->validated();
        if ($this->hasFile('product_picture')) {
            if ($product['product_picture']) {
                Storage::delete($product['product_picture']);
            }
            $picture = $this->product_picture;
            $fileName = Storage::putFile('product', $picture);
            $allRequestData['product_picture'] = $fileName;
        }
        if ($this->hasFile('secondary_picture')) {
            if ($product['secondary_picture']) {
                Storage::delete($product['secondary_picture']);
            }
            $sec_picture = $this->product_picture;
            $fileName = Storage::putFile('product', $sec_picture);
            $allRequestData['secondary_picture'] = $fileName;
        }
        $allRequestData['status'] = ($this->status == 'on' ? '1' : '0');
        $allRequestData['trending'] = ($this->trending == 'on' ? '1' : '0');
        $allRequestData['refundable'] = ($this->refundable == 'on' ? '1' : '0');
        return $allRequestData;
        // Save Data Here Then Send Product to Below MEthod
    }



    // Search in CartItems With status 0 & Update
    // Search in Orders For those Cart Items and Update Total For Order

    public function updateCartOrders($product_id)
    {
        $cartItems = CartItem::where('product_id',$product_id)->where('status','0')->get() ;
        foreach ($cartItems as $item) {
            $item->cart_total_price = $item->product->selling_price * $item->quantity  ;
            $item->save() ;
            $this->updateTotalOrder($item->order->id) ;
        }
    }

    public function updateTotalOrder($order_id)
    {
        $or = Order::find($order_id);
        $total = 0;
        foreach ($or->cartItems as $orderItem) {
            $total = $total + ($orderItem->product->selling_price * $orderItem->quantity);
        }
        Order::where('id', $order_id)->update(['total' => $total]);
    }
}
