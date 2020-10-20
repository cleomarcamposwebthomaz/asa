<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\BannerRequest;
use Illuminate\Support\Facades\Session;
use App\ModelFilters\AdminFilters\BannerFilter;
use App\Models\Banner;
use App\Models\BannerType;

class BannerController extends Controller
{
    protected $banner;
    protected $bannerType;

    public function __construct(Banner $banner, BannerType $bannerType)
    {
        $this->banner = $banner;
        $this->bannerType = $bannerType;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $banners = $this->banner
            ->filter($request->all(), BannerFilter::class)
            ->sortable()
            ->with('type')
            ->orderBy('id', 'desc')
            ->paginate();

        return view('admin.pages.banner.index', [
            'banners' => $banners
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bannerTypes = $this->bannerType->query()->pluck('name', 'id');

        return view('admin.pages.banner.create', [
            'bannerTypes' => $bannerTypes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        $data = $request->only($this->banner->fillable);

        $this->banner->create($data);

        $request->session()->flash('success', 'Salvo com sucesso.');

        return redirect()->route('admin.banner.index');
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
        $banner = $this->banner->findOrFail($id);
        $bannerTypes = $this->bannerType->query()->pluck('name', 'id');

        return view('admin.pages.banner.edit', [
            'banner' => $banner,
            'bannerTypes' => $bannerTypes,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, $id)
    {
        $data = $request->only($this->banner->fillable);

        $banner = $this->banner->findOrFail($id);

        $banner->fill($data)->save();

        $request->session()->flash('success', 'Salvo com sucesso.');

        return redirect()->route('admin.banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = $this->banner->findOrFail($id);
        $banner->delete();

        Session::flash('success', 'Registro deletado com sucesso.');

        return redirect()->route('admin.banner.index');
    }
}