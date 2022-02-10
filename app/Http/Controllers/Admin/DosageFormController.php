<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\DosageForm;
use App\Rules\NotNumeric;
use Inertia\Inertia;

class DosageFormController extends Controller
{

    public function index()
    {
        $defaultPaginate = config('paginate.size');
        $dosageForms = DosageForm::latest()->paginate($defaultPaginate);

        return Inertia::render('Backend/DosageForm/Index', [
            'dosageForms' => $dosageForms
        ]);
    }


    public function create()
    {
        return Inertia::render('Backend/DosageForm/Create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'display_name' => ['required', 'unique:dosage_forms', new NotNumeric]
        ],
        [
            'display_name.required' => 'The name field is required.',
            'display_name.unique'   => 'The name has already been taken.'
        ]);

        if($request->display_name) {
            $name = Str::slug($request->display_name, '-');
        }

        $dosageForm               = new DosageForm();
        $dosageForm->name         = $name;
        $dosageForm->display_name = $request->display_name;
        $dosageForm->description  = $request->description;
        $dosageForm->save();

        return  redirect()->route('dosage-forms.index');
    }


    public function show($id)
    {
        return 'show';
    }

    public function edit($id)
    {
        $dosageForm = DosageForm::find($id);

        return Inertia::render('Backend/DosageForm/Edit', [
            'dosageForm' => $dosageForm
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'display_name' => ['required', "unique:dosage_forms,display_name,$id", new NotNumeric]
        ]);

        if($request->display_name) {
            $name = Str::slug($request->display_name, '-');
        }

        $dosageForm = DosageForm::find($id);
        $dosageForm->name = $name;
        $dosageForm->display_name = $request->display_name;
        $dosageForm->description = $request->description;
        $dosageForm->save();

        return redirect()->route('dosage-forms.index');
    }


    public function destroy($id)
    {
        return 'delete';
    }
}
