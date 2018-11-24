@extends ('layouts.templatehomepage')

@section ('header')
    @parent
@endsection

@section ('content')
<div class="container-fluid">
    <!-- jumbotron -->
    <section>
    <div class="row overlapped-navbar-fixed" id="onepage-pertama">
        <div class="col-xs-12 onepage-pertama">
            <br>
            <div class="col-xs-3 col-xs-offset-2">
            <h1 class="">Diponegoro <br> Research <br> Center</h1>
            <i class="text-justify">DIRECT hadir untuk membantu organisasi memenuhi kebutuhannya terkait pengembangan SDM, baik organisasi bisnis, swasta, pendidikan dan pemerintahan. Hasil dari riset ini akan digunakan sebagai dasar dalam penyusunan dan pengembangan program organisasi yang bergerak di sumber daya manusia, sehingga dapat memberikan kontribusi terbaik dalam Pengembangan SDM di Indonesia.</i>
            </div>
            <div class="col-xs-6"></div>
        </div>
    </div>   
    </section>
    <!-- jumbotron end -->
    <!-- about -->
    <section class="overlapped-navbar-fixed" id="onepage-about">
    <div class="row" style="padding-bottom:40px;    ">
        <div class="col-xs-12 col-md-8 col-md-offset-2" >
            <h1 class="text-center">About Us</h1>
            <hr class="layouting-fix">
            <div class="col-xs-12 col-md-6 " >
                <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbspBerkembangnya teknologi informasi di era milenial saat ini menyebabkan peningkatan kompetensi SDM di segala bidang sangat diperlukan. Pasar kerja tidak hanya membutuhkan SDM yang handal, tangguh dan berkualitas tetapi juga peka dan mampu mengelola perubahan.</p>
                <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbspUntuk mengantisipasi persaingan SDM di era global ini, diperlukan pengembangan riset di bidang sumber daya manusia . Hasil riset dan publikasi ilmiah yang berfokus pada karir dan pengembangan kapasitas individu sangat diperlukan untuk memberikan rekomendasi secara kontinyu dan signiﬁkan dalam rangka meningkatkan daya saing bangsa.</p>
                <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbspTanpa riset, akan sangat sulit bagi sebuah organisasi untuk menentukan dan mengembangkan target pasar serta potensi bisnis mereka. Selain itu, kurangnya riset juga mengakibatkan banyak organisasi yang mengeluhkan adanya kesenjangan kompetensi antara kebutuhan perusahaan dan sumber daya yang tersedia. Diponegoro Research Center (DIRECT) merupakan divisi dari Diponegoro Human Development Center (DHDC) yang bertugas memfasilitasi penyediaan jasa riset untuk mewadahi urgensi kebutuhan terkait pengembangan Sumber Daya Manusia (SDM).</p>
            </div>
            <div class="col-xs-12 col-md-6">
            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbspDIRECT hadir untuk membantu organisasi memenuhi kebutuhannya terkait pengembangan SDM, baik organisasi bisnis, swasta, pendidikan dan pemerintahan. Hasil dari riset ini akan digunakan sebagai dasar dalam penyusunan dan pengembangan program organisasi yang bergerak di sumber daya manusia, sehingga dapat memberikan kontribusi terbaik dalam Pengembangan SDM di Indonesia.</p>
                <img src="{{asset('images/ucc-direct/direktur.png')}}" alt="direktur direct" class="img-rounded center-block" style="width:70%">
                <h4>Director : <strong>Mirwan Surya Perdhana, S.E., MM., Ph.</strong></h4>
            </div>
        </div>
    </div>
    <br><br>
    </section>
    <!-- about end -->
    
    <div class="row">
        <div class="col-xs-12">
        <section class="pembatas">
            <div class="container-fluid little-extra-space">
                <br>
            </div>
        </section>
        </div>

    </div>
    <section class="overlapped-navbar-fixed" id="onepage-programsandservices">
    </section>
    <div class="row" style="padding-bottom:150px;padding-top:20px">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <h1 class="text-center">Programs & Services</h1>
            <hr class="layouting-fix">
            <div class="col-xs-12 col-md-6" style="padding:30px">
                <h4 class="text-center">HR SURVEY</h4>
                <img src="{{asset('images/ucc-direct/hr_survey.png')}}" alt="hr_survey_img" style="width:30%;padding-top:20px;padding-bottom:30px;" class="center-block">
                <button class="btn btn-info btn-sm center-block" type="button" data-toggle="modal" data-target="#HR_SurveyModal" >
                    More info
                </button>
                <!-- Modal -->
                <div class="modal fade" id="HR_SurveyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">HR SURVEY</h4>
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
            </div>
            <div class="col-xs-12 col-md-6" style="padding:30px">
                <h4 class="text-center">HR RESEARCH AND DEVELOPMENT</h4>
                <img src="{{asset('images/ucc-direct/hr_r&d.png')}}" alt="hr_survey_img"style="width:30%;padding-top:20px;padding-bottom:30px;" class="center-block">
                <button class="btn btn-info btn-sm center-block" type="button" data-toggle="modal" data-target="#HR_RDModal">
                    More info
                </button>
                <!-- Modal -->
                <div class="modal fade" id="HR_RDModal" tabindex="-1" role="dialog" aria-labelledby="HR_RDModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="HR_RDModalLabel">HR RESEARCH AND DEVELOPMENT</h4>
                    </div>
                    <div class="modal-body">
                        <p>&nbsp;&nbsp;&nbsp;Program ini yang bertujuan untuk membantu stakeholder menggali informasi yang obyektif, menghimpun dan menginvestigasi berbagai fakta yang terkait Sumber Daya Manusia (SDM) guna memberikan rekomendasi pengembangan program dan kegiatan kepada stakeholder terkait pengembangan SDM di dalam organisasinya. <br> Riset yang dilakukan dalam antara lain meliputi :</p>
                        <ol type="a">
                            <li>Student Research</li>
                            <p></p>
                            <li>Talent Research</li>
                            <p></p>
                            <li>User Research</li>
                            <p></p>
                            <li>Selection and Recruitment Planning Research</li>
                            <p></p> 
                            <li>Human Resource Development Research</li>
                            <p></p>
                            <li>Entrepreneurship Research </li>
                            <p></p>
                        </ol>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
<!-- end div container --> <br>
@endsection

@section ('script')
    @parent
@endsection