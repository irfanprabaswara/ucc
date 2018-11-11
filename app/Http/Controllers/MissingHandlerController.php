<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posting;
use App\ContactUs;
use App\ShowResponses;
use App\Event;

class MissingHandlerController extends Controller
{
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

  public function getIndex(){
    $meta['author'] = 'Undip World Class University';    

    // Kontak
    $data['kontak'] = $this->kontak;

    // Is Show Responses
    $data['isShow'] = $this->showResponses;

    // Get Events
    $data['events'] = Event::where('end_event', '>=', date("Y-m-d H:i:s"))->orderBy('start_event', 'asc')->take(3)->get();

    // Get Latest News
    $data['posts'] = Posting::with('category')->orderBy('id', 'desc')
                      ->take(4)
                      ->get();

    $data['title'] = "Page Not Found | " . $this->site_name;
    $data['meta'] = $meta;

    return view('missing', $data);
  }

}
