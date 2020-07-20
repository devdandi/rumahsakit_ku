<?php date_default_timezone_set('Asia/Jakarta'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">

/*Font=====*/
@media screen { 
    @font-face {
      font-family: 'Roboto';
      font-style: normal;
      font-weight: 400;
      src: local('Roboto'), local('Roboto-Regular'), url(https://fonts.gstatic.com/s/roboto/v18/KFOmCnqEu92Fr1Mu7GxKOzY.woff) format('woff');
    }
    @font-face {
      font-family: 'Roboto';
      font-style: normal;
      font-weight: 700;
      src: local('Roboto Bold'), local('Roboto-Bold'), url(https://fonts.gstatic.com/s/roboto/v18/KFOlCnqEu92Fr1MmWUlfCRc4EsA.woff) format('woff');
    }
}
/*Font End=====*/
body {
	margin: 0!important;
	padding: 15px;
	background-color: #eee;
}
p { font-family: 'Roboto', Myriad Pro, Verdana, arial,  sans-serif; font-size: 15px; line-height: 24px; font-weight: 400;}
.wrapper {
	width: 100%;
	table-layout: fixed;
}
.wrapper-inner {
	width: 100%;
	background-color: #f6f6f6;
	max-width: 670px;
	margin: 0 auto;
}
table {
	border-spacing: 0;
	font-family: sans-serif;
	color: #727f80;
}
.outer-table {
	width: 100%;
	max-width: 670px;
	margin: 0 auto;
	background-color: #89d5e6;
}
.outer-table-2{
    width: 100%;
    max-width: 670px;
    margin: 0 auto;
    text-align: center;
}
td {
    padding: 0;
}
.header {
    background-color: #89d5e6;
}
p {
    margin:0;
}
.header p {
    text-align: center;
    padding: 1%;
    font-weight: 500;
    font-size: 11px;
    text-transform: uppercase;
}
a {
    color: #F1F1F1;
    text-decoration: none;
}
/*--- End Outer Table 1 --*/
.main-table-first {
	width: 100%;
	max-width: 610px;
	margin: 0 auto;
	background-color: #FFF;
	margin-top: 25px;
}
/*--- Start Two Column Sections --*/
.two-column {
    text-align: center;
    font-size: 0;
    padding: 5px 0 10px 0;
}
.two-column .section {
    width: 100%;
    max-width: 300px;
    display: inline-block;
    vertical-align: top;
}
.two-column .content {
    font-size: 16px;
    line-height: 20px;
    text-align: justify;
}
.content {
    width: 100%;
    padding-top: 20px;
}
.center {
    display: table;
    margin: 0 auto;
}
.item-text-center {
    text-align: center;
    max-width: 580px;
    line-height: 24px;
    margin-left: 10%;
    margin-right: 10%;
    color: #888b93;
    margin-top: 5%;
    margin-bottom: 5%;
}
img {
    border: 0;
}
img.logo {
    float: left;
    margin-left: 5%;
    max-width: 70px!important;
}
#callout {
    margin: 4% 5% 2% 0;
    height: auto;
    overflow: hidden;
}
#callout img {
    max-width: 26px;
}
.social {
    list-style-type: none;
    margin-top: 1%;
    padding: 0;
}
.social li {
    display: inline-block;
    padding-right: 10px;
    padding-left: 10px;
}
.social li img {
    max-width: 15px;
    margin-bottom: 0;
    padding-bottom: 0;
}
.footer {
    padding-top: 10px;
    padding-bottom: 20px;
}
.footer-text {
    line-height: 24px;
    color: #979aa1;
    font-size: 16px;
}
/*--- Start Outer Table Banner Image, Text & Button --*/
.image img {
    width: 100%;
    max-width: 670px;
    height: auto;
}
.main-table {
    width: 100%;
    max-width: 610px;
    margin: 0 auto;
    background-color: #FFF;
    border-radius: 6px;
    margin-top: 28px;
}
.one-column .inner-td {
    font-size: 16px;
    line-height: 20px;
    text-align: justify;
}
.inner-td {
    padding: 10px;
}
p.center {
    text-align: center;
    max-width: 580px;
    line-height: 24px;
    color: #fff;
    padding-bottom: 20px;
}
.button-holder-center {
    text-align: center;
    margin: 8% 2% 10% 0;
}
.btn {
    font-size: 17px;
    background: #feca56;
    color: #FFF;
    text-decoration: none;
    padding: 17px 24px 17px 24px;
    border-radius: 6px;
    text-transform: uppercase;
    letter-spacing: 5px;
}
p.h2 {
    font-size: 30px;
    font-weight: 700;
    color: #fff;
    text-align: center;
    padding-bottom: 10px;
}
p.h3 {
    padding-top: 10px;
    color: #feca56;
    font-size: 26px;
    text-align: center;
    font-weight: 700;
}
p.h4 {
    padding-top: 20px;
    padding-bottom: 5px;
    color: #2d323e;
    font-size: 20px;
    text-align: center;
    font-weight: 700;
}
/*--- Start Two Column Image & Text Sections --*/
.two-column img {
    width: 100%;
    max-width: 280px;
    height: auto;
}
.two-column .text {
    padding: 10px 0;
}
/*--- Start 3 Column Image & Text Section --*/
.three-column {
    text-align: center;
    font-size: 0;
    padding: 10px 0 20px 0;
}
.three-column .section {
    width: 100%;
    max-width: 200px;
    display: inline-block;
    vertical-align: top;
}
.three-column .content {
    font-size: 16px;
    line-height: 20px;
}
.three-column .text {
    padding-top: 31px;
    color: #fff;
}
/*--- Media Queries --*/
@media screen and (max-width: 400px) {
	.two-column .column, .three-column .column {
		max-width: 100%!important;
	}
	.two-column img {
		width: 100%!important;
	}
	.three-column img {
		max-width: 60%!important;
	}
    img.img-responsive {
    width:100% !important;
    height:auto !important;
    max-width:100% !important;
}
}
@media screen and (min-width: 401px) and (max-width: 400px) {

	.two-column .column {
		max-width: 50%!important;
	}
	.three-column .column {
		max-width: 33%!important;
}
}
@media screen and (max-width:500px) {
img.logo {
	float:none !important;
	margin-left:0% !important;
	max-width: 70px!important;
}

#callout {
	float:none !important;
	margin: 0% 0% 0% 0;
	height: auto;
	text-align:center;
	overflow: hidden;
}
#callout img {
    max-width:26px !important; 
}
.two-column .section {
	width: 100% !important;
	max-width: 100% !important;
	display: inline-block;
	vertical-align: top;
}

}
@media screen and (max-width:768px) {
.content {
    width: 100%;
    padding-top:0px !important;
}
}
</style>
 </head>
