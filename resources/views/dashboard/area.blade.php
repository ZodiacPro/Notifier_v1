@extends('layouts.app', ['pageSlug' => 'dashboard_area', 'tab' => 'dashboard'])

@section('content')
<!-- Modal -->
    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h5 class="card-category">Notifer</h5>
                            <h2 class="card-title">Items to Expire</h2>
                        </div>
                        <div class="col-sm-6">
                            <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                            <label class="btn btn-sm btn-primary btn-simple active" id="0">
                                <input type="radio" name="options" checked>
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">SEC ID</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-single-02"></i>
                                </span>
                            </label>
                            <label class="btn btn-sm btn-primary btn-simple" id="1">
                                <input type="radio" class="d-none d-sm-none" name="options">
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">RAAWA</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-gift-2"></i>
                                </span>
                            </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartBig1"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
                <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Total no of Active Item</h5>
                    <h3 class="card-title"><i class="tim-icons icon-delivery-fast text-info"></i>{{$secSum}}</h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="ActiveChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Will Expire 7 Days - RAAWA</h5>
                    <h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i>{{$days7count}}</h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartLinePurple"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Will Expire 6 Weeks - Sec ID</h5>
                    <h3 class="card-title"><i class="tim-icons icon-send text-success"></i> {{$secSum}}</h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartLineGreen"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Notification Table</h4>
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
                                        Type
                                    </th>
                                    <th class="text-center">
                                        Expiration
                                    </th>
                                    <th class="text-center">
                                        Days Left
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
    <div class="modal fade" id="areaModal" tabindex="-1" role="dialog" aria-labelledby="loadingModallabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" role="document">
           <div class="modal-content card"  >
               <div class="modal-header">
               <h5 class="modal-title" id="loadingModallabel"></h5>
               </div>
               <div class="modal-body text-center">
                <div class="card card-chart">
                    <div class="card-header">
                        <h5 class="card-category">Choose Area</h5>
                        <h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i></h3>
                        <a href="{{ route('home.area_main','NCR') }}" class="btn btn-primary">
                            NCR
                        </a>
                        <br>
                        <a href="{{ route('home.area_main','NLZ') }}" class="btn btn-primary">
                            North Luzon
                        </a>
                        <a href="{{ route('home.area_main','SLZ') }}" class="btn btn-primary">
                            South Luzon
                        </a>
                        <a href="{{ route('home.area_main','VIS') }}" class="btn btn-primary">
                            Visayas
                        </a>
                        <a href="{{ route('home.area_main','MIN') }}" class="btn btn-primary">
                            Mindanao
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="chartLinePurple"></canvas>
                        </div>
                    </div>
                </div>
                   
               </div>
               <div class="modal-footer">
               </div>
           </div>
           </div>
       </div>
       <button type="button" id="openbtn" class="btn btn-primary" data-toggle="modal" data-target="#areaModal" hidden>
        Launch
      </button>
@endsection


    <script src="{{ asset('black') }}/js/plugins/chartjs.min.js"></script>
    <script src="{{ asset('black') }}/js/core/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            graph.initDashboardPageCharts({!!json_encode($chart)!!});
            $('#openbtn').click();
        });
    </script>

