@extends('layouts.dashboard')
@section('menu-page','')
@section('head-display')
    <div class="row">
        <div class="col-lg-12 col-12">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner" style="text-align: center">
                    <h3 id="count_forms">{{$count_forms}}</h3>
                    <p>All forms</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                {{--                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner" style="text-align: center">
                    <h3 id="assessed">{{$assessed}}</h3>

                    <p>Sent</p>
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
                    <h3 id="not_assessed">{{$count_forms-$assessed}}</h3>

                    <p>Not yet sent</p>
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
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            Average score
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    QUARTER AT 1
                                </div>
                            </div>
                        </div>
                        <div id="data_table" class="card-body">

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.modal -->
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            load_data();
            function load_data(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('getAssessment') }}",
                    method: "get",
                    success: function (data) {
                        $('#data_table').html(data);
                        $("#user_table").DataTable({
                            "searching": true,
                            "info": true,
                            "autoWidth": true,
                            "responsive": true,
                        });
                    }
                });
            }


            $(document).on('click', '#details', function () {
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
                    text: "You want send "+name+" to Director",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, sent it!',
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
                            url: "{{ route('sendDirector')}}",
                            method: "POST",
                            data:{id:id},
                            success: function (data) {
                                swalWithBootstrapButtons.fire(
                                    'Sent!',
                                    'Your  sent success.',
                                    'success'
                                );
                                load_data();
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
