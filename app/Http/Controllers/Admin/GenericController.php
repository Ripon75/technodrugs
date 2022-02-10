<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;
use App\Models\Generic;
use App\Rules\NotNumeric;

class GenericController extends Controller
{

    public function index()
    {
        $defaultPaginate = config('paginate.size');
        $generics = Generic::latest()->paginate($defaultPaginate);

        return Inertia::render('Backend/Generic/Index', [
            'generics' => $generics
        ]);
    }


    public function create()
    {
        return Inertia::render('Backend/Generic/Create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'display_name' => ['required', 'unique:generics', new NotNumeric],
        ],
        [
            'display_name.required' => 'The name field is required.',
            'display_name.unique'   => 'The name has already been taken.'
        ]
    );

        if($request->display_name) {
            $name = Str::slug($request->display_name, '-');
        }

        $generic               = new Generic();
        $generic->name         = $name;
        $generic->display_name = $request->display_name;
        $generic->description  = $request->description;
        $generic->status       = $request->status;
        $generic->save();

        return redirect()->route('generics.index');
    }


    public function show($id)
    {
        return 'show';
    }


    public function edit($id)
    {
        $generic = Generic::find($id);

        return Inertia::render('Backend/Generic/Edit', [
            'generic' => $generic
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'display_name'          => ['required', "unique:generics,display_name,$id", new NotNumeric]
        ],
        [
            'display_name.required' => 'The name field is required.',
            'display_name.unique'   => 'The name has already been taken.'
        ]
    );

        if($request->display_name) {
            $name = Str::slug($request->display_name, '-');
        }

        $generic               = Generic::find($id);
        $generic->name         = $name;
        $generic->display_name = $request->display_name;
        $generic->description  = $request->description;
        $generic->status       = $request->status;
        $generic->save();

        return redirect()->route('generics.index');
    }


    public function destroy($id)
    {
        return 'delete';
    }
}
