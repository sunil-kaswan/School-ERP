@extends('layouts.master')
@section('page_title', 'Manage Sessions')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Manage Staff</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#all-classes" class="nav-link active" data-toggle="tab">Manage Staff</a></li>
                <li class="nav-item"><a href="#new-class" class="nav-link" data-toggle="tab"><i class="icon-plus2"></i> Create New Staff</a></li>
            </ul>

            <div class="tab-content">
                    <div class="tab-pane fade show active" id="all-classes">
                        <table class="table datatable-button-html5-columns">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile No.</th>
                                <th>Session</th>
                                <th>Designation</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($manage_staffs as $s)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $s->user->name }}</td>
                                    <td>{{ $s->user->email }}</td>
                                    <td>{{ $s->user->phone }}</td>
                                    <td>{{ $s->session->name }}</td>
                                    <td>{{ $s->designation }}</td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-left">
                                                    @if(Qs::userIsTeamSA())
                                                    {{--Edit--}}
                                                    <a href="{{ route('manage_staffs.edit', Qs::hash($s->id)) }}" class="dropdown-item"><i class="icon-pencil"></i> Edit</a>

                                                    {{--View--}}
                                                    <a href="{{ route('manage_staffs.show', Qs::hash($s->id)) }}" class="dropdown-item">
                                                        <i class="icon-eye"></i> 
                                                    View</a>

                                                   @endif
                                                        @if(Qs::userIsSuperAdmin())
                                                    {{--Delete--}}
                                                    <a id="{{ Qs::hash($s->id) }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                                    <form method="post" id="item-delete-{{ Qs::hash($s->id) }}" action="{{ route('manage_staffs.destroy', Qs::hash($s->id)) }}" class="hidden">@csrf @method('delete')</form>
                                                        @endif

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                <div class="tab-pane fade" id="new-class">
                    <form method="post" enctype="multipart/form-data" class="wizard-form steps-validation ajax-store" action="{{ route('manage_staffs.store') }}" data-fouc>
                        @csrf
                    <h6>Personal Data</h6>
                        <fieldset>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="user_type"> Select User: <span class="text-danger">*</span></label>
                                        <select required data-placeholder="Select User" class="form-control select" name="user_type" id="user_type">
		                                @foreach($user_types as $ut)
		                                    <option value="{{ $ut->title }}">{{ $ut->name }}</option>
		                                @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Full Name: <span class="text-danger">*</span></label>
                                        <input value="{{ old('name') }}" required type="text" name="name" placeholder="Full Name" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Username: </label>
                                        <input value="{{ old('username') }}" type="text" name="username" class="form-control" placeholder="Username">
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email address: <span class="text-danger">*</span></label>
                                        <input value="{{ old('email') }}" type="email" name="email" class="form-control required" required placeholder="your@email.com">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="password">Password: <span class="text-danger">*</span></label>
                                        <input id="password" type="password" name="password" required class="form-control required"  >
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Phone: <span class="text-danger">*</span></label>
                                        <input value="{{ old('phone') }}" type="tel" name="phone" class="form-control required" pattern="[0-9]{10}" required maxlength="10" placeholder="Enter 10 digit mobile number" >
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Telephone:</label>
                                        <input value="{{ old('phone2') }}" type="tel" name="phone2" class="form-control" pattern="[0-9]{10}" maxlength="10" placeholder="Enter 10 digit mobile number">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="gender">Gender: <span class="text-danger">*</span></label>
                                        <select class="select form-control required" id="gender" name="gender" required data-fouc data-placeholder="Choose..">
                                            <option value=""></option>
                                            <option {{ (old('gender') == 'Male') ? 'selected' : '' }} value="Male">Male</option>
                                            <option {{ (old('gender') == 'Female') ? 'selected' : '' }} value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>

                                {{--BLOOD GROUP--}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="bg_id">Blood Group: </label>
                                        <select class="select form-control" id="bg_id" name="bg_id" data-fouc data-placeholder="Choose..">
                                            <option value=""></option>
                                            @foreach($blood_groups as $bg)
                                                <option {{ (old('bg_id') == $bg->id ? 'selected' : '') }} value="{{ $bg->id }}">{{ $bg->name }}</option>
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
                                                <option value="{{ $session->id }}"
                                                    {{ $session->is_current_session ? 'selected' : '' }}>
                                                    {{ $session->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date Of Joining: <span class="text-danger">*</span></label>
                                        <input autocomplete="off" name="date_of_joining" value="{{ old('date_of_joining') }}" type="text" class="form-control date-pick required" placeholder="Select Date..." required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Relieving Date:</label>
                                        <input autocomplete="off" name="relieving_date" value="{{ old('relieving_date') }}" type="text" class="form-control date-pick" placeholder="Select Date...">
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Designation: <span class="text-danger">*</span></label>
                                        <input value="{{ old('designation') }}" required type="text" name="designation" placeholder="Designation" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Qualifications: </label>
                                        <input value="{{ old('qualifications') }}" type="text" name="qualifications" placeholder="Qualifications" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Experience: </label>
                                        <input value="{{ old('experience') }}" type="text" name="experience" placeholder="Experience" class="form-control">
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Salary: <span class="text-danger">*</span></label>
                                        <input value="{{ old('salary') }}" required type="number" name="salary" placeholder="Salary" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Previous Salary Increment: </label>
                                        <input value="{{ old('previous_salary_increment') }}" type="number" name="previous_salary_increment" placeholder="Previous Salary Increment" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Adhar ID: <span class="text-danger">*</span></label>
                                        <input value="{{ old('id_adhar') }}" required type="number" name="id_adhar" placeholder="Adhar ID" class="form-control" minlength="12" maxlength="12">
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
                                                <option {{ (old('nal_id') == $nal->id ? 'selected' : '') }} value="{{ $nal->id }}">{{ $nal->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{--State--}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="state_id">State: <span class="text-danger">*</span></label>
                                        <select onchange="getDistrict(this.value)" required data-placeholder="Choose.." class="select-search form-control" name="state_id" id="state_id">
                                            <option value=""></option>
                                            @foreach($states as $st)
                                                <option {{ (old('state_id') == $st->id ? 'selected' : '') }} value="{{ $st->id }}">{{ $st->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{--District--}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="district_id">District: <span class="text-danger">*</span></label>
                                        <select onchange="getTehsil(this.value)" required data-placeholder="Select State First" class="select-search form-control" name="district_id" id="district_id">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                {{--Tehsil--}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="tehsil_id">Tehsil: <span class="text-danger">*</span></label>
                                        <select onchange="getVillage(this.value)" required data-placeholder="Select District First" class="select-search form-control" name="tehsil_id" id="tehsil_id">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>

                                {{--Village--}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="village_id">City & Village: </label>
                                        <select data-placeholder="Select Tehsil First" class="select-search form-control" name="village_id" id="village_id">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>

                                {{--PASSPORT--}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="d-block">Upload Passport Photo:</label>
                                        <input value="{{ old('photo') }}" accept="image/*" type="file" name="photo" class="form-input-styled" data-fouc>
                                        <span class="form-text text-muted">Accepted Images: jpeg, png. Max file size 2Mb</span>
                                    </div>
                                </div>

                            </div>
                                
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{--Session List Ends--}}

@endsection
