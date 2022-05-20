
<!DOCTYPE html>
<head>
<html lang="pl">
<meta charset="utf-8" />
</head>
<body>		
<?php
include_once('simple_html_dom.php');
//$where=$_POST['where'];
//$when_s=$_POST['when_start'];
//$when_f=$_POST['when_finish'];
//$travel_by=$_POST['travel_by'];
//$count_participans=$_POST['count_participans'];
$web_data1=file_get_html("https://www.travelplanet.pl/wakacje/?nl_occupancy_adults=2&sort=nl_sell&s_holiday_target=tours");
$web_data2=file_get_html("https://www.travelplanet.pl/wakacje/?d_start_from=09.12.2021&s_holiday_target=tours&sort=nl_sell&page=2&nl_occupancy_adults=2&offsets=traveltainment%3A0%3Btraso%3A0%3Binvia%3A0%3BmerlinX%3A14%3Bhibe%3A0%3Bhotel%3A60883722%3BitemsPerPage%3A15%3BboxesFound%3A15");
$web_data3=file_get_html("https://www.travelplanet.pl/wakacje/?d_start_from=09.12.2021&s_holiday_target=tours&sort=nl_sell&page=3&nl_occupancy_adults=2&offsets=traveltainment%3A0%3Btraso%3A0%3Binvia%3A0%3BmerlinX%3A28%3Bhibe%3A0%3Bhotel%3A40864488%3BitemsPerPage%3A15%3BboxesFound%3A15");
$web_data4=file_get_html("https://www.travelplanet.pl/wakacje/?d_start_from=09.12.2021&s_holiday_target=tours&sort=nl_sell&page=4&nl_occupancy_adults=2&offsets=traveltainment%3A0%3Btraso%3A0%3Binvia%3A0%3BmerlinX%3A28%3Bhibe%3A0%3Bhotel%3A40864488%3BitemsPerPage%3A15%3BboxesFound%3A15");
$web_data5=file_get_html("https://www.travelplanet.pl/wakacje/?d_start_from=09.12.2021&s_holiday_target=tours&sort=nl_sell&page=5&nl_occupancy_adults=2&offsets=traveltainment%3A0%3Btraso%3A0%3Binvia%3A0%3BmerlinX%3A58%3Bhibe%3A0%3Bhotel%3A30790271%3BitemsPerPage%3A15%3BboxesFound%3A15");
$web_data6=file_get_html("https://www.travelplanet.pl/wakacje/?d_start_from=09.12.2021&s_holiday_target=tours&sort=nl_sell&page=6&nl_occupancy_adults=2&offsets=traveltainment%3A0%3Btraso%3A0%3Binvia%3A0%3BmerlinX%3A72%3Bhibe%3A0%3Bhotel%3A20918354%3BitemsPerPage%3A15%3BboxesFound%3A15");
$web_data7=file_get_html("https://www.travelplanet.pl/wakacje/?d_start_from=09.12.2021&s_holiday_target=tours&sort=nl_sell&page=7&nl_occupancy_adults=2&offsets=traveltainment%3A0%3Btraso%3A0%3Binvia%3A0%3BmerlinX%3A86%3Bhibe%3A0%3Bhotel%3A20831911%3BitemsPerPage%3A15%3BboxesFound%3A15");
  
	//functions to return string
	
	function before ($x, $inthat)
    {
        return substr($inthat, 0, strpos($inthat, $x));
    };
	
	function after ($x, $inthat)
    {
        if (!is_bool(strpos($inthat, $x)))
        return substr($inthat, strpos($inthat,$x)+strlen($x));
    };
	

function get_itemlist($web_data)
{
	$itemlist=explode('<div class="c-product-list__list">',$web_data);
	return $itemlist;
}
$item_list1=get_itemlist($web_data1);
$item_list2=get_itemlist($web_data2);
$item_list3=get_itemlist($web_data3);
$item_list4=get_itemlist($web_data4);
$item_list5=get_itemlist($web_data5);
$item_list6=get_itemlist($web_data6);
$item_list7=get_itemlist($web_data7);

