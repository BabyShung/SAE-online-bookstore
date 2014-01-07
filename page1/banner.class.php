<?php

class Banner{
	
	private $data = array();
	
	public function __construct($row){
		$this->data = $row;
	}
	
	public function html(){
		
		/* This method returns the banner's HTML code */
		
		$d = &$this->data;
		
		return '
       		<div class="bannerparent">
			<div class="banner">
             
				<a target="_blank" href="../bInfo/index.php?bid='.$d['BookID'].'&bn='.urlencode($d['Bname']).'">
					<img src="img/'.$d['imgName'].'" alt="'.$d['Bname'].'" width="100" height="140" />
				</a>
				<p class="companyInfo"> '.$d['Bname'].'</p>
            
                        </div>
				<div class="bannername"><a target="_blank" href="../bInfo/index.php?bid='.$d['BookID'].'&bn='.urlencode($d['Bname']).'">'.$d['Bname'].'</a></div>
		</div>
                                            ';
	}

}
class Scrollbar{
	
	private $data = array();
	
	public function __construct($row){
		$this->data = $row;
	}
	
	public function html(){
		
		/* This method returns the banner's HTML code */
		
		$d = &$this->data;
		
		return '
			<li><a target="_blank" href="../bInfo/index.php?bid='.$d['BookID'].'&bn='.urlencode($d['Bname']).'">'.$d['Bname'].'</a></li>

                                            ';
	}

}
class Category{
	
	private $data = array();
	
	public function __construct($row){
		$this->data = $row;
	}
	
	public function html(){
		
		/* This method returns the banner's HTML code */
		
		$d = &$this->data;
		
		return '
			<li><a target="_blank" href="../Gsearch/search.php?Ca='.urlencode($d['Category']).'">'.$d['Category'].'</a></li>

                                            ';
	}

}
class MultiScroll{
	
	private $data = array();
	
	public function __construct($row){
		$this->data = $row;
	}
	
	public function html(){
		
		/* This method returns the banner's HTML code */
		
		$d = &$this->data;
		
		return '			
				<li>
				<div style="float:left;padding-right:20px;">
					<a  target="_blank" href="../bInfo/index.php?bid='.$d['BookID'].'&bn='.urlencode($d['Bname']).'">
						<img src="img/'.$d['imgName'].'" alt="'.$d['Bname'].'" width="35px" height="50px" border="0" class="shadow"/>
					</a>
				</div>
				<div>
					<div class="time"><a target="_blank" href="../bInfo/index.php?bid='.$d['BookID'].'&bn='.urlencode($d['Bname']).'">'.$d['Bname'].'</a></div>
					<div style="font-size:10px;">作者：'.$d['Author'].'<span style="float:right;color:#C12513;font-size:12px;">人气：'.$d['Favor'].'</span></div>	
				</div>
				</li>		
			

                                            ';
	}

}
class MultiSaled{
	
	private $data = array();
	
	public function __construct($row){
		$this->data = $row;
	}
	
	public function html(){
		
		/* This method returns the banner's HTML code */
		
		$d = &$this->data;
		
		return '			
				<li>
				<div style="float:left;padding-right:20px;">
					<a  target="_blank" href="../bInfo/index.php?bid='.$d['BookID'].'&bn='.urlencode($d['Bname']).'">
						<img src="img/'.$d['imgName'].'" alt="'.$d['Bname'].'" width="35px" height="50px" border="0" class="shadow"/>
					</a>
				</div>
				<div>
					<div class="time"><a target="_blank" href="../bInfo/index.php?bid='.$d['BookID'].'&bn='.urlencode($d['Bname']).'">'.$d['Bname'].'</a></div>
					<div style="font-size:10px;">作者：'.$d['Author'].'<span style="float:right;color:#C12513;font-size:12px;">销售量：'.$d['saled'].'</span></div>	
				</div>
				</li>		
			

                                            ';
	}

}

?>
