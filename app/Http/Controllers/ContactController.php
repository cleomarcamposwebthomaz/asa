<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Services\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $contact;
    protected $setting;

    public function __construct(Contact $contact, Setting $setting)
    {
        $this->contact = $contact;
        $this->setting = $setting;
    }

    public function index()
    {
        return view('front.pages.contact');
    }

    public function store(ContactRequest $request)
    {
        $data = $request->only($this->contact->fillable);

        // dd($request->all());

        $this->contact->create($data);

        $request->session()->flash('success', $this->setting->getSetting('contact_text_success'));

        return redirect()->back();
    }
}