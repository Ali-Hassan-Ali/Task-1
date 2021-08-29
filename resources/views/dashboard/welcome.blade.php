@extends('layouts.dashboard.app')

@section('content')

@section('title', __('home.dashboard'))

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.dashboard')</h1>

            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</li>
            </ol>
            
        </section>

        <section class="content">


        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection

@push('welcome')
    

@endpush