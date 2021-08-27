<?php

namespace App\Http\Controllers\Admin\Adverts;

use App\Entity\Adverts\Category;
use App\Entity\Adverts\Attribute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AttributeController extends Controller
{

    public function create($id)
    {
        //
        $category = Category::findOrFail($id);

        $types = Attribute::typesList();




        return view('admin.adverts.categories.attributes.create', compact('category', 'types'));
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Category $category, Attribute $attribute)
    {
        //
    }


    public function edit(Attribute $attribute)
    {
        //
    }


    public function update(Request $request, Category $category, Attribute $attribute)
    {
        //
    }


    public function destroy(Attribute $attribute)
    {
        //
    }
}
