<?php
	class news{
		public $id, $date, $title, $announce, $content, $image;
		function __construct($id){
			$this->id=$id;
		}
		function info(){
			echo "id: $this->id; <br>date: $this->date; <br>title: $this->title; <br>announce: $this->announce;";
		}
		function load_data(){
			$this->date=select_column("date",$this->id);
			$this->title=select_column("title",$this->id);
			$this->announce=select_column("announce",$this->id);
			$this->content=select_column("content",$this->id);
			$this->image=select_column("image",$this->id);
		}
	}
	function select_column($column, $id){
		$db = mysqli_connect("localhost", "root", "", "techart");

		//$name=mysqli_real_escape_string($db,$_POST['name']);
		//$description=mysqli_real_escape_string($db,$_POST['description']);

		//print id's row from column, sorted by Date
		$var=mysqli_fetch_array(mysqli_query($db,"SELECT $column FROM news WHERE id=$id ORDER BY date DESC LIMIT 1"))[0];
		return $var;
	}
	//echo select_column("title",1);
	function db_length(){
		$db = mysqli_connect("localhost", "root", "", "techart");
		$var=mysqli_fetch_array(mysqli_query($db,"SELECT COUNT(*) FROM news"))[0];
		return $var;
	}
	function select_news($page,$news_on_page_count){
		//$news_on_page_count=4;
		//$page=1;//number of opened page
	
		$db = mysqli_connect("localhost", "root", "", "techart");
		//$page=(isset($_GET["page"]))?$_GET["page"]:1;//number of opened page
		
		//$db_length=db_length();//rows in data base
		//$pages_count=intval(($bd_length-1)/$news_on_page_count)+1;//result count of pages
		$sql="SELECT id FROM news ORDER BY date DESC LIMIT ".($page*$news_on_page_count-$news_on_page_count)." , ".$news_on_page_count;
		
		$var=mysqli_query($db,$sql);//result of SQL query
		
		$news=array();$i=0;
		while($row=mysqli_fetch_array($var)[0]){
			$news[$i]=new news($row);
			$news[$i]->load_data();
			$i++;
		}
		return $news;// array of 4 news
	}
	function date_to_string($date){
		//2412-05-26 00:00:00
		$year=substr($date, 0, 4);
		$month=substr($date, 5, 2);
		$day=substr($date, 8, 2);
		$str=$day.'.'.$month.'.'.$year;
		return $str;
	}
?>