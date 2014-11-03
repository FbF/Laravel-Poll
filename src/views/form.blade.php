<style type="text/css" media="screen">
	.hide {
		display:none;
	}

	.poll-results {
		background:#fff;
		color:#000;
		padding:20px;
	}

	.poll-option {
		margin:10px 0;
	}

	.poll-result {
		margin:10px 0;
	}

	.result-box {
		background:#e1e1e1;
		border:solid 1px #c1c1c1;
		height:20px;
		overflow:hidden;
	}

	.result-bg {
		height:30px;
		width:0;
	}

	.result-bg-fill {
		background:rgb(134, 170, 218);
		height:30px;
		width:0;
	}

	.poll-results.animate .result-bg-fill {
		width:100%;
		-webkit-transition: width 500ms ease-out 500ms;
	  -moz-transition: width 500ms ease-out 500ms;
	  -o-transition: width 500ms ease-out 500ms;
	  transition: width 500ms ease-out 500ms;
	}
</style>


<div id="poll-container">
	
	<h2 class="poll-question">{{$currentPoll->question}}</h2>
	
  	{{ Form::open(array('url' => URL::route('submit_poll').'#poll-container', 'class' => 'poll-form')) }}

	   	{{-- This is used to return the user back to this page --}}
	   	{{ Form::hidden('return', Request::url().'#poll-container') }}
	
		{{ Form::hidden('poll_id', $currentPoll->id) }}	
		
		<p class="poll-form--error hide" id="test_poll_form_error">Please choose a poll option</p>
		<div class="poll-option">
	        {{ Form::label('poll_form_answer1', $currentPoll->answer1) }}
	        {{ Form::radio('answer', $currentPoll->answer1, false, array('poll_form_answer1')); }}
	    </div>
	    <div class="poll-option">
	        {{ Form::label('poll_form_answer2', $currentPoll->answer2) }}
	        {{ Form::radio('answer', $currentPoll->answer2, false, array('poll_form_answer2')); }}
	    </div>
	    <div class="poll-option">
	        {{ Form::label('poll_form_answer3', $currentPoll->answer3) }}
	        {{ Form::radio('answer', $currentPoll->answer3, false, array('poll_form_answer3')); }}
	    </div>
	  	<div class="">
	  		{{ Form::submit(trans('laravel-poll::messages.form.submit'), array('class' => 'btn')) }}
	  	</div>
	
	{{ Form::close() }}

	<div class="poll-results hide" data-total="{{$currentPoll->answer1_count + $currentPoll->answer2_count + $currentPoll->answer3_count}}">
		<div class="poll-result" data-score="{{$currentPoll->answer1_count}}" data-answer="{{$currentPoll->answer1}}">
			<p>{{$currentPoll->answer1}} - <span class="percent"></span></p>
			<div class="result-box">
				<div class="result-bg">
					<div class="result-bg-fill"></div>
				</div>
			</div>
		</div>
		<div class="poll-result" data-score="{{$currentPoll->answer2_count}}" data-answer="{{$currentPoll->answer2}}">
			<p>{{$currentPoll->answer2}} - <span class="percent"></span></p>
			<div class="result-box">
				<div class="result-bg">
					<div class="result-bg-fill"></div>
				</div>
			</div>
		</div>
		<div class="poll-result" data-score="{{$currentPoll->answer3_count}}" data-answer="{{$currentPoll->answer3}}">
			<p>{{$currentPoll->answer3}} - <span class="percent"></span></p>
			<div class="result-box">
				<div class="result-bg">
					<div class="result-bg-fill"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" charset="utf-8" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){	
		$('form.poll-form').on('submit', function(e){
			// e.preventDefault();
			var	submittedAnswer = $('input[name="answer"]:checked').val();	
			if ( ! submittedAnswer ) {
				$('.poll-form--error').removeClass('hide');
			} else {
				var total = $('.poll-results').data('total') + 1;
				var score, percent;
				$('.poll-result').each(function(index, value){
					score = $(value).data('score');
					if ( submittedAnswer == $(value).data('answer') ) {
						score++;
					}
					percent = Math.round( score / total * 100);
					$(value).find('.result-bg').css('width', percent.toString()+'%');
					$(value).find('span.percent').html(percent.toString()+'%');
				});

				$( this ).addClass('hide');

				$('.poll-results').removeClass('hide');	

				 window.setTimeout(function(){
					$('.poll-results').addClass('animate');
				}, 10);
			}
		});
	});
</script>