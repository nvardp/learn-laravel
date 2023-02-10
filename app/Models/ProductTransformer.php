
<?php

class UserTransformer extends TransformerAbstract
{
    public function transform(Product $product)
    {
        return [
            'id'            => (int) $product->id,
            'name'          => (string) $product->name,
            'description'   => (string) $product->description,
        ];
    }
}


// use

// $product = Product::find(1);
// return (new ProductTransformer)->transform($product);