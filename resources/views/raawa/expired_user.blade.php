@extends('layouts.app', ['pageSlug' => 'expired_sec', 'tab' => 'data'])

@section('content')
    <div class="row">
        {{-- UPDATE RAAWA --}}
        <div class="modal fade" id="raawa" tabindex="-1" role="dialog" aria-labelledby="Raawa" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="secHeader"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <form method="post" action="{{ route('raawa.update') }}">
                    @csrf
                    <label for="date">Date</label>
                    <input class="form-control" type="text" name="id" id="id" style="color: black" hidden required/>
                    <input class="form-control" type="date" name="date" id="date" style="color: black; font-weight: bold;" required />
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
                </div>
            </div>
            </div>
        </div>
        {{-- UPDATE SEC --}}
        <div class="modal fade" id="sec" tabindex="-1" role="dialog" aria-labelledby="Sec" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="secHeader"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <form method="post" action="{{ route('sec.update') }}">
                    @csrf
                    <label for="datesec">Date</label>
                    <input class="form-control" type="text" name="id" id="idsec" style="color: black" hidden required/>
                    <input class="form-control" type="date" name="date" id="datesec" style="color: black; font-weight: bold;" required />
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
              <button hidden type="button" class="btn btn-primary btn-sm" id="raawabtn" data-toggle="modal" data-target="#raawa">
                Raawa
              </button>
              <button hidden type="button" class="btn btn-primary btn-sm" id="secbtn" data-toggle="modal" data-target="#sec">
                Sec
              </button>
            <button type="button" class="btn btn-success btn-sm" id="refresh">
                Refresh
            </button>
            <div class="card ">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card-header">
                    <h4 class="card-title">Expired Sec ID List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display nowrap" id="list_table">
                            <thead class=" text-primary">
                                <tr>
                                    <th>
                                        No
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Sec ID
                                    </th>
                                    <th>
                                        Area
                                    </th>
                                    <th>
                                        SEC ID Expired
                                    </th>
                                    <th>
                                        Action
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
        $('#refresh').click(function(){
            var table = $('#list_table').DataTable();
                table.destroy();
            $('#list_table').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 20,
                lengthMenu: [20, 40, 60, 80, 100],
                dom: 'Blfrtp',
                buttons: [
                    { "extend": 'excel', "text":'Export',"className": 'btn btn-md btn-success' },
                ],
                ajax: "{{ route('data.expired.sec') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'secID', name: 'secID'},
                    {data: 'area', name: 'area'},
                    {data: 'sec', name: 'sec'},
                    {data: 'action', name: 'action', width: 400},
                ]
            });
        });
        // 
        $('#refresh').click();
        // 
    });
    //
    function raawa(id){
      $('#raawabtn').click();
      $('#id').val(id);
    }
    function sec(id){
      $('#secbtn').click();
      $('#idsec').val(id);
    }
    </script>
