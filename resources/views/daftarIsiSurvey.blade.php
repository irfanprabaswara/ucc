@extends('layouts.templateMahasiswa')

@section('nav')
    @parent
@endsection

@section('content')
<div class="container-fluid">
    <div class="page-wrapper">
        <header class="page-heading clearfix">
            <h1 class="heading-title pull-left">Questionnaire Form</h1>
            <!--breadcrumbs-->
            <ol class="breadcrumb pull-right">
              <li><a href="/home">Home</a></li>
              <li class="active">Daftar Isi Survey</li>
            </ol>
            <!--//breadcrumbs-->
    </header>
            <div class="row">
                <div class="col-md-12 col-md-offset-0">
                    <div class="panel panel-default">
                        <div class="panel-heading"><CENTER>INI BAGIAN ISI SURVEY</CENTER></div>

                        <div class="panel-body" width="600" height="200">
                            <!-- <iframe overflow='auto' width='100%' height='600' frameborder='0' src="https://docs.google.com/forms/d/e/1FAIpQLScc9rnVYTh65EGX9WccdR6CXWQFNID4NBlrlxEIQ1_uS8WonA/viewform"></iframe> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection