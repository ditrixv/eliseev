<?php

namespace App\Http\Controllers\Admin\Adverts;
use App\Entity\Adverts\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    public function index()
    {
        //
        $categories = Category::defaultOrder()->withDepth()->get();
        return view('admin.adverts.categories.index',compact('categories'));
    }

    public function create()
    {
        //
        $parents = Category::defaultOrder()->withDepth()->get();
        return view('admin.adverts.categories.create',compact('parents'));
    }

    public function store(Request $request)
    {


        $this->validate($request,[
            'name' => 'bail|required|string',
            'slug' => 'bail|required|string',
        ]);

        $category= Category::create([
            'name' => $request['name'],
            'slug' => $request['slug'],
            'parent_id' => $request['parent'],
        ]);

        return redirect()->route('admin.adverts.categories.show',$category);
    }

    public function show(Category $category)
    {
        //
        return view('admin.adverts.categories.show',compact('category'));
    }

    public function edit(Category $category)
    {
        //
        $parents = Category::defaultOrder()->withDepth()->get();
        return view('admin.adverts.categories.edit',compact('category','parents'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request,[
            'name' => 'bail|required|string',
            'slug' => 'bail|required|string',
        ]);

        $category->update([
            'name' => $request['name'],
            'slug' => $request['slug'],
        ]);

        return redirect()->route('admin.adverts.categories.show',$category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.adverts.categories.index');
    }
}
