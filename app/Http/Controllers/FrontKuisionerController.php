<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Aspek;
use App\Informan;
use App\Respon;
use App\ResponList;
use App\ContactUs;
use App\ShowResponses;

class FrontKuisionerController extends Controller
{
    protected $kontak = array();
    private $site_name = "Undip World Class University";

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

    // Handle Kuisioner view
    public function getKuisioner($informan=null){
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
        return view('form', $data);
    }

    // Handle submit kuisioner
    public function submitKuisioner(Request $request){
    	// Meta variable
        $meta['description'] = 'Kuisioner Tentang Kinerja Alumni Undip pada Dunia Kerja';
        $meta['author'] = 'Undip World Class University';
        $data['meta'] = $meta;

        $data['title'] = 'Reputasi Undip';
        $data['active'] = "kuisioner";

        // Get Kuisioner Questions
        $kuisioner = Aspek::with('pertanyaan.opsi.opsi_list')->get();
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
                return redirect('/kuisioner')->withInput()->with('exception', $e->errorInfo[2]);
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
                return redirect('/kuisioner')->withInput()->with('exception', $e->errorInfo[2]);
            }
            $informan_id = $informan->id;
        }

        // Insert new respon
        $respon = new Respon();
        $respon->id_informan = $informan_id;
        try {
            $respon->save();
        } catch (QueryException $e) {
            return redirect('/kuisioner')->withInput()->with('exception', $e->errorInfo[2]);
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
                    $respon_list->id_opsi_list = $request->$indeks;
                }
                // Free answer
                else{
                    $respon_list->id_opsi_list = 0;
                    $indeks = 'pertanyaan'.$pertanyaan->id;
                    $respon_list->jawaban_bebas = $request->$indeks;
                }
                try {
                    $respon_list->save();
                } catch (QueryException $e) {
                    return redirect('/kuisioner')->withInput()->with('exception', $e->errorInfo[2]);
                }
            }
        }
        // Get Contact
        $data['kontak'] = $this->kontak;

        // Is Show Responses
        $data['isShow'] = $this->showResponses;

        $data['sukses'] = "Thank Your for Your Participation.";
        return view('form', $data);
    }
}
