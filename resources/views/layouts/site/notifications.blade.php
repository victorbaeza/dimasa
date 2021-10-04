@if ($message = Session::get('success'))

	<div class="alert alert-success alert-dismissible fade show text-center margin-bottom-1x">
		<span class="alert-close" data-dismiss="alert"></span>
		<i class="icon-help"></i>&nbsp;&nbsp;
		<strong>¡Ok!</strong>
		@if(is_array($message))
			@foreach ($message as $m)
				{{ $m }}
			@endforeach
		@else
			{{ $message }}
		@endif
	</div>

{{ Session::forget('success') }}
@endif

@if ($message = Session::get('error'))

	<div class="alert alert-danger alert-dismissible fade show text-center margin-bottom-1x">
		<span class="alert-close" data-dismiss="alert"></span>
		<i class="icon-help"></i>&nbsp;&nbsp;
		<strong>¡Error!</strong>
		@if(is_array($message))
			@foreach ($message as $m)
				{{ $m }}
			@endforeach
		@else
			{{ $message }}
		@endif
	</div>

{{ Session::forget('error') }}
@endif

@if ($message = Session::get('warning'))

	<div class="alert alert-warning alert-dismissible fade show text-center margin-bottom-1x">
		<span class="alert-close" data-dismiss="alert"></span>
		<i class="icon-help"></i>&nbsp;&nbsp;
		<strong>¡Aviso!</strong>
		@if(is_array($message))
			@foreach ($message as $m)
				{{ $m }}
			@endforeach
		@else
			{{ $message }}
		@endif
	</div>

{{ Session::forget('warning') }}
@endif


@if ($message = Session::get('info'))

	<div class="alert alert-info alert-dismissible fade show text-center margin-bottom-1x">
		<span class="alert-close" data-dismiss="alert"></span>
		<i class="icon-help"></i>&nbsp;&nbsp;
		<strong>¡Información!</strong>
		@if(is_array($message))
			@foreach ($message as $m)
				{{ $m }}
			@endforeach
		@else
			{{ $message }}
		@endif
	</div>

{{ Session::forget('info') }}
@endif
