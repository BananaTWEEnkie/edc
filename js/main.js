$(document).ready(function() {
	//Prevent users from pressing enter key 
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
 //The code of day will be shown to users, but not fully. This will allow users to extend the full code.
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
	// When user clicks on comment link, a text box will appear along with a submit comment button
	$('a.comment-box').click(function(){
		event.preventDefault();
		var $parent = $(this).closest('div');
		
		$parent.append("<form method='post' action=''><p align='right'><textarea name='comment-text' placeholder='Add comment here' rows='3' cols='50'></textarea><br><input type='button' value='Submit Comment' name='commentSubmission'></input></p>");
		$(".comment-box").text('');
	});
	// the selector will match all input controls of type :checkbox
	// and attach a click event handler 
	$("input:checkbox").on('click', function() {
		// in the handler, 'this' refers to the box clicked on
		var $box = $(this);
		if ($box.is(":checked")) {
			// the name of the box is retrieved using the .attr() method
			// as it is assumed and expected to be immutable
			var group = "input:checkbox[name='" + $box.attr("name") + "']";
			// the checked state of the group/box on the other hand will change
			// and the current value is retrieved using .prop() method
			$(group).prop("checked", false);
			$box.prop("checked", true);
		} else {
			$box.prop("checked", false);
		}
	});
}); 

