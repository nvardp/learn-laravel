<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('created_by', auth()->user()->id)->paginate(6);
        for ($i =0; $i< count($products); ++$i)
        {
            $images = (Product::find($products[$i]->id)->productImages)->first();
            if($images)
                $products[$i]->setCoverImg( $images->path );
        }

        return view('products.index',compact('products'))
            ->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create([   'name' => $request->get('name'),
                            'description' => $request->get('description'),
                            'created_by' => auth()->user()->id ]);

        $productId = $product->id;
        if ($request->hasFile('fileToUpload')) {
            $images = $request->file('fileToUpload');
            foreach ($images as $image)
            {
                $fileName = pathinfo($image->getClientOriginalName())['filename'] . '_' . time() . '.' . $image->getClientOriginalExtension();
                Storage::disk('local')->put('/images/products' . '/' . $fileName,  file_get_contents($image -> getRealPath()) );

                ProductImage::create([  'path' => "products/" . $fileName,
                                        'product_id' => $productId,
                                        'name' => $image->getClientOriginalName() ]);
            }
        }
        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $images = (Product::find($product->id)->productImages);
        foreach($images as $image)
            $product->setImages( $image->path );

        return view('products.show', compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
               //validate input // input name
               $request->validate([
                'name' => 'required',
                'description' => 'required',
            ]);

            $product->update($request->all());

            return redirect()->route('products.index')
                            ->with('success','Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
}
