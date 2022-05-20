<!DOCTYPE html>
<html lang="en">
<title>Holiday Research</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<body>


<!-- Header -->
<header class="w3-display-container w3-content w3-center" style="max-width:2000px">
<div class="banner-arearesize">
  <!--<img class="w3-image" src="stronatloresize.png" alt="Me" width="1000" height="1200">-->
  <div class="w3-display-middle w3-padding-large w3-border w3-wide w3-text-light-grey w3-center">
    <h1 class="w3-hide-medium w3-hide-small w3-xxxlarge">Holiday Research</h1>
    <h5 class="w3-hide-large" style="white-space:nowrap">Holiday Research</h5>
    <h3 class="w3-hide-medium w3-hide-small">Find your dreamy holiday!</h3>
  </div>
  
  <!-- Navbar (placed at the bottom of the header image) -->
  <div class="w3-bar w3-light-grey w3-round w3-display-bottommiddle w3-hide-small" style="bottom:-16px">
    <a href="index.php" class="w3-bar-item w3-button">Home</a>
    <a href="#portfolio" class="w3-bar-item w3-button">Offers</a>
    <a href="#contact" class="w3-bar-item w3-button">Contact</a>
  </div>
</div>  

</header>

<!-- Navbar on small screens -->
<div class="w3-center w3-light-grey w3-padding-16 w3-hide-large w3-hide-medium">
<div class="w3-bar w3-light-grey">
  <a href="index.php" class="w3-bar-item w3-button">Home</a>
  <a href="#portfolio" class="w3-bar-item w3-button">Offers</a>
  <a href="#contact" class="w3-bar-item w3-button">Contact</a>
</div>
</div>
<!-- Page content -->

<div class="w3-content w3-padding-large w3-margin-top" id="portfolio">


<!-- Sortowanie -->
<form action="" method="GET">
    <div class="row">
        <div class="col-md-5">
            <div class="input-group mb-3">
			
                <select name="sort_numeric" class="form-control">
                    <option value="">-Sort by-</option>
					
                    <option value="Pricelow-high" <?php if(isset($_GET['sort_numeric']) && $_GET['sort_numeric'] == "Pricelow-high") { echo "selected"; } ?> > PRICE Low - High</option>
                    <option value="Pricehigh-low" <?php if(isset($_GET['sort_numeric']) && $_GET['sort_numeric'] == "Pricehigh-low") { echo "selected"; } ?> > PRICE High - Low</option>
					<option value="Opinionlow-high" <?php if(isset($_GET['sort_numeric']) && $_GET['sort_numeric'] == "Opinionlow-high") { echo "selected"; } ?> > Opinion Low - High</option>
                    <option value="Opinionhigh-low" <?php if(isset($_GET['sort_numeric']) && $_GET['sort_numeric'] == "Opinionhigh-low") { echo "selected"; } ?> > Opinion High - Low</option>
                </select>

                <button type="submit" class="input-group-text btn btn-primary" id="basic-addon2">
				
                    Filter
                </button>
            </div>
        </div>
    </div>
</form>



  <table>
  <tr>
  
  
  </tr>
  
  <style>
  img {
  border-radius: 3%;
}

table {
        border-collapse: separate;
        border-radius: 15px;
        border: 1px solid #C8D1DC;
		line-height: 45px;
      }

  </style>

<?php
error_reporting(E_ERROR | E_PARSE);	//USUWANIE ERRORÓW

	session_start();
	
//echo $_SESSION['place']; // place
//echo $_SESSION['money']; // price
//echo $_SESSION['transportType']; // Transport Type

//echo 'Welcome siema to page #2<br />';


if($_GET['where']!=NULL){
			session_start();

//echo 'Welcome to page #2<br />';
$_SESSION['place']=$_GET['where'];
//echo $_SESSION['place']; // green
}


if($_GET['price']!=NULL){
			session_start();

//echo 'Welcome to page #2<br />';
$_SESSION['money']=$_GET['price'];
//echo $_SESSION['money']; // price
}


if($_GET['travel_by']!=NULL){
			session_start();

//echo 'Welcome to page #2<br />';
$_SESSION['transportType']=$_GET['travel_by'];
//echo $_SESSION['transportType']; // price
}




$where=$_SESSION['place'];
$priceFilter=$_SESSION['money'];
$travel_by=$_SESSION['transportType'];

