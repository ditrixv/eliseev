<?php

namespace App\Http\Controllers\Admin\Adverts;

use App\Entity\Adverts\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    public function __construct()
    {

    }

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

         $attributes = $category->attributes()->orderBy('sort')->get();
        // return view('admin.adverts.categories.show',compact('category','atributes'));
        //$attributes = $category->attributes();
        return view('admin.adverts.categories.show',compact('category','attributes'));
    }

    public function edit(Category $category)
    {
        //
        // $atributes = $category->atributes()->orderBy('sort')->get();
        // return view('admin.adverts.categories.edit',compact('category','atributes'));
        $parents = Category::defaultOrder()->withDepth()->get();
        return view('admin.adverts.categories.edit',compact('category','parents'));
    }



    public function update(Request $request, Category $category)
    {
        $this->validate($request,[
            'name' => 'bail|required|string',
            'slug' => 'bail|required|string',
        ]);

        $category->update([
            'name' => $request['name'],
            'slug' => $request['slug'],
            'parent_id' => $request['parent'],
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

    public function first($id){

        $category = Category::findOrFail($id);
        if($first = $category->siblings()->defaultOrder()->first()){
            $category->insertBeforeNode($first);
        }


        return redirect()->route('admin.adverts.categories.index');
    }

    public function up($id)
    //public function up(Category $category)  так не работает. возможно имена таблиц в бд
    {

         $category = Category::findOrFail($id);
         $category->up();  // метод прямо из тейта из библиотеки

        return redirect()->route('admin.adverts.categories.index');
    }



    public function down($id){
        $category = Category::findOrFail($id);
        $category->down();  // метод прямо из тейта из библиотеки

        return redirect()->route('admin.adverts.categories.index');
    }

    public function last($id){


        $category = Category::findOrFail($id);
        if($last = $category->siblings()->defaultOrder('desc')->first()){
            $category->insertAfterNode($last);
        }

        return redirect()->route('admin.adverts.categories.index');
    }



}
