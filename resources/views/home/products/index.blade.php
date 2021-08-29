@extends('layouts.home.app')

@section('content')

<h1 class="text-center my-5">Add Product</h1>

<div class="d-flex justify-content-center row">


	<div class="container row">

		<div class="py-5 my-5 col-12 col-md-6 bg-dark d-flex justify-content-center text-white">

		    <div class="form-group col-12">

                <div class="table-responsive">
                            
                    <table class="table table-hover text-white">

                        <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('dashboard.name')</th>
                            <th>@lang('dashboard.action')</th>
                        </tr>
                        </thead>
                        
                        <tbody id="tr">
                        @foreach ($products as $index=>$product)
                            
                            <tr id="product-{{ $product->id }}">
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    <a href="{{ route('dashboard.products.edit', $product->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('dashboard.edit')</a>
                                    <button type="submit" class="btn btn-danger delete btn-sm" data-id="{{ $product->id }}"><i class="fa fa-trash"></i> @lang('dashboard.delete')</button>
                                </td>
                            </tr>

                        
                        @endforeach
                        </tbody>

                    </table><!-- end of table -->
                    
                    {{-- {{ $products->appends(request()->query())->links() }} --}}

                </div><!-- end of table  responsive-->
		    	
		    </div>

		</div>

		<div class="py-5 my-5 col-12 col-md-4 mx-2 bg-dark d-flex justify-content-center text-white">
			<div class="mb-0 col-12">

                <form id="addProduct" action="{{ route('product.store') }}" method="post">

                        @csrf
                        @method('post')

                        @php
                            $names = ['name_ar','name_en'];
                        @endphp

                        @foreach ($names as $name)

                            <div class="form-group">
                                <label>@lang('dashboard.' . $name)</label>
                                <input type="text" name="{{ $name }}" id="{{ $name }}" class="form-control" value="{{ old($name) }}">
                                <span class="text-danger" id="{{ $name }}-error"></span>
                            </div>
                            
                        @endforeach
                        {{--categories--}}
                        <div class="form-group">
                        <label>@lang('dashboard.categoreys')</label>
                            <select class="form-control select2" multiple="multiple" required data-placeholder="Select a State" name="categorys_id[]">
                                @foreach ($categorys as $category)
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
                            <button type="submit" class="btn btn-primary col-12"><i class="fa fa-plus"></i> @lang('dashboard.add')</button>
                        </div>

                    </form><!-- end of form -->
		    	
			</div>

		</div>
		
	</div>
</div>

@endsection

@push('products')

<script type="text/javascript">

	$(document).ready(function () {

        $('.select2').select2();

		$('#addProduct').on('submit', function(e) {
			e.preventDefault();

			var method   = $(this).attr('method');
			var url      = $(this).attr('action');
			var data     = $(this).serialize();
            var items    = ['name_ar','name_en'];
            var getLocale= "{{ app()->getLocale() }}";

            $.each(items, function(index,item) {
                    
                $('#' + item).removeClass('is-invalid');

                $('#' + item + '-error').text('');

            });//end of each

            $.ajax({
        		url: url,
        		method: method, 
        		data: data, 
        		success: function (data) {

                    if (getLocale == 'ar') {
                        var name = data.name.ar;
                    } else {
                        var name = data.name.en;
                    }

                    $("#tr").append('<tr id="product-"+data.id+""><td>'+data.id+'</td><td>'+data.name+'</td><td><a href="" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('dashboard.edit')</a><button type="submit" class="btn btn-danger delete btn-sm" data-id="'+data.id+'"><i class="fa fa-trash"></i> @lang('dashboard.delete')</button></td></tr>');

        		},error: function(data) {

                    $.each(data.responseJSON.errors, function(name,message) {

                        $('#' + name).addClass('is-invalid');

                        $('#' + name + '-error').text(message);

                    });//end of each

                },//end of error//end of success

        	});//end of ajax

		});//end of categorys

        $(document).on('click', '.delete', function(e) {
            e.preventDefault();

            alert('aSome');

            var id    = $(this).data('id');

            $.ajax({
                url: 'product.delete/'+id,
                method: 'delete', 
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {

                    $('#product-'+id).remove();

                },error: function(data) {

                 console.log(data);

                },//end of error//end of success

            });//end of ajax

        });//end of delete

	});//end of document reday function
	
</script>

@endpush