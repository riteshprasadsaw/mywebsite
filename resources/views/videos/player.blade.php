
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
				 <iframe allowfullscreen="" src="http://player.vimeo.com/video/71876963" frameborder="0" width="500" height="281"></iframe>

				  </div> 


				   </div>
				   </div>
				   </div>
			</p>

			

		@endif