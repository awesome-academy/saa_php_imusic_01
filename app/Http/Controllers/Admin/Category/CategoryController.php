<?php

namespace App\Http\Controllers\Admin\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
{
    protected $categoryRepo;
    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryRepo->getAll();
        return view('admin.category.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $result = $this->categoryRepo->store($request);
        if ($result) {
            return redirect()->route('admin.category.index')->with('success', trans('messages.add_category_success'));
        }
        return redirect()->back()->withInput(Input::all())->with('error', trans('messages.add_category_fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $result = $this->categoryRepo->update($request, $category);
        if ($result) {
            return redirect()->back()->with('success', trans('messages.update_category_success'));
        }
        return redirect()->back()->withInput(Input::all())->with('error', trans('messages.update_category_fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $result = $this->categoryRepo->delete($category);
        if ($result) {
            return redirect()->back()->with('success', trans('messages.delete_category_success'));
        }
        return redirect()->back()->with('error', trans('messages.delete_category_fail'));
    }
}
