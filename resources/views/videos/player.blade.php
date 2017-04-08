
		@if(!auth()->check())

			<p>Please <a href="/login"> sign-in </a>to watch the lession</p>

		@elseif(!auth()->user()->isActive())

			<p>
				
				Please <a href="/home"> reactivate your account </a> to view this lession.
			</p>
		@else

			<p>
				ACCOUNT IS ACTIVE: EMBED THE VIDEO HERE

				<div class="container">
				 <div class="row">
				 <div class="span6">
				 <div class="flex-video widescreen" style="margin: 0 auto;text-align:center;">
				 <iframe width="560" height="315" src="https://www.youtube.com/embed/7fp6GodtzJA" frameborder="0" allowfullscreen></iframe>
				  </div> 


				   </div>
				   </div>
				   </div>
			</p>

			

		@endif