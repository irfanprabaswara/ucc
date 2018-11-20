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
use App\Aspek;
use Auth;
use Lava;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    private $site_name = "Home - Diponegoro Research Center";
    protected $kontak = array();


    public function index()
    {
        return view('home');
    }

    public function getIndex(){
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

      return view('home', $data);
    }

    public function listIsiSurvey()
    {
      $meta['description'] = 'Recent updates on Undip World Class University';
      $meta['author'] = 'Undip World Class University';
      $data['meta'] = $meta;

      $data['title'] = $this->site_name;
      $data['active'] = "listIsiSurvey";
      
      //mengambil session registeras
      $registeras = Auth::user()->registeras;
      $aspekList = Aspek::where('tujuan',$registeras)->get();  
      return view('daftarIsiSurvey',compact('aspekList'));
    }

    public function listHasilSurvey()
    {
      $meta['description'] = 'Recent updates on Undip World Class University';
      $meta['author'] = 'Undip World Class University';
      $data['meta'] = $meta;

      $data['title'] = $this->site_name;
      $data['active'] = "listHasilSurvey";
      
      //mengambil session registeras
      $registeras = Auth::user()->registeras;
      $aspekList = Aspek::where('tujuan','!=',$registeras)->get();  
      return view('daftarHasilSurvey',compact('aspekList'));
    }

    public function tampilHasilSurvey()
    {
      // if(!$this->showResponses->is_show)
      //     return redirect('/');
        // Meta variable
        $meta['description'] = 'Whats companys said about Undip World Class University\'s alumni';
        $meta['author'] = 'Undip World Class University';
        $data['meta'] = $meta;

        $data['title'] = "Show Responses | ". $this->site_name;
        $data['active'] = "listHasilSurvey";

      // Chart
        $aspekList = Aspek::has('pertanyaan.respon_list')->with('pertanyaan.opsi.opsi_list.respon_list_count', 'pertanyaan.jawaban_bebas')->get();
        $charts = [];
        $openQuestions = [];
        $count = [];
        foreach ($aspekList as $aspek) {
          foreach ($aspek->pertanyaan as $pertanyaan) {
            $respon = Lava::DataTable();
            $respon->addStringColumn('Option');
            $respon->addNumberColumn('Percent');
            $count[$pertanyaan->id] = 0;
            // If Close Question
            if ($pertanyaan->id_opsi != 0 && !(is_null($pertanyaan->id_opsi))) {
              $colors = [];
              $indeks = 0;
              foreach ($pertanyaan->opsi->opsi_list as $opsi) {
                if (empty($opsi->respon_list_count->first()->aggregate)) {
                  $count[$pertanyaan->id] += 0;
                } else {
                  $count[$pertanyaan->id] += $opsi->respon_list_count->first()->aggregate;
                }
              }
              foreach ($pertanyaan->opsi->opsi_list as $opsi) {
                if ($opsi->respon_list_count->isEmpty()) {
                  $respon->addRow([$opsi->nama_list, 0]);
                  $colors[$indeks] = ['color' => $opsi->color_opsi_list];
                } else {
                  $respon->addRow([$opsi->nama_list, ($opsi->respon_list_count->first()->aggregate/$count[$pertanyaan->id]) * 100]);
                  $colors[$indeks] = ['color' => $opsi->color_opsi_list];
                }
                $indeks++;
              }
              Lava::PieChart('chart'.$pertanyaan->id, $respon, [
                  'title'  => $pertanyaan->pertanyaan,
                  'is3D'   => true,
                  'slices' => $colors
              ]);
              array_push($charts, 'chart'.$pertanyaan->id);
            }
            // Else (Open question)
            else {
              $openQuestion['pertanyaan'] = $pertanyaan->pertanyaan;
              $openQuestion['jawaban'] = [];
              foreach ($pertanyaan->jawaban_bebas as $jawaban) {
                array_push($openQuestion['jawaban'], $jawaban->jawaban_bebas);
              }
              array_push($openQuestions, $openQuestion);
            }
          }
        }

        $data['charts'] = $charts;
        $data['openQuestions'] = $openQuestions;

        // Get Contact
        $data['kontak'] = $this->kontak;

        // Is Show Responses
        // $data['isShow'] = $this->showResponses;

      return view('tampilHasilSurvey',$data);
    }

    public function tampilSurvey()
    {
      // Meta variable
        $meta['description'] = 'Undip World Class University';
        $meta['author'] = 'Undip World Class University';
        $data['meta'] = $meta;

        $data['title'] = "Questionnaire | ". $this->site_name;
        $data['active'] = "kuisioner";

        // Get Informan Data
        if (!is_null($informan)) {
            $data_informan = Informan::where('url', $informan)->first();
            $data['informan'] = $data_informan;
        }

        // Get Kuisioner Questions
        $kuisioner = Aspek::with('pertanyaan.opsi.opsi_list')->get();
        $data['kuisioner_list'] = $kuisioner;

        // Get Contact
        $data['kontak'] = $this->kontak;

        // Is Show Responses
        $data['isShow'] = $this->showResponses;
        return view('tampilSurvey', $data);
    }
}
