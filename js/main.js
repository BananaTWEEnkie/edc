$(document).ready(function() {
	$(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
	//Enable submit answer button when user types in textarea
	$('#submit-answer').keyup(function() {
		if($(this).val() != '') {
			 $('#answerSubmission').prop('disabled', false);
		}
	});
	//Enable submit question button when user types in textarea
	$('#submit-question').keyup(function() {
		if($(this).val() != '') {
			 $('#questionSubmission').prop('disabled', false);
		}
	});
 
	var collapsedSize = '100px';
	$('#code-of-the-day').each(function() {
    var h = this.scrollHeight;
    var div = $(this);
		
    if (h > 30) {
      div.css('height', collapsedSize);
      div.after('<a id="more" class="item" href="#">Read more</a><br/>');
      var link = div.next();
      link.click(function(e) {
        e.stopPropagation();

        if (link.text() != 'Collapse') {
          link.text('Collapse');
          div.animate({
						'height': h
          });
				} else {
          div.animate({
            'height': collapsedSize
          });
          link.text('Read more');
        }
			});
    }
	});
	
	$('a.comment-box').click(function(){
		event.preventDefault();
		var $parent = $(this).closest('div');// or var $parent = $(this).parent();
		console.log($parent);
		$(".content").append('<textarea name="test" id="test" rows="4" cols="50"></textarea>');
	});
}); 

