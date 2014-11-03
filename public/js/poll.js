$(document).ready(function(){
	
	$('form.poll-form').on('submit', function(e){

		e.preventDefault();

		var	submittedAnswer = $('input[name="answer"]:checked').val();

		if ( ! submittedAnswer ) {

			$('.poll-form--error').removeClass('hide');

		} else {

			$.post( $( this ).attr('action'), $( this ).serialize() );

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
			$('.poll-btn-enter').addClass('hide');

			$('.poll-results').removeClass('hide');
			$('.poll-btn-back').removeClass('hide');

			 window.setTimeout(function(){
				$('.poll-results').addClass('animate');
			}, 10);
		}
	});

	$('.poll-btn-enter').on('click', function() {
		$('form.poll-form').submit();
		return false;
	});

	$('.poll-btn-back').on('click', function() {
		$('form.poll-form, .poll-btn-enter').removeClass('hide');
		$('.poll-results, .poll-btn-back, .poll-form--error').addClass('hide');
		$('.poll-results').removeClass('animate');
		$('form.poll-form')[0].reset();
		return false;
	});
});
