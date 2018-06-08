<?php
///
// START Home Page Style Code //
///
echo '
<style>
div.homepage-container {
    width: 100%;
    margin: 0px;
    border: #004ECC;
    line-height: 150%;
}

div.header, div.footer {
    padding: 0.5em;
    color: white;
    background-color: gray;
    clear: left;
    max-width:750px;
	display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
}

h1.header {
    padding: 0;
    margin: 0;
}

div.content {
    margin-left: 10px;
    padding: 1em;
    overflow: hidden;
    max-width:750px;
	display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
}
.center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
}

img{
    max-height:500px;
    max-width:500px;
    height:auto;
    width:auto;
}
</style>';
///
// END Home Page Style Code //
///
// START Home Page Content //
echo '
<div class="homepage-container">
  <div class="header"><h1 class="header" align="center">Welcome to DC XP Tracker!</h1></div>
  	<div class="content">
  		<img name="DC-XP Logo" value="home_page_logo" src="/images/logo_s2_big.png" alt="DC-XP Logo" class="center">
  		<h2>Here is the Deal!</h2>
    		<p>Who doesn&#39;t like a little bonus for doing top grade work? Well, now we can. Each month a cash bonus pool will be set up. For each ticket you work on you can submit a request for eXPerience points. Over a one month period you will rack up XP and at the end of the month, all the points are tallied up. The number of XP you earn will be divided by all the points that all Tech eared to get your percentage. That percentage is the amount of cash you will earn! </p>
			<p> Example: The cash pool is $500 . Bob earns 25XP points, James 25XP, and Sally earns 50XP. So Bob gets $125, James $125 and Sally $250. </p>
			<p>Remeber, XP can both be gained and lost!</p>
		</div>
	<div class="footer" align="center">More Points More Cash!</div>
</div>';
// END Home Page Content //
?>