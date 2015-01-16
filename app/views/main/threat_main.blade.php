@extends('layout.main')
@section('content')
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

<!--feed section desktop-->
	<div class="col-lg-10 hidden-sm hidden-xs">
		<?php 
			$s = 0;
		?>
		@while($s < $view['status_count'])
			@if(isset($view['comment_count'][$s]))
				<div class="col-lg-12 hidden-sm hidden-xs margin-top5 feed-top white-content red-line">
			@else
				<div class="col-lg-12 hidden-sm hidden-xs margin-top5 white-content feed-top feed-bottom red-line">
			@endif
				<div class="col-lg-1 hidden-sm hidden-xs">
					{{ HTML::image($view['status_picture'][$s]) }}
				</div>
				<div class="col-lg-11 hidden-sm hidden-xs">
					<h4>{{ $view['status_name'][$s]}}</h4>
					<b>{{ $view['status_content'][$s]}}</b>
					<br />
				</div>
			</div>
				<?php 
					$c = 0;
				?>
				@if(isset($view['comment_count'][$s]))
					@while($c < $view['comment_count'][$s])
						<div class="col-lg-12 hidden-sm hidden-xs comment-content">
							<div class="col-lg-1 hidden-sm hidden-xs comment-face">
								{{ HTML::image($view['comment_picture'][$s][$c]) }}
							</div>
							<div class="col-lg-10 hidden-sm hidden-xs">
								<h4>
									{{ $view['comment_name'][$s][$c] }}
								</h4>
								{{ $view['comment_content'][$s][$c] }}
								<br />
							</div>
						</div>
					<?php $c++; ?>
					@endwhile
					<div class="col-lg-12 hidden-sm hidden-xs feed-bottom">
					</div>
				@endif
			<?php $s++; ?>
		@endwhile
	</div>
<!--/feed section desktop-->

<!--Other section for desktop-->
	<div class="col-lg-2 hidden-sm hidden-xs">
		<div class="row">
<!--page info section -->
			<div class="col-lg-12 hidden-sm hidden-xs white-content margin-top5 red-content text-right">
				Page
			</div>
			<div class="col-lg-12 hidden-sm hidden-xs white-content text-center counter-section">
				{{ HTML::image($view['page_image']) }}	
				<h3>
					{{ $view['page_name'] }}
				</h3>
			</div>
<!--/page info section -->
<!--crisis counter(POSTS AND COMMENTS) section -->
			<div class="col-lg-12 hidden-sm hidden-xs white-content margin-top5 red-content text-right">
				Counter
			</div>
			<div class="col-lg-12 hidden-sm hidden-xs white-content counter-section">
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
			<div class="col-lg-12 hidden-sm hidden-xs white-content counter-section">
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
		</div>
	</div>
<!--/Other section for desktop-->
@stop