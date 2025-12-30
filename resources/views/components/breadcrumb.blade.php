@props([
    'module' => null,
    'page' => null,
])

@php
    $crumbs = config("breadcrumbs.$module.$page");
    dd($module, $page, $crumbs);
@endphp

@if(count($crumbs))
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        @foreach($crumbs as $crumb)
            @if(isset($crumb['route']))
                <li class="breadcrumb-item">
                    <a href="{{ route($crumb['route']) }}">
                        {{ $crumb['label'] }}
                    </a>
                </li>
            @else
                <li class="breadcrumb-item active">
                    {{ $crumb['label'] }}
                </li>
            @endif
        @endforeach
    </ol>
</nav>
@endif