$transport=69;




	$conn = new mysqli("localhost", "root", "", "holiday") or die("Błąd");	
	$sort_option = "ASC";	//sorting defult option
	$sort_by = "price";		//sorting defult option
	
		//SORTING
        if(isset($_GET['sort_numeric']))
        {
			if($_GET['sort_numeric'] == "Pricelow-high"){
				$sort_option = "ASC";
				$sort_by = "price";
			}elseif($_GET['sort_numeric'] == "Pricehigh-low"){
				$sort_option = "DESC";
				$sort_by = "price";
			}elseif($_GET['sort_numeric'] == "Opinionlow-high"){
				$sort_option = "ASC";
				$sort_by = "opinion";
			}elseif($_GET['sort_numeric'] == "Opinionhigh-low"){
				$sort_option = "DESC";
				$sort_by = "opinion";
			}
        }
		
		

	
	
	
	
	
	//$result = $conn->query("SELECT * FROM offers");
	if($where=="Select Country" && $travel_by=="Transport" && $priceFilter=="Price to")
	{
		$result = $conn->query("SELECT * FROM offers ORDER BY $sort_by $sort_option");
	}
	elseif($where==$where && $travel_by=="Transport" && $priceFilter=="Price to"){
		
		$result = $conn->query("SELECT * FROM offers WHERE place='$where' ORDER BY $sort_by $sort_option");
	}elseif($where==$where && $travel_by==$travel_by && $priceFilter=="Price to"){
		if($travel_by=="Plane")
		{
			$transport=0;
		}elseif($travel_by=="Own"){
			$transport=1;
		}
		$result = $conn->query("SELECT * FROM offers WHERE place='$where' AND transport='$transport' ORDER BY $sort_by $sort_option");
	}elseif($where==$where && $priceFilter==$priceFilter && $travel_by=="Transport"){
		$result = $conn->query("SELECT * FROM offers WHERE place='$where' AND price<'$priceFilter' ORDER BY $sort_by $sort_option");
	}elseif($travel_by==$travel_by && $priceFilter==$priceFilter && $where=="Select Country"){
		if($travel_by=="Plane")
		{
			$transport=0;
		}elseif($travel_by=="Own"){
			$transport=1;
		}
		$result = $conn->query("SELECT * FROM offers WHERE price<'$priceFilter' AND transport='$transport' ORDER BY $sort_by $sort_option");
	}else{
			if($travel_by=="Plane")
		{
			$transport=0;
		}elseif($travel_by=="Own"){
			$transport=1;
		}
		
		
		
	$result = $conn->query("SELECT * FROM offers WHERE place='$where' AND price<'$priceFilter' AND transport='$transport' ORDER BY $sort_by $sort_option");
	}
	
	
	if($where=="Select Country" && $travel_by=="Transport" && $priceFilter==$priceFilter)
	{
		$result = $conn->query("SELECT * FROM offers WHERE price<'$priceFilter' ORDER BY $sort_by $sort_option");
	}
	if($where=="Select Country" && $travel_by==$travel_by && $priceFilter=="Price to")
	{
		$result = $conn->query("SELECT * FROM offers WHERE transport='$transport' ORDER BY $sort_by $sort_option");
	}
	if($where=="Select Country" && $travel_by=="Transport" && $priceFilter=="Price to")
	{
		$result = $conn->query("SELECT * FROM offers ORDER BY $sort_by $sort_option");
	}
	
	
	//$result = $conn->query("SELECT * FROM offers WHERE place='$where' ORDER BY $sort_by $sort_option");
	//$result = $conn->query("SELECT * FROM offers ORDER BY $sort_by $sort_option");
	if($result->num_rows > 0) {
		
		
 		while($wiersz = $result->fetch_assoc() ) {
			?>
			<table BORDER RULES=none BORDERCOLOR=#C8D1DC border-radius="100" cellspacing="1">
			<?php
			//echo '<table border="100" cellpadding=5 frame=box RULES=rows>';
			//echo "<td>". "<br>". "</br>". "</td>";
			echo "<tr>";
			
			
						//ZDJĘCIE Z HIPERŁĄCZEM
			if($wiersz["place"]=="Egipt ") {
				?>
				<td>
				<div class="przyklad">
				<a href=<?php echo'"'.$wiersz['link'].'"'?>><img src= <?php echo'"'.$wiersz['linkphoto'].'"'?> ></a>
				</div>
				</td>
				<?php
				//echo '<td><a href="'.$wiersz['link'].'"><img src="images/egipt.jpg"></a></td>';
			}elseif($wiersz["place"]=="Zanzibar "){
				?>
				<td>
				<div class="przyklad">
				<a href=<?php echo'"'.$wiersz['link'].'"'?>><img src="images/zanzibar.jpg"></a>
				</div>
				</td>
				<?php
				//echo '<td><a href="'.$wiersz['link'].'"><img src="images/zanzibar1.jpg"></a></td>';
			}elseif($wiersz["place"]=="Malta "){
				?>
				<td>
				<div class="przyklad">
				<a href=<?php echo'"'.$wiersz['link'].'"'?>><img src="images/malta.jpg"></a>
				</div>
				</td>
				<?php
				//echo '<td><a href="'.$wiersz['link'].'"><img src="images/malta.jpg"></a></td>';
			}elseif($wiersz["place"]=="Dominikana "){
				?>
				<td>
				<div class="przyklad">
				<a href=<?php echo'"'.$wiersz['link'].'"'?>><img src="images/dominikana.jpg"></a>
				</div>
				</td>
				<?php
				//echo '<td><a href="'.$wiersz['link'].'"><img src="images/dominikana.jpg"></a></td>';
			}elseif($wiersz["place"]=="Cypr "){
				?>
				<td>
				<div class="przyklad">
				<a href=<?php echo'"'.$wiersz['link'].'"'?>><img src="images/cypr.jpg"></a>
				</div>
				</td>
				<?php
				//echo '<td><a href="'.$wiersz['link'].'"><img src="images/cypr.jpg"></a></td>';
			}elseif($wiersz["place"]=="Wyspy Kanaryjskie "){
				echo '<td><a href="'.$wiersz['link'].'"><img src="images/wyspykanaryjskie.jpg"></a></td>';
			}elseif($wiersz["place"]=="Włochy "){
				echo '<td><a href="'.$wiersz['link'].'"><img src="images/wlochy.jpg"></a></td>';
			}elseif($wiersz["place"]=="Meksyk "){
				echo '<td><a href="'.$wiersz['link'].'"><img src="images/meksyk.jpg"></a></td>';
			}elseif($wiersz["place"]=="Turcja "){
				echo '<td><a href="'.$wiersz['link'].'"><img src="images/turcja.jpg"></a></td>';
			}elseif($wiersz["place"]=="Hiszpania "){
				echo '<td><a href="'.$wiersz['link'].'"><img src="images/hiszpania.jpg"></a></td>';
			}elseif($wiersz["place"]=="Bułgaria "){
				echo '<td><a href="'.$wiersz['link'].'"><img src="images/bulgaria.jpg"></a></td>';
			}elseif($wiersz["place"]=="Emiraty Arabskie "){
				echo '<td><a href="'.$wiersz['link'].'"><img src="images/emiratyarabskie.jpg"></a></td>';
			}
			
			
			//echo "<td>" . $wiersz["id"]         . "</td>";
			
			
			
			
			?>
			<td style="white-space: nowrap;" colspan="3" align="left" valign="top" style="background-color: #FFFFFF; ">
			
			<font size="+7">
			<font color="#1561EB">
			<font face="'Times New Roman', serif">
			<?php
			echo $wiersz["place"];
			?>
			</font>
			</font>
			<font size="6">
			<font color="black">
			<br>
			<?php
			echo $wiersz["price"]." PLN ";
			?>
			</br>
			</font>
			
			
			<font size="4">
			<font color="black">
			<br>
			<?php
			echo "Data podróży: ".$wiersz["date"];
			?>
			</br>
			</font>
			
			</td>
			
			
			
			
			
			
			<td style="white-space: nowrap;" colspan="3" align="right" valign="" style="background-color: #FFFFFF; ">
			
			<font size="+3">
			<font color="black">
			<?php
			echo $wiersz["type"];
			?>
			</font>
			<font size="4">
			<font color="green">
			<br>
			<?php
			echo "Ocena: ".$wiersz["opinion"];
			?>
			</br>
			</font>
			
			</td>
			
			
			<?php
			//echo "<td>" . $wiersz["date"]       . "</td>";
			//echo "link: " . $wiersz["link"] . "; ";
			

			
			//echo "<td>" . $wiersz["price"]      . "</td>";
			//echo "<td>" . $wiersz["opinion"]    . "</td>";
			//echo "<td>" . $wiersz["type"]       . "</td>";
			
			
			
			echo "</tr>";
			
			?>
			</table>
			<?php
			
			//odstepy miedzy wierszami
			?>
			<table BORDERCOLOR=white>
			
			
			<br>
			
			
			
			</br>
			
			
			</table>
			<?php
		}
		
		echo "</table>";
		
	}
	else {
		
		echo "There is nothing in database";
	}	
	
	$conn->close();
	
	?>
</table>	
<!-- Contact -->
  <div class="w3-light-grey w3-padding-large w3-padding-32 w3-margin-top" id="contact">
    <h3 class="w3-center">Contact</h3>
    <hr>
    <p>Have you noticed an error on the website? Contact us!</p>

    <form action="/action_page.php" target="_blank">
      <div class="w3-section">
        <label>Name</label>
        <input class="w3-input w3-border" type="text" required name="Name">
      </div>
      <div class="w3-section">
        <label>Email</label>
        <input class="w3-input w3-border" type="text" required name="Email">
      </div>
      <div class="w3-section">
        <label>Message</label>
        <input class="w3-input w3-border" required name="Message">
      </div>
      <button type="submit" class="w3-button w3-block w3-dark-grey">Send</button>
    </form><br>
    <p>Powered by <a href="https://www.facebook.com/bugaj55113" target="_blank" class="w3-hover-text-green">Michał Bugaj</a> and <a href="https://www.facebook.com/adrian.chojnacki.967" target="_blank" class="w3-hover-text-green">Adrian Chojnacki</a>	</p>

  </div>

<!-- End page content -->
</div>
	
</body>
</html>