function convertion($tab,$emptytab,$sizeofydim)
{
		for($i=0;$i<$sizeofydim;$i++)
		{
			if($i<15)
			{	
		
			    $emptytab[$i]=$tab[0][$i];
			}
			else if($i<30 AND $i>=15)
			{
				$emptytab[$i]=$tab[1][$i-15];
			}		
			else if($i<45 AND $i>=30)
			{
				$emptytab[$i]=$tab[2][$i-30];
			}		
			else if($i<60 AND $i>=45)
			{
				$emptytab[$i]=$tab[3][$i-45];
			}			
			else if($i<75 AND $i>=60)
			{
				$emptytab[$i]=$tab[4][$i-60];
			}
			else if($i<90 AND $i>=75)
			{
				$emptytab[$i]=$tab[5][$i-75];
			}
			else if($i<105 AND $i>=90)
			{
				$emptytab[$i]=$tab[6][$i-90];
			}
		}
		return $emptytab;
}
function get_date($tab,$emptytab,$sizeofydim)
{
		for($i=0;$i<$sizeofydim;$i++)
		{
			if($i%3==0)
			{
			$dimany=$i/3;
			$emptytab[$dimany]=$tab[0][$i];
			}
		}
		return $emptytab;
}

function get_price($tab,$emptytab,$sizeofydim)
{
for($i=0;$i<$sizeofydim;$i++)
{
	if($i%2==0)
	{
		$dimany=$i/2;
		$emptytab[$dimany]=$tab[$i];
	}
}	
	return $emptytab;
}
function get_type($tab,$emptytab,$sizeofydim)
{
		for($i=0;$i<$sizeofydim;$i++)
		{
			if(($i-1)%3==0)
			{
				$dimany=($i-1)/3;
			$emptytab[$dimany]=$tab[0][$i];
			}	
		}
		return $emptytab;
}


function get_table($tab,$size)
{
	for($i=0;$i<$size;$i++)
	{
		echo $i;
		echo "</br>";
		echo $tab[$i];
		echo "</br>";
	}
}


class Offer
{
	public $place;
	public $date;
	public $type;
	public $id;
	public $link;
	public $price;
	public $opinion;
	public function __construct($id,$link,$price,$opinion,$place,$date,$type)
	{
		$this->id=$id;
		$this->link=$link;
		$this->price=$price;
		$this->opinion=$opinion;
		$this->place=$place;
		$this->date=$date;
		$this->type=$type;
	}
	
	public function info()
	{
		echo "id :".$this->id;
		echo "</br>";
		echo "link :".$this->link;
		echo "</br>";
		echo "price :".$this->price;
		echo "</br>";
		echo "opinion :".$this->opinion;
		echo "</br>";
		echo "place :".$this->place;
		echo "</br>";
		echo "date :".$this->date;
		echo "</br>";
		echo "type :".$this->type;
		echo "</br>";
	}
	public function getid()
	{
		return $this->id;
	}
	public function getlink()
	{
		return $this->link;
	}
	public function getprice()
	{	
		return $this->price;
	}
		public function getopinion()
	{
		return $this->opinion;
	}
}


class offerMenager
{
	public $size;
	public $tab=array();
	public function __construct($tab,$size)
	{
		$this->tab=$tab;
		$this->size=$size;
	}
	public function show_all()
	{
		for($i=0;$i<($this->size);$i++)
		{
			$this->tab[$i]->info();
		}
	}
}




// links
function get_links($web_data)
{
	$urlstravelplanet=array();
	foreach($web_data->find('.c-product-list__list') as $postDiv)
	{
		foreach($postDiv->find('.b-product-list__price-main') as $x)
		{
		foreach($x->find('a') as $a)
		{	
		$urlstravelplanet[]=$a->attr['href'];
	    }	
		}
	}
	return preg_replace('/\s+/', ' ',$urlstravelplanet);
}

