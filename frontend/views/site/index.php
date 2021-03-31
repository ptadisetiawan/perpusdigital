<?php

/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = 'Perpustakaan Digital';
?>

<!-- LATAR BELAKANG -->
<div class="row">
			<div style="width: 100%;
	height: 100%;
	position: absolute;
	background-image: linear-gradient(red, white);" class="latar"></div>
		</div>

		<!-- HEADER -->
		<div style="padding-top: 10px;
	position: relative;
	background: rgba(0, 0, 0, 0.3)" class="row header">
			<div class="col-lg-12 text-center">
				<img src="uploaded_files/aplikasi/pemprov.png" style="width: 12%">
				<!-- <img src="uploaded_files/aplikasi/pemprovbali.png" style="width: 60%"> -->
                <h1 style="color:#FFFFFF">PERPUSTAKAAN <br> PROVINSI BALI</h1>
				<!-- <img src="assets/img/headputih1.png" style="width: 60%"> -->
			</div>
		</div>

		<!-- ISI -->
		<div class="row">

			<div class="col-lg-6 text-center">
				<img src="uploaded_files/aplikasi/gubwagub.png" style="width: 80%; margin-top: 20px">
			</div>

			<div class="col-lg-6 text-center text-white" style="margin-top: 0px">
				<div style="height: 50px"></div>
				<img src="uploaded_files/aplikasi/nangunsatkerthi.png" style="width: 80%">
				<!--<h3 class="nangun">NANGUN SAT KERTHI LOKA BALI</h3>
				<p style="color: black">Melalui Pola Pembangunan Semesta Berencana Menuju Bali Era Baru</p>-->
				<a href="opac">
					<button class="btn btn-danger text-white" style="width: 40%">Masuk Situs</button>
				</a>
                <a href="backend">
					<button class="btn btn-danger text-white" style="width: 40%">Petugas</button>
				</a>
			</div>
		</div>

		<div style="padding-top: 10px;
			background: rgba(0, 0, 0, 0.3)" class="fixed-bottom footer">
			<div class="row">
				<div class="col-lg-12 text-center text-white">
					<p>Pemerintah Provinsi Bali &copy 2021</p>
				</div>
			</div>
		</div>