@extends('layouts.dashboard.app')

@section('content')

@section('title', __('dashboard.dashboard') .' - '. __('dashboard.products')  .' - '. __('dashboard.add'))

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.products')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li><a href="{{ route('dashboard.products.index') }}"> @lang('dashboard.products')</a></li>
                <li class="active">@lang('dashboard.add')</li>
            </ol>

        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('dashboard.add')</h3>
                </div><!-- end of box header -->

                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('dashboard.products.store') }}" method="post">

                        @csrf
                        @method('post')

                        @php
                            $names = ['name_ar','name_en'];
                        @endphp

                        @foreach ($names as $name)

                            <div class="form-group">
                                <label>@lang('dashboard.' . $name)</label>
                                <input type="text" name="{{ $name }}" class="form-control" value="{{ old($name) }}">
                            </div>
                            
                        @endforeach
                        {{--categories--}}
                        <div class="form-group">
                        <label>@lang('dashboard.categoreys')</label>
                            <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" name="categorys_id[]">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                            
                                            {{ $category->name }} 

                                        
                                        @foreach ($category->children as $element)

                                        
                                            > {{ $element->name }}

                                        @endforeach

                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('dashboard.add')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