//links main
$travelplanet_links_1=get_links($web_data1);
$travelplanet_links_2=get_links($web_data2);
$travelplanet_links_3=get_links($web_data3);
$travelplanet_links_4=get_links($web_data4);
$travelplanet_links_5=get_links($web_data5);
$travelplanet_links_6=get_links($web_data6);
$travelplanet_links_7=get_links($web_data7);	
$travelplanet_links_main=array();
array_push($travelplanet_links_main,$travelplanet_links_1,$travelplanet_links_2,$travelplanet_links_3,$travelplanet_links_4,$travelplanet_links_5,$travelplanet_links_6,$travelplanet_links_7);
$travelplanet_links_main_afterconvertion=array();
$travelplanet_links_main_afterconvertion=convertion($travelplanet_links_main,$travelplanet_links_main_afterconvertion,105);
//get_table($travelplanet_links_main_afterconvertion,105);

// prices
function travel_price($web_data)
{
	$itemlist11=get_itemlist($web_data);
for($i=1;$i<30;$i++)
{	$pricetravelplanet=array();
	$price_1=explode('price_value',$itemlist11[$i]);
    $listprice1=$web_data->find('<div [class="c-product-list__list"]',0);
    $listprice1_array=$listprice1->find('strong');
for($i=0;$i<30;$i++)
{
	$pricetravelplanet[$i]=$listprice1_array[$i]->plaintext;
}
}
return $pricetravelplanet;
}

// price main
$travelplanet_price_1_afterconvertion=array();
$travelplanet_price_2_afterconvertion=array();
$travelplanet_price_3_afterconvertion=array();
$travelplanet_price_4_afterconvertion=array();
$travelplanet_price_5_afterconvertion=array();
$travelplanet_price_6_afterconvertion=array();
$travelplanet_price_7_afterconvertion=array();
$travelplanet_price_1=travel_price($web_data1);
$travelplanet_price_1_afterconvertion=get_price($travelplanet_price_1,$travelplanet_price_1_afterconvertion,30);
$travelplanet_price_2=travel_price($web_data2);
$travelplanet_price_2_afterconvertion=get_price($travelplanet_price_2,$travelplanet_price_2_afterconvertion,30);
$travelplanet_price_3=travel_price($web_data3);
$travelplanet_price_3_afterconvertion=get_price($travelplanet_price_3,$travelplanet_price_3_afterconvertion,30);
$travelplanet_price_4=travel_price($web_data4);
$travelplanet_price_4_afterconvertion=get_price($travelplanet_price_4,$travelplanet_price_4_afterconvertion,30);
$travelplanet_price_5=travel_price($web_data5);
$travelplanet_price_5_afterconvertion=get_price($travelplanet_price_5,$travelplanet_price_5_afterconvertion,30);
$travelplanet_price_6=travel_price($web_data6);
$travelplanet_price_6_afterconvertion=get_price($travelplanet_price_6,$travelplanet_price_6_afterconvertion,30);
$travelplanet_price_7=travel_price($web_data7);
$travelplanet_price_7_afterconvertion=get_price($travelplanet_price_7,$travelplanet_price_7_afterconvertion,30);
$travelplanet_prices_main=array();
$travelplanet_prices_main_afterconvertion=array();
array_push($travelplanet_prices_main,$travelplanet_price_1_afterconvertion,$travelplanet_price_2_afterconvertion,$travelplanet_price_3_afterconvertion,$travelplanet_price_4_afterconvertion,$travelplanet_price_5_afterconvertion,$travelplanet_price_6_afterconvertion,$travelplanet_price_7_afterconvertion);
$travelplanet_prices_main_afterconvertion_=convertion($travelplanet_prices_main,$travelplanet_prices_main_afterconvertion,105);
$travelplanet_prices_main_afterconvertion=preg_replace('/\s+/', '', $travelplanet_prices_main_afterconvertion_);
/*for($i=0;$i<105;$i++)
{
$travelplanet_prices_main_afterconvertion_[$i]=preg_replace('/\s+/', '', $travelplanet_prices_main_afterconvertion[$i]);
}
echo $travelplanet_prices_main_afterconvertion_[5];
echo $travelplanet_prices_main_afterconvertion_[2];
echo $travelplanet_prices_main_afterconvertion_[4];
*/
//get_table($travelplanet_prices_main_afterconvertion,105);


