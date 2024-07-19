@extends('layouts.app')
@section('content')
    <div>
        <div class="container">
            <div class="card shadow-lg">
                <div class="card-body">
                    <nav>
                        <div class="nav nav-pills my-1 py-1" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-userdetails-tab" data-bs-toggle="tab" data-bs-target="#nav-userdetails" type="button" role="tab" aria-controls="nav-userdetails" aria-selected="true">User Details</button>
                            <button class="nav-link" id="nav-password-tab" data-bs-toggle="tab" data-bs-target="#nav-password" type="button" role="tab" aria-controls="nav-password" aria-selected="false">Change Password</button>
                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false" disabled>Others</button>
                            <button class="nav-link d-none" id="nav-disabled-tab" data-bs-toggle="tab" data-bs-target="#nav-disabled" type="button" role="tab" aria-controls="nav-disabled" aria-selected="false" disabled>Disabled</button>
                        </div>
                    </nav>
                <form action="{{ route('users.update') }}" method="POST">
                        @csrf
                        <input value="{{$user->id}}" type="hidden">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-userdetails" role="tabpanel" aria-labelledby="nav-userdetails-tab" tabindex="0">
                                <div class="row mt-4">
                                    <h3 class="fw-bold">Personal Information</h3>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1">Name</span>
                                            <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="name" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1">Email</span>
                                            <input type="text" class="form-control" value="{{ $user->email }}" name="email" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-password" role="tabpanel" aria-labelledby="nav-password-tab" tabindex="0">
                                <div class="row mt-4">
                                    <h3 class="fw-bold">Change Password</h3>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1">Password</span>
                                            <input type="text" class="form-control" value="" name="password" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1">Confirm Password</span>
                                            <input type="text" class="form-control" value="" name="confirm_password" ria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">

                            </div>
                            <div class="tab-pane fade" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">

                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary mx-1 my-1">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection