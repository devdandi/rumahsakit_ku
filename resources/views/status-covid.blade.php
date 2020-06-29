@extends('root.root')
@section('content')
<div class="content-wrapper">
<div class="page-content fade-in-up">
                    <div class="col-md">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Status Covid Indonesia</div>
                            </div>
                            <div class="ibox-body">
                                @if($message_ok = Session::get('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ $message_ok }}
                                </div>
                                @endif
                                @if($message_g = Session::get('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ $message_g }}
                                </div>
                                @endif
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nama Negara</th>
                                            <th>Positif</th>
                                            <th>Sembuh</th>
                                            <th>Meninggal Dunia</th>
                                            <th>Dirawat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $json = json_decode($status_covid); ?>
                                        <tr>
                                            <td>{{ $json[0]->name }}</td>
                                            <td>{{ $json[0]->positif }}</td>
                                            <td>{{ $json[0]->sembuh }}</td>
                                            <td>{{ $json[0]->meninggal }}</td>
                                            <td>{{ $json[0]->dirawat }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                   
                </div>
</div>

@endsection