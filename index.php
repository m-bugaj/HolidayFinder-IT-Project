<?php
include_once 'includes/db.inc.php' ;
?>
<!DOCTYPE html>
<head>
<link rel="stylesheet" href="style.css">
<html lang="pl">
<meta charset="utf-8" />
<title>Holiday Research</title>
</head>	
<body>


<div class="banner-area">
<div class="content-area">
<div class="content">
<h1>Holiday Research</h1>
<p>Find your dreamy holiday!</p>

<form action="design.php" method="GET">

<select name="where" id="where" class="selectlocacion">
  <option value="Select Country">Select Country</option>
  <option value="Dominikana "  >Dominikana </option>
  <option value="Madagaskar ">Madagaskar </option>
  <option value="Zanzibar ">Zanzibar </option>
  <option value="Malediwy ">Malediwy </option>
  <option value="Bałtyk ">Bałtyk </option>
  <option value="Malta ">Malta </option>
  <option value="Majorka ">Majorka</option>
</select>


<select name="travel_by" id="travel_by" class="selecttravel">
<option value="Transport">Transport</option>
<option value="Plane">Plane</option>
<option value="Own">Own</option>
<option value="Bus">Bus</option>
</select>


<select name="price" id="price" class="selectprice">
<option value="Price to" >Price to</option>
<option value="500">500</option>
<option value="1000">1000</option>
<option value="1500">1500</option>
<option value="2000">2000</option>
<option value="3000">3000</option>
<option value="4000">4000</option>
<option value="10000">10000</option>
</select>


<select name="count_participans" id="count_participans" class="selectcount">
<option value="Participants">Participans</option>
<option value="1">1</option>;
<option value="2">2</option>;
<option value="3">3</option>;
<option value="4">4</option>;
<option value="5">5</option>;
<option value="6">6</option>;
<option value="7">7</option>;
<option value="8">8</option>;
<option value="9">9</option>;
</select>

<input type="submit" value="Check in" class="clicker">

<br>
</div>
</div>
</div>
</div>
</form>
</body>
