<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Category;

//use App\Rules\Uppercase;
use App\Http\Requests\CreateValidationRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Pagination\Paginator;
class FoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */



//    public function index(Request $request)
//    {
//        $food = Food::all(); //SELECT * FROM foods;
//        $categories = Category::all();
//        $food->category = $categories;
//        // $food = Food::where('name','=','sushi')
//        //             ->firstOrFail();
//
//        return view('foods.index', [
//            'foods' => $food,
//            'categories' => $categories,
//        ]);
//
//    }
//    public function index(Request $request)
//    {
//
//        $categories = Category::all();
//        $tukhoa = $request->has('tukhoa') ? $request->query('tukhoa') : "";
//        $category_id = $request->has('category_id') ? $request->query('category_id') : null;
//
//        $listfoods = [];
//
//        $query = DB::table("foods");
//
//        if ($category_id !== null && $tukhoa !== null) {
//            $query->where(function ($query) use ($tukhoa, $category_id) {
//                $query->where("name", "like", "%$tukhoa%")
//                    ->Where('category_id', $category_id);
//            });
//        } elseif ($category_id !== null) {
//            $query->where('category_id', $category_id);
//        } elseif ($tukhoa !== null) {
//            $query->where("name", "like", "%$tukhoa%");
//        }
//
//        $listfoods = $query->orderBy("id", "asc")->get();
////
////
//        return view('foods.index', [
//            'categories' => $categories,
//            'listfoods' => $listfoods,
//        ]);
//
//
//    }
//    public function search(Request $request){
//        $categories = Category::all();
//        $tukhoa = $request->has('tukhoa') ? $request->query('tukhoa') : "";
//        $category_id = $request->has('category_id') ? $request->query('category_id') : null;
//
//        $listfoods = [];
//
//        $query = DB::table("foods");
//
//        if ($category_id !== null && $tukhoa !== null) {
//            $query->where(function ($query) use ($tukhoa, $category_id) {
//                $query->where("name", "like", "%$tukhoa%")
//                    ->Where('category_id', $category_id);
//            });
//        } elseif ($category_id !== null) {
//            $query->where('category_id', $category_id);
//        } elseif ($tukhoa !== null) {
//            $query->where("name", "like", "%$tukhoa%");
//        }
//
//        $listfoods = $query->orderBy("id", "asc")->get();
//
//
//        return view('foods.index', [
//            'categories' => $categories,
//            'listfoods' => $listfoods,
//        ]);
//    }


    public function index(Request $request) {
        return $this->handleSearch($request);
    }



    private function handleSearch(Request $request) {
        $categories = Category::all();
        $search = isset($request->search)? $request->search : "";
        $category_id = isset($request->category_id) ? $request->category_id : null;
        $description = isset($request->description) ? $request->description : "";

        $listfoods = [];
        $query = DB::table("foods");
        if ($search) {;
            $query->where("name", "like", "%$search%");
        }
        if (!empty($category_id)) {
            $query->where('category_id', $category_id);

        }
        if ($description) {
            $query->where("description", "like", "%$description%");
        }
//         dd($query->toSQl());
//        $listfoods = $query->orderBy("id", "asc")->get();

        $listfoods = $query
            ->where('is_active', true)
            ->orderBy("id", "asc")->paginate(12)->onEachSide(2);
//        dd($listfoods);
        return view('foods.index', [
            'categories' => $categories,
            'listfoods' => $listfoods,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create()
    {

        $is_active = '';
        //insert new food
        $categories = Category::all();
        return view('foods.create', [
            'categories' => $categories,
            'is_active' => $is_active
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        //dd($request->all());
        //dd($request->file('image')->guessExtension());//jpg, jpeg,...
        //dd($request->file('image')->getSize()); //kilobytes
        //dd($request->file('image')->getError());
        //dd($request->file('image')->isValid());
        $request->validate([
            'name' => 'required',
            'count' => 'required|integer|min:0|max:200',
//            'description' => 'required',
            'image' => 'mimes:jpg,png,jpeg|max:5048'
        ]);



// Kiểm tra giá trị của checkbox is_active và chuyển đổi thành kiểu boolean

        $is_active = isset($request->is_active);
//        dd($is_active);
        if ($request->hasFile('image')) {

            // Nếu có hình ảnh mới được tải lên, cập nhật image_path
            $generatedImageName = 'image' . time() . '-'
                . $request->name . '.'
                . $request->image->extension();

            // Di chuyển hình ảnh mới vào thư mục images
            $request->image->move(public_path('storage'), $generatedImageName);
            $food = Food::create([
                'name' => $request->input('name'),
                'count' => $request->input('count'),
                'description' => $request->input('description'),
                'category_id' => $request->input('category_id'),
                'image_path' => $generatedImageName,
                'is_active' => $is_active,
            ]);
        } else {
            $food = Food::create([
                'name' => $request->input('name'),
                'count' => $request->input('count'),
                'description' => $request->input('description'),
                'category_id' => $request->input('category_id'),
                'is_active' => $is_active,
            ]);
        }
        //dd('This is store function');
        // $food = new Food();
        // $food->name = $request->input('name');
        // $food->count = $request->input('count');
        // $food->description = $request->input('description');
        //$request->validated();
        //we need validate data here
        // $request->validate([
        //     //'name' => 'required|unique:foods',
        //     'name' => new Uppercase,
        //     'count' => 'required|integer|min:0|max:1000',
        //     'category_id' => 'required',
        // ]);
        //if the validation is pass, it will come here !
        //Otherwise it will throw an exception(ValidationException)

        //save to Database
        $food->save();
        return redirect('/foods/warehouse');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function show($id) //like "show details"
    {
        //dd('This is show, id = '.$id);
        $food = Food::find($id);
        //$category = $food->category();
        $category = Category::find($food->category_id);
//        dd($category);
        $food->category = $category;
        //dd($food);
        return view('foods.show')->with('food', $food);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */

    public function edit($id)
    {
        $food = Food::find($id);
        $categories = Category::all();

        // Truy vấn quốc gia mà đồ ăn đang thuộc về
        $foodCategory = Category::find($food->category_id);

        return view('foods.edit', [
            'categories' => $categories,
            'food' => $food,
            'foodCategory' => $foodCategory
        ]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'count' => 'required|integer|min:0|max:200',
            'description' => 'nullable',
            'image' => 'nullable|mimes:jpg,png,jpeg|max:5048'
        ]);

        // Kiểm tra giá trị của checkbox is_active và chuyển đổi thành kiểu boolean
//        $is_active = $request->has('is_active');
        $is_active = isset($request->is_active);
//        dd($is_active);
        // Lấy thông tin food từ cơ sở dữ liệu
        $food = Food::findOrFail($id);

        if ($request->hasFile('image')) {
            // Nếu có hình ảnh mới được tải lên, cập nhật image_path
            $generatedImageName = 'image' . time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('storage'), $generatedImageName);
            $food->update([
                'name' => $request->input('name'),
                'count' => $request->input('count'),
                'description' => $request->input('description'),
                'category_id' => $request->input('category_id'),
                'image_path' => $generatedImageName,
                'is_active' => $is_active,
            ]);
        } else {
            // Nếu không có hình ảnh mới được tải lên
            $food->update([
                'name' => $request->input('name'),
                'count' => $request->input('count'),
                'description' => $request->input('description'),
                'category_id' => $request->input('category_id'),
                'is_active' => $is_active,
            ]);
        }

        return redirect('/foods/' . $id . '/edit');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $food = Food::find($id);
        $food->delete();
        //dd($id);
        return redirect('/foods/warehouse');
    }

    public function search(Request $request)

    {
        $food = Food::all(); //SELECT * FROM foods;
        $categories = Category::all();

        $tukhoa = ($request->has('tukhoa')) ? $request->query('tukhoa') : "";

        $listsp = array();
        if ($tukhoa != "") {

            $listsp = DB::table("foods")
                ->where("name", "like", "%$tukhoa%")
                ->orderBy("description", "asc") // Sorting by description in ascending order
                ->get();

        }


        return view('foods.search', [
            'foods' => $food,
            'categories' => $categories,
            'tukhoa' => $tukhoa,
            'listfoods' => $listsp,
        ]);
    }


    public function warehouse(Request $request): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return $this->handleSearchWarehouse($request);
    }

    private function handleSearchWarehouse(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $categories = Category::all();
        $search = isset($request->search)? $request->search : "";
        $category_id = isset($request->category_id) ? $request->category_id : null;
        $description = isset($request->description) ? $request->description : "";

        $listfoods = [];
        $query = DB::table("foods");
        if ($search) {;
            $query->where("name", "like", "%$search%");
        }
        if (!empty($category_id)) {
            $query->where('category_id', $category_id);

        }
        if ($description) {
            $query->where("description", "like", "%$description%");
        }
//         dd($query->toSQl());
//        $listfoods = $query->orderBy("id", "asc")->get();
        $listfoods =array();
        $listfoods = $query
            ->orderBy("id", "asc")->paginate(12);
//        dd($listfoods->toSQl());
        return view('foods.warehouse', [
            'categories' => $categories,
            'listfoods' => $listfoods,
        ]);
    }


}
