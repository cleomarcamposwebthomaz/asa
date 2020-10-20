<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Category;
use App\ModelFilters\AdminFilters\CategoryFilter;

class categoryController extends Controller
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = $this->category
            ->filter($request->all(), CategoryFilter::class)
            ->sortable()
            ->orderBy('id', 'desc')
            ->with('children')
            ->with('father')
            ->paginate();

        return view('admin.pages.category.index', [
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
        $categories = $this->category->pluck('name', 'id');
        $categories->prepend('Categoria PAI', '');

        $formButtons[] = [
            'title' => 'Salvar e adicionar mais items',
            'name' => 'saveAndContinue',
            'icon' => 'plus',
            'value' => 1
        ];

        $saveFormButton = true;

        return view('admin.pages.category.create', compact('categories', 'formButtons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(categoryRequest $request)
    {
        $data = $request->only($this->category->fillable);
        $data['active'] = !empty($data['active']) ? true : false;
        $data['show_menu'] = !empty($data['show_menu']) ? true : false;

        $category = $this->category->create($data);

        if (!empty($request->input('saveAndContinue'))) {
            return redirect()->route('admin.category.create', ['parent_id' => $category->parent_id]);
        }

        $request->session()->flash('success', 'Salvo com sucesso.');

        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->category->findOrFail($id);

        $categories = $this->category->pluck('name', 'id');
        $categories->prepend('Categoria PAI', '');

        return view('admin.pages.category.edit', [
            'category' => $category,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->only($this->category->fillable);
        $data['active'] = !empty($data['active']) ? true : false;
        $data['show_menu'] = !empty($data['show_menu']) ? true : false;

        $category = $this->category->findOrFail($id);

        $category->fill($data)->save();

        $request->session()->flash('success', 'Salvo com sucesso.');

        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->category->findOrFail($id);
        $category->delete();

        Session::flash('success', 'Registro deletado com sucesso.');

        return redirect()->route('admin.category.index');
    }
}