<body>
    <div class="wrapper">
    	<div class="wrapper-inner">
            <table class="outer-table">
            </table> <!--- End Outer Table -->
            <table class="outer-table">
                <tr>
                    <td class="three-column">
                        <div class="section">
                            <table width="100%">
                                <tr>
                                    <td class="inner-td">
                                        <table class="content">
                                            <tr>
                                                <td class="text">
                                                    <p>Email Dari: noreply@devours.org</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div> <!--- End First Column of Three Columns -->
                        <div class="section">
                            <table width="100%">
                                <tr>
                                    <td class="inner-td">
                                        <table class="content">
                                            <tr>
                                                <!-- <td align="center">
                                                    <img class="center-logo" style="vertical-align: middle;" src="{{ url('/assets/img/admin-avatar.png') }}">
                                                </td> -->
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div> <!--- End Second Column of Three Columns -->
                        <div class="section">
                            <table width="100%">
                                <tr>
                                    <td class="inner-td">
                                        <table class="content">
                                            <tr>
                                                <td class="text">
                                                    <p>{{ date('l, d-m-Y') }}</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div> <!--- End Third Column of Three Columns -->
                    </td>
                </tr> <!--- End Three Column Section -->
                <tr>
                    <td class="one-column">
                        <table width="100%">
                            <tr>
                                <td class="inner-td">
                                    <p class="h2">Detail Perjanjian Anda</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table> <!--- End Outer Table 2 -->
            <table class="main-table">
                <tr>
                    <td class="one-column">
                        <table width="100%">
                            <tr>
                                <td class="inner-td">
                                    <div style="text-align: center;">
                                        <img src="img/img-1.jpg" alt="">
                                    </div>
                                    <p class="h3">Dokter menerima jadwal yang anda buat.</p>
                                    <p class="item-text-center">Silahkan datang ketempat untuk proses selanjutnya.</p>
                                    <hr>
                                    <p>Jika anda tidak mendapatkan balasan setelah 3x24 jam, maka sistem akan otomatis menghapus perjanjian anda. Sebaiknya anda membuat ulang jadwal anda di <a style="color: blue;" href="https://devours.org">website kami</a>, dokter akan membalas email ini jika dokter tersebut menghendaki permintaan anda. Terimakasih</p>  
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <table class="outer-table-2">
                <tr>
                    <td class="one-column">
                        <table width="100%">
                            <tr>
                                <td class="footer">
                                    <div id="callout">
                                        <ul class="social">
                                            <!-- <li><a href="index.html#" target="_blank"><img src="img/twi.jpg"></a></li>
                                            <li><a href="index.html#" target="_blank"><img src="img/fac.jpg"></a></li>
                                            <li><a href="index.html#" target="_blank"><img src="img/ins.jpg"></a></li> -->
                                        </ul>
                                    </div>
                                    <p class="footer-text">Bandung, Indonesia<br>&copy;ApotekU 2020<br><a href="https://devours.org" style="color: #babdc4; text-decoration: underline;"></a>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
    	</div> <!--- End Wrapper Inner -->

    </div> <!--- End Wrapper -->
    <br>
</body>
</html>