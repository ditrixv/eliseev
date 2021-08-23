<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entity\Region;


class RegionController extends Controller
{

    public function index()
    {
        //
        $regions = Region::where('parent_id',null)->orderBy('name')->get();
        return view('admin.regions.index',compact('regions'));
    }


    public function create(Request $request)
    {

        $parent = null;
        if($request->get('parent_id')){
            $parent = Region::findOrFail($request->get('parent_id'));
        }

        return view('admin.regions.create',compact('parent'));
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'bail|required|string|max:255|unique:regions',
            'slug' => 'bail|required|string|max:255|unique:regions',
        ]);

        $region = Region::create([
            'name' => $request['name'],
            'slug' => $request['slug'],
            'parent_id' => $request['parent'],
        ]);

        return redirect()->route('admin.regions.show',$region);

    }


    public function show(Region $region)
    {
        $parent = null;
        if($region->parent_id !== null){
            $parent = Region::find($region->parent_id);
        }
        $regions = $region->children()->orderBy('name')->get();
        return view('admin.regions.show ',compact('region','regions','parent'));
    }


    public function edit(Region $region)
    {
        return view('admin.regions.edit',compact('region'));
    }


    public function update(Request $request, Region $region)
    {

        $this->validate($request,[
            'name' => 'bail|required|string',
            'slag' => 'bail|required|string',
        ]);

        $region->update([
            'name' => $request['name'],
            'slug' => $request['slug'],
        ]);

        return redirect()->route('admin.regions.show',$region);

    }


    public function destroy(Region $region)
    {
        $region->delete();
        return redirect()->route('admin.regions.index');
    }
}
