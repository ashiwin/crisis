<!--feed section desktop-->
	<div class="col-lg-10 hidden-sm hidden-xs">
		<?php 
			$s = 0;
		?>
		@while($s < $view['status_count'])
			@if(isset($view['comment_count'][$s]))
			<div class="col-lg-12 hidden-sm hidden-xs margin-top5 feed-top white-content red-line">
			@else
			<div class="col-lg-12 hidden-sm hidden-xs margin-top5 white-content feed-top radius-bottom red-line">
			@endif
				<div class="col-lg-1 hidden-sm hidden-xs">
					{{ HTML::image($view['status_picture'][$s]) }}
				</div>
				<div class="col-lg-11 hidden-sm hidden-xs">
					<div class="col-lg-4 hidden-sm hidden-xs">
						<h4>
							{{ $view['status_name'][$s]}}
						</h4>
					</div>
					<div class="col-lg-8 hidden-sm hidden-xs text-right feed-date">
						<small>
							{{ $view['status_date'][$s]}}
						</small>
					</div>
					<div class="col-lg-12 hidden-sm hidden-xs">
						<b>{{ $view['status_content'][$s]}}</b>
					</div>
				</div>
			</div>
				<?php 
					$c = 0;
				?>
				@if(isset($view['comment_count'][$s]))
					@while($c < $view['comment_count'][$s])
						@if($c == ($view['comment_count'][$s] - 1))
						<div class="col-lg-12 hidden-sm hidden-xs comment-content radius-bottom">
						@else
						<div class="col-lg-12 hidden-sm hidden-xs comment-content">
						@endif
							<div class="col-lg-1 hidden-sm hidden-xs comment-face">
								{{ HTML::image($view['comment_picture'][$s][$c]) }}
							</div>
							<div class="col-lg-11 hidden-sm hidden-xs">
								<div class="col-lg-4 hidden-sm hidden-xs">
									<h4>
										{{ $view['comment_name'][$s][$c] }}
									</h4>
								</div>
								<div class="col-lg-8 hidden-sm hidden-xs text-right feed-date">
									<small>
										{{ $view['comment_date'][$s][$c] }}
									</small>
								</div>
								<div class="col-lg-12 hidden-sm hidden-xs">
									<b>{{ $view['comment_content'][$s][$c] }}</b>
								</div>
							</div>
						</div>
					<?php $c++; ?>
					@endwhile
				@endif
			<?php $s++; ?>
		@endwhile
	</div>
<!--/feed section desktop-->