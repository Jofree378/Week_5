<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        return view ('categories.categories', ['categories' => $categories]);
    }

    public function createCat()
    {
        return view ('categories.catAdd');
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|alpha|unique:categories,name',
            'about' => 'required|string'
        ]);

        $category = new Categories();
        $category->name = $request->name;
        $category->about = $request->about;
        $category->save();
        return redirect()->route('categories');
    }

    public function delete($id)
    {
        Categories::where('id', $id)->delete();
        return redirect()->route('categories');
    }

    public function edit(Categories $categories)
    {
        return view ('categories.catEdit', ['categories' => $categories]);
    }

    public function editSave(Request $request)
    {
        $category = Categories::query()->find($request->id);

        $this->validate($request, [
            'name' => 'required|alpha',
            'about' => 'required|string'
        ]);

        if($request->name == $category->name){
            $category->name = $request->name;
            $category->about = $request->about;
            $category->save();
        } else {
            $this->validate($request, [
                'name' => 'required|alpha|unique:categories,name',
                'about' => 'required|string'
            ]);
            $category->name = $request->name;
            $category->about = $request->about;
            $category->save();
        }


        return redirect()->route('categories');
    }
}
