@extends('layouts.master')
@section('page_title', 'Staff Details')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Staff Details</h6>
            <div class="header-elements">
                <div class="list-icons">
                    <a href="{{ route('manage_staffs.index') }}" class="btn btn-primary btn-sm"><i class="icon-arrow-left52 mr-2"></i> Back to List</a>
                    @if(Qs::userIsTeamSA())
                        <a href="{{ route('manage_staffs.edit', $staff->id) }}" class="btn btn-info btn-sm"><i class="icon-pencil mr-2"></i> Edit</a>
                    @endif
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-3 text-center">
                    <img src="{{ $staff->user->photo }}" alt="Staff Photo" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover; border: 3px solid #ddd;">
                    <h5 class="mt-3 mb-0">{{ $staff->user->name }}</h5>
                    <p class="text-muted">{{ $staff->designation }}</p>
                </div>

                <div class="col-md-9">
                    <h6 class="font-weight-semibold">Personal Information</h6>
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td class="font-weight-semibold" style="width: 200px;">User Type:</td>
                                <td>{{ ucwords(str_replace('_', ' ', $staff->user->user_type)) }}</td>
                                <td class="font-weight-semibold" style="width: 200px;">Username:</td>
                                <td>{{ $staff->user->username ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-semibold">Email:</td>
                                <td>{{ $staff->user->email }}</td>
                                <td class="font-weight-semibold">Phone:</td>
                                <td>{{ $staff->user->phone }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-semibold">Telephone:</td>
                                <td>{{ $staff->user->phone2 ?? 'N/A' }}</td>
                                <td class="font-weight-semibold">Gender:</td>
                                <td>{{ $staff->user->gender }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-semibold">Blood Group:</td>
                                <td>{{ $staff->user->blood_group->name ?? 'N/A' }}</td>
                                <td class="font-weight-semibold">Nationality:</td>
                                <td>{{ $staff->user->nationality->name ?? 'N/A' }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <h6 class="font-weight-semibold mt-4">Location Information</h6>
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td class="font-weight-semibold" style="width: 200px;">State:</td>
                                <td>{{ $staff->user->state->name ?? 'N/A' }}</td>
                                <td class="font-weight-semibold" style="width: 200px;">District:</td>
                                <td>{{ $staff->user->district->name ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-semibold">Tehsil:</td>
                                <td>{{ $staff->user->tehsil->name ?? 'N/A' }}</td>
                                <td class="font-weight-semibold">Village:</td>
                                <td>{{ $staff->user->village->name ?? 'N/A' }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <h6 class="font-weight-semibold mt-4">Employment Information</h6>
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td class="font-weight-semibold" style="width: 200px;">Session:</td>
                                <td>{{ $staff->session->name }}</td>
                                <td class="font-weight-semibold" style="width: 200px;">Designation:</td>
                                <td>{{ $staff->designation }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-semibold">Date of Joining:</td>
                                <td>{{ date('d M, Y', strtotime($staff->date_of_joining)) }}</td>
                                <td class="font-weight-semibold">Relieving Date:</td>
                                <td>{{ $staff->relieving_date ? date('d M, Y', strtotime($staff->relieving_date)) : 'Currently Working' }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-semibold">Qualifications:</td>
                                <td>{{ $staff->qualifications ?? 'N/A' }}</td>
                                <td class="font-weight-semibold">Experience:</td>
                                <td>{{ $staff->experience ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-semibold">Salary:</td>
                                <td>₹{{ number_format($staff->salary, 2) }}</td>
                                <td class="font-weight-semibold">Previous Salary Increment:</td>
                                <td>{{ $staff->previous_salary_increment ? '₹'.number_format($staff->previous_salary_increment, 2) : 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-semibold">Adhar ID:</td>
                                <td colspan="3">{{ $staff->id_adhar }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection