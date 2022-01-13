@if ($message = Session::get('success'))
<div class="bg-green-200 p-2 mb-4">
    <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('error'))
<div class="bg-red-200 p-2 mb-4">
    <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('warning'))
<div class="bg-red-200 p-2 mb-4">
	<strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('info'))
<div class="bg-red-200 p-2 mb-4">
	<strong>{{ $message }}</strong>
</div>
@endif


@if ($errors->any())
<div class="bg-red-200 p-2 mb-4">
	<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif