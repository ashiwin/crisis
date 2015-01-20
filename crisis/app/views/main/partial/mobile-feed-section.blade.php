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