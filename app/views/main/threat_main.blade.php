@extends('layout.main')
@section('content')
					{{ $view['time_taken'] }}
					<br />

<!--Other section for mobile-->
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
<!--/Other section for mobile-->

<!--feed section mobile-->
		<?php 
			$s = 1;
		?>
		@while($s < $view['status_count'])
			<div class="hidden-lg col-sm-12 col-xs-12 white-content margin-top5 red-line">
				<div class="hidden-lg col-sm-3 col-xs-3">
					{{ HTML::image($view['status_picture'][$s]) }}
				</div>
				<div class="hidden-lg col-sm-9 col-xs-9">
					<h4>{{ $view['status_name'][$s]}}</h4>
				</div>
				<div class="hidden-lg col-sm-12 col-xs-12">
					<b>{{ $view['status_content'][$s]}}</b>
				</div>				
			</div>
				<?php 
					$c = 0;
				?>
				@if(isset($view['comment_count'][$s]))
					@while($c < $view['comment_count'][$s])
						<div class="hidden-lg col-sm-12 col-xs-12 comment-content">
							<div class="hidden-lg  col-sm-3 col-xs-3 comment-face">
								{{ HTML::image($view['comment_picture'][$s][$c]) }}
							</div>
							<div class="hidden-lg col-sm-8 col-xs-8">
								<h4>
									{{ $view['comment_name'][$s][$c] }}
								</h4>
							</div>
							<div class="hidden-lg col-sm-12 col-xs-12">
								{{ $view['comment_content'][$s][$c] }}
							</div>
						</div>
					<?php $c++; ?>
					@endwhile
				@endif
			<?php $s++; ?>
		@endwhile
<!--/feed section mobile-->


	@include('main.partial.desktop-feed-section')
	@include('main.partial.desktop-counter-section')

@stop