$(document).ready(function(){
	

	
	
	
	//判断用户是否投过喜欢
		$.ajax({
		type: "POST",
		url: "favor.php",
		data: "bid="+$('#hiddenbid').val(),
 	 dataType: 'json', //JSON
		success: function(msg){
			if(msg.vote=="voted")//已投过票
			{
					$('#seconditemleft').append('<div class="FavorBtn"><div class="FavorBtnLeft"><img src="images/h1.png" alt="loading" width="35px" height="30px"/></div><div class="FavorBtnRight">已喜欢<span id="countno">'+msg.number+'</span></div></div>');
			}
			else	//未投票
			{
				$('#seconditemleft').append('<div class="FavorBtn"><a><div class="FavorBtnLeft"><img src="images/h1.png" alt="loading" width="35px" height="30px"/></div><div class="FavorBtnRight">喜欢<span id="countno">'+msg.number+'</span></div></a></div>');
				
				
					//注册hover at the Favor section
					$('.FavorBtn').mouseover(function(){
								$(this).css("border-color","#F6A828").css("background-color","#FFF3D9");	
								$('.FavorBtnRight').css("color","#D88B0F");
						}).mouseout(function(){
							$(this).css("border-color","#cccccc").css("background-color","#FFF");	
							$('.FavorBtnRight').css("color","#424444");
						});
						/////////////////////////////////////////////////////////////////
				
				
				
				var tmp=msg.number;
				//注册click事件，让用户可以投票
					$('.FavorBtn a').click(function(){
								$.ajax({
										type: "POST",
										url: "favorVote.php",
										data: "bid="+$('#hiddenbid').val(),
										dataType: 'json', //JSON
								});			
								tmp=parseInt(tmp)+1;
								
								$('.FavorBtn a').contents().unwrap();
								$('.FavorBtnRight').html('已喜欢'+tmp);
								$('.FavorBtn').unbind("mouseover").unbind("mouseout");
								$('.FavorBtn').css("border",0);
								$('.FavorBtnRight').css("color","#424444");					
				

					});
				
			}
			

			
		}
		});





	//用户评论头像Ajax用户信息
	$('.commentAvatar').each(function() // Loop over each avatar using the .each() method
	{
		var nName=$(this).next().children().children('a').html();		
		// Thanks to .each() "this" refers to each element within the loop
		$(this).qtip({
			content: {
				text: '<div style="padding:10px;text-align:center;"><img src="images/ajax_load2.gif" width="16" height="16" /><span style="font-size"16px;">请稍后..</span></div>', // Make sure we declare some basic loading content
				ajax: {
					url: 'userinfo.php', // Grab user data from serverside PHP script...
					data: { 
						userid: $(this).attr('rel') // ...providing a 'userid' which is stored in the avatars REL attribute
					} ,
					 type: 'POST', // POST or GET
					 dataType: 'json', // Tell it we're retrieving JSON
					 success: function(data, status) {
						 //判断有无简介
						 		if(!data.intro)
								data.intro="暂无";
						//判断性别
								if(data.gender=="男")
								data.gender="images/man.jpg";
								else
								data.gender="images/woman.jpg";
						//判断微博地址
								var tmpweibo;
								if(!data.weibo)
								{
									tmpweibo="";	
								}
								else
								 	tmpweibo='微博：'+data.weibo;
								//var content = '性别：' + data.gender+'-' + data.province+'-' + data.city;
                                           var content ='<div class="forum"><div class="forumContain"><div class="containleft"><img src="images/'+data.Avatar+'" width="50" height="50" /></div><div class="containright"><ul><li class="containfirstli">'+nName+'</li><li><img src="'+data.gender+'" width="14" height="14" />' +' ' + data.province+' ' + data.city+'</li></ul></div></div><div class="clear"></div><div class="forumWeibo"><a href="'+data.weibo+'" target="_blank">'+tmpweibo+'<a/></div><div class="forumIntro">简介：'+data.intro+'</div></div>';
								this.set('content.text', content);
					 }
				}
			},
			position: {
				my: 'bottom center', // Position the tooltip...
				at: 'top center', // ...to the right of the avatar
				adjust: { screen: true } // Adjust to keep in the viewport
			},
			show: { delay: 700 }, // Give it a reasonable delay so they don't view it accidentally
			hide: { fixed: true, delay: 100 }, // Allow the user the mouseover the tooltip without it hiding
			style: {
				classes: 'ui-tooltip-dark2 ui-tooltip-shadow'
			}
		});
	});

	//用户姓名Ajax返回用户信息2
	$('span.name a').each(function() // Loop over each avatar using the .each() method
	{
		var nName=$(this).html();	
		nName=nName.replace("@","");
		// Thanks to .each() "this" refers to each element within the loop
		$(this).qtip({
			content: {
				text: '<div style="padding:10px;text-align:center;"><img src="images/ajax_load2.gif" width="16" height="16" /><span style="font-size"16px;">请稍后..</span></div>', // Make sure we declare some basic loading content
				ajax: {
					url: 'userinfo.php', // Grab user data from serverside PHP script...
					data: { 
						userid: $(this).attr('rel') // ...providing a 'userid' which is stored in the avatars REL attribute
					} ,
					 type: 'POST', // POST or GET
					 dataType: 'json', // Tell it we're retrieving JSON
					 success: function(data, status) {
						 //判断有无简介
						 		if(!data.intro)
								data.intro="暂无";
						//判断性别
								if(data.gender=="男")
								data.gender="images/man.jpg";
								else
								data.gender="images/woman.jpg";
						//判断微博地址
								var tmpweibo;
								if(!data.weibo)
								{
									tmpweibo="";	
								}
								else
								 	tmpweibo='微博：'+data.weibo;
								//var content = '性别：' + data.gender+'-' + data.province+'-' + data.city;
                                           var content ='<div class="forum"><div class="forumContain"><div class="containleft"><img src="images/'+data.Avatar+'" width="50" height="50" /></div><div class="containright"><ul><li class="containfirstli">'+nName+'</li><li><img src="'+data.gender+'" width="14" height="14" />' +' ' + data.province+' ' + data.city+'</li></ul></div></div><div class="clear"></div><div class="forumWeibo"><a href="'+data.weibo+'" target="_blank">'+tmpweibo+'<a/></div><div class="forumIntro">简介：'+data.intro+'</div></div>';
								this.set('content.text', content);
					 }
				}
			},
			position: {
				my: 'bottom center', // Position the tooltip...
				at: 'top center', // ...to the right of the avatar
				adjust: { screen: true } // Adjust to keep in the viewport
			},
			show: { delay: 700 }, // Give it a reasonable delay so they don't view it accidentally
			hide: { fixed: true, delay: 100 }, // Allow the user the mouseover the tooltip without it hiding
			style: {
				classes: 'ui-tooltip-dark2 ui-tooltip-shadow'
			}
		});
	});
	
	


	//hover at the shopping section
	$('#tablesecond').mouseover(function(){
				$(this).css("border-color","#F6A828").css("background-color","#FFF3D9");	
		}).mouseout(function(){
			$(this).css("border-color","#cccccc").css("background-color","#FFF");	
		});
	/////////////////////////////////////////////////////////////////
	
	
	
	lastVal = totHistory;
	
	// Create the slider:
	$("#slider").slider({
			value:totHistory,
			min: 1,
			max: totHistory,
			animate: true,
			slide: function(event, ui) {

				if(lastVal>ui.value)
					$(buildQ(lastVal,ui.value)).hide('fast').find('.addComment').remove();
				// Using buildQ to build the jQuery selector
				// If we are moving the slider backward, hide the previous comment

				
				else if(lastVal<ui.value)
					$(buildQ(lastVal,ui.value)).show('fast');
				// Otherwise show it
				
				lastVal = ui.value;
			}
		});
});

