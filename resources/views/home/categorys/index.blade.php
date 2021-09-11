@extends('layouts.home.app')

@section('content')

<div class="d-flex justify-content-center">
	<div class="container">

		<div class="py-5 my-5 col-12 bg-dark d-flex justify-content-center text-white row">
			<div class="form-group col-10 mb-0">
			    <label>@lang('dashboard.categoreys')</label>
			    <select class="form-control categorys" name="category_id">
			    	<option selected="">Selct Category</option>
			    	@foreach ($categorys as $category)
			      		
			      		<option value="{{ $category->id }}" data-count="1"
			      			data-url="{{ route('category.show',$category->id) }}">{{ $category->name }}</option>
			    		
			    	@endforeach
			    </select>
			</div>

		    <div id="sub_categoryed" class="form-group col-10">
		    	
		    </div>

		</div>
		
	</div>
</div>

@endsection

@push('demoCategory')

<script type="text/javascript">

	$(document).ready(function () {

		$(document).on('change', '.categorys', function() {

			var $option      = $(this).find(":selected");
			var count        = $option.data('count');
			var id           = $option.val();
			var getLocale    = "{{ app()->getLocale() }}";

			var nCount = count + 1;

			$('.count').each(function(index) {

				var countIng = $(this).data('count');

				if (count < countIng) {

					$(this).data('count',countIng).remove();

				}//end of if

		    });//end of product price

            		$.ajax({
        		url: 'category_id/'+id,
        		method: 'get', 
        		success: function (data) {
        			
        			$("#sub_categoryed").append('<select class="form-control categorys mt-3 count" data-count="'+nCount+'" id="sub_categoryed-'+id+'" name="category_id"><option selected="" disabled>@lang('dashboard.selct_category')</option></select>');

        			if (data.length == 0) {

        				$("#sub_categoryed-"+id).append('<option data-count="'+nCount+'" disabled>@lang('dashboard.no_data_found')</option>');
        				
        			} else {

					$.each(data,function(index,value){

					if (getLocale == 'ar') {
					    var name = value.name.ar;
					} else {
					    var name = value.name.en;
					}

	                       	 	$("#sub_categoryed-"+id).append('<option value="'+value.id+'" data-count="'+nCount+'" data-id="'+value.id+'">'+name+'</option>');

	                    		});//en each
        				
				}//end of if length data

        		}//end of success

        		});//end of ajax

		});//end of categorys

	});//end of document reday function
	
</script>

@endpush
