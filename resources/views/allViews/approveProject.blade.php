@extends('layouts.app')
@section('title', 'Approve Project')
@section('content')

<div class="container">
@if(count($stat) == 0)
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-center" style="color: white;">Dashboard</div>

                <div class="card-body" style="color: white; background-image: url('https://motionarray.imgix.net/preview-82967-gZ6ArOJAiM-low_0011.jpg?w=660&q=60&fit=max&auto=format'); ">
                    <h1 class="mt-4 mb-4 text-center">No new preject's !!!</h1>
                </div>
            </div>
        </div>
    </div>
    
@elseif(count($stat) > 0)
    <section id="portfolio" style="margin-top: -55px;">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <ul id="portfolio-flters">
                      <li data-filter="*" class="filter-active">All</li>
                      <li data-filter=".filter-notAccepted">Not Accepted</li>
                      <li data-filter=".filter-notDone">Not Done</li>
                    </ul>
                </div>
            </div>
        </div>     
    </section><!-- #portfolio -->

    <div class="container">
        <div class="row portfolio-container" style="margin-top: -80px;">
        @foreach($stat as $status)
            @if($status->accept_status!='Rejected')
            
                @if($status->work_status=='not_done' && $status->accept_status=='Accepted')
                    <div class="col-lg-12 portfolio-item filter-notDone wow fadeInUp">
                        <div class="portfolio-wrap">
                            <div class="mt-4" style="background-color: rgb(220, 220, 220); padding: 0.01em 16px; box-shadow: 0 2px 4px 0 rgba(0,0,0,0.60),0 2px 10px 0 rgba(0,0,0,0.60)!important; width: 100%;">

                                <div class="text-center">
                                    <h3 class="mt-4">{{ $status->project_title }}</h3>

                                    <small><i class="fas fa-user"></i> {{ $status->first_name }} {{ $status->last_name }}</small>
                                    <small><i class="fas fa-envelope-square"></i> {{ $status->email }} </small>
                                    <small><i class="fas fa-phone-square"></i> +880{{ $status->phone }}</small><br>

                                    @if($status->price != NULL)
                                        <small><i class="far fa-money-bill-alt"></i> Price: {{ $status->price }} Tk </small>
                                        @if( ($status->advanced != NULL && $status->due != NULL) )
                                            <small><i class="far fa-money-bill-alt"></i> Advanced: {{ $status->advanced }} Tk </small>
                                        <small><i class="far fa-money-bill-alt"></i> Due: {{ $status->due }} Tk</small>
                                        @endif
                                    @endif

                                    <div class="w3-code" style="width: auto; background-color: #fff; padding: 8px 12px; border-left: 4px solid red; word-wrap: break-word; margin-bottom: 15px!important;">
                                        <p class="text-center text-justify">{{ $status->project_detail }}</p>
                                    </div>
                                </div>

                                <form method="POST" action="{{ url('/acceptProject')}}">
                                    @csrf
                                    <input type="hidden" name="project_id" value="{{ $status->id }}">
                                    <div class="form-group row">
                                        <div class="col-lg-12 ">
                                            <div class="text-center">    
                                                <button type="submit" name="status" value="done" class="btn btn-primary btn-info">{{ __('Project Done') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                @elseif($status->accept_status=='not_accept_yet' && $status->work_status=='not_done')   {{--accept or reject project--}}
                    <div class="col-lg-12 portfolio-item filter-notAccepted wow fadeInUp">
                        <div class="portfolio-wrap">
                            <div class="mt-4" style="background-color: rgb(220, 220, 220); padding: 0.01em 16px; box-shadow: 0 2px 4px 0 rgba(0,0,0,0.60),0 2px 10px 0 rgba(0,0,0,0.60)!important; width: 100%;">

                                <h3 class="mt-4 text-center">{{ $status->project_title }}</h3>
                                <div class="w3-code" style="width: auto; background-color: #fff; padding: 8px 12px;border-left: 4px solid red; word-wrap: break-word; margin-bottom: 15px!important;">
                                    <div>
                                        <p class="text-center text-justify">{{ $status->project_detail }}</p>
                                    </div>
                                </div>
                                <form method="POST" action="{{ url('/acceptProject')}}">
                                    @csrf
                                    <input type="hidden" name="project_id" value="{{ $status->id }}">
                                    <div class="form-group row">
                                        <div class="col-lg-12 ">
                                            <div class="form-group row">    {{-- Project Value --}}
                                                <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Project Value') }}</label>

                                                <div class="col-md-6">
                                                    <input id="price" type="number" class="form-control" name="price" placeholder="Enter Project Value" min="0" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">    {{-- Project advanced --}}
                                                <label for="advanced" class="col-md-4 col-form-label text-md-right">{{ __('Advanced Payment') }}</label>

                                                <div class="col-md-6">
                                                    <input id="advanced" type="number" class="form-control" name="advanced" placeholder="Enter Project Advanced Payment" min="0" required>
                                                </div>
                                            </div>

                                            <div class="text-center">    
                                                <button type="submit" name="status" value="accept" class="btn btn-primary btn-info">{{ __('Accept Project') }}</button>

                                                <button type="submit" name="status" value="reject" class="btn btn-primary btn-info">{{ __('Reject Project') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
        @endforeach
        </div>
    </div>

    <!-- 
        @foreach($stat as $status)
        @if($status->accept_status!='Rejected')
            <div class="mt-4" style="background-color: rgb(220, 220, 220); padding: 0.01em 16px; box-shadow: 0 2px 4px 0 rgba(0,0,0,0.60),0 2px 10px 0 rgba(0,0,0,0.60)!important;">

                <div class="text-center">
                    <h3 class="mt-4">{{ $status->project_title }}</h3>

                    <small><i class="fas fa-user"></i> {{ $status->first_name }} {{ $status->last_name }}</small>
                    <small><i class="fas fa-envelope-square"></i> {{ $status->email }} </small>
                    <small><i class="fas fa-phone-square"></i> +880{{ $status->phone }}</small><br>

                    @if($status->price != NULL)
                        <small><i class="far fa-money-bill-alt"></i> Price: {{ $status->price }} Tk </small>
                        @if( ($status->advanced != NULL && $status->due != NULL) )
                            <small><i class="far fa-money-bill-alt"></i> Advanced: {{ $status->advanced }} Tk </small>
                        <small><i class="far fa-money-bill-alt"></i> Due: {{ $status->due }} Tk</small>
                        @endif
                    @endif
                </div>

                <div class="w3-code mt-3" style="width: auto; background-color: #fff; padding: 8px 12px;border-left: 4px solid red; word-wrap: break-word; margin-bottom: 15px!important;">
                    <div style="margin-left: 10px;">
                        <p class="text-center text-justify">{{ $status->project_detail }}</p>
                    </div>
                </div>

                @if($status->accept_status=='Accepted') {{--changing project status done--}}
                    <form method="POST" action="{{ url('/acceptProject')}}">
                        @csrf
                        <input type="hidden" name="project_id" value="{{ $status->id }}">
                        <div class="form-group row">
                            <div class="col-lg-12 ">
                                <div class="text-center">    
                                    <button type="submit" name="status" value="done" class="btn btn-primary btn-info">{{ __('Project Done') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                @elseif($status->accept_status=='not_accept_yet')   {{--accept or reject project--}}
                    <form method="POST" action="{{ url('/acceptProject')}}">
                        @csrf
                        <input type="hidden" name="project_id" value="{{ $status->id }}">
                        <div class="form-group row">
                            <div class="col-lg-12 ">
                                <div class="form-group row">    {{-- Project Value --}}
                                    <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Project Value') }}</label>

                                    <div class="col-md-6">
                                        <input id="price" type="number" class="form-control" name="price" placeholder="Enter Project Value" min="0" required>
                                    </div>
                                </div>

                                <div class="form-group row">    {{-- Project advanced --}}
                                    <label for="advanced" class="col-md-4 col-form-label text-md-right">{{ __('Advanced Payment') }}</label>

                                    <div class="col-md-6">
                                        <input id="advanced" type="number" class="form-control" name="advanced" placeholder="Enter Project Advanced Payment" min="0" required>
                                    </div>
                                </div>

                                <div class="text-center">    
                                    <button type="submit" name="status" value="accept" class="btn btn-primary btn-info">{{ __('Accept Project') }}</button>

                                    <button type="submit" name="status" value="reject" class="btn btn-primary btn-info">{{ __('Reject Project') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                @endif
                
            </div>
        @endif
    @endforeach --> 
@endif
</div>
    

@endsection