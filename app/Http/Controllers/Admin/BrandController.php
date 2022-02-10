<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;
use App\Models\Brand;
use App\Rules\NotNumeric;

class BrandController extends Controller
{
    public function index()
    {
        $defaultPaginate = config('paginate.size');
        $brands = Brand::latest()->paginate($defaultPaginate);

        return Inertia::render('Backend/Brand/Index', [
            'brands' => $brands
        ]);
    }


    public function create()
    {
        return Inertia::render('Backend/Brand/Create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'display_name' => ['required', 'unique:brands', new NotNumeric]
        ],
        [
            'display_name.required' => 'The name field is required.',
            'display_name.unique'   => 'The name has already been taken.'
        ]
    );

        if($request->display_name) {
            $name = Str::slug($request->display_name, '-');
        }

        $brand               = new Brand();
        $brand->name         = $name;
        $brand->display_name = $request->display_name;
        $brand->description  = $request->description;
        $brand->status       = $request->status;
        $brand->save();

        return redirect()->route('brands.index');
    }


    public function show($id)
    {
        return 'show';
    }


    public function edit($id)
    {
        $brand = Brand::find($id);

        return Inertia::render('Backend/Brand/Edit', [
            'brand' => $brand
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'display_name' => ['required', "unique:brands,display_name,$id", new NotNumeric]
        ],
        [
            'display_name.required' => 'The name field is required.',
            'display_name.unique'   => 'The name has already been taken.'
        ]
    );
        $brand = Brand::find($id);

        if($request->display_name) {
            $name = Str::slug($request->display_name, '-');
        }

        $brand               = Brand::find($id);
        $brand->name         = $name;
        $brand->display_name = $request->display_name;
        $brand->description  = $request->description;
        $brand->status       = $request->status;
        $brand->save();

        return redirect()->route('brands.index');
    }


    public function destroy($id)
    {
        return 'delete';
    }
}
