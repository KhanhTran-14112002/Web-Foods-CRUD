<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        return $this->handleSearch($request);
    }
    private function handleSearch(Request $request)
    {
        $search = isset($request->search) ? $request->search : "";
        $query = DB::table("categories");
        if ($search) {

            $query->Where("name", "like", "%$search%");
            $query->orWhere("description", "like", "%$search%");
        }
//        dd($query->toSql());
        $categories = $query
        ->orderBy("id", "asc")->paginate(12);
        return view('categories.index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('categories.create', [

        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categoryData = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),

        ];
        Category::create($categoryData);

        return redirect('/categories');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        $foods = Food::where('category_id', $id)->get();
        return view('categories.show', [
            'category' => $category,
            'foods' => $foods,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::find($id);
        return view('categories.edit', [
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',

            'description' => 'nullable',

        ]);
        $category = Category::findOrFail($id);

        $categoryData = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),

        ];
        // Lưu dữ liệu vào database
        $category->update($categoryData);

        return redirect('/categories/' . $id . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('/categories');
    }
}
