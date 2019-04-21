@extends('layouts.app')
@section('title', 'Create Project')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-center" style="color: white;">{{ __('Create Project') }}</div>

                <div class="card-body" style="color: white; background-image: url('https://motionarray.imgix.net/preview-82967-gZ6ArOJAiM-low_0011.jpg?w=660&q=60&fit=max&auto=format'); ">
                    <form method="POST" action="{{ url('/saveProject')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Project Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="pTitle" placeholder="Enter Project Title" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Project Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control" name="pDescription" placeholder="Enter Project Description" rows="5" required autofocus></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-info">
                                    {{ __('Submit Project Proposal') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection