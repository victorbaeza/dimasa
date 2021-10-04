@if ($message = Session::get('success'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		<strong>Ok!</strong>
			    @if(is_array($message))
			    @foreach ($message as $m)
			    {{ $m }}<br />
			    @endforeach
			    @else
			    {{ $message }}
			    @endif
	</div>
{{ Session::forget('success') }}
@endif

@if ($message = Session::get('error'))
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		<strong>Error!</strong>
			    @if(is_array($message))
			    @foreach ($message as $m)
			    {{ $m }}<br />
			    @endforeach
			    @else
			    {!! $message !!}
			    @endif
	</div>
{{ Session::forget('error') }}
@endif

@if ($message = Session::get('warning'))
	<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		<strong>Aviso!</strong>
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

@if ($message = Session::get('notice'))
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		<strong>Información!</strong>
			    @if(is_array($message))
			    @foreach ($message as $m)
			    {{ $m }}
			    @endforeach
			    @else
			    {{ $message }}
			    @endif
	</div>
@endif

@if ($message = Session::get('info'))
	<div class="alert alert-default">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		<strong>Información!</strong>
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
