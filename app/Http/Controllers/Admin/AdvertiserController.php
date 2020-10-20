<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdvertiserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\ModelFilters\AdminFilters\AdvertiserFilter;
use App\Models\Advertiser;

class AdvertiserController extends Controller
{
    protected $advertiser;

    public function __construct(advertiser $advertiser)
    {
        $this->advertiser = $advertiser;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $advertisers = $this->advertiser
                                ->filter($request->all(), AdvertiserFilter::class)
                                ->sortable()
                                ->orderBy('id', 'desc')
                                ->paginate();

        return view('admin.pages.advertiser.index', [
            'advertisers' => $advertisers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.advertiser.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(advertiserRequest $request)
    {
        $data = $request->only($this->advertiser->fillable);

        $this->advertiser->create($data);

        $request->session()->flash('success', 'Salvo com sucesso.');

        if (!empty($request->input('save-and-create'))) {
            return redirect()->back();
        }

        return redirect()->route('admin.advertiser.index');
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
        $advertiser = $this->advertiser->findOrFail($id);

        return view('admin.pages.advertiser.edit', [
            'advertiser' => $advertiser,
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
        $data = $request->only($this->advertiser->fillable);
        $data['active'] = !empty($data['active']) ? true : false;

        $advertiser = $this->advertiser->findOrFail($id);

        $advertiser->fill($data)->save();

        $request->session()->flash('success', 'Salvo com sucesso.');

        return redirect()->route('admin.advertiser.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advertiser = $this->advertiser->findOrFail($id);
        $advertiser->delete();

        Session::flash('success', 'Registro deletado com sucesso.');

        return redirect()->route('admin.advertiser.index');
    }
}