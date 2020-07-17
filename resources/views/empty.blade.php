@extends('layouts.dashboard')
@section('menu-page','')
@section('head-display')
    <div class="row">
        <div class="col-lg-12 col-12">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner" style="text-align: center">
                    <h3 id="count_forms">No assessment</h3>
                    <p>Thank you!</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                {{--                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
            </div>
        </div>
    </div>
@endsection

