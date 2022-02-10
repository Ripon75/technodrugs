<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Generic;
use App\Models\Brand;
use App\Models\ProductCategory;
use App\Models\DosageForm;
use Inertia\Inertia;
use App\Rules\NotNumeric;

class ProductController extends Controller
{

    // get all product list
    public function index()
    {
        $defaultpaginate = config('paginate.size');
        $products = Product::with(['generic:id,display_name', 'brand:id,display_name', 'productCategory:id,display_name', 'dosageForm:id,display_name'])->latest()->paginate($defaultpaginate);

        return Inertia::render('Backend/Product/Index', [
            'products' => $products
        ]);
    }


    // render create page
    public function create()
    {
        $brands            = Brand::select(['display_name as label', 'id as value'])->orderBy('display_name', 'asc')->get();
        $generics          = Generic::select(['display_name as label', 'id as value'])->orderBy('display_name', 'asc')->get();
        $productCategories = ProductCategory::select(['display_name as label', 'id as value'])->orderBy('display_name', 'asc')->get();
        $dosageForms = DosageForm::select(['display_name as label', 'id as value'])->orderBy('display_name', 'asc')->get();

        return Inertia::render('Backend/Product/Create', [
            'brands'            => $brands,
            'generics'          => $generics,
            'productCategories' => $productCategories,
            'dosageForms'       => $dosageForms
        ]);
    }


    // create new product
    public function store(Request $request)
    {
        $request->validate([
                'display_name'        => ['required', 'unique:products', new NotNumeric],
                'generic_id'          => ['required'],
                'brand_id'            => ['required'],
                'product_category_id' => ['required'],
                'dosage_form_id'      => ['required'],
            ],
            [
                'display_name.required' => 'The name field is required.',
                'display_name.unique'   => 'The name has already been taken.'
            ]
        );

        if($request->display_name) {
            $name = Str::slug($request->display_name, '-');
        }

        $product                      = new Product();
        $product->name                = $name;
        $product->display_name        = $request->display_name;
        $product->description         = $request->description;
        $product->brand_id            = $request->brand_id;
        $product->generic_id          = $request->generic_id;
        $product->product_category_id = $request->product_category_id;
        $product->dosage_form_id      = $request->dosage_form_id;
        $product->strength            = $request->strength;
        $product->mrp                 = $request->mrp;
        $product->pack_size           = $request->pack_size;
        $image_path = '';
        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('images', 'public');
            $product->image = $image_path;
        }
        $product->save();

        return redirect()->route('products.index');
    }


    // show single product
    public function show($id)
    {
        $product = Product::with(['generic:id,display_name', 'brand:id,display_name', 'productCategory:id,display_name', 'dosageForm:id,display_name'])->find($id);

        return Inertia::render('Backend/Product/Show', [
            'product' => $product
        ]);
    }

    // render edit page
    public function edit($id)
    {
        $product = Product::find($id);
        $brands            = Brand::select(['display_name as label', 'id as value'])->orderBy('display_name', 'asc')->get();
        $generics          = Generic::select(['display_name as label', 'id as value'])->orderBy('display_name', 'asc')->get();
        $productCategories = ProductCategory::select(['display_name as label', 'id as value'])->orderBy('display_name', 'asc')->get();
        $dosageForms = DosageForm::select(['display_name as label', 'id as value'])->orderBy('display_name', 'asc')->get();

        return Inertia::render('Backend/Product/Edit', [
            'product'           => $product,
            'brands'            => $brands,
            'generics'          => $generics,
            'productCategories' => $productCategories,
            'dosageForms'       => $dosageForms
        ]);
    }

    // update product
    public function update(Request $request, $id)
    {
        $request->validate([
                'display_name'        => ['required', "unique:products,display_name,$id", new NotNumeric],
                'generic_id'          => ['required'],
                'brand_id'            => ['required'],
                'product_category_id' => ['required'],
                'dosage_form_id'      => ['required'],
            ],
            [
                'display_name.required' => 'The name field is required.',
                'display_name.unique'   => 'The name has already been taken.'
            ]
        );

        if($request->display_name) {
            $name = Str::slug($request->display_name, '-');
        }

        $product                      = Product::find($id);
        $product->name                = $name;
        $product->display_name        = $request->display_name;
        $product->description        = $request->description;
        $product->brand_id            = $request->brand_id;
        $product->generic_id          = $request->generic_id;
        $product->product_category_id = $request->product_category_id;
        $product->dosage_form_id      = $request->dosage_form_id;
        $product->strength            = $request->strength;
        $product->mrp                 = $request->mrp;
        $product->pack_size           = $request->pack_size;
        $image_path = '';
        if($request->hasFile('image')) {
            $productPhoto = public_path('storage/').$product->image;
            @unlink($productPhoto);
            $image_path = $request->file('image')->store('images', 'public');
            $product->image = $image_path;
        }
        $product->save();

        return redirect()->route('products.index');
    }

    // delete product
    public function destroy($id)
    {
        return 'delete';
    }
}
