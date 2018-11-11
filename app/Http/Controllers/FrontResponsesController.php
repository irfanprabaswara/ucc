<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aspek;
use App\ContactUs;
use App\ShowResponses;
use Lava;

class FrontResponsesController extends Controller
{
    //
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

    // Handle Show Responses view
    public function getResponses(){
        if(!$this->showResponses->is_show)
          return redirect('/');
        // Meta variable
        $meta['description'] = 'Whats companys said about Undip World Class University\'s alumni';
        $meta['author'] = 'Undip World Class University';
        $data['meta'] = $meta;

        $data['title'] = "Show Responses | ". $this->site_name;
        $data['active'] = "responses";


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
        $data['isShow'] = $this->showResponses;
        return view('response', $data);
    }
}
