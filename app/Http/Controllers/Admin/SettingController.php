<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    protected $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $settings = $this->setting
            ->sortable()
            ->filter($request->all())
            ->orderBy('id', 'desc')
            ->paginate();

        return view('admin.pages.setting.index', [
            'settings' => $settings,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.setting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SettingRequest $request)
    {
        $data = $request->only(['name', 'label', 'public_name', 'value', 'is_file']);

        $this->setting->create($data);

        $request->session()->flash('success', 'Salvo com sucesso.');

        return redirect()->route('admin.setting.index');
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
        $setting = $this->setting->findOrFail($id);

        return view('admin.pages.setting.edit', [
            'setting' => $setting,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SettingRequest $request, $id)
    {
        $data = $request->only(['name', 'label', 'public_name', 'value', 'is_file']);

        $setting = $this->setting->findOrFail($id);

        $setting->fill($data)->save();

        $request->session()->flash('success', 'Salvo com sucesso.');

        return redirect()->route('admin.setting.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setting = $this->setting->findOrFail($id);
        $setting->delete();

        Session::flash('success', 'Registro deletado com sucesso.');

        return redirect()->route('admin.setting.index');
    }
}