
		@if(!auth()->check())

			<p>Please <a href="/login"> sign-in </a>to watch the lession</p>

		@elseif(!auth()->user()->isActive())

			<p>
				
				Please <a href="/home"> reactivate your account </a> to view this lession.
			</p>
		@else

			<p>
				ACCOUNT IS ACTIVE: EMBED THE VIDEO HERE

				<!-- <div class="container">
				 <div class="row">
				 <div class="span6">
				 <div class="flex-video widescreen" style="margin: 0 auto;text-align:center;">
				 <iframe width="560" height="315" src="https://www.youtube.com/embed/7fp6GodtzJA" frameborder="0" allowfullscreen></iframe>
				  </div> 


				   </div>
				   </div>
				   </div> -->


			</p>

			<video  id="my-video" class="video-js vjs-big-play-centered" controls poster="http://vjs.zencdn.net/v/oceans.png" data-setup="{}">

            <source src="http://vjs.zencdn.net/v/oceans.mp4" type="video/mp4">

            <p class="vjs-no-js">
                To view this video please enable JavaScript, and consider upgrading
                to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
            </p>
        </video>

		

		@endif