var totHistory=0;
// Holds the number of comments

var positions = new Array();
var lastVal;

function addHistory(obj)
{
	/* Gets called on page load for each comment, and on comment submit */
	totHistory++;
	positions.push(obj.id);
}

function buildQ(from,to)
{
	/* Building a jQuery selector from the begin
		and end point of the slide */
	
	if(from>to)
	{
		var tmp=to;
		to=from;
		from=tmp;
	}
	
	from++;
	to++;
	
	var query='';
	for(var i=from;i<to;i++)
	{
		if(i!=from) query+=',';
		query+='.com-'+positions[i-1];
	}

	/* Each comment has an unique com-(Comment ID) class
		that we are using to address it */

	return query;
}



function addComment(where,parent,bkid,resd,to)
{	
	var $el;
	var textName="";
	if($('#waveButton').length) 
		return false;
	// If there already is a comment submition form
	// shown on the page, return and exit
	
	if(!where)
		$el = $('#commentArea');
	else//已经存在父帖
	{
		$el = $(where).closest('.waveComment');
		textName = $el.find('#findsnd').html();
	}

	if(!parent) parent=0;
	if(!resd) resd=0;
	if(!to)	to=0;//没有回复任何人
		


	if(!bkid) bkid=$('#hiddenbid').val();	
	// If we are adding a comment, but there are hidden comments by the slider:
	$('.waveComment').show('slow');
	lastVal = totHistory;
	$('#slider').slider('option','value',totHistory);

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
			<textarea class="textArea" rows="2" cols="70" name=""></textarea>\
			<input type="hidden" name="ReplyName" value="'+textName+'" id="hiddenReply"/>\
			<div><input type="button" id="waveButton" class="button small green rounded" style=" margin-left:4px;" value="评论" onclick="addSubmit(this,'+parent+','+bkid+','+resd+','+to+')" /><a href="" onclick="cancelAdd(this);return false" style=" margin-left:10px;">返回</a></div>\
			\
			</div>\
		</div>\
	\
	</div>';
		
	// Append the form
	$el.append(comment);
	// Focus
	if(!where)
	$el.find('textarea').focus();
	else
	$el.find('textarea').focus().val("回复"+textName+": ");

}

