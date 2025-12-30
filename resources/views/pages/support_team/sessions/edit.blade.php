@extends('layouts.master')
@section('page_title', 'Edit Session - '.$s->name)
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Edit Session</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form class="ajax-update" data-reload="#page-header" method="post" action="{{ route('sessions.update', $s->id) }}">
                        @csrf @method('PUT')
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Name <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input name="name" value="{{ $s->name }}" required type="text" class="form-control" placeholder="Name of Session" placeholder="2023-2024">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="is_current_session" class="col-lg-3 col-form-label font-weight-semibold">Is Current Session</label>
                            <div class="col-lg-9">
                                <select class="form-control select-search" name="is_current_session" id="is_current_session">
                                    	<option {{ $s->is_current_session == 0 ? 'selected' : '' }} value="0">NO</option>
                                        <option {{ $s->is_current_session == 1 ? 'selected' : '' }} value="1">YES</option>
                                </select>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Submit Form <i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{--Session Edit Ends--}}

@endsection
