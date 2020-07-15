@extends('layouts.dashboard')
@section('menu-page','')
@section('head-display')
    <div class="row">
        <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner" style="text-align: center">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>

                    <p>Assessed</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner" style="text-align: center">
                    <h3>65</h3>

                    <p>No Assessment</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
@endsection
@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            Employee Evaluation Form
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    QUARTER AT 1
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover"
                                   style="margin:auto;width: 50%;border-color: red;border-width: thin;">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th width="30%">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Trident</td>
                                    <td>
                                        <button type="button" class="btn-xs btn-block bg-gradient-info"
                                                data-toggle="modal" data-target="#modal-default">
                                            Evaluate
                                        </button>
                                    </td>

                                </tr>
                                <tr>
                                    <td>Trident</td>
                                    <td>
                                        <button type="button" class="btn-xs btn-block bg-gradient-info"
                                                data-toggle="modal" data-target="#modal-default">
                                            Evaluate
                                        </button>
                                    </td>

                                </tr>
                                <tr>
                                    <td>Trident</td>
                                    <td>
                                        <button type="button" class="btn-xs btn-block bg-gradient-info"
                                                data-toggle="modal" data-target="#modal-default">
                                            Evaluate
                                        </button>
                                    </td>

                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Evaluate</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-primary">
                        <div class="card-header">
                            <p class="card-title">( bed = 1,so so = 2,good = 3,very good = 4 ) Point</p>
                        </div>
                        <div class="card-body">
                            <!-- Minimal style -->
                            <h4>Time management:</h4>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- checkbox -->
                                    <div class="form-group clearfix">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="time_management1" name="time_management">
                                                    <label for="time_management1" style="color:red">
                                                        Bad
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="time_management2" name="time_management">
                                                    <label for="time_management2">
                                                        So So
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="time_management3" name="time_management">
                                                    <label for="time_management3" style="color:#1dbdf2">
                                                        Good
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="time_management4" name="time_management">
                                                    <label for="time_management4" style="color:#009906">
                                                        Very Good
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4>Quality of work:</h4>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- checkbox -->
                                    <div class="form-group clearfix">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="quality1" name="quality">
                                                    <label for="quality1" style="color:red">
                                                        Bad
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="quality2" name="quality">
                                                    <label for="quality2">
                                                        So So
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="quality3" name="quality">
                                                    <label for="quality3" style="color:#1dbdf2">
                                                        Good
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="quality4" name="quality">
                                                    <label for="quality4" style="color:#009906">
                                                        Very Good
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4>Creativity:</h4>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- checkbox -->
                                    <div class="form-group clearfix">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="creativity1" name="creativity">
                                                    <label for="creativity1" style="color:red">
                                                        Bad
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="creativity2" name="creativity">
                                                    <label for="creativity2">
                                                        So So
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="creativity3" name="creativity">
                                                    <label for="creativity3" style="color:#1dbdf2">
                                                        Good
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="creativity4" name="creativity">
                                                    <label for="creativity4" style="color:#009906">
                                                        Very Good
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4>Team work:</h4>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- checkbox -->
                                    <div class="form-group clearfix">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="team_work1" name="team_work">
                                                    <label for="team_work1" style="color:red">
                                                        Bad
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="team_work2" name="team_work">
                                                    <label for="team_work2">
                                                        So So
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="team_work3" name="team_work">
                                                    <label for="team_work3" style="color:#1dbdf2">
                                                        Good
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="team_work4" name="team_work">
                                                    <label for="team_work4" style="color:#009906">
                                                        Very Good
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4>Discipline:</h4>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- checkbox -->
                                    <div class="form-group clearfix">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="discipline1" name="discipline">
                                                    <label for="discipline1" style="color:red">
                                                        Bad
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="discipline2" name="discipline">
                                                    <label for="discipline2">
                                                        So So
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="discipline3" name="discipline">
                                                    <label for="discipline3" style="color:#1dbdf2">
                                                        Good
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="discipline4" name="discipline">
                                                    <label for="discipline4" style="color:#009906">
                                                        Very Good
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- /.content -->
@endsection
@section('js')
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
