@extends ('layouts.templatedirect')

@section('header')
    @parent
@endsection

@section('content')
 <!-- Header with Background Image -->
 <header class="business-header">
      <div class="container">
        <div class="row">
          <div class="col-md-6" style="padding-top:8%">
            <h4 class=" display-4 text-left text-white" style="width:30%">Diponegoro HR Research Center</h4>
            <p>DIRECT hadir untuk membantu organisasi memenuhi kebutuhannya terkait pengembangan SDM, baik organisasi bisnis, swasta, pendidikan dan pemerintahan. Hasil dari riset ini akan digunakan sebagai dasar dalam penyusunan dan pengembangan program organisasi yang bergerak di sumber daya manusia, sehingga dapat memberikan kontribusi terbaik dalam Pengembangan SDM di Indonesia.</p>
          </div>
          <div class="col-md-6 text-right" style="padding-top:8%">
            <img src="{{asset('images/ucc-direct/illustration-decent-blue.svg')}}" alt="doit illustration">
          </div>
        </div>
      </div>
    </header>

<div class="container-fluid">
    <!-- about -->
<section id="onepage-about" class="py-4">
    <div class="row justify-content-center pt-2">
        <div class="col-9 my-3 text-center">
            <h1>About Us</h1>
            <hr class="under-job-title"/>
        </div>
        <div class="col-10 col-md-10 col-lg-4 " >
            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbspBerkembangnya teknologi informasi di era milenial saat ini menyebabkan peningkatan kompetensi SDM di segala bidang sangat diperlukan. Pasar kerja tidak hanya membutuhkan SDM yang handal, tangguh dan berkualitas tetapi juga peka dan mampu mengelola perubahan.</p>
            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbspUntuk mengantisipasi persaingan SDM di era global ini, diperlukan pengembangan riset di bidang sumber daya manusia . Hasil riset dan publikasi ilmiah yang berfokus pada karir dan pengembangan kapasitas individu sangat diperlukan untuk memberikan rekomendasi secara kontinyu dan signiﬁkan dalam rangka meningkatkan daya saing bangsa.</p>
            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbspTanpa riset, akan sangat sulit bagi sebuah organisasi untuk menentukan dan mengembangkan target pasar serta potensi bisnis mereka. Selain itu, kurangnya riset juga mengakibatkan banyak organisasi yang mengeluhkan adanya kesenjangan kompetensi antara kebutuhan perusahaan dan sumber daya yang tersedia. Diponegoro Research Center (DIRECT) merupakan divisi dari Diponegoro Human Development Center (DHDC) yang bertugas memfasilitasi penyediaan jasa riset untuk mewadahi urgensi kebutuhan terkait pengembangan Sumber Daya Manusia (SDM).</p>
        </div>
        <div class="col-10 col-md-10 col-lg-4">
        <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbspDIRECT hadir untuk membantu organisasi memenuhi kebutuhannya terkait pengembangan SDM, baik organisasi bisnis, swasta, pendidikan dan pemerintahan. Hasil dari riset ini akan digunakan sebagai dasar dalam penyusunan dan pengembangan program organisasi yang bergerak di sumber daya manusia, sehingga dapat memberikan kontribusi terbaik dalam Pengembangan SDM di Indonesia.</p>
            <img src="{{asset('images/ucc-direct/direktur.png')}}" alt="direktur direct" class="img-rounded d-block mx-auto pb-3" style="width:70%">
            <h4>Director : <strong>Mirwan Surya Perdhana, S.E., MM., Ph.</strong></h4>
        </div>
    </div>
</section>
<!-- end about -->
</div> <!-- container fluid closing tag -->

<!-- pembatas -->
<section class="pembatas">
    <div class="pt-3 pb-3" style="background-color:#56A8FF">
    </div>
</section> 

