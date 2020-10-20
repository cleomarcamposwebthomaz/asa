<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\BannerTypeRequest;
use Illuminate\Support\Facades\Session;
use App\ModelFilters\AdminFilters\BannerTypeFilter;
use App\Models\BannerType;

class BannerTypeController extends Controller
{
    protected $bannerType;

    public function __construct(BannerType $bannerType)
    {
        $this->bannerType = $bannerType;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bannerTypes = $this->bannerType
            ->filter($request->all(), BannerTypeFilter::class)
            ->sortable()
            ->orderBy('id', 'desc')
            ->paginate();

        return view('admin.pages.banner-type.index', [
            'bannerTypes' => $bannerTypes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.banner-type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerTypeRequest $request)
    {
        $data = $request->only($this->bannerType->fillable);
        $data['active'] = !empty($data['active']) ? true : false;

        $this->bannerType->create($data);

        $request->session()->flash('success', 'Salvo com sucesso.');

        return redirect()->route('admin.banner-type.index');
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
        $bannerType = $this->bannerType->findOrFail($id);

        return view('admin.pages.banner-type.edit', [
            'bannerType' => $bannerType,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BannerTypeRequest $request, $id)
    {
        $data = $request->only($this->bannerType->fillable);
        $data['active'] = !empty($data['active']) ? true : false;

        $bannerType = $this->bannerType->findOrFail($id);

        $bannerType->fill($data)->save();

        $request->session()->flash('success', 'Salvo com sucesso.');

        return redirect()->route('admin.banner-type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bannerType = $this->bannerType->findOrFail($id);
        $bannerType->delete();

        Session::flash('success', 'Registro deletado com sucesso.');

        return redirect()->route('admin.banner-type.index');
    }
}