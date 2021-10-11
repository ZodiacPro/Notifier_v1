@extends('layouts.app', ['pageSlug' => 'upload', 'tab' => 'data'])

@section('content')
    <style>
body {
  font-family: sans-serif;
  background-color: transparent;
}
.file-upload {
  background-color: transparent;
  width: auto;
  height: auto;
  margin: 0 auto;
  padding: auto;
}

/* BUTTON */
.file-upload-btn {
  width: 100%;
  margin: 0;
  color: #fff;
  background: #1FB264;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #15824B;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}
.file-upload-btn:hover {
  background: #064724;
  color: #0b2c02;
  transition: all .2s ease;
  cursor: pointer;
}
.file-upload-btn:active {
  border: 0;
  transition: all .2s ease;
}

/* PLACEHOLDER */
.file-upload-preview {
  display: none;
  text-align: center;
}
.file-upload-input {
  position: absolute;
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100%;
  outline: none;
  opacity: 0;
  cursor: pointer;
}
.file-upload-placeholder {
  margin-top: 20px;
  border: 4px dashed #0c7039;
  position: relative;
}
.image-dropping,
.file-upload-placeholder:hover {
  background-color: #09381f;
  border: 4px dashed rgb(45, 168, 72);
}
.drag-text {
  text-align: center;
}
.drag-text h6 {
  font-weight: bolder;
  text-transform: uppercase;
  color: #15824B;
  padding: 60px 0;
}
.icon{
    font-size: 50px;
    margin-top: 30px;
    color: #c2f5da;
}
.clear{
    background-color: transparent;
}
</style>



    <div class="row">
                <div class="col-lg-4">
                </div>
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category text-center">Excel File</h5>
                    <h3 class="card-title text-center">
                        <i class="far fa-file-excel text-success" style="font-size:20px;">
                            </i><strong> Uploader</strong></h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <!--    ------------------>
                        <form action="{{route('data.uploadfile')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="file-upload">                          
                                <div class="file-upload-placeholder">
                                        <input class="file-upload-input" name="fileinput" type='file' onchange="uploadclick()" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
                                        <div class="drag-text">
                                            <i class="fas fa-cloud-upload-alt icon"></i>
                                            <h6>Drag and drop a file or select add Image</h6>
                                        </div>
                                </div>
                                <button type="submit" id="upload" hidden>upload</button>
                            </form>
                          </div>
                        <!----------------------------->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category text-center">Notes</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item clear">- Upload Excel File Only</li>
                        <li class="list-group-item clear">- All Date Input shall be <i>yyyy-mm-dd</i> format</li>
                        <li class="list-group-item clear">- Duplicate Name entry will lead to data overwrite</li>
                    </ul>
                </div>
            </div>
        </div>
    </div><br>
    <div class="row">
        <button type="button" id="openbtn" class="btn btn-primary" data-toggle="modal" data-target="#loadingModal" hidden>
            Launch
          </button>
        <div class="col-lg-12 col-md-12">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">List of Failed Entry</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter" id="">
                            <thead class=" text-primary">
                                <tr>
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
                                    <th class="text-center">
                                        Reason
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (session('fail'))
                                    @foreach (session('fail') as $item)
                                        @if(strtoupper($item->values()[0]) !== 'AREA' && $item->errors()[0] !== 'clone')
                                            <tr>
                                                <td>
                                                    {{$item->values()[0]}}
                                                </td>
                                                <td>
                                                    {{$item->values()[1]}}
                                                </td>
                                                <td>
                                                    {{$item->values()[2]}}
                                                </td>
                                                <td class="text-center">
                                                    {{$item->values()[3]}}
                                                </td>
                                                <td class="text-center">
                                                    {{$item->values()[4]}}
                                                </td>
                                                <td class="text-center">
                                                    {{$item->values()[5]}}
                                                </td>
                                                <td class="text-center">
                                                    {{$item->errors()[0]}}
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function uploadclick(){
            document.getElementById('openbtn').click();
            document.getElementById('upload').click();
        }
    </script>
@endsection