<div class="container-fluid">
<!-- programs&services -->
<section id="onepage-programsandservices" class="py-4">
    <div class="row justify-content-center pt-2">
    <div class="col-9 my-3 text-center">
            <h1>Programs & Services</h1>
            <hr class="under-job-title">
        </div>
    </div>
    <div class="row pt-5 pb-3 my-4 justify-content-center ">
        <div class="col-sm-12 col-md-12 col-lg-6 text-center py-5">
            <h4>HR SURVEY</h4>
            <img src="{{asset('images/ucc-direct/hr_survey.png')}}" class="pt-4 pb-3" alt="hr_survey_img" style="width:30%;">
            <button class="btn btn-primary button-moreinfo btn-sm mt-3 d-block mx-auto" type="button" data-toggle="modal" data-target="#HR_SurveyModal" >
                More info
            </button>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 text-center py-5">
            <h4>HR RESEARCH AND DEVELOPMENT</h4>
            <img src="{{asset('images/ucc-direct/hr_r&d.png')}}" class="pt-4 pb-3" alt="hr_survey_img"style="width:30%;">
            <button class="btn btn-primary button-moreinfo btn-sm mt-3 d-block mx-auto" type="button" data-toggle="modal" data-target="#HR_RDModal">
                More info
            </button>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="HR_SurveyModal" tabindex="-1" role="dialog" aria-labelledby="HR_SurveyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="HR_SurveyModalLabel">HR SURVEY</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p class="text-justify">
            &nbsp;&nbsp;&nbsp;Program ini bertujuan untuk mengumpulkan data-data primer yang terkait dengan riset SDM yang sedang dilakukan. Dengan adanya pengumpulan data-data primer ini akan mendukung proses riset dan pengembangan program di bidang SDM. <br><br>
            &nbsp;&nbsp;&nbsp;Dalam menjalankan program ini, DIRECT selalu mengedepankan akurasi data guna mendapatkan gambaran riil dari suatu keadaan. Untuk menjaga profesionalisme dan kualitas survey, pelaksanaan survey ini melibatkan berbagai Dosen di bidang statistik dan dosen di bidang Manajemen Sumber Daya Manusia, 
            </p>
        </div>
        </div>
    </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="HR_RDModal" tabindex="-1" role="dialog" aria-labelledby="HR_RDModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="HR_RDModalLabel">HR RESEARCH AND DEVELOPMENT</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="accordion">
            <p class="text-justify">&nbsp;&nbsp;&nbsp;Program ini yang bertujuan untuk membantu stakeholder menggali informasi yang obyektif, menghimpun dan menginvestigasi berbagai fakta yang terkait Sumber Daya Manusia (SDM) guna memberikan rekomendasi pengembangan program dan kegiatan kepada stakeholder terkait pengembangan SDM di dalam organisasinya. <br> Riset yang dilakukan dalam antara lain meliputi :</p>
                <div class="row justify-content-between">
                    <div class="col-6">
                        <li>Student Research</li>
                    </div>
                    <div class="col-1">
                        <a href="#HR_RDModal-1" class="card-link collapsed" data-toggle="collapse"><i class="fas fa-angle-down" style="color:black !important;"></i></a>
                    </div>
                </div>
                <div id="HR_RDModal-1" class="collapse" data-parent="#accordion">
                <hr>
                    <p class="text-justify">&nbsp;&nbsp;&nbsp;Merupakan riset yang ditujukan untuk mendapatkan gambaran dan analisis mengenai proﬁle lengkap dari mahasiswa Universitas Diponegoro dan Universitas lainnya, sehingga dapat menjadi acuan dan dasar dalam penentuan program pengembangan SDM di level mahasiswa. Pelaksanaan riset ini dilakukan diawal mahasiswa memasuki dunia kampus, dan dilakukan secara berkala untuk melihat perkembangan dan dinamika yang terjadi selama perkuliahan. </p>
                    <p class="text-justify">Manfaat dari hasil riset ini adalah :</p>
                    <ul>
                        <li>dapat digunakan sebagai acuan dan dasar penerapan kebijakan pengembangan program pengembangan diri mahasiswa untuk berbagai jurusan dan fakultas </li>
                        <li>dapat digunakan sebagai acuan bagi Unit Pelayanan Karir (Career Center) di masing-masing Perguruan Tinggi untuk mengembangkan program persiapan karir  (Career Preparation Program)</li>
                    </ul>
                </div>
            <hr>
                <div class="row justify-content-between">
                    <div class="col-6">
                        <li>Talent Research</li>
                    </div>
                    <div class="col-1">
                        <a href="#HR_RDModal-2" class="card-link collapsed" data-toggle="collapse"><i class="fas fa-angle-down" style="color:black !important;"></i></a>
                    </div>
                </div>
                <div id="HR_RDModal-2" class="collapse" data-parent="#accordion">
                <hr>
                    <p class="text-justify">&nbsp;&nbsp;&nbsp;Merupakan riset yang ditujukan untuk mendapatkan gambaran dan analisis proﬁle serta kompetensi lengkap dari para pencari kerja di Indonesia. Dari riset ini diharapkan dapat menjadi acuan untuk User dari dunia kerja dalam kebijakan seleksi dan rekrutmen dalam perusahaannya. </p>
                    <p class="text-justify">Analisis yang didapat dari riset ini meliputi :</p>
                    <ul>
                        <li>analisis mengenai tingkat pendidikan job seeker</li>
                        <li>analisis mengenai pengalaman organisasi job seeker</li>
                        <li>analisis mengenai bidang pekerjaan yang diharapkan oleh job seeker</li>
                        <li>analisis mengenai minat dan bakat job seeker</li>
                        <li>analisis mengenai kompetensi dan keahlian job seeker</li>
                        <li>analisis mengenai karakter dan attitude dari job seeker</li>
                        <li>analisis mengenai gaya kerja job seeker</li>
                        <li>analisis mengenai pengalaman kerja job seeker</li>
                    </ul>
                    <p>hasil dari Talent Research ini akan disajikan pada ﬁtur talentpedia pada website www.uccprima.id</p>
                </div>
            <hr>
                <div class="row justify-content-between">
                    <div class="col-6">
                        <li>User Research</li>
                    </div>
                    <div class="col-1">
                        <a href="#HR_RDModal-3" class="card-link collapsed" data-toggle="collapse"><i class="fas fa-angle-down" style="color:black !important;"></i></a>
                    </div>
                </div>
                <div id="HR_RDModal-3" class="collapse" data-parent="#accordion">
                <hr>
                    <p class="text-justify">&nbsp;&nbsp;&nbsp;User Research merupakan riset yang ditujukan kepada User dari dunia kerja yang bertujuan untuk mendapatkan kompetensi riil dari masing-masing User di perusahaannya. </p>
                    <p class="text-justify">&nbsp;&nbsp;&nbsp;Hasil dari riset ini dapat digunakan sebagai acuan dari job seeker untuk mempersiapkan dirinya memasuki dunia kerja berdasarkan kompetensi dari masing-masing User. </p>
                    <p>Hasil dari riset ini akan disajikan dalam ﬁtur userpedia pada website www.uccprima.id</p>
                </div>
            <hr>
                <div class="row justify-content-between">
                    <div class="col-10">
                        <li>Selection and Recruitment Planning Research</li>
                    </div>
                    <div class="col-1">
                        <a href="#HR_RDModal-4" class="card-link collapsed" data-toggle="collapse"><i class="fas fa-angle-down" style="color:black !important;"></i></a>
                    </div>
                </div>
                <div id="HR_RDModal-4" class="collapse" data-parent="#accordion">
                <hr>
                    <p class="text-justify">&nbsp;&nbsp;&nbsp;Riset ini disusun berdasarkan hasil survey seleksi dan rekrutmen dari pelaksanaan Campus Recruitment dari Undip Career Center (UCC). Hasil survey yang menggunakan job seeker sebagai responden ini dapat digunakan sebagai acuan untuk User dalam merumuskan perencanaan untuk seleksi dan rekrutmen selanjutnya.</p>
                    <ul>
                        <li>Untuk mendukung proses perencanaan dalam seleksi karyawan, , maka hasil riset ini diharapkan dapat membantu menentukan kriteria calon karyawan dengan potensi paling besar untuk sukses dan memberikan kontribusi terbaik untuk Perusahaan.</li>
                        <li>Untuk mendukung proses rekrutmen karyawan, hasil dari riset ini diharapkan dapat menjadi acuan untuk menjalankan proses rekrutmen ke depan agar individu-individu dengan potensi tinggi dapat terdorong untuk melamar pekerjaan dan tertarik untuk mengikuti tahapan rekrutmen selanjutnya.</li>
                    </ul>
                    <p class="text-justify">&nbsp;&nbsp;&nbsp;Riset membantu Perusahaan menentukan faktor-faktor (seperti latar belakang, pengalaman, pendidikan, dan nilai tes) yang dapat digunakan untuk membedakan pelamar yang sukses dari yang kurang</p>
                </div>
            <hr>
                <div class="row justify-content-between">
                    <div class="col-10">
                        <li>Human Resource Development Research</li>
                    </div>
                    <div class="col-1">
                        <a href="#HR_RDModal-5" class="card-link collapsed" data-toggle="collapse"><i class="fas fa-angle-down" style="color:black !important;"></i></a>
                    </div>
                </div>
                <div id="HR_RDModal-5" class="collapse" data-parent="#accordion">
                <hr>
                    <p class="text-justify">&nbsp;&nbsp;&nbsp;Riset ini ditujukan untuk menjadi acuan dan dasar pengambilan kebijakan pengembangan SDM dalam organisasi. Dalam hal ini DIRECT, melakukan survey dan riset untuk kepda karyawan di masing-masing level dari berbagai bidang pekerjaan untuk mengetahui kondisi karyawan selama bekerja secara berkala.</p>
                    <p class="text-justify">Survey dan riset yang dilakukan meliputi : </p>
                    <ul>
                        <li>survey dan riset tentang motivasi bekerja</li>
                        <li>survey dan riset tentang tujuan bekerja</li>
                        <li>survey dan riset tentang kondisi lingkungan pekerjaan</li>
                        <li>survey dan riset tentang kendala-kendala dalam bekerja</li>
                        <li>survey dan riset tentang harapan dalam bekerja</li>
                    </ul>
                </div>
            <hr>
                <div class="row justify-content-between">
                    <div class="col-10">
                      <li>Entrepreneurship Research </li>
                    </div>
                    <div class="col-1">
                        <a href="#HR_RDModal-6" class="card-link collapsed" data-toggle="collapse"><i class="fas fa-angle-down" style="color:black !important;"></i></a>
                    </div>
                </div>
                <div id="HR_RDModal-6" class="collapse" data-parent="#accordion">
                <hr>
                    <p class="text-justify">&nbsp;&nbsp;&nbsp;Survey yang ditujukan kepada mahasiswa dan generasi muda pada umumnya mengenai : </p>
                    <ul>
                        <li>minat berwirausaha </li>
                        <li>tantangan dan kendala berwirausaha</li>
                        <li>bidang-bidang usaha yang diminati</li>
                        <li>dukungan keluarga dan kampus dalam membentuk jiwa wirausaha</li>
                    </ul>
                </div>
        </div>
        </div>
    </div>
    </div> 
    
</section>    
</div> <!-- container fluid closing tag -->

<!-- pembatas -->
<section class="pembatas">
    <div class="pt-3 pb-3" style="background-color:#56A8FF">
    </div>
</section>

@endsection