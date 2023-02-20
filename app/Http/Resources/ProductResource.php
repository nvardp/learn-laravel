<?php

namespace App\Http\Resources;


use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Product;


class ProductResource extends JsonResource
{

    /**
     * @param Product $product
     * @return array
     */
    public function toArray($product): array
    {
        return [
            'id'            => (int) $product->id,
            'name'          => (string) $product->name,
            'description'   => (string) $product->description,
            'images'         => (array) $product->productImages,
        ];
    }

}
