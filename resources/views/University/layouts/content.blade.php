@extends('University.layouts.master')
@section('title', 'University-Dashbboard')
@section('content')
<div class="content-overlay"></div>
<div class="content-wrapper">
    <!--Statistics cards Starts-->
    <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-6 col-12">
            <div class="card gradient-purple-love">
                <div class="card-content">
                    <div class="card-body py-0">
                        <div class="media pb-1">
                            <div class="media-body white text-left">
                                <h3 class="font-large-1 white mb-0">{{$university}}</h3>
                                <span>Total Colleges</span>
                            </div>
                            <div class="media-right white text-right">
                                <i class='fas fa-school' style='font-size:17px'></i>
                            </div>
                        </div>
                    </div>
                    <div id="" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-12">
            <div class="card gradient-ibiza-sunset">
                <div class="card-content">
                    <div class="card-body py-0">
                        <div class="media pb-1">
                            <div class="media-body white text-left">
                                <h3 class="font-large-1 white mb-0">{{$subject}}</h3>
                                <span>Total Subjects</span>
                            </div>
                            <div class="media-right white text-right">
                                <!-- <i class="fa fa-superpowers font-large-1"></i> -->
                                <i class="fas fa-book" style="size: 24px;"></i>
                            </div>
                        </div>
                    </div>
                    <div id="" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">
                    </div>

                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 col-12">
            <div class="card gradient-mint">
                <div class="card-content">
                    <div class="card-body py-0">
                        <div class="media pb-1">
                            <div class="media-body white text-left">
                                <h3 class="font-large-1 white mb-0">{{$course ?? '0' }}</h3>
                                <span>Total Courses</span>
                            </div>
                            <div class="media-right white text-right">
                                <i class="fa fa-list-alt" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div id="" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-12">
            <div class="card gradient-king-yna">
                <div class="card-content">
                    <div class="card-body py-0">
                        <div class="media pb-1">
                            <div class="media-body white text-left">
                                <h3 class="font-large-1 white mb-0">{{ $admission ?? '0'}}</h3>
                                <span>All Admission Student List</span>
                            </div>
                            <div class="media-right white text-right">
                                <!-- <i class="ft-credit-card font-large-1"></i> -->
                                <i class="fas fa-user-graduate"></i>
                            </div>
                        </div>
                    </div>
                    <div id="Widget-line-chart3" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Statistics cards Ends-->
</div>
@endsection