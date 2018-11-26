<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posting;
use App\Slider;
use App\Category;
use App\Event;
use App\Sambutan;
use App\Partner;
use App\ContactUs;
use App\Testimonial;
use App\Link;
use App\ShowResponses;
use Auth;

class FrontPostingController extends Controller
{
	private $site_name = "DIRECT - Diponegoro Research Center";
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
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }
    	// Meta variable
      $meta['description'] = 'Recent updates on Undip World Class University';
      $meta['author'] = 'Undip World Class University';
      $data['meta'] = $meta;

      $data['title'] = $this->site_name;
      $data['active'] = "home";

      // Get Latest News
      $data['posting'] = Posting::with('category')->orderBy('id', 'desc')
             						->take(6)
             						->get();

			// Get Sliders
			$data['slider'] = Slider::get();

			// Get Events
			$data['events'] = Event::where([['end_event', '>=', date("Y-m-d H:i:s")]])->orderBy('start_event', 'asc')->get();

      // Get Active Sambutan
      $data['sambutan'] = Sambutan::where('active_sambutan', 'Active')->first();

      // Get Partner
      $data['partners'] = Partner::orderBy('id', 'asc')->get();

      // Kontak
      $data['kontak'] = $this->kontak;

			// Is Show Responses
			$data['isShow'] = $this->showResponses;

      // Testimonial
      $data['testi'] = Testimonial::get();

      // Link
      $data['link'] = Link::get();
      session()->forget('aggrement');
      return view('index', $data);
    }

    // Single Post Page
    public function getPost($category = null, $slug = null){
    	// Meta variable
        $meta['author'] = 'Undip World Class University';        

        $data['active'] = "news";

        // Kontak
        $data['kontak'] = $this->kontak;

				// Is Show Responses
        $data['isShow'] = $this->showResponses;

        // Get Events
        $data['events'] = Event::where('end_event', '>=', date("Y-m-d H:i:s"))->orderBy('start_event', 'asc')->take(3)->get();

        if (is_null($category)) {
        	$data['sub'] = 'all';
        	// All posts
        	$meta['description'] = "News on Undip World Class University";
        	$data['meta'] = $meta;

        	$data['title'] = "News | ". $this->site_name;
        	$data['all_posts'] = Posting::with('category')->orderBy('id', 'desc')->paginate(2);
        } else if (is_null($slug)){
        	$data['sub'] = 'category';

        	// Get Category
					$category = Category::where('slug', $category)->first();

					$meta['description'] = $category->nama_kategori . " News on Undip World Class University";
        	$data['meta'] = $meta;
        	$data['title'] = $category->nama_kategori . " | " . $this->site_name;
        	$data['category'] = $category;

        	// All posts
					$data['all_posts'] = Posting::with('category')->where('id_category', $category->id)->orderBy('id', 'desc')->paginate(5);
        } else {
        	// Get Latest News
	        $data['posts'] = Posting::with('category')->orderBy('id', 'desc')
	               						->take(4)
	               						->get();

        	// Get News
	        $posting = Posting::with('category')->with('user')->where('slug', $slug)->first();
	        $data['posting'] = $posting;

	        $data['title'] = $posting->title . " | " . $this->site_name;

	        $meta['description'] = str_limit(strip_tags($posting->content), 155);
        	$data['meta'] = $meta;

	        return view('news-single', $data);
        }

				return view('news', $data);
    }

    public function getSearch(Request $request){
    	if ($request->get('q') == "") return redirect('/');

    		$data['title'] = "Search Result of " . $request->get('q') . " | " . $this->site_name;
        $data['active'] = "news";
        $data['sub'] = 'search';

    		// Meta variable
        $meta['description'] = 'Undip World Class University';
        $meta['author'] = 'Undip World Class University';
        $data['meta'] = $meta;

        // Get Events
        $data['events'] = Event::where('end_event', '>=', date("Y-m-d H:i:s"))->orderBy('start_event', 'asc')->take(3)->get();

        // Kontak
        $data['kontak'] = $this->kontak;

				// Is Show Responses
        $data['isShow'] = $this->showResponses;

        // Get Searched News
        $data['all_posts'] = Posting::with('category')->orderBy('id', 'desc')
        							->where('title' , 'like', '%'.$request->get('q').'%')
               						->paginate(2);

        // Search Param
        $data['all_posts'] = $data['all_posts']->appends($request->except('page'));
        $data['query'] = $request->except('page');
        return view('news', $data);
    }
}
