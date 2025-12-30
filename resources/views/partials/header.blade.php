<div id="page-header" class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4>
                <!-- <i class="icon-plus-circle2 mr-2"></i>  -->
                <a href="{{ url()->previous() }}" >
                    <i class="icon-arrow-left52 mr-1"></i>
                </a>
                <span class="font-weight-semibold">@yield('page_title')</span>
            </h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <!-- <div class="header-elements d-none">
            <div class="d-flex justify-content-center">
   {{--             <a href="#" class="btn btn-link btn-float text-default"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
                <a href="#" class="btn btn-link btn-float text-default"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
                <a href="#" class="btn btn-link btn-float text-default"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>--}}
                <a href="{{ Qs::userIsSuperAdmin() ? route('settings') : '' }}" class="btn btn-link btn-float text-default"><i class="icon-arrow-down7 text-primary"></i> <span class="font-weight-semibold">Current Session: {{ Qs::getAllSession() }}</span></a>
            </div>
        </div> -->
        <div class="header-elements d-none">
            <div class="d-flex justify-content-center">

                @if(Qs::userIsStaff())
                <form action="{{ route('set_current_sessions') }}" method="post" class="d-flex align-items-center">
                    @csrf
                    <!-- <i class="icon-arrow-down7 text-primary mr-2"></i>
                    <span class="ml-3 font-weight-semibold">Current Session: </span> -->
                    <i class="icon-arrow-down7 text-primary mr-2"></i>
                    <span class="mr-1 font-weight-semibold text-nowrap">
                        Current Session:
                    </span>
                    <select name="session_id"
                            class="form-control form-control-sm select-search"
                            onchange="this.form.submit()">
                        @foreach(Qs::getAllSession() as $session)
                            <option value="{{ $session->id }}"
                                {{ $session->is_current_session ? 'selected' : '' }}>
                                {{ $session->name }}
                            </option>
                        @endforeach

                    </select>
                </form>
                @endif     
            </div>
        </div>

    </div>

    {{--Breadcrumbs--}}
    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ url('/') }}" class="breadcrumb-item">
                    <i class="icon-home2 mr-2"></i> Home
                </a>

                @php
                    $segments = Request::segments();
                    $link = '';
                    $lastIndex = count($segments);
                @endphp

                @for($i = 1; $i <= $lastIndex; $i++)
                    @php $seg = Request::segment($i); @endphp

                    @continue($seg === 'super_admin')
                    @continue(is_numeric($seg))

                    @php $link .= '/'.$seg; @endphp
                    @php $title = ucwords(str_replace('-', ' ', $seg)); @endphp

                    @if($i < $lastIndex)
                        <a href="{{ url($link) }}" class="breadcrumb-item">{{ $title }}</a>
                    @else
                        <span class="breadcrumb-item active">{{ $title }}</span>
                    @endif
                @endfor
            </div>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

    </div>
</div>
