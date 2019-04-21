@extends('layouts.app')
@section('title', 'Project Status')
@section('content')

<section id="portfolio" style="margin-top: -55px;">
    <div class="container">

        
        <div class="row">
            <div class="col-lg-12">
                <ul id="portfolio-flters">
                  <li data-filter="*" class="filter-active">All</li>
                  <li data-filter=".filter-done">Done</li>
                  <li data-filter=".filter-notDone">Not Done</li>
                  <li data-filter=".filter-notAccepted">Not Accepted</li>
                  <li data-filter=".filter-rejected">Rejected</li>
                  
                </ul>
            </div>
        </div>
    </div>     
</section><!-- #portfolio -->

<div class="container">
    <div class="row portfolio-container" style="margin-top: -80px;">
    @foreach($status as $status)
        @if($status->accept_status=='Accepted')
        
            @if($status->work_status=='not_done')
                <div class="col-lg-12 portfolio-item filter-notDone wow fadeInUp">
                    <div class="portfolio-wrap">
                        <div class="mt-4" style="background-color: rgb(220, 220, 220); padding: 0.01em 16px; box-shadow: 0 2px 4px 0 rgba(0,0,0,0.60),0 2px 10px 0 rgba(0,0,0,0.60)!important; width: 100%;">

                            <h3 class="mt-4 text-center">{{ $status->project_title }}</h3>
                            <div class="text-center">
                                    @if($status->price != NULL)
                                        <small><i class="far fa-money-bill-alt"></i> Price: {{ $status->price }} Tk </small>
                                        <small><i class="far fa-money-bill-alt"></i> Advanced: {{ $status->advanced }} Tk </small>
                                        <small><i class="far fa-money-bill-alt"></i> Due: {{ $status->due }} Tk</small>
                                    @endif
                            </div>
                            <div class="w3-code" style="width: auto; background-color: #fff; padding: 8px 12px;border-left: 4px solid red; word-wrap: break-word; margin-bottom: 15px!important;">
                                <div style="margin-left: 10px;">
                                    <p class="text-center text-justify">{{ $status->project_detail }}</p>
                                </div>
                            </div>
                            <div>
                                <strong>This Project is <span style="color:green;">accepted</span> by Admin.</strong>
                            </div>
                            <div>
                                <strong>This Project is <span style="color:orange;">not done yet.</span></strong>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-lg-12 portfolio-item filter-done wow fadeInUp">
                    <div class="portfolio-wrap">
                        <div class="mt-4" style="background-color: rgb(220, 220, 220); padding: 0.01em 16px; box-shadow: 0 2px 4px 0 rgba(0,0,0,0.60),0 2px 10px 0 rgba(0,0,0,0.60)!important; width: 100%;">

                            <h3 class="mt-4 text-center">{{ $status->project_title }}</h3>
                            <div class="text-center">
                                    @if($status->price != NULL)
                                        <small><i class="far fa-money-bill-alt"></i> Price: {{ $status->price }} Tk (Payment Done)</small>
                                        <small><i class="far fa-money-bill-alt"></i> Due: {{ $status->due }} Tk</small>
                                    @endif
                            </div>
                            <div class="w3-code" style="width: auto; background-color: #fff; padding: 8px 12px;border-left: 4px solid red; word-wrap: break-word; margin-bottom: 15px!important;">
                                <div style="margin-left: 10px;">
                                    <p class="text-center text-justify">{{ $status->project_detail }}</p>
                                </div>
                            </div>
                            <div>
                                <strong>This Project is <span style="color:green;">done.</span></strong>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
                        
        @elseif($status->accept_status=='Rejected')
            <div class="col-lg-12 portfolio-item filter-rejected wow fadeInUp">
                <div class="portfolio-wrap">
                    <div class="mt-4" style="background-color: rgb(220, 220, 220); padding: 0.01em 16px; box-shadow: 0 2px 4px 0 rgba(0,0,0,0.60),0 2px 10px 0 rgba(0,0,0,0.60)!important; width: 100%;">

                        <h3 class="mt-4 text-center">{{ $status->project_title }}</h3>
                        <div class="w3-code" style="width: auto; background-color: #fff; padding: 8px 12px;border-left: 4px solid red; word-wrap: break-word; margin-bottom: 15px!important;">
                            <div style="margin-left: 10px;">
                                <p class="text-center text-justify">{{ $status->project_detail }}</p>
                            </div>
                        </div>
                        <div>
                            <strong>This Project is <span style="color:red;">rejected</span> by Admin.</strong>
                        </div>
                    </div>
                </div>
            </div>

        @else
            <div class="col-lg-12 portfolio-item filter-notAccepted wow fadeInUp">
                <div class="portfolio-wrap">
                    <div class="mt-4" style="background-color: rgb(220, 220, 220); padding: 0.01em 16px; box-shadow: 0 2px 4px 0 rgba(0,0,0,0.60),0 2px 10px 0 rgba(0,0,0,0.60)!important; width: 100%;">

                        <h3 class="mt-4 text-center">{{ $status->project_title }}</h3>
                        <div class="w3-code" style="width: auto; background-color: #fff; padding: 8px 12px;border-left: 4px solid red; word-wrap: break-word; margin-bottom: 15px!important;">
                            <div style="margin-left: 10px;">
                                <p class="text-center text-justify">{{ $status->project_detail }}</p>
                            </div>
                        </div>
                        <div>
                            <strong>This Project is <span style="color:orange;">not accepted</span> by any admin so far. Admin will contact you soon...</strong>
                        </div>
                    </div>
                </div>
            </div>

        @endif
       
    @endforeach
    </div>
</div>



<!-- {{-- <div class="container">
@foreach($status as $status)
        <div class="mt-4" style="background-color: rgb(220, 220, 220); padding: 0.01em 16px; box-shadow: 0 2px 4px 0 rgba(0,0,0,0.60),0 2px 10px 0 rgba(0,0,0,0.60)!important;">

            <h3 class="mt-4">{{ $status->project_title }}</h3>
            <div class="w3-code" style="width: auto; background-color: #fff; padding: 8px 12px;border-left: 4px solid red; word-wrap: break-word; margin-bottom: 15px!important;">
                <div style="margin-left: 10px;">
                    <p class=" text-justify">{{ $status->project_detail }}</p>
                </div>
            </div>
            @if($status->accept_status=='Accepted')
                <div>
                    <strong>This Project is <span style="color:green;">accepted</span> by Admin.</strong>
                </div>
                @if($status->work_status=='not_done')
                    <div>
                        <strong>This Project is <span style="color:orange;">not done yet.</span></strong>
                    </div>
                @else
                    <div>
                        <strong>This Project is <span style="color:green;">done.</span></strong>
                    </div>
                @endif
            @elseif($status->accept_status=='Rejected')
                <div>
                    <strong>This Project is <span style="color:red;">rejected</span> by Admin.</strong>
                </div>
            @else
                <div>
                    <strong>This Project is <span style="color:orange;">not accepted</span> by any admin so far. Admin will contact you soon...</strong>
                </div>
            @endif
        </div>
    @endforeach
</div> --}} -->

@endsection