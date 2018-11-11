<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactUs;
use App\Contact;
use App\ShowResponses;

class FrontContactController extends Controller
{
    private $site_name = "Undip World Class University";
    protected $kontak = array();

    public function __construct(){
        // Get Contact Info
        $contact_us = ContactUs::get();

        // Is Show ShowResponses
        $this->showResponses = ShowResponses::get()->first();

        // Get Contact Info
        $contact_us = ContactUs::get();

        $this->kontak['phones'] = $contact_us->filter(function($contact_us){
            return $contact_us->social_contact == 'Phone';
        });
        $this->kontak['emails'] = $contact_us->filter(function($contact_us){
            return $contact_us->social_contact == 'Email';
        });
        $this->kontak['twitters'] = $contact_us->filter(function($contact_us){
            return $contact_us->social_contact == 'Twitter';
        });
        $this->kontak['facebooks'] = $contact_us->filter(function($contact_us){
            return $contact_us->social_contact == 'Facebook';
        });
        $this->kontak['youtubes'] = $contact_us->filter(function($contact_us){
            return $contact_us->social_contact == 'Youtube';
        });
        $this->kontak['linkedins'] = $contact_us->filter(function($contact_us){
            return $contact_us->social_contact == 'Linkedin';
        });
        $this->kontak['gpluss'] = $contact_us->filter(function($contact_us){
            return $contact_us->social_contact == 'Google Plus';
        });
        $this->kontak['instagrams'] = $contact_us->filter(function($contact_us){
            return $contact_us->social_contact == 'Instagram';
        });
        $this->kontak['lines'] = $contact_us->filter(function($contact_us){
            return $contact_us->social_contact == 'Line';
        });
        $this->kontak['pinterests'] = $contact_us->filter(function($contact_us){
            return $contact_us->social_contact == 'Pinterest';
        });
    }

    public function getContact(){
    	// Meta variable
        $meta['description'] = 'Keep in touch with Undip World Class University via our social media';
        $meta['author'] = 'Undip World Class University';
        $data['meta'] = $meta;

        $data['title'] = "Contact | ". $this->site_name;
        $data['active'] = "contact";

        // Get Contact
        $data['kontak'] = $this->kontak;

        // Is Show Responses
        $data['isShow'] = $this->showResponses;

        return view('contact', $data);
    }

    public function submitContact(Request $request){
    	// Meta variable
        $meta['description'] = 'Contact Undip World Class University';
        $meta['author'] = 'Undip World Class University';
        $data['meta'] = $meta;

        $data['title'] = "Contact | ". $this->site_name;
        $data['active'] = "contact";

        // Get Contact
        $data['kontak'] = $this->kontak;

        // Is Show Responses
        $data['isShow'] = $this->showResponses;

        // Validating Input
        $this->validate($request, [
            'name' => 'required|string|min:1|max:512',
            'email' => 'required|min:1|max:255|email',
            'phone' => 'required|min:1|max:32',
            'message' => 'required'
        ]);

        // Save Contact
        $message = new Contact();
        $message->name_contact = $request->name;
        $message->email_contact = $request->email;
        $message->phone_contact = $request->phone;
        $message->message_contact = $request->message;

        try {
            $message->save();
        } catch (QueryException $e) {
            return redirect('/contact')->withInput()->with('exception', $e->errorInfo[2]);
        }
        $data['sukses'] = "Thank You. We Will Contact You As Fast As Possible.";
        return view('contact', $data);
    }
}
