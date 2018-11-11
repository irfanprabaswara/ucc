<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Posting;
use App\ContactUs;
use App\ShowResponses;

class FrontEventsController extends Controller
{
	private $site_name = "Undip World Class University";
    protected $kontak = array();

    public function __construct(){
        // Get Contact Info
        $contact_us = ContactUs::get();

				// Is Show ShowResponses
        $this->showResponses = ShowResponses::get()->first();

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

    // Get All Events
    public function getEvents(Request $request, $filter=null){
    	// Meta variable
        $meta['description'] = 'What\'s on Undip World Class University?';
        $meta['author'] = 'Undip World Class University';
        $data['meta'] = $meta;

        $data['title'] = "Events | ". $this->site_name;
        $data['active'] = "event";

        // Get Latest News
        $data['posts'] = Posting::with('category')->orderBy('id', 'desc')
                                    ->take(4)
                                    ->get();

				if($filter == "all"){
            // Get Events
            $data['events'] = Event::orderBy('start_event', 'desc')->paginate(10);

            // Filter Param
            $data['filter'] = 'all';
            $data['events'] = $data['events']->appends($request->except('page'));
        } else {
            // Get Events
            $data['events'] = Event::where('end_event', '>=', date("Y-m-d H:i:s"))->orderBy('start_event', 'asc')->paginate(10);
        }

        // Get Contact
        $data['kontak'] = $this->kontak;

				// Is Show Responses
        $data['isShow'] = $this->showResponses;

        return view('events', $data);
    }
}
