<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactUs;
use App\ShowResponses;
use App\Gallery;

class FrontGalleryController extends Controller
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

  // Index Page
  public function getIndex(){
  	// Meta variable
    $meta['description'] = 'Undip World Class University Gallery';
    $meta['author'] = 'Undip World Class University';
    $data['meta'] = $meta;

    $data['title'] = $this->site_name;
    $data['active'] = "gallery";

    // Get Latest News
    $data['galleries'] = Gallery::paginate(12);

    // Kontak
    $data['kontak'] = $this->kontak;

		// Is Show Responses
		$data['isShow'] = $this->showResponses;

    return view('gallery', $data);
  }
}
