@extends('layouts.dashboard')
@section('menu-page','')
@section('head-display')
    <div class="row">
        <div class="col-lg-12 col-12">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner" style="text-align: center">
                    <h3 id="count_forms">{{count($request)}}</h3>
                    <p>Request</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                {{--                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            Request
                        </div>
                        <div id="data_table" class="card-body">
                            <table id="user_table" class="table table-bordered table-hover">
                                <thead>

                                <tr>
                                    <th>Name</th>
                                    <th>Score</th>
                                    <th>Detais</th>
                                    <th>Action</th>
                                </tr>

                                </thead>
                                <tbody>
                                @foreach($request as $row)
                                    <tr>
                                        <td>{{$row->users['name']}}</td>
                                        <td>{{$row->score}}</td>
                                        <td style="width: 20%">
                                            <button type="button" id="details" data-id="{{$row->id}}"
                                                    class="btn btn-block btn-outline-info" data-toggle="modal"
                                                    data-target="#modal-lg">Info
                                            </button>
                                        </td>
                                        <td style="width: 20%">
                                            <form class="form-inline">
                                                <div class="form-group mb-2">
                                                    <button type="button" id="pass" data-id="{{$row->id}}"
                                                            data-name="{{$row->users['name']}}"
                                                            class="btn btn-success mb-2">Confirm
                                                    </button>
                                                </div>
                                                <div class="form-group mx-sm-3 mb-2">
                                                    <button type="button" id="not_pass" data-id="{{$row->id}}"
                                                            data-name="{{$row->users['name']}}"
                                                            class="btn btn-danger mb-2">X
                                                    </button>
                                                </div>
                                            </form>
                                        </td>
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
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <!-- BAR CHART -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Bar Chart</h3>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="barChart"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection
@section('js')
    <script>
        $(function () {
            $("#user_table").DataTable({
                "searching": true,
                "paging": true,
                "lengthChange": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            $(document).on('click', '#details', function () {
                var id = $(this).data('id');
                showGraph(id);

            });

            function showGraph(id) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('getRequest')}}",
                    method: "GET",
                    data: {id: id},
                    success: function (data) {
                        var areaChartData = {
                            labels: ['Time management', 'Quality of work', 'Creativity', 'Team work', 'Discipline'],
                            datasets: [
                                {
                                    label: 'Average score',
                                    backgroundColor: 'rgba(60,141,188,0.9)',
                                    borderColor: 'rgba(60,141,188,0.8)',
                                    pointRadius: false,
                                    pointColor: '#3b8bba',
                                    pointStrokeColor: 'rgba(60,141,188,1)',
                                    pointHighlightFill: '#fff',
                                    pointHighlightStroke: 'rgba(60,141,188,1)',
                                    data: [data['time_manage'], data['quality'], data['creativity'], data['team_work'], data['discipline']]
                                },


                            ]
                        };

                        var areaChartOptions = {
                            maintainAspectRatio: false,
                            responsive: true,
                            legend: {
                                display: false
                            },
                            scales: {
                                xAxes: [{
                                    gridLines: {
                                        display: false,
                                    }
                                }],
                                yAxes: [{
                                    ticks:
                                        {
                                            min: 0,
                                            max: 4,
                                            maxTicksLimit:1

                                        },
                                    gridLines: {
                                        display: true,
                                    }
                                }]
                            }
                        };

                        //-------------
                        //- BAR CHART -
                        //-------------
                        var barChartCanvas = $('#barChart').get(0).getContext('2d');
                        var barChartData = jQuery.extend(true, {}, areaChartData);
                        // var temp0 = areaChartData.datasets;
                        // var temp1 = areaChartData.datasets[1];
                        // barChartData.datasets = temp0;
                        // barChartData.datasets[1] = temp0;

                        var barChartOptions = {
                            responsive: true,
                            maintainAspectRatio: false,
                            datasetFill: false,
                            scales: {
                                yAxes: [{
                                    gridLines: {
                                        display: false,
                                    },
                                    ticks:
                                        {
                                            min: 0,
                                            max: 4,


                                        }
                                }]
                            }
                        };

                        var barChart = new Chart(barChartCanvas, {
                            type: 'bar',
                            data: barChartData,
                            options: barChartOptions
                        });
                    }
                });

            }


            $(document).on('click', '#pass', function () {
                var id = $(this).data('id');
                var name = $(this).data('name');
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                });

                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You want accept " + name,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, accept it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: "{{ route('updateDirector')}}",
                            method: "POST",
                            data: {id: id, name: name, status: 'pass'},
                            success: function (data) {
                                swalWithBootstrapButtons.fire(
                                    'Success!',
                                    'You approved',
                                    'success'
                                );

                            }
                        });

                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            'Cancelled',
                            'Your cancel this',
                            'error'
                        )
                    }
                });
            });
            $(document).on('click', '#not_pass', function () {
                var id = $(this).data('id');
                var name = $(this).data('name');
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                });
                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You want reject " + name,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, reject it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: "{{ route('updateDirector')}}",
                            method: "POST",
                            data: {id: id, name: name, status: 'Not passed'},
                            success: function (data) {
                                swalWithBootstrapButtons.fire(
                                    'Success!',
                                    'You reject.',
                                    'success'
                                );
                                location.reload();
                            }
                        });

                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            'Cancelled',
                            'Your cancel this',
                            'error'
                        )
                    }
                });
            });

        });
    </script>
@endsection
