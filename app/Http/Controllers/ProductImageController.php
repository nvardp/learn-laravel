<?php

namespace App\Http\Controllers;
use App\Models\ProductImage;

use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    public function destroy(ProductImage $productImage)
    {
        $productImage->delete();
        $product = $productImage->product;

        return redirect()->route('products.edit', compact('product'))
            ->with('success','Image deleted successfully');
    }
}
