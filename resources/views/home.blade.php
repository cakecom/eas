@extends('layouts.dashboard')
@section('menu-page','')
@section('head-display')
    <div class="row">
        <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner" style="text-align: center">
                    <h3>{{count($assessed)}}</h3>

                    <p>Assessed</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
{{--                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
            </div>
        </div>
        <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner" style="text-align: center">
                    <h3>{{count($not_assessed)}}</h3>

                    <p>No Assessment</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
{{--                <a href="{{url('/home')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
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
                            <table id="user_table" class="table table-bordered table-striped"
                                   style="margin:auto;width: 50%;border-color: red;border-width: thin;">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th width="30%">Action</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="modal fade" id="modal-info">
        <div class="modal-dialog modal-lg">
            <span id="form_result"></span>
            <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
                @csrf

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Evaluate</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="user_id" name="user_id">
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
                                                    <input type="radio" id="time_management1" value="1" name="time_management">
                                                    <label for="time_management1" style="color:red">
                                                        Bad
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="time_management2"  value="2" name="time_management">
                                                    <label for="time_management2">
                                                        So So
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="time_management3"  value="3"  name="time_management">
                                                    <label for="time_management3" style="color:#1dbdf2">
                                                        Good
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="time_management4"  value="4" name="time_management">
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
                                                    <input type="radio" id="quality1"  value="1" name="quality">
                                                    <label for="quality1" style="color:red">
                                                        Bad
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="quality2"  value="2" name="quality">
                                                    <label for="quality2">
                                                        So So
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="quality3"  value="3" name="quality">
                                                    <label for="quality3" style="color:#1dbdf2">
                                                        Good
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="quality4"  value="4"  name="quality">
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
                                                    <input type="radio" id="creativity1"  value="1" name="creativity">
                                                    <label for="creativity1" style="color:red">
                                                        Bad
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="creativity2"  value="2" name="creativity">
                                                    <label for="creativity2">
                                                        So So
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="creativity3"  value="3" name="creativity">
                                                    <label for="creativity3" style="color:#1dbdf2">
                                                        Good
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="creativity4"  value="4" name="creativity">
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
                                                    <input type="radio" id="team_work1"  value="1" name="team_work">
                                                    <label for="team_work1" style="color:red">
                                                        Bad
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="team_work2"  value="2" name="team_work">
                                                    <label for="team_work2">
                                                        So So
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="team_work3"  value="3" name="team_work">
                                                    <label for="team_work3" style="color:#1dbdf2">
                                                        Good
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="team_work4"  value="4" name="team_work">
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
                                                    <input type="radio" id="discipline1"   value="1" name="discipline">
                                                    <label for="discipline1" style="color:red">
                                                        Bad
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="discipline2"  value="2" name="discipline">
                                                    <label for="discipline2">
                                                        So So
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="discipline3"  value="3" name="discipline">
                                                    <label for="discipline3" style="color:#1dbdf2">
                                                        Good
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="discipline4"  value="4" name="discipline">
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
                    <input type="submit" name="action_button" id="action_button" class="btn btn-primary" value="Save changes" />
                </div>
            </div>
            </form>
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
            $("#user_table").DataTable({

                "searching": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
                "processing": true,
                "serverSide": true,
                ajax: {
                    url: "{{ route('home.index') }}",
                },
                columns: [
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    }
                ]
            });
            $('#modal-info').on('show.bs.modal',function (event) {
                var button=$(event.relatedTarget);
                var id=button.data('id');
                var modal=$(this);
                modal.find('.modal-body #user_id').val(id);
            });
            $('#sample_form').on('submit', function(event) {
                event.preventDefault();
                    $.ajax({
                        url: "{{ route('home.store') }}",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: "json",
                        success: function (data) {
                            var html = '';
                            if (data.errors) {
                                html = '<div class="alert alert-danger">';
                                for (var count = 0; count < data.errors.length; count++) {
                                    html += '<p>' + data.errors[count] + '</p>';
                                }
                                html += '</div>';
                                $('#form_result').html(html);
                            }
                            if (data.success) {
                                html = '<div class="alert alert-success">' + data.success + '</div>';
                                $('#sample_form')[0].reset();
                                $('#user_table').DataTable().ajax.reload();
                                $('#modal-info').modal('toggle');
                            }
                        }
                    })

            });

        });
    </script>
@endsection
