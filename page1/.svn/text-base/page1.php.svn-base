<?php

// Error reporting:
error_reporting(E_ALL^E_NOTICE);
require "banner.class.php";

//connection --preload all the data
	//PageContent
    $mysql = new SaeMysql();  
    $sql = "SELECT BookID,imgName,Bname FROM Bookq";
    $banners = array();
    $data = $mysql->getData( $sql );
	//Scrollbar
    $sql2 = "SELECT BookID,Bname FROM Bookq where Command='2'";
    $Scrollbars = array();
    $data2 = $mysql->getData( $sql2 );
	//Category
    $sql3 = "SELECT DISTINCT Category FROM Bookq";
    $Categorys = array();
    $data3 = $mysql->getData( $sql3 );
	//MultiScroll
    $sql4 = "SELECT BookID,imgName,Bname,Author,Favor FROM Bookq ORDER BY Favor desc limit 8";
    $MultiScrolls = array();
    $data4 = $mysql->getData( $sql4 );
	//MultiSaled
    $sql5 = "SELECT BookID,imgName,Bname,Author,saled FROM Bookq ORDER BY saled desc limit 8";
    $MultiSaleds = array();
    $data5 = $mysql->getData( $sql5 );

    if($data)
    {
        foreach ($data as $row)
        {
            $banners[] = new Banner($row);
        }
    }
	if($data2)
    {
        foreach ($data2 as $row2)
        {
            $Scrollbars[] = new Scrollbar($row2);
        }
    }
	if($data3)
    {
        foreach ($data3 as $row3)
        {
            $Categorys[] = new Category($row3);
        }
    }
	if($data4)
    {
        foreach ($data4 as $row4)
        {
            $MultiScrolls[] = new MultiScroll($row4);
        }
    }
	if($data5)
    {
        foreach ($data5 as $row5)
        {
            $MultiSaleds[] = new MultiSaled($row5);
        }
    }
   $mysql->closeDb();

//-----------------------------


// Randomizing the $banners array:随机排序
shuffle($banners);
shuffle($Scrollbars);

// Splitting the banners array into smaller arrays with 4 banners each:
$bannerGroups = array_chunk($banners,4);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Page1</title>
<link rel="stylesheet" type="text/css" href="buttons/buttons.css" />
<link rel="stylesheet" type="text/css" href="css/banner.css" />
<script type="text/javascript" src="js/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="js/banner.js"></script>
</head>

<body>

<div id="containerB">
<div id="main">
	<div>
    <div style="float:left;	padding-right:30px;" class="scrollupdate">最新上传</div>
	<div class="scrollupdate" id="s1">
    	<ul>
			<?php
            
            // Looping through the first group:
            foreach($Scrollbars as $scr)
            {
                echo $scr->html();
            }
    
            ?>
    	</ul>
    </div>
    </div>
	<div style="font-size:14px; color:#424444">最新推荐</div>
    <hr style="width:565px; margin:20px 30px 20px 0;"/>
   

   <ul class="bannerHolder">
        <?php
		
		// Looping through the first group:
		foreach($bannerGroups[0] as $ban)
		{
			echo '<li>'.$ban->html().'</li>';
		}

        ?>
    </ul>
    
    <ul class="bannerHolder">
        <?php

		// Looping through the second group:
		
		foreach($bannerGroups[1] as $ban)
		{
			echo '<li>'.$ban->html().'</li>';
		}

        ?>
    </ul>
       <ul class="bannerHolder">
        <?php
		
		// Looping through the first group:
		foreach($bannerGroups[3] as $ban)
		{
			echo '<li>'.$ban->html().'</li>';
		}

        ?>
    </ul>
    
    <ul class="bannerHolder">
        <?php

		// Looping through the second group:
		
		foreach($bannerGroups[4] as $ban)
		{
			echo '<li>'.$ban->html().'</li>';
		}

        ?>
    </ul>
</div>
	        <div id="Bright">
                    <div id="Bright1">
                    	<div id="Bright1head">分类</div>
                            <ul>
                                <?php
                                
                                // Looping through the first group:
                                foreach($Categorys as $ca)
                                {
                                    echo $ca->html();
                                }
                        
                                ?>
                            </ul>
                    </div>
                    
            <div class="Bright2" id="dota1">
        	<div class="Bright2head">最受欢迎</div>
			<ul class="Bright2ul">
                    <?php
                                    echo $MultiScrolls[4]->html();
                                    echo $MultiScrolls[0]->html();
					?>      

			</ul>
			<ul class="Bright2ul">
				                    <?php
                                    echo $MultiScrolls[5]->html();
                                    echo $MultiScrolls[1]->html();
									?>   
			</ul>
			<ul class="Bright2ul">
				                    <?php
                                    echo $MultiScrolls[6]->html();
                                    echo $MultiScrolls[2]->html();
									?>   
			</ul>
			<ul class="Bright2ul">
				                    <?php
                                    echo $MultiScrolls[7]->html();
                                    echo $MultiScrolls[3]->html();
									?>   
			</ul>

			<div class="Bright2foot"><a href="#">更多&gt;&gt;</a></div>
        </div><!--do_ta end--><!--do_ta end-->
          <div class="Bright2" id="dota2">
        	<div class="Bright2head">销售排行</div>
			<ul class="Bright2ul">
                    <?php
                                    echo $MultiSaleds[0]->html();
					?>      

			</ul>
			<ul class="Bright2ul">
				                    <?php
                                    echo $MultiSaleds[1]->html();
									?>   
			</ul>
			<ul class="Bright2ul">
				                    <?php

                                    echo $MultiSaleds[2]->html();
									?>   
			</ul>
			<ul class="Bright2ul">
				                    <?php

                                    echo $MultiSaleds[3]->html();
									?>   
			</ul>

			<div class="Bright2foot"><a href="#">更多&gt;&gt;</a></div>
        </div>          
            </div>
</div>
</body>
</html>
