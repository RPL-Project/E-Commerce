@if(Auth::guard('web')->check())
	<div class="text-success">
		<p>You Are Log In As A User!</p>
	</div>
@else
	<div class="text-danger">
		<p>You Are Log Out as a User!</p>
	</div>
@endif

@if(Auth::guard('admin')->check())
	<div class="text-success">
		<p>You Are Log In as an Admin!</p>
	</div>
@else
	<div class="text-danger">
		<p>You Are Log Out as an Admin!</p>
	</div>
@endif