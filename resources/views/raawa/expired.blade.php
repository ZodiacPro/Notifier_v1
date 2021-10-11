@extends('layouts.app', ['pageSlug' => 'expired', 'tab' => 'data'])

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card "><br>
                <div class="card-header"  style="border-bottom: 1px solid rgb(238, 10, 200);padding-bottom:10px;">
                    <h4 class="card-title">Expired Data List</h4>
                    <div class="col-sm-6">
                        <div class="btn-group btn-group-toggle float-left" data-toggle="buttons">
                        <label class="btn btn-sm btn-primary btn-simple active" id="0">
                            <input type="radio" name="options" checked>
                            <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">RAAWA</span>
                            <span class="d-block d-sm-none">
                                <i class="tim-icons icon-single-02"></i>
                            </span>
                        </label>
                        <label class="btn btn-sm btn-primary btn-simple" id="1">
                            <input type="radio" class="d-none d-sm-none" name="options">
                            <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Sec ID</span>
                            <span class="d-block d-sm-none">
                                <i class="tim-icons icon-gift-2"></i>
                            </span>
                        </label>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="card-body">
                    <div class="table-responsive" id="tb1" style="border-bottom: 1px solid rgb(238, 10, 200);padding-bottom:10px;">
                        <a href="{{ route('data.export','expiredRaawa') }}" class="btn btn-primary">
                            Export (Raawa)
                        </a>
                        <table class="table tablesorter" id="list_table">
                            <thead class=" text-primary">
                                <tr>
                                    <th>
                                        No
                                    </th>
                                    <th>
                                        Area
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        SEC ID
                                    </th>
                                    <th class="text-center">
                                        Expiration
                                    </th>
                                    <th class="text-center">
                                        Online RAAWA
                                    </th>
                                    <th class="text-center">
                                        Online RAAWA <br> Expiration
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive" id="tb2" style="border-bottom: 1px solid rgb(238, 10, 200);padding-bottom:10px;">
                        <table class="table tablesorter" id="list_table2">
                            <a href="{{ route('data.export','expiredSec') }}" class="btn btn-primary">
                                Export (Sec ID)
                            </a>
                            <thead class=" text-primary">
                                <tr>
                                    <th>
                                        No
                                    </th>
                                    <th>
                                        Area
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        SEC ID
                                    </th>
                                    <th class="text-center">
                                        Expiration
                                    </th>
                                    <th class="text-center">
                                        Online RAAWA
                                    </th>
                                    <th class="text-center">
                                        Online RAAWA <br> Expiration
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


    <script src="{{ asset('black') }}/js/plugins/chartjs.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
        var c = 0;
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //    
            var table = $('#list_table').DataTable({
            processing: true,
            serverSide: true,
            pageLength: 20,
            lengthMenu: [20, 40, 60, 80, 100],
            ajax: "{{ route('data.expired_raawa') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'area', name: 'area'},
                {data: 'name', name: 'name'},
                {data: 'secID', name: 'secID'},
                {
                    data: 'expired',
                    name: 'expired',
                    className: 'text-center'
                },
                {
                    data: 'online_raawa',
                    name: 'online_raawa',
                    className: 'text-center'
                },
                {
                    data: 'online_raawa_expired',
                    name: 'online_raawa_expired',
                    className: 'text-center'},
            ]
        });
        //
        
        //
        $("#0").click(function() {
            $("#tb2").hide();
            $("#tb1").show();
        });
        $("#0").click();
        //
        $("#1").click(function() {
            $("#tb1").hide();
            $("#tb2").show();
            if(c == 0){
                var table = $('#list_table2').DataTable({
                    processing: true,
                    serverSide: true,
                    pageLength: 20,
                    lengthMenu: [20, 40, 60, 80, 100],
                    ajax: "{{ route('data.expired_sec') }}",
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        {data: 'area', name: 'area'},
                        {data: 'name', name: 'name'},
                        {data: 'secID', name: 'secID'},
                        {
                            data: 'expired',
                            name: 'expired',
                            className: 'text-center'
                        },
                        {
                            data: 'online_raawa',
                            name: 'online_raawa',
                            className: 'text-center'
                        },
                        {
                            data: 'online_raawa_expired',
                            name: 'online_raawa_expired',
                            className: 'text-center'},
                    ],
                });
                c = c + 1;
            }
        });
        //
        });
    </script>
