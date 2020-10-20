<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TagRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\ModelFilters\AdminFilters\TagFilter;
use App\Models\Tag;

class TagController extends Controller
{
    protected $tag;

    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tags = $this->tag
                        ->filter($request->all(), TagFilter::class)
                        ->sortable()
                        ->orderBy('id', 'desc')
                        ->paginate();

        return view('admin.pages.tag.index', [
            'tags' => $tags
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $saveFormContinueAdd = true;

        return view('admin.pages.tag.create', compact('saveFormContinueAdd'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        $data = $request->only($this->tag->fillable);

        $this->tag->create($data);

        $request->session()->flash('success', 'Salvo com sucesso.');

        if (!empty($request->input('save-and-create'))) {
            return redirect()->back();
        }
        
        return redirect()->route('admin.tag.index');
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
        $tag = $this->tag->findOrFail($id);

        return view('admin.pages.tag.edit', [
            'tag' => $tag,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, $id)
    {
        $data = $request->only($this->tag->fillable);

        $tag = $this->tag->findOrFail($id);

        $tag->fill($data)->save();

        $request->session()->flash('success', 'Salvo com sucesso.');

        return redirect()->route('admin.tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = $this->tag->findOrFail($id);
        $tag->delete();

        Session::flash('success', 'Registro deletado com sucesso.');

        return redirect()->route('admin.tag.index');
    }
}