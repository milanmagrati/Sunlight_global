<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        return view('pages.contact');
    }

    /**
     * Handle an enquiry from the contact form.
     *
     * The front end is being delivered ahead of the back end, so for now the
     * submission is validated and the visitor gets a confirmation. Persisting
     * the enquiry and notifying the office by mail is the next step -- see the
     * note below.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'    => ['required', 'string', 'max:120'],
            'email'   => ['required', 'email', 'max:180'],
            'phone'   => ['required', 'string', 'max:40'],
            'subject' => ['required', 'string', 'max:150'],
            'message' => ['required', 'string', 'max:3000'],
        ], [], [
            'name' => 'full name',
        ]);

        // TODO (back end phase): store the enquiry and notify info@sunlightglobal.com.np
        //   Enquiry::create($data);
        //   Mail::to(config('company.contact.emails.0'))->send(new EnquiryReceived($data));

        return back()
            ->with('status', 'Thank you, '.$data['name'].'. Your message has been received and our team will contact you shortly.')
            ->withFragment('enquiry');
    }
}
