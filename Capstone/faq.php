<!DOCTYPE html>
<html>
<head>

<title> FAQ </title>
	
<script>
   let myLabels = document.querySelectorAll('.lbl-toggle');
    Array.from(myLabels).forEach(label => { label.addEventListener('keydown', e => { if (e.which === 32 || e.which === 13)  { 
	e.preventDefault(); label.click();
 }; 
 
 
</script

   
</head>


 <div id="wrapper">
<body>
   <link rel="stylesheet" href="capstone.css">
	   <meta name="viewport" content="width=device-width, initial-scale=1">

<header>

  <h1> Frequetly Asked Questions </h1>
</header>



<?php $page ='faq'; include 'include/menu.php'; ?>


<div class="main">

<div class="wrap-collabsible"> 
  <input id="collapsible1" class="toggle" type="checkbox" checked=""> 
      <label for="collapsible1" class="lbl-toggle">What is your company return policy? </label>
            <div class="collapsible-content"><div class="content-inner">
                 <p> Once we have shipped your order you have 2 weeks after it arrives and must be an unopened product.
				 It could take up to three days for feedback for your reviewed product.
</p>
</div>
</div>
</div>



<div class="wrap-collabsible"> 
  <input id="collapsible2" class="toggle" type="checkbox" checked=""> 
     <label for="collapsible2" class="lbl-toggle">Q: When and where can we get in contact with support? </label>
          <div class="collapsible-content"><div class="content-inner">
             <p> if you look to our FAQ page you will see our phone number, email and as well as customer service twitter page.
                 The phone and email address are open 9 to 5 PM EST and the twitter customer support page is open 24 hours.
</p>
</div>
</div>
</div>


<div class="wrap-collabsible"> 
  <input id="collapsible3" class="toggle" type="checkbox" checked=""> 
       <label for="collapsible3" class="lbl-toggle"> Does your company price match? </label>
            <div class="collapsible-content"><div class="content-inner">
			   <p>Yes we will match prices with any other legitimatize competitor.
</p>
</div>
</div>
</div>







<h2> ABOUT US </h2>
<div id= "about">
   
       Our Company Nuts and Bolts is a small business that foundation was built upon the contacts we had through being in the construction scene over the years. Nuts and Bolts also have acquired a large amount of hardware from different jobs the people in the company have been apart of as well as going around and bidding on all excess hardware from job sites that are coming to an end.
        Although we focus on selling excess material from jobs we are not opposed to ordering in new hardware if we can't keep certain products in stock.
        Our main goal here at Nuts and Bolts is to provide good quality hardware to our customers within a timely manner.
</div>
     
     <div id= "hours">
<footer>
  <h3> STORE HOURS </h3>
   <p> Monday:     7AM-3PM </p>
    <p> Tuesday:    7AM-3PM </p>
   <p>  Wednesday:  7AM-3PM </p>
   <p>  Thursday:   7AM-3PM </p>
    <p> Friday:     7AM-3PM </p>
    <p> Saturday:   9AM-2PM </p>
    <p>  Sunday:     Closed </p>

</footer>
	
	</div>
	
</div>	
</body>
</html>