//opinions
function travel_opinion($web_data)
{
	foreach($web_data->find('.c-product-list__list') as $place)
	{
		preg_match_all("/\<span class\=\"rating__value\"\>(.*?)\<\/span\>/", $web_data,$urlstravelplanetopinion);
	}
	$urlstravelplanetopinion1d=array();
  $urlstravelplanetopinion1d=convertion($urlstravelplanetopinion,$urlstravelplanetopinion1d,16);
  return $urlstravelplanetopinion1d;
}

//opinion main
$travelplanet_opinion_1=travel_opinion($web_data1);
$travelplanet_opinion_2=travel_opinion($web_data2);
$travelplanet_opinion_3=travel_opinion($web_data3);
$travelplanet_opinion_4=travel_opinion($web_data4);
$travelplanet_opinion_5=travel_opinion($web_data5);
$travelplanet_opinion_6=travel_opinion($web_data6);
$travelplanet_opinion_7=travel_opinion($web_data7);
$travelplanet_opions_main=array();
$travelplanet_opinions_main_afterconvertion=array();
array_push($travelplanet_opions_main,$travelplanet_opinion_1,$travelplanet_opinion_2,$travelplanet_opinion_3,$travelplanet_opinion_4,$travelplanet_opinion_5,$travelplanet_opinion_6,$travelplanet_opinion_7);
$travelplanet_opinions_main_afterconvertion_=convertion($travelplanet_opions_main,$travelplanet_opinions_main_afterconvertion,105);
$travelplanet_opinions_main_afterconvertion=preg_replace('/\s+/',' ',$travelplanet_opinions_main_afterconvertion_);
//get_table($travelplanet_opinions_main_afterconvertion,105);

//place
function travel_place($web_data)
{
	foreach($web_data->find('.c-product-list__list') as $place)
	{
		preg_match_all("/\<span class\=\"params__item params__item--main\"\>(.*?)\<\/span\>/", $web_data, $urlstravelplanetplace);
	}
   $urlstravelplanetplaceo1d=array();
   $urlstravelplanetplaceo1d=convertion($urlstravelplanetplace,$urlstravelplanetplaceo1d,15);
   return $urlstravelplanetplaceo1d;
}
//place main
$travelplanet_place_1=travel_place($web_data1);
$travelplanet_place_2=travel_place($web_data2);
$travelplanet_place_3=travel_place($web_data3);
$travelplanet_place_4=travel_place($web_data4);
$travelplanet_place_5=travel_place($web_data5);
$travelplanet_place_6=travel_place($web_data6);
$travelplanet_place_7=travel_place($web_data7);
$travelplanet_place_main=array();
$travelplanet_place_main_afterconvertions=array();
array_push($travelplanet_place_main,$travelplanet_place_1,$travelplanet_place_2,$travelplanet_place_3,$travelplanet_place_4,$travelplanet_place_5,$travelplanet_place_6,$travelplanet_place_7);
$travelplanet_place_main_afterconvertions=convertion($travelplanet_place_main,$travelplanet_place_main_afterconvertions,105);
//get_table($travelplanet_place_main_afterconvertions,105);

//date
function travel_date($web_data)
{
	foreach($web_data->find('.c-product-list__list') as $place)
	{
		preg_match_all("/\<span class\=\"params__item\"\>(.*?)\<\/span\>/", $web_data, $urlstravelplanetdate);
	}
  $urlstravelplanetdate1d=array();
  $urlstravelplanetdate1d=get_date($urlstravelplanetdate,$urlstravelplanetdate1d,45);
  return $urlstravelplanetdate1d;
}
//date main
$travelplanet_date_1=travel_date($web_data1);
$travelplanet_date_2=travel_date($web_data2);
$travelplanet_date_3=travel_date($web_data3);
$travelplanet_date_4=travel_date($web_data4);
$travelplanet_date_5=travel_date($web_data5);
$travelplanet_date_6=travel_date($web_data6);
$travelplanet_date_7=travel_date($web_data7);
$travelplanet_date_main=array();
$travelplanet_date_main_afterconertions=array();
array_push($travelplanet_date_main,$travelplanet_date_1,$travelplanet_date_2,$travelplanet_date_3,$travelplanet_date_4,$travelplanet_date_5,$travelplanet_date_6,$travelplanet_date_7);
$travelplanet_date_main_afterconertions=convertion($travelplanet_date_main,$travelplanet_date_main_afterconertions,105);
//get_table($travelplanet_date_main_afterconertions,105);

