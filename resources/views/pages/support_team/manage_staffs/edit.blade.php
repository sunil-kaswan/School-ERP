@extends('layouts.master')
@section('page_title', 'Edit Staff')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Edit Staff Details</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <form method="post" enctype="multipart/form-data" class="wizard-form steps-validation ajax-update" action="{{ route('manage_staffs.update', $staff->id) }}" data-fouc>
                @csrf @method('PUT')
                
                <h6>Personal Data</h6>
                <fieldset>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="user_type"> Select User: <span class="text-danger">*</span></label>
                                <select required data-placeholder="Select User" class="form-control select" name="user_type" id="user_type">
                                    @foreach($user_types as $ut)
                                        <option value="{{ $ut->title }}" {{ $staff->user->user_type == $ut->title ? 'selected' : '' }}>{{ $ut->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Full Name: <span class="text-danger">*</span></label>
                                <input value="{{ $staff->user->name }}" required type="text" name="name" placeholder="Full Name" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Username: </label>
                                <input value="{{ $staff->user->username }}" type="text" name="username" class="form-control" placeholder="Username">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email address: <span class="text-danger">*</span></label>
                                <input value="{{ $staff->user->email }}" type="email" name="email" class="form-control required" required placeholder="your@email.com">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="password">Password: </label>
                                <input id="password" type="password" name="password" class="form-control" placeholder="Leave blank to keep current password">
                                <span class="form-text text-muted">Leave blank if you don't want to change password</span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Phone: <span class="text-danger">*</span></label>
                                <input value="{{ $staff->user->phone }}" type="tel" name="phone" class="form-control required" pattern="[0-9]{10}" required maxlength="10" placeholder="Enter 10 digit mobile number">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Telephone:</label>
                                <input value="{{ $staff->user->phone2 }}" type="tel" name="phone2" class="form-control" pattern="[0-9]{10}" maxlength="10" placeholder="Enter 10 digit mobile number">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="gender">Gender: <span class="text-danger">*</span></label>
                                <select class="select form-control required" id="gender" name="gender" required data-fouc data-placeholder="Choose..">
                                    <option value=""></option>
                                    <option {{ $staff->user->gender == 'Male' ? 'selected' : '' }} value="Male">Male</option>
                                    <option {{ $staff->user->gender == 'Female' ? 'selected' : '' }} value="Female">Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="bg_id">Blood Group: </label>
                                <select class="select form-control" id="bg_id" name="bg_id" data-fouc data-placeholder="Choose..">
                                    <option value=""></option>
                                    @foreach($blood_groups as $bg)
                                        <option {{ $staff->user->bg_id == $bg->id ? 'selected' : '' }} value="{{ $bg->id }}">{{ $bg->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Session: <span class="text-danger">*</span></label>
                                <select name="session_id" class="form-control form-control-sm select-search required" required>
                                    @foreach(Qs::getAllSession() as $session)
                                        <option value="{{ $session->id }}" {{ $staff->session_id == $session->id ? 'selected' : '' }}>
                                            {{ $session->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Date Of Joining: <span class="text-danger">*</span></label>
                                <input autocomplete="off" name="date_of_joining" value="{{ $staff->date_of_joining }}" type="text" class="form-control date-pick required" placeholder="Select Date..." required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Relieving Date:</label>
                                <input autocomplete="off" name="relieving_date" value="{{ $staff->relieving_date }}" type="text" class="form-control date-pick" placeholder="Select Date...">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Designation: <span class="text-danger">*</span></label>
                                <input value="{{ $staff->designation }}" required type="text" name="designation" placeholder="Designation" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Qualifications: </label>
                                <input value="{{ $staff->qualifications }}" type="text" name="qualifications" placeholder="Qualifications" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Experience: </label>
                                <input value="{{ $staff->experience }}" type="text" name="experience" placeholder="Experience" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Salary: <span class="text-danger">*</span></label>
                                <input value="{{ $staff->salary }}" required type="number" name="salary" placeholder="Salary" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Previous Salary Increment: </label>
                                <input value="{{ $staff->previous_salary_increment }}" type="number" name="previous_salary_increment" placeholder="Previous Salary Increment" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Adhar ID: <span class="text-danger">*</span></label>
                                <input value="{{ $staff->id_adhar }}" required type="number" name="id_adhar" placeholder="Adhar ID" class="form-control" minlength="12" maxlength="12">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nal_id">Nationality: <span class="text-danger">*</span></label>
                                <select data-placeholder="Choose..." required name="nal_id" id="nal_id" class="select-search form-control">
                                    <option value=""></option>
                                    @foreach($nationals as $nal)
                                        <option {{ $staff->user->nal_id == $nal->id ? 'selected' : '' }} value="{{ $nal->id }}">{{ $nal->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="state_id">State: <span class="text-danger">*</span></label>
                                <select onchange="getDistrict(this.value)" required data-placeholder="Choose.." class="select-search form-control" name="state_id" id="state_id">
                                    <option value=""></option>
                                    @foreach($states as $st)
                                        <option {{ $staff->user->state_id == $st->id ? 'selected' : '' }} value="{{ $st->id }}">{{ $st->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="district_id">District: <span class="text-danger">*</span></label>
                                <select onchange="getTehsil(this.value)" required data-placeholder="Select State First" class="select-search form-control" name="district_id" id="district_id">
                                    <option value=""></option>
                                    @if($staff->user->district_id)
                                        <option value="{{ $staff->user->district_id }}" selected>{{ $staff->user->district->name ?? '' }}</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tehsil_id">Tehsil: <span class="text-danger">*</span></label>
                                <select onchange="getVillage(this.value)" required data-placeholder="Select District First" class="select-search form-control" name="tehsil_id" id="tehsil_id">
                                    <option value=""></option>
                                    @if($staff->user->tehsil_id)
                                        <option value="{{ $staff->user->tehsil_id }}" selected>{{ $staff->user->tehsil->name ?? '' }}</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="village_id">City & Village: </label>
                                <select data-placeholder="Select Tehsil First" class="select-search form-control" name="village_id" id="village_id">
                                    <option value=""></option>
                                    @if($staff->user->village_id)
                                        <option value="{{ $staff->user->village_id }}" selected>{{ $staff->user->village->name ?? '' }}</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="d-block">Upload Passport Photo:</label>
                                <input accept="image/*" type="file" name="photo" class="form-input-styled" data-fouc>
                                <span class="form-text text-muted">Accepted Images: jpeg, png. Max file size 2Mb</span>
                                @if($staff->user->photo)
                                    <div class="mt-2">
                                        <img src="{{ $staff->user->photo }}" alt="Current Photo" style="width: 100px; height: 100px; object-fit: cover; border-radius: 5px;">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                </fieldset>
            </form>
        </div>
    </div>

@endsection