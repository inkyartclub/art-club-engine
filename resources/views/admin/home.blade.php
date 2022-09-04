@extends('layouts.admin')
@section('content')
<div class="flex flex-wrap">
    {{-- Number block --}}
    <div class="{{ $settings1['column_class'] }} px-4">
        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 shadow-lg">
            <div class="flex-auto p-4">
                <div class="flex flex-wrap">
                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                        <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                            {{ $settings1['chart_title'] }}
                        </h5>
                        <span class="font-semibold text-xl text-blueGray-700">
                            {{ number_format($settings1['total_number']) }}
                        </span>
                    </div>
                    <div class="relative w-auto pl-4 flex-initial">
                        <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-lightBlue-500">
                            <i class="fas fa-globe"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Number block --}}
    <div class="{{ $settings2['column_class'] }} px-4">
        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 shadow-lg">
            <div class="flex-auto p-4">
                <div class="flex flex-wrap">
                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                        <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                            {{ $settings2['chart_title'] }}
                        </h5>
                        <span class="font-semibold text-xl text-blueGray-700">
                            {{ number_format($settings2['total_number']) }}
                        </span>
                    </div>
                    <div class="relative w-auto pl-4 flex-initial">
                        <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-lightBlue-500">
                            <i class="fas fa-globe"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Number block --}}
    <div class="{{ $settings3['column_class'] }} px-4">
        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 shadow-lg">
            <div class="flex-auto p-4">
                <div class="flex flex-wrap">
                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                        <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                            {{ $settings3['chart_title'] }}
                        </h5>
                        <span class="font-semibold text-xl text-blueGray-700">
                            {{ number_format($settings3['total_number']) }}
                        </span>
                    </div>
                    <div class="relative w-auto pl-4 flex-initial">
                        <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-lightBlue-500">
                            <i class="fas fa-globe"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Number block --}}
    <div class="{{ $settings4['column_class'] }} px-4">
        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 shadow-lg">
            <div class="flex-auto p-4">
                <div class="flex flex-wrap">
                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                        <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                            {{ $settings4['chart_title'] }}
                        </h5>
                        <span class="font-semibold text-xl text-blueGray-700">
                            {{ number_format($settings4['total_number']) }}
                        </span>
                    </div>
                    <div class="relative w-auto pl-4 flex-initial">
                        <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-lightBlue-500">
                            <i class="fas fa-globe"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Number block --}}
    <div class="{{ $settings5['column_class'] }} px-4">
        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 shadow-lg">
            <div class="flex-auto p-4">
                <div class="flex flex-wrap">
                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                        <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                            {{ $settings5['chart_title'] }}
                        </h5>
                        <span class="font-semibold text-xl text-blueGray-700">
                            {{ number_format($settings5['total_number']) }}
                        </span>
                    </div>
                    <div class="relative w-auto pl-4 flex-initial">
                        <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-lightBlue-500">
                            <i class="fas fa-globe"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
@endpush