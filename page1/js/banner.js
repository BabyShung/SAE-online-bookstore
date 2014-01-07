$(document).ready(function(){

//多行Scrollbar
 var dota1=$("#dota1"),  ta_tc1=dota1.find("ul");

    if(dota1.size()==0)
	{
		return false;
	}
    var scroll=function(uls){
        //复制一次内部的li
        var li_h=uls.eq(0).find("li").outerHeight();
        this.copy=function(){
            uls.each(function(){
                var lis=$(this).find("li");
                $(this).append(lis.clone());
                $(this).attr("li_s",lis.size()*2);
                $(this).attr("cur_li",lis.size()*2-1);
            });
        }
        this.copy();
        //移动到最下边的li
        this.toLast=function(){
            uls.each(function(){
                $(this).scrollTop(10000);
            });
        }
        this.toLast();

        var timer=null;//滚动的超时时间
        var i=0;
        //开始滚动ul数组
        function start(i)
        {
            var cur_ul=uls.eq(i);
            if(cur_ul){
                cur_ul.animate({scrollTop:cur_ul.scrollTop()-li_h},"fast",function(){
                    var cur_li=parseInt(cur_ul.attr("cur_li"));
                    var li_s=parseInt(cur_ul.attr("li_s"));
                    cur_li--;
                    if((li_s/2-1)==cur_li)
                    {
                        cur_ul.attr("cur_li",li_s-1);
                        $(this).scrollTop(10000);
                    }else{
                        cur_ul.attr("cur_li",cur_li);
                    }
                    start(++i);
                });
            };
        }
        timer=setInterval(function(){
								   		start(i);
								   },7000);
    }
    scroll(ta_tc1);







//scroll bar jquery

		setInterval(function(){
								$('#s1').find("ul:first").animate({
									marginTop:"-25px"
								},"normal",function(){
									$(this).css({marginTop:"0px"}).find("li:first").appendTo(this);
								});
							},5600);

///////////////////////////////////////


	
});