//type(all in, breakfast,etc)
function travel_type($web_data)
{
	foreach($web_data->find('.c-product-list__list') as $place)
	{
		preg_match_all("/\<span class\=\"params__item\"\>(.*?)\<\/span\>/", $web_data, $urlstravelplanetdate);
	}
 $urlstravelplanettype1d=array();
 $urlstravelplanettype1d=get_type($urlstravelplanetdate,$urlstravelplanettype1d,45);
 return $urlstravelplanettype1d;
}
//type main
$travelplanet_type_1=travel_type($web_data1);
$travelplanet_type_2=travel_type($web_data2);
$travelplanet_type_3=travel_type($web_data3);
$travelplanet_type_4=travel_type($web_data4);
$travelplanet_type_5=travel_type($web_data5);
$travelplanet_type_6=travel_type($web_data6);
$travelplanet_type_7=travel_type($web_data7);
$travelplanet_type_main=array();
$travelplanet_type_main_afterconvertions=array();
array_push($travelplanet_type_main,$travelplanet_type_1,$travelplanet_type_2,$travelplanet_type_3,$travelplanet_type_4,$travelplanet_type_5,$travelplanet_type_6,$travelplanet_type_7);
$travelplanet_type_main_afterconvertions=convertion($travelplanet_type_main,$travelplanet_type_main_afterconvertions,105);
//get_table($travelplanet_type_main_afterconvertions,105);
$urlstravelplanetplace_1=array();
$urlstravelplanetdate_1=array();
$urlstravelplanettype_1=array();
$urlstravelplanetopinion_1=array();

$travelplanetofferstable=array();
$dbServename="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="holiday";
$connection=mysqli_connect($dbServename,$dbUsername,$dbPassword,$dbName);
if (mysqli_connect_errno())
{
	echo "Unsucesfully connection !";
}
$sqlglobal="insert into offers(place,date,type,link,price,opinion) values";
for($i=0;$i<105;$i++)
{
	$travelplanetofferstable[$i]=new Offer($i,$travelplanet_links_main_afterconvertion[$i],$travelplanet_prices_main_afterconvertion[$i],$travelplanet_opinions_main_afterconvertion[$i],$travelplanet_place_main_afterconvertions[$i],$travelplanet_date_main_afterconertions[$i],$travelplanet_type_main_afterconvertions[$i]);
	$sql="('".preg_replace('/\s+/',' ',before('-',substr(substr($travelplanet_place_main_afterconvertions[$i],55),0,-23)))."','".preg_replace('/\s+/', ' ',substr(substr($travelplanet_date_main_afterconertions[$i],28),0,-30))."',
	'".substr(substr($travelplanet_type_main_afterconvertions[$i],42),0,-17)."','".$travelplanet_links_main_afterconvertion[$i]."',
	'".$travelplanet_prices_main_afterconvertion[$i]."','".substr(substr($travelplanet_opinions_main_afterconvertion[$i],28),0,-37)."')";
	if($i<104)
	{
	$sqlglobal.=$sql.",";
	}
	else
	{
		$sqlglobal.=$sql.";";
	}
}
if (mysqli_query($connection, $sqlglobal))
{
  echo "New record created successfully";
} 
else 
{
  echo "Error: " . $sqlglobal . "<br>" . mysqli_error($connection);
}
$offersmenago=new offerMenager($travelplanetofferstable,105);
$offersmenago->show_all();

?>
</body>
