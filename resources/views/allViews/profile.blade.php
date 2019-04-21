@extends('layouts.app')
@section('title', 'Profile')
@section('content')
@foreach($user as $users)
<div class="container emp-profile" style="margin-top: 20px; background: white;">  
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img mt-4 text-center">
                            <?php if($users->gender == "Female"){ ?>
                            <img src="" alt="male-avatar"/>
                        <?php }else ?> 
                            <img src="{{ asset('public/img/maleAvatar.png') }}" alt=""/>
                        </div><br>
                    </div>

                    <div class="col-md-8">
                        <div class="profile-head mt-4 text-center">
                            <h3><?= $users->first_name ?> <?= $users->last_name ?></h3>
                            <h5><?= $users->email ?></h5>
                            <h6 class="">Joined on <?= $users->created_at ?></h6>
                            <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <form method="POST" action="{{ url('/refer')}}">
                            	@csrf
                                <input class="form-control mr-sm-2" name="rf" type="email" placeholder="Refer Friend" required>
                                <div class="text-center">
                                	<button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-8">
                    	<ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <?php if($users->role_id == 2): ?>
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Admin Panel</a>
                                    <?php endif; ?>
                                </li>
                        </ul>
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            	
                                        <div class="row">
                                            <div class="col-md-6 col-3">
                                                <label class="font-weight-bold">Status</label>
                                            </div>
                                            <div class="col-md-6 col-9">
                                                <?php 
                                                    if($users->role_id == 1):
                                                  ?>
                                                    <p>User</p>
                                                <?php elseif($users->role_id == 2): ?>
                                                    <p>Admin</p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-3">
                                                <label class="font-weight-bold">Email</label>
                                            </div>
                                            <div class="col-md-6 col-9">
                                                <p><?= $users->email ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-3">
                                                <label class="font-weight-bold">Phone</label>
                                            </div>
                                            <div class="col-md-6 col-9">
                                                <p><?= $users->phone ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-3">
                                                <label class="font-weight-bold">Gender</label>
                                            </div>
                                            <div class="col-md-6 col-9">
                                                <p><?= $users->gender ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-3">
                                                <label class="font-weight-bold">Birthday</label>
                                            </div>
                                            <div class="col-md-6 col-9">
                                                <p><?= $users->birthday ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-3">
                                                <label class="font-weight-bold">Refered By</label>
                                            </div>
                                            <div class="col-md-6 col-9">
                                            	@if($users->reference_email == NULL)
                                            		<p>No One Refer You so far.</p>
                                            	@else
                                                	<p><?= $users->reference_email ?></p>
                                                @endif
                                            </div>
                                        </div>
                                
                            </div>

                            

                        </div>
                    </div>
                </div>          
        </div>
@endforeach
@endsection