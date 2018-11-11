<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactUs;
use App\About;
use App\ShowResponses;

class FrontAboutController extends Controller
{
    private $site_name = "Undip World Class University";
    protected $kontak = array();

    public function __construct(){
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

    public function getAbout()  {
    	// Meta variable
        $meta['description'] = 'About Undip World Class University';
        $meta['author'] = 'Undip World Class University';
        $data['meta'] = $meta;

        $data['title'] = "About | ". $this->site_name;
        $data['active'] = "about";

        // Is Show Responses
        $data['isShow'] = $this->showResponses;

        // Get Contact
        $data['kontak'] = $this->kontak;

        // Get About
        $data['about'] = About::where('active_about', 1)->get()->first();

        return view('about', $data);
    }
}
