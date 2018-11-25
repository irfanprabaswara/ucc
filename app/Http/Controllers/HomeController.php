<?php

namespace App\Http\Controllers;

use Route;
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
use App\Informan;
use App\Respon;
use App\ResponList;
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

    //UNTUK HASIL SURVEY

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
      // $id=Aspek::find($id);
      return view('daftarHasilSurvey',compact('aspekList'));
    }

    public function tampilHasilSurvey(Request $request, $id)
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
        $aspekList = Aspek::where('id','=',$id)->has('pertanyaan.respon_list')->with('pertanyaan.opsi.opsi_list.respon_list_count', 'pertanyaan.jawaban_bebas')->get();
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


    //UNTUK ISIAN SURVEY

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

    public function tampilSurvey(Request $request, $id, $informan=null)
    {
      // Meta variable
        $meta['description'] = 'Diponegoro Research Center';
        $meta['author'] = 'Administrator';
        $data['meta'] = $meta;

        $data['title'] = "Questionnaire | ". $this->site_name;
        $data['active'] = "kuisioner";

        // Get Informan Data
        if (!is_null($informan)) {
            $data_informan = Informan::where('url', $informan)->first();
            $data['informan'] = $data_informan;
        }

        // Get Kuisioner Questions
        $kuisioner = Aspek::with('pertanyaan.opsi.opsi_list')->where('id','=',$id)->get();
        $data['kuisioner_list'] = $kuisioner;
        $data['id'] = $id;

        // Get Contact
        $data['kontak'] = $this->kontak;

        // Is Show Responses
        $data['isShow'] = $this->showResponses;
        return view('tampilSurvey', $data);
    }

    public function submitKuisioner(Request $request, $id){
      // Meta variable
        $meta['description'] = 'Kuisioner Tentang Kinerja Alumni Undip pada Dunia Kerja';
        $meta['author'] = 'Undip World Class University';
        $data['meta'] = $meta;

        $data['title'] = 'Reputasi Undip';
        $data['active'] = "kuisioner";

        // Get Kuisioner Questions
        $kuisioner = Aspek::with('pertanyaan.opsi.opsi_list')->where('id','=',$id)->get();
        $data['kuisioner_list'] = $kuisioner;

        // Validating Input
        $this->validate($request, [
            'nama' => 'required|string|min:3|max:512',
            'jabatan' => 'required|min:1|max:128',
            'email' => 'required|min:1|max:128|email',
            'telpon' => 'required|min:1|max:32',
            'perusahaan' => 'required|min:1|max:128',
            'email_perusahaan' => 'required|min:1|max:128|email',
            'telpon_perusahaan' => 'required|min:1|max:32',
        ]);

        // Updating Informan
        if(!is_null($request->id)){
            $informan = Informan::find($request->id);
            $informan->nama = $request->nama;
            $informan->jabatan = $request->jabatan;
            $informan->email = $request->email;
            $informan->telpon = $request->telpon;
            $informan->perusahaan = $request->perusahaan;
            $informan->email_perusahaan = $request->email_perusahaan;
            $informan->telpon_perusahaan = $request->telpon_perusahaan;

            try {
                $informan->save();
            } catch (QueryException $e) {
                return redirect('/kuisioner')->withInput();
            }
            $informan_id = $request->id;
        }
        // New informan
        else{
            $informan = new Informan();
            $informan->nama = $request->nama;
            $informan->jabatan = $request->jabatan;
            $informan->email = $request->email;
            $informan->telpon = $request->telpon;
            $informan->perusahaan = $request->perusahaan;
            $informan->email_perusahaan = $request->email_perusahaan;
            $informan->telpon_perusahaan = $request->telpon_perusahaan;
            $informan->url = base_convert(microtime(false), 10, 36);;

            try {
                $informan->save();
            } catch (QueryException $e) {
                return redirect('/kuisioner')->withInput();
            }
            $informan_id = $informan->id;
        }

        // Insert new respon
        $respon = new Respon();
        $respon->id_informan = $informan_id;
        try {
            $respon->save();
        } catch (QueryException $e) {
            return redirect('/kuisioner')->withInput();
        }

        $respon_id = $respon->id;

        // Insert Respon List
        foreach ($kuisioner as $aspek){
            foreach ($aspek->pertanyaan as $pertanyaan){
                $respon_list = new ResponList();
                $respon_list->id_respon = $respon_id;
                $respon_list->id_pertanyaan = $pertanyaan->id;
                // If Optional answer
                if ($pertanyaan->id_opsi != 0 && !(is_null($pertanyaan->id_opsi))) {
                    $indeks = 'pertanyaan'.$pertanyaan->id;
                    // dd($indeks);
                    $respon_list->id_opsi_list = $request->Input($indeks);
                    // if ($respon_list->id_opsi_list==null) {
                    //   $respon_list->id_opsi_list="";
                    // }
                }
                // Free answer
                else{
                    $respon_list->id_opsi_list = 0;
                    $indeks = 'pertanyaan'.$pertanyaan->id;
                    $respon_list->jawaban_bebas = $request->$indeks;
                    // if ($respon_list->id_opsi_list==null) {
                    //   $respon_list->id_opsi_list="";
                    // }
                }
                try {
                    $respon_list->save();
                  // dd($respon_list);
                } catch (QueryException $e) {
                    return redirect('/kuisioner')->withInput();
                }
            }
        }
        // Get Contact
        $data['kontak'] = $this->kontak;

        // Is Show Responses
        $data['isShow'] = $this->showResponses;

        $data['sukses'] = "Thank Your for Your Participation.";
        return view('home', $data);
    }
}
