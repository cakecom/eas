@extends('layouts.dashboard')
@section('menu-page','')
@section('head-display')
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            Management Assessment
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#modal-default">
                                        +Create Assessment
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div id="data_table" class="card-body">
                            <table id="user_table" class="table table-bordered "
                                   style="margin:auto;border-width: thin;">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Quarter</th>
                                    <th>Status</th>
                                    <th>Successful</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($quarter as $row)
                                    <tr>
                                        <th>{{$row->date}}</th>
                                        <th>{{$row->quarter}}</th>
                                        <th>
                                            @if($row->status=='true')
                                                <input type="checkbox" class="switch" id="switch" name="my_checkbox"
                                                       data-id="{{$row->id}}" checked data-bootstrap-switch
                                                       data-off-color="danger"
                                                       data-on-color="success">
                                            @else
                                                <input type="checkbox" class="switch" id="switch" name="my_checkbox"
                                                       data-id="{{$row->id}}" data-bootstrap-switch
                                                       data-off-color="danger"
                                                       data-on-color="success">
                                            @endif

                                        </th>
                                        <th>
                                            <form action="{{route('assessment.update',$row->id)}}" method="post"
                                                  enctype="multipart/form-data">
                                                @method('PATCH')
                                                @csrf
                                                <button type="submit" id="close"
                                                        class="btn btn-block bg-gradient-danger">Close
                                                </button>
                                            </form>
                                        </th>
                                    </tr>
                                @endforeach
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
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create Assessment</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('assessment.store')}}" method="post" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="reservation">Date range:</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fas fa-calendar-alt"></i>
                      </span>
                                </div>
                                <input type="text" class="form-control float-right" name="reservation" id="reservation">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                        <div class="form-group">
                            <label>Quarter</label>
                            <select class="form-control select2" name="quarter" style="width: 100%;">
                                <option selected="selected" value="1">Quarter1</option>
                                <option value="2">Quarter2</option>
                            </select>
                        </div>

                        {{--                        <label>Status</label>--}}
                        {{--                        <input type="checkbox" class="form-control" name="my_checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">--}}
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $(".switch").bootstrapSwitch({
                onSwitchChange: function (e, state) {
                    var id = ($(this).data('id'));
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ route('assessment.update','update')}}",
                        method: "PATCH",
                        data: {status: state, id: id},
                        success: function (data) {
                        }
                    });
                }
            });
            $("input[data-bootstrap-switch]").each(function () {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });
//Initialize Select2 Elements
            $('.select2').select2();
            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });            //Date range picker
            $('#reservation').daterangepicker();
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            });
            //Date range as a button
            $('#daterange-btn').daterangepicker(
                {
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function (start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
            );


        });
    </script>
@endsection
