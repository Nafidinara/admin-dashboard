@extends('main.sidebar')

@section('content')
        <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-block">
                                <div class="row col-md-12">
                                        <div class="col-md-6">
                                                <h4 class="card-title">Basic Table</h4>
                                                <h6 class="card-subtitle">Add class <code>.table</code></h6>
                                        </div>
                                        <div class="float-right col-md-6 mt-lg-2">
                                        <a href="{{url('form')}}" class="btn pull-right hidden-sm-down btn-success"> Upgrade to Pro</a>
                                        </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Divisi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kandidat as $key => $item)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    <td>{{$item->nama}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
@endsection