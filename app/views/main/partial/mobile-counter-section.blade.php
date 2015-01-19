<!--Counter section for mobile-->
	<div class="hidden-lg col-sm-12 col-xs-12 margin-top5">
		<div class="row">
<!--page info section -->
			<div class="hidden-lg col-sm-12 col-xs-12 white-content text-center red-line">
				{{ HTML::image($view['page_image']) }}	
				<h3>
					{{ $view['page_name'] }}
				</h3>
			</div>
<!--/page info section -->
<!--crisis counter(POSTS AND COMMENTS) section -->
			<div class="hidden-lg col-sm-12 col-xs-12 white-content margin-top5 red-line">
				<h4 class="text-center">
					Crisis Counter
				</h4>
				<h5>
					<div class="hidden-lg col-sm-8 col-xs-8">
						Statuses
					</div>
					<div class="hidden-lg col-sm-4 col-xs-4 text-right">
						{{ $view['fail_status'] }}
					</div>
					<div class="hidden-lg col-sm-8 col-xs-8">
						Comments
					</div>
					<div class="hidden-lg col-sm-4 col-xs-4 text-right">
						{{ $view['fail_comments'] }}
					</div>
				</h5>
			</div>
<!--/crisis counter section -->
<!--crisis counter(CRISIS WORDS) section -->
			<div class="hidden-lg col-sm-12 col-xs-12 white-content margin-top5 red-line">
				<h5 class="red-text">
				@if(isset($view['fail_total']))
				<?php $n = 0; ?>
					@while($n < $view['fail_total'])
						<a href="{{ URL::to($view['fail_name_ssh'][$n]) }}">
							<div class="hidden-lg col-sm-8 col-xs-8">
								{{ $view['fail_name'][$n] }}
							</div>
						</a>
						<div class="hidden-lg col-sm-4 col-xs-4 text-right">
							{{ $view['fail_amount'][$n] }}
						</div>
						<br />
						<?php $n++; ?>
					@endwhile
				@endif
				</h5>
			</div>
<!--/crisis counter(CRISIS WORDS) section -->
		</div>
	</div>
<!--/Counter section for mobile-->