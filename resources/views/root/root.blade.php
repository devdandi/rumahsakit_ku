<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Admin Rumah Sakit | Demo</title>
    <!-- GLOBAL MAINLY STYLES-->
    
    <link href="{{ url('assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/vendors/themify-icons/css/themify-icons.css') }}" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <link href="{{ url('assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="{{ url('assets/css/main.min.css') }}" rel="stylesheet" />
    <script src="{{ url('assets/js/jquery-3.5.1.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/i18n/id.js" type="text/javascript"></script>
    <!-- PAGE LEVEL STYLES-->
</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
        <!-- START HEADER-->
        <header class="header">
            <div class="page-brand">
                <a class="link" href="{{ url('/dashboard') }}">
                    <span class="brand">Admin
                        <span class="brand-tip">CAST</span>
                    </span>
                    <span class="brand-mini">AC</span>
                </a>
            </div>
            <div class="flexbox flex-1">
                <!-- START TOP-LEFT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li>
                        <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
                    </li>
                    <li>
                        <a href="https://api.whatsapp.com/send?phone=62895330534784" target="_blank">Kontak Developer: WhatsApp</a>
                    </li>
                    <!-- <li>
                        <form class="navbar-search" action="javascript:;">
                            <div class="rel">
                                <span class="search-icon"><i class="ti-search"></i></span>
                                <input class="form-control" placeholder="Search here...">
                            </div>
                        </form>
                    </li> -->
                </ul>
                <!-- END TOP-LEFT TOOLBAR-->
                <!-- START TOP-RIGHT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li class="dropdown dropdown-inbox">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope-o"></i>
                            <span class="badge badge-primary envelope-badge">1</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media">
                            <li class="dropdown-menu-header">
                                <div>
                                    <span><strong>0 New</strong> Pesan</span>
                                    <a class="pull-right" href="{{ url('/dashboard/mail') }}">Lihat Semua</a>
                                </div>
                            </li>
                            <li class="list-group list-group-divider scroller" data-height="240px" data-color="#71808f">
                                <div>
                                    <a class="list-group-item">
                                        <div class="media">
                                            <div class="media-img">
                                                <img src="{{ url('assets/img/') }}" />
                                            </div>
                                            <div class="media-body">
                                                <div class="font-strong"> </div>Jeanne Gonzalez<small class="text-muted float-right">Just now</small>
                                                <div class="font-13">Your proposal interested me.</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-user">
                        <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                            <img src="{{ url('assets/img/admin-avatar.png') }}" />
                            <span></span>{{ session()->get('email') }}<i class="fa fa-angle-down m-l-5"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <!-- <a class="dropdown-item" href="{{ url('/dashboard') }}"><i class="fa fa-user"></i>Profile</a>
                            <a class="dropdown-item" href="profile.html"><i class="fa fa-cog"></i>Settings</a> -->
                            <a class="dropdown-item" href="javascript:;"><i class="fa fa-support"></i>Bantuan</a>
                            <li class="dropdown-divider"></li>
                            <a class="dropdown-item" href="/dashboard/logout"><i class="fa fa-power-off"></i>Logout</a>
                        </ul>
                    </li>
                </ul>
                <!-- END TOP-RIGHT TOOLBAR-->
            </div>
        </header>
        <nav class="page-sidebar" id="sidebar">
            <div id="sidebar-collapse">
                <div class="admin-block d-flex">
                    <div>
                    <img src="{{ url('assets/img/admin-avatar.png') }}" />

                    </div>
                    <div class="admin-info">
                        <div class="font-strong">{{ $get_data[0]->name }}</div><small>{{ $get_data[0]->level }}</small></div>
                </div>
                <ul class="side-menu metismenu">
                    <li>
                        <a class="active" href="/dashboard"><i class="sidebar-item-icon fa fa-th-large"></i>
                            <span class="nav-label">Halaman Utama</span>
                        </a>
                    </li>
                    @if($get_data[0]->level == "Administrator")
                    <li class="heading">MENU UTAMA</li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon ti-user"></i>
                            <span class="nav-label">Dokter</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="/dashboard/dokter/tambah"><i class="ti-plus"></i> Tambah Dokter</a>
                            </li>
                            <li>
                                <a href="/dashboard/dokter"><i class="ti-align-justify"></i> Daftar Dokter</a>
                            </li>
                            <li>
                                <a href="/dashboard/dokter/jadwal"><i class="ti-calendar"></i> Jadwal Dokter</a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    
                    @if($get_data[0]->level == "Administrator" || $get_data[0]->level == "Dokter")
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-edit"></i>
                            <span class="nav-label">Pasien</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="/dashboard/covid">Status Covid-19</a>
                            </li>
                            <!-- <li>
                                <a href="/dashboard/pasien/tambah"><i class="ti-plus"></i> Tambah Pasien</a>
                            </li> -->
                            <li>
                                <a href="/dashboard/pasien"><i class="ti-align-justify"></i> Daftar Pasien</a>
                            </li>
                            <li>
                                <a href="/dashboard/pasien/pembayaran"><i class="ti-credit-card"></i> Pembayaran Pasien</a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if($get_data[0]->level == "Farmasi" || $get_data[0]->level == "Dokter")
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-edit"></i>
                            <span class="nav-label">Menu Pembelian Obat</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="/dashboard/pasien/obat"><i class="ti-align-justify"></i> Daftar Pasien</a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if($get_data[0]->level == "Dokter")
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-edit"></i>
                            <span class="nav-label">Menu Perjanjian</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="/dashboard/janji"><i class="ti-align-justify"></i> Daftar Perjanjian</a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if($get_data[0]->level == "Administrator" || $get_data[0]->level == "Finance")
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon ti-money"></i>
                            <span class="nav-label">Laporan Keuangan</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="/dashboard/keuangan"><i class="fa fa-bar-chart"></i> Grafik</a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if($get_data[0]->level == "Administrator")
                    <li class="heading">Menu Akun</li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon ti-user"></i>
                            <span class="nav-label">Akun</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="/dashboard/akun/tambah"><i class="ti-plus"></i> Tambah Akun</a>
                            </li>
                            <li>
                                <a href="/dashboard/akun"><i class="ti-align-justify"></i> Data Akun</a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if($get_data[0]->level == "Administrator")
                    <li class="heading">MENU PENAMBAHAN</li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon ti-align-justify"></i>
                            <span class="nav-label">Menu Penambahan</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="/dashboard/tambah/spesialis"><i class="ti-plus"></i> Tambah Spesialis</a>
                            </li>
                            <li>
                                <a href="/dashboard/tambah/obat"><i class="ti-align-justify"></i> Tambah Obat</a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if($get_data[0]->level == "Administrator" || $get_data[0]->level == "Resepsionis")
                    <li>
                    <li class="heading">MENU ANTRIAN</li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon ti-align-justify"></i>
                            <span class="nav-label">Menu Antrian</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="/dashboard/antrian/tambah"><i class="ti-plus"></i> Tambah Antrian</a>
                            </li>
                            <li>
                                <a href="/dashboard/antrian"><i class="ti-align-justify"></i> Daftar Antrian</a>
                            </li>
                            <li>
                                <a href="/dashboard/antrian/reset"><i class="ti-calendar"></i> Reset Antrian</a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    <li>
                    <li class="heading">Menu Pesan</li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-envelope"></i>
                            <span class="nav-label">Mailbox</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="/dashboard/pesan/email">Pesan E-Mail</a>
                            </li>
                            <li>
                                <a href="/dashboard/pesan/sms">Pesan SMS</a>
                            </li>
                            <li>
                                <a href="/dashboard/pesan/pengaturan">Pengaturan</a>
                            </li>
                        </ul>
                    </li>
                    
                </ul>
            </div>
        </nav>
        @yield('content');


                   <!-- END PAGE CONTENT-->
            <footer class="page-footer">
                <div class="font-13">2020 © <b>Dandi Dev</b> - All rights reserved.</div>
                <a class="px-4" href="https://github.com/devdandi" target="_blank">GITHUB Developer</a>
                <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
            </footer>
        </div>
    </div>
    <!-- BEGIN THEME CONFIG PANEL-->
    <div class="theme-config">
        <div class="theme-config-toggle"><i class="fa fa-cog theme-config-show"></i><i class="ti-close theme-config-close"></i></div>
        <div class="theme-config-box">
            <div class="text-center font-18 m-b-20">Tampilan</div>
            <div class="font-strong">Pengaturan Tampilan</div>
            <div class="check-list m-b-20 m-t-10">
                <label class="ui-checkbox ui-checkbox-gray">
                    <input id="_fixedNavbar" type="checkbox" checked>
                    <span class="input-span"></span>Fixed navbar</label>
                <label class="ui-checkbox ui-checkbox-gray">
                    <input id="_fixedlayout" type="checkbox">
                    <span class="input-span"></span>Fixed layout</label>
                <label class="ui-checkbox ui-checkbox-gray">
                    <input class="js-sidebar-toggler" type="checkbox">
                    <span class="input-span"></span>Collapse sidebar</label>
            </div>
            <div class="font-strong">Gaya Tampilan</div>
            <div class="m-t-10">
                <label class="ui-radio ui-radio-gray m-r-10">
                    <input type="radio" name="layout-style" value="" checked="">
                    <span class="input-span"></span>Full</label>
                <label class="ui-radio ui-radio-gray">
                    <input type="radio" name="layout-style" value="1">
                    <span class="input-span"></span>Wrap</label>
            </div>
            <div class="m-t-10 m-b-10 font-strong">Warna Tema</div>
            <div class="d-flex m-b-20">
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Default">
                    <label>
                        <input type="radio" name="setting-theme" value="default" checked="">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-white"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Blue">
                    <label>
                        <input type="radio" name="setting-theme" value="blue">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-blue"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Green">
                    <label>
                        <input type="radio" name="setting-theme" value="green">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-green"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Purple">
                    <label>
                        <input type="radio" name="setting-theme" value="purple">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-purple"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Orange">
                    <label>
                        <input type="radio" name="setting-theme" value="orange">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-orange"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Pink">
                    <label>
                        <input type="radio" name="setting-theme" value="pink">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-pink"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
            </div>
            <div class="d-flex">
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="White">
                    <label>
                        <input type="radio" name="setting-theme" value="white">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Blue light">
                    <label>
                        <input type="radio" name="setting-theme" value="blue-light">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-blue"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Green light">
                    <label>
                        <input type="radio" name="setting-theme" value="green-light">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-green"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Purple light">
                    <label>
                        <input type="radio" name="setting-theme" value="purple-light">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-purple"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Orange light">
                    <label>
                        <input type="radio" name="setting-theme" value="orange-light">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-orange"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Pink light">
                    <label>
                        <input type="radio" name="setting-theme" value="pink-light">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-pink"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <!-- END THEME CONFIG PANEL-->
    <!-- BEGIN PAGA BACKDROPS-->

    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS-->
    <script src="{{ url('assets/vendors/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('assets/vendors/popper.js/dist/umd/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('assets/vendors/metisMenu/dist/metisMenu.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <script src="{{ url('assets/vendors/chart.js/dist/Chart.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}" type="text/javascript"></script>
    <script src="{{ url('assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js') }}" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="{{ url('assets/js/app.min.js') }}" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    
</body>

</html>