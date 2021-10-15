@extends('layouts.app', ['pageSlug' => 'list', 'tab' => 'data'])

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Active Data List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
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
                </div>
            </div>
        </div>
    </div>
@endsection


    <script src="{{ asset('black') }}/js/plugins/chartjs.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('#list_table').DataTable({
            processing: true,
            serverSide: true,
            pageLength: 20,
            lengthMenu: [20, 40, 60, 80, 100],
            ajax: "{{ route('data.ajaxlist') }}",
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
        });
    </script>
