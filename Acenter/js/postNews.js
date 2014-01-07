$(document).ready(function(){	
	//验证
	$(".postnewsform:last").Validform({
		tiptype:2
	});
		/////////////////////////////////////////////////////////////////
	$('.postnewsform').submit(function(e){
	//	$('#postnews').attr("disabled",true);
		
		$.ajax({
		   type: "POST",
		   url: "addN.php",
		   data: $('.postnewsform').serialize(),
		   dataType: 'json',
		   success: function(msg){   
				if(msg.status==1)
				{
						$('#newsscu').fadeIn(2500).fadeOut(2000);
						$('#text,textarea').val("");

				}
		   }
		});

		return false;
	});

});