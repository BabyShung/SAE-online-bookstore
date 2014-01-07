$(document).ready(function(){
	
	$('.waveComment .replyLink a').click(function(){
		
		var elem = $(this).closest('.waveComment');
		var mid=elem.attr('rel');
		$.confirm({
			'title'		: '公告删除',
			'message'	: '您将要删除此公告。<br />此操作不能恢复，请确认。',
			'buttons'	: {
				'删除'	: {
					'class'	: 'button green medium',
					'action': function(){
						
						$.ajax({
							type: "POST",
							url: "deleteNews.php",
							data: "mid="+mid,
							   });
											
						
						elem.slideUp();
					}
				},
				'不删除'	: {
					'class'	: 'button gray medium',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
		
	});
	
});