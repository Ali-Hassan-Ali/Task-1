@extends('layouts.dashboard.app')

@section('content')

@section('title', __('dashboard.dashboard') .' - '. __('dashboard.categorey'))

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.categorey')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li class="active">@lang('dashboard.categoreys')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('dashboard.categoreys') <small>{{ $categorys->count() }}</small></h3>

                    <form action="{{ route('dashboard.categorys.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="@lang('dashboard.search')" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('dashboard.search')</button>
                                    <a href="{{ route('dashboard.categorys.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('dashboard.add')</a>
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($categorys->count() > 0)
                    
                        <div class="table-responsive">
                            
                            <table class="table table-hover">

                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('dashboard.name')</th>
                                    <th>@lang('dashboard.action')</th>
                                </tr>
                                </thead>
                                
                                <tbody>
                                @foreach ($categorys as $index=>$categorey)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $categorey->name }}</td>
                                        <td>
                                            <a href="{{ route('dashboard.categorys.edit', $categorey->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('dashboard.edit')</a>
                                            
                                            <form action="{{ route('dashboard.categorys.destroy', $categorey->id) }}" method="post" style="display: inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> @lang('dashboard.delete')</button>
                                            </form><!-- end of form -->
                                        </td>
                                        <td>
                                            @foreach ($categorey->children as $element)
                                                {{-- expr --}}
                                                <td>{{ $element->name }}</td>
                                                <td>
                                                <a href="{{ route('dashboard.categorys.edit', $categorey->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                                
                                                <form action="{{ route('dashboard.categorys.destroy', $categorey->id) }}" method="post" style="display: inline-block">
                                                    {{ csrf_field() }}
                                                    {{ method_field('delete') }}
                                                    <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> </button>
                                                </form><!-- end of form -->
                                            </td>
                                            @endforeach
                                        </td>
                                    </tr>

                                    @foreach ($categorey->children as $index=>$child)
                                        
                                        <div class="my-5 bg-red">
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $child->name }}</td>
                                                <td>
                                                    <a href="{{ route('dashboard.categorys.edit', $child->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('dashboard.edit')</a>
                                                    
                                                    <form action="{{ route('dashboard.categorys.destroy', $child->id) }}" method="post" style="display: inline-block">
                                                        {{ csrf_field() }}
                                                        {{ method_field('delete') }}
                                                        <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> @lang('dashboard.delete')</button>
                                                    </form><!-- end of form -->
                                                </td>
                                            </tr>
                                        </div>
                                    
                                    @endforeach
                                
                                @endforeach
                                </tbody>

                            </table><!-- end of table -->
                            
                            {{-- {{ $categorys->appends(request()->query())->links() }} --}}

                        </div><!-- end of table  responsive-->
                        
                    @else
                        
                        <h2>@lang('dashboard.no_data_found')</h2>
                        
                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
