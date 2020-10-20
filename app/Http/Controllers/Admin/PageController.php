<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PageRequest;
use App\ModelFilters\AdminFilters\PageFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Page;

class PageController extends Controller
{
    protected $page;

    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pages = $this->page
            ->filter($request->all(), PageFilter::class)
            ->sortable()
            ->orderBy('id', 'desc')
            ->paginate();

        return view('admin.pages.cms.index', [
            'pages' => $pages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.cms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        $data = $request->only(['title', 'content', 'active']);
        $data['active'] = !empty($data['active']) ? true : false;

        $this->page->create($data);

        $request->session()->flash('success', 'Salvo com sucesso.');

        return redirect()->route('admin.page.index');
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
        $page = $this->page->findOrFail($id);

        return view('admin.pages.cms.edit', [
            'page' => $page
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
        $data = $request->only(['title', 'content', 'active']);
        $data['active'] = !empty($data['active']) ? true : false;
        
        $page = $this->page->findOrFail($id);

        $page->fill($data)->save();

        $request->session()->flash('success', 'Salvo com sucesso.');

        return redirect()->route('admin.page.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = $this->page->findOrFail($id);
        $page->delete();

        Session::flash('success', 'Registro deletado com sucesso.');

        return redirect()->route('admin.page.index');
    }
}