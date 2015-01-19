<!--Counter section for desktop-->	
	<div class="col-lg-2 hidden-sm hidden-xs">
		<div class="row">
<!--page info section -->
			<div class="col-lg-12 hidden-sm hidden-xs white-content margin-top5 red-content text-right">
				Page
			</div>
			<div class="col-lg-12 hidden-sm hidden-xs white-content text-center radius-bottom">
				{{ HTML::image($view['page_image']) }}	
				<h3>
					{{ $view['page_name'] }}
				</h3>
			</div>
<!--/page info section -->
<!--crisis counter(CRISIS WORDS) section -->
			<div class="col-lg-12 hidden-sm hidden-xs white-content margin-top5 red-content">
				<a href="{{ URL::to($view['page_all_link']) }}" class="view_all">
					<span class="col-lg-6 hidden-sm hidden-xs ">
						View All
					</span>
				</a>
				<span class="col-lg-6 hidden-sm hidden-xs text-right">
					Keywords
				</span>
			</div>
			<div class="col-lg-12 hidden-sm hidden-xs white-content radius-bottom">
				<span class="red-text">
				@if(isset($view['fail_total']))
				<?php $n = 0; ?>
					@while($n < $view['fail_total'])
						<a href="{{ URL::to($view['fail_name_ssh'][$n]) }}">
							<div class="col-lg-8 hidden-sm hidden-xs">
								{{ $view['fail_name'][$n] }}
							</div>
						</a>
						<div class="col-lg-4 hidden-sm hidden-xs text-right">
							{{ $view['fail_amount'][$n] }}
						</div>
						<br />
						<?php $n++; ?>
					@endwhile
				@endif
				</span>
			</div>
<!--/crisis counter(CRISIS WORDS) section -->
<!--crisis counter(POSTS AND COMMENTS) section -->
			<div class="col-lg-12 hidden-sm hidden-xs white-content margin-top5 red-content text-right" style="background:#3a5ba2 !important">
				{{ HTML::image('packages/img/social_media_icon/fb.png', 'fb', array( 'style' => 'width:30px; height:30px;')) }}	
			</div>
			<div class="col-lg-12 hidden-sm hidden-xs white-content radius-bottom">
				<h5>
					<div class="col-lg-8 hidden-sm hidden-xs">
						Statuses 
					</div>
					<div class="col-lg-4 hidden-sm hidden-xs text-right">
						{{ $view['fail_status'] }}
					</div>
					<div class="col-lg-8 hidden-sm hidden-xs">
						Comments
					</div>
					<div class="col-lg-4 hidden-sm hidden-xs text-right">
						{{ $view['fail_comments'] }}
					</div>
				</h5>
			</div>
<!--/crisis counter section -->
		</div>
	</div>
<!--/Counter section for desktop-->