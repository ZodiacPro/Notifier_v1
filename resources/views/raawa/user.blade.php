@extends('layouts.app', ['pageSlug' => 'users', 'tab' => 'data'])

@section('content')
    <div class="row">
        {{-- ADD USER --}}
        <div class="modal fade" id="addArea" tabindex="-1" role="dialog" aria-labelledby="addAreaLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="addAreaLabel">Add Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <form method="post" action="{{ route('raawa.user_create') }}">
                    @csrf
                    <label for="name">Name</label>
                    <input class="form-control" type="text" name="name" id="name" style="color: black" required/>
                    <label for="name">Sec ID</label>
                    <input class="form-control" type="text" name="secID" id="secID" style="color: black" required/>
                    <label for="area">Area</label>
                    <select class="form-control" name="area" id="area" style="color: black" required>
                        @foreach($areas as $area)
                        <option value="{{$area->id}}">{{$area->name}}</option>
                        @endforeach
                      </select>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
                </div>
            </div>
            </div>
        </div>
        {{-- UPDATE USER --}}
        <div class="modal fade" id="updateInfo" tabindex="-1" role="dialog" aria-labelledby="updateInfoLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="updateInfoLabel">Update Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <form method="post" action="{{ route('raawa.user_update') }}">
                    @csrf
                    <label for="ID" hidden>ID</label>
                    <input class="form-control" type="text" name="id" id="idupdate" style="color: black" hidden required/>
                    <label for="name">Name</label>
                    <input class="form-control" type="text" name="name" id="nameupdate" style="color: black" required/>
                    <label for="name">Sec ID</label>
                    <input class="form-control" type="text" name="secID" id="secupdate" style="color: black" required/>
                    <label for="area">Area</label>
                    <select class="form-control" name="area" id="areaupdate" style="color: black" required>
                        @foreach($areas as $area)
                        <option value="{{$area->id}}">{{$area->name}}</option>
                        @endforeach
                      </select>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
                </div>
            </div>
            </div>
        </div>
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
        {{-- Delete User --}}
        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="deleteHeader"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <form method="post" action="{{ route('raawa.user_delete') }}">
                    @csrf
                    <div class="text-center">
                        <h1 class="text-dark">
                            <span>
                                <i class="tim-icons icon-alert-circle-exc text-danger"></i>
                            </span>
                            Are you sure?<br><br>
                            <span>
                                <h6 class="text-dark">
                            Do you really want to delete these records? This process cannot be undone.
                                </h6>
                            </span>
                        </h1>
                    
                    <input class="form-control" type="text" name="id" id="iddelete" style="color: black; display:none;" required/>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addArea">
                Add Employee
              </button>
              <button hidden type="button" class="btn btn-primary btn-sm" id="updatebtn" data-toggle="modal" data-target="#updateInfo">
                Update
              </button>
              <button hidden type="button" class="btn btn-primary btn-sm" id="raawabtn" data-toggle="modal" data-target="#raawa">
                Raawa
              </button>
              <button hidden type="button" class="btn btn-primary btn-sm" id="secbtn" data-toggle="modal" data-target="#sec">
                Sec
              </button>
            </button>
            <button hidden type="button" class="btn btn-primary btn-sm" id="delbtn" data-toggle="modal" data-target="#delete">
              Delete
            </button>
            <button type="button" class="btn btn-success btn-sm" id="refresh">
                Refresh
            </button>
            <div class="card">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                        <h4 class="card-title">Employee List</h4>
                        <a href="#" id="proceed" class="btn btn-sm btn-primary" hidden>Reload</a>
                        </div>
                        <div class="col-md-6 text-right">
                                <a class="btn btn-outline-primary btn-lg" data-toggle="collapse" href="#data" role="button" aria-expanded="false" aria-controls="data">
                                    <i class="fas fa-cogs"></i>
                                </a>
                              <div class="collapse" id="data">
                                <div class="card card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    Template
                                                </div>
                                                <div class="card-body">
                                                    <a href="{{route('template')}}" class="btn btn-outline-secondary btn-sm btn-block">User</a>
                                                    <a href="{{route('template.expired')}}" class="btn btn-outline-secondary btn-sm btn-block">Raawa</a>
                                                    <a href="{{route('template.expired')}}" class="btn btn-outline-secondary btn-sm btn-block">Sec</a>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    Mass Entry
                                                </div>
                                                <div class="card-body">
                                                    <form action="{{route('import')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <label class="custom-file-upload btn btn-success btn-sm btn-block">
                                                            <input type="file" id="file" name="file" style="display:none;"/>
                                                            <i class="fa fa-cloud-upload"></i> Mass Registration
                                                        </label>
                                                        <button type="submit" id="submit" style="display: none">Submit</button>
                                                    </form>
                                                    <form action="{{route('import.raawa')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <label class="custom-file-upload btn btn-success btn-sm btn-block">
                                                            <input type="file" id="fileraawa" name="file" style="display:none;"/>
                                                            <i class="fa fa-cloud-upload"></i> Mass Raawa
                                                        </label>
                                                        <button type="submit" id="submitraawa" style="display: none">Submit</button>
                                                    </form>
                                                    <form action="{{route('import.sec')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <label class="custom-file-upload btn btn-success btn-sm btn-block">
                                                            <input type="file" id="filesec" name="file" style="display:none;"/>
                                                            <i class="fa fa-cloud-upload"></i> Mass Sec
                                                        </label>
                                                        <button type="submit" id="submitsec" style="display: none">Submit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </div>
                        </div>
                    </div>
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
                                        Raawa Expired
                                    </th>
                                    <th>
                                        Sec ID Expired
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
                serverSide: false,
                paging: true,
                pageLength: 50,
                lengthMenu: [5,10,25,50,100,500,1000],
                dom: 'Blfrtp',
                buttons: [
                    { "extend": 'excel', "text":'Export',"className": 'btn btn-md btn-success' },
                ],
                ajax: "{{ route('raawa.user') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'secID', name: 'secID'},
                    {data: 'area', name: 'area'},
                    {data: 'raawa', name: 'raawa'},
                    {data: 'sec', name: 'sec'},
                    {data: 'action', name: 'action', width: 400},
                ]
            });
        });
        // 
        $('#refresh').click();
        $('#file').change(function(){
                $('#submit').click();
            })
        $('#fileraawa').change(function(){
            $('#submitraawa').click();
        })
        $('#filesec').change(function(){
            $('#submitsec').click();
        })
        // 
    });
    //
    function update(id, name, secID, area){
      $('#updatebtn').click();
      $('#idupdate').val(id);
      $('#nameupdate').val(name);
      $('#secupdate').val(secID);
      $('#areaupdate').val(area);
    }
    function raawa(id){
      $('#raawabtn').click();
      $('#id').val(id);
    }
    function sec(id){
      $('#secbtn').click();
      $('#idsec').val(id);
    }
    function del(id){
      $('#delbtn').click();
      $('#iddelete').val(id);
    }
    </script>
