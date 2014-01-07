$(document).ready(function(){
	$('.replyLink').click(function(){
								    window.parent.change();
								   });

	
});
////////


function addComment(where,parent,bkid,resd,to)
{	
	var $el;

	if($('#waveButton').length) 
		return false;
	// If there already is a comment submition form
	// shown on the page, return and exit
	
	if(!where)
		$el = $('#commentArea');
	else//已经存在父帖
		$el = $(where).closest('.waveComment');

	if(!parent) parent=0;
	if(!resd) resd=0;
	if(!to) to=0;


	if(!bkid) bkid=$('#hiddenbid').val();	
	// If we are adding a comment, but there are hidden comments by the slider:
	$('.waveComment').show('slow');
	// Move the slider to the end point and show all comments
	var comment = '<div class="waveComment addComment">\
		\
		<div class="comment">\
			<div class="commentAvatar">\
			<img src="'+$('#hiddenAva').val()+'" width="50" height="50" />\
			</div>\
			\
			<div class="commentText">\
			\
			<textarea class="textArea" rows="1" cols="60" name=""></textarea>\
			<div><input type="button" id="waveButton" class="button small green rounded" style=" margin-left:4px;" value="评论" onclick="addSubmit(this,'+parent+','+bkid+','+resd+','+to+')" /><a href="" onclick="cancelAdd(this);return false" style=" margin-left:10px;">返回</a></div>\
			\
			</div>\
		</div>\
	\
	</div>';
	
	$el.append(comment);
	
	// Append the form

}

function cancelAdd(el)
{
	$(el).closest('.waveComment').remove();
    window.parent.change();

}

function addSubmit(el,parent,bookid,respond,toid)
{
	/* Executed when clicking the submit button */
	
	var cText = $(el).closest('.commentText');
	var text = cText.find('textarea').val();
	var wC = $(el).closest('.waveComment');
	var usern=$('#hiddenusern').val();
	var uuid=$('#hiddenuid').val();
	if(text.length<1)
	{
		alert("抱歉，请输入评论");
		return false;
	}
	$(el).parent().html('<img src="../bInfo/images/ajax_load.gif" width="16" height="16" />');
	// Showing the loading gif animation
	
	// Send an AJAX request:
	$.ajax({
		type: "POST",
		url: "../../bInfo/ajax/saveComment.php",
		data: "comment="+encodeURIComponent(text)+"&parent="+parent+"&bid="+bookid+"&usern="+usern+"&uid="+uuid+"&reid="+respond+"&toid="+toid,
		/* Sending both the text and the parent of the comment */
		success: function(msg){
			
			/* PHP returns the automatically assigned ID of the new comment */
			var ins_id = parseInt(msg);
			if(ins_id)
			{
				wC.parent('.waveComment').append("<div id='scu' style='text-align:center;'><img src='../bInfo/jcart/images/checkmark.png' />评论成功！</div>");
				wC.remove();
				$('#scu').fadeOut('slow',function(){
												 $('#scu').remove(); 
												  });
			}
			
		}
	});

}

function transForm(text,cText)
{
	var tmpStr ='<span class="name">'+$('#hiddenusern').val()+':</span> '+text;
	cText.html(tmpStr);
}