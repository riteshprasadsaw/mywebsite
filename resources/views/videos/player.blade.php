
		@if(!auth()->check())

			<p>Please <a href="/login"> sign-in </a>to watch the lession</p>

		@elseif(!auth()->user()->isActive())

			<p>
				
				Please <a href="/home"> reactivate your account </a> to view this lession.
			</p>
		@else

			<p>
				ACCOUNT IS ACTIVE: EMBED THE VIDEO HERE
			</p>

		@endif