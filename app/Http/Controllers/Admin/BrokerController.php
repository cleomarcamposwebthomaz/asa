<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BrokerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\ModelFilters\AdminFilters\BrokerFilter;
use App\Models\Broker;

class BrokerController extends Controller
{
    protected $broker;

    public function __construct(broker $broker)
    {
        $this->broker = $broker;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $brokers = $this->broker
            ->filter($request->all(), BrokerFilter::class)
            ->sortable()
            ->orderBy('id', 'desc')
            ->paginate();

        return view('admin.pages.broker.index', [
            'brokers' => $brokers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.broker.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrokerRequest $request)
    {
        $data = $request->only($this->broker->fillable);
        $data['active'] = !empty($data['active']) ? true : false;
        $data['show_phone'] = !empty($data['show_phone']) ? true : false;
        $data['show_whatsapp'] = !empty($data['show_whatsapp']) ? true : false;

        $this->broker->create($data);

        $request->session()->flash('success', 'Salvo com sucesso.');

        if (!empty($request->input('save-and-create'))) {
            return redirect()->back();
        }

        return redirect()->route('admin.broker.index');
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
        $broker = $this->broker->findOrFail($id);

        return view('admin.pages.broker.edit', [
            'broker' => $broker,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrokerRequest $request, $id)
    {
        $data = $request->only($this->broker->fillable);
        $data['active'] = !empty($data['active']) ? true : false;
        $data['show_phone'] = !empty($data['show_phone']) ? true : false;
        $data['show_whatsapp'] = !empty($data['show_whatsapp']) ? true : false;

        $broker = $this->broker->findOrFail($id);

        $broker->fill($data)->save();

        $request->session()->flash('success', 'Salvo com sucesso.');

        return redirect()->route('admin.broker.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $broker = $this->broker->findOrFail($id);
        $broker->delete();

        Session::flash('success', 'Registro deletado com sucesso.');

        return redirect()->route('admin.broker.index');
    }
}