<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Str;
use Inertia\Inertia;
use App\Rules\NotNumeric;

class ProductCategoryController extends Controller
{
    // get all product category list
    public function index()
    {
        $defaultPaginate = config('paginate.size');
        $productCategories = ProductCategory::latest()->paginate($defaultPaginate);

        return Inertia::render('Backend/ProductCategory/Index', [
            'productCategories' => $productCategories
        ]);
    }

    // render product category create page
    public function create()
    {
        return Inertia::render('Backend/ProductCategory/Create');
    }

    // create product category
    public function store(Request $request)
    {
        // check validation
        $request->validate([
            'display_name' => ['required', 'unique:product_categories', new NotNumeric]
        ],
        [
            'display_name.required' => 'The name field is required.',
            'display_name.unique'   => 'The name has already been taken.'
        ]
       );
       // generate slug name
       if($request->display_name) {
           $name = Str::slug($request->display_name, '-');
       }
       // create object and assigned value to object
       $productCategory               = new ProductCategory();
       $productCategory->name         = $name;
       $productCategory->display_name = $request->display_name;
       $productCategory->description  = $request->description;
       $productCategory->status       = $request->status;
       $productCategory->save();

       return redirect()->route('categories.index');
    }

    // product catagory single view
    public function show($id)
    {
        return 'show';
    }

    // render product category edit page
    public function edit($id)
    {
        $productCategory = ProductCategory::find($id);

        return Inertia::render('Backend/ProductCategory/Edit', [
            'productCategory' => $productCategory
        ]);
    }

    // update product category
    public function update(Request $request, $id)
    {
        $request->validate([
            'display_name' => ['required', "unique:product_categories,display_name,$id", new NotNumeric]
        ],
        [
            'display_name.required' => 'The name field is required.',
            'display_name.unique'   => 'The name has already been taken.'
        ]
       );

       if($request->display_name) {
           $name = Str::slug($request->display_name, '-');
       }

       $productCategory               = ProductCategory::find($id);
       $productCategory->name         = $name;
       $productCategory->display_name = $request->display_name;
       $productCategory->description  = $request->description;
       $productCategory->status       = $request->status;
       $productCategory->save();

       return redirect()->route('categories.index');
    }

    // delete product category
    public function destroy($id)
    {
        return 'Delete';
    }
}
