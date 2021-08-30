<?php

namespace App\Http\Controllers\Admin\Adverts;

use App\Entity\Adverts\Category;
use App\Entity\Adverts\Attribute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AttributeController extends Controller
{

//    public function create($id)
    public function create($id)
    {
        //

        $category = Category::findOrFail($id);


        $types = Attribute::typesList();




        return view('admin.adverts.categories.attributes.create', compact('category', 'types'));
    }


    public function store(Request $request, $category)
    {

        $this->validate($request,[
            'name' => 'bail|required|string',
            'type' => 'bail|required|string',
            'sort' => 'bail|required|integer',
            'variants' =>'bail|required',
        ]);

        $attribute = Attribute::create([
            'name' => $request['name'],
            'type' => $request['type'],
            'required' => (bool)$request['required'],
            'variants' => array_map('trim', preg_split('#[\r\n]+#', $request['variants'])),
            'sort' => $request['sort'],
            'category_id' => $category,
        ]);

        $category = Category::findOrFail($category);

        return redirect()->route('admin.adverts.categories.show', [$category]);
    }


//  public function show(Category $category, Attribute $attribute)
    public function show($category_id, $attribute_id)
    {
        $category = Category::findOrFail($category_id);
        //dd($category);
        $attribute = Attribute::findOrFail($attribute_id);
//        dd($attribute);
        return view('admin.adverts.categories.attributes.show',compact('category','attribute'));
    }


    public function edit($category_id, $attribute_id)
    {
        //
        $attribute = Attribute::findOrFail($attribute_id);
        $category = Category::findOrFail($category_id);
        if($attribute->category_id !== $category->id)
            Abort(404);
        $types = Attribute::typesList();
        return view('admin.adverts.categories.attributes.edit',compact('category','attribute','types'));
    }


    public function update(Request $request, $category_id, $attribute_id)
    {
        //

        $this->validate($request,[
            'name' => 'bail|required|string',
            'type' => 'bail|required|string',
            'sort' => 'bail|required|integer',
            'variants' =>'bail|required',
        ]);


        $attribute =  Attribute::findOrFail($attribute_id);
        $category = Category::findOrFail($category_id);

        $attribute->update([
            'name' => $request['name'],
            'type' => $request['type'],
            'required' => (bool)$request['required'],
            'variants' => array_map('trim', preg_split('#[\r\n]+#', $request['variants'])),
            'sort' => $request['sort'],
            'category_id' => $category->id,
        ]);


        return redirect()->route('admin.adverts.categories.show', [$category]);
    }

    public function destroy($category_id, $attribute_id)
    {
        $attribute =  Attribute::findOrFail($attribute_id);
        $attribute->delete();
        $category = Category::findOrFail($category_id);
        return redirect()->route('admin.adverts.categories.show', $category);
    }
}