function cancelAdd(el)
{
	$(el).closest('.waveComment').remove();
}

function addSubmit(el,parent,bookid,respond,toid)
{
	/* Executed when clicking the submit button */
	var cText = $(el).closest('.commentText');
	var text = cText.find('textarea').val();
	var Rname =cText.find('#hiddenReply').val();
	var wC = $(el).closest('.waveComment');
	var usern=$('#hiddenusern').val();
	var uuid=$('#hiddenuid').val();
	if(text.length<1)
	{
		alert("抱歉，请输入评论");
		return false;
	}
	$(el).parent().html('<img src="images/ajax_load.gif" width="16" height="16" />');
	// Showing the loading gif animation
	
	// Send an AJAX request:
	$.ajax({
		type: "POST",
		url: "ajax/saveComment.php",
		data: "comment="+encodeURIComponent(text)+"&parent="+parent+"&bid="+bookid+"&usern="+usern+"&uid="+uuid+"&reid="+respond+"&toid="+toid,
		/* Sending both the text and the parent of the comment */
		success: function(msg){
			
			/* PHP returns the automatically assigned ID of the new comment */
			var ins_id = parseInt(msg);
			if(ins_id)
			{
				wC.addClass('com-'+ins_id);
				addHistory({id:ins_id});
				$('#slider').slider('option', 'max', totHistory).slider('option','value',totHistory);
				lastVal=totHistory;
			}
			transForm(text,cText,Rname);
			// Hiding the form and showing the comment
			
		}
	});

}

function transForm(text,cText,Rname)
{
	$('#zwpl').html("");
	if(Rname!="")
	{
		var tmpStr ='<span class="name"><a  href="">我</a></span>'+text;
	}
	else
	{
		var tmpStr ='<span class="name"><a  href="">我</a></span>: '+text;
	}
	cText.html(tmpStr);
}
