<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
 	<title>Convert Money</title>
	<!--
	<script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
	-->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

	<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css'>

	<link rel="stylesheet" href="css/style.css">
</head>
<body>


<div class="container">





<!-- =========== Convert  =========== -->






<?php
	function get_currency($amount, $currency1, $currency2) {

	    if($currency2 == 'JPY'){
	    	$convert_result = $amount * 0.30967;
	    }
	    else if($currency2 == 'EUR'){
	    	$convert_result = $amount * 0.02688;
	    }

	    else if($currency2 == 'PHP'){
	    	$convert_result = $amount * 1.4390;
	    }

	    return $convert_result;
	}


	// เมื่อกดปุ่มแปลงค่าเงิน
	if (isset($_GET['submit'])) {
		
		$currency1 = htmlentities($_GET['currency1']);
	    $currency2 = htmlentities($_GET['currency2']);
	    $amount = htmlentities($_GET['amount']);

	    if($currency1 == $currency2){
		    echo "";
		    $convert_result = $amount;
		}
		else{
		   	$convert_result = get_currency($amount, $currency1, $currency2);
		}

	    $filnalAmount = $amount . " " . $currency1;
	    $LastResult = $convert_result . " " . $currency2;
	}
?>



<script>
	function myFunction() {
	    document.getElementById("currency1").innerHTML = "<?php echo $filnalAmount ?>";
	    document.getElementById("currency2").innerHTML = "<?php echo $LastResult ?>";
	}
</script>



<form method="GET">

	<div class="legend">
		THB <i>Exchange Rate</i>
	</div>

	<div class="input">
		<input type="number" name="amount" placeholder="Amount" required >
		<span><i class="fa fa-money"></i></span>
	</div>

	<br>
	<div class="select-box">
		<select name="currency1" class="select-currency">
		  <option value="THB">THB</option>
		</select>

		<i class="fa fa-long-arrow-right"></i>
		
		<select name="currency2" class="select-currency">
		  <option value="EUR">EUR</option>
		  <option value="JPY">JPY</option>
		  <option value="PHP">PHP</option>
		</select>
	</div>

	<br>

	<button type="submit" class="submit" name="submit" onclick="myFunction()"><i class="fa fa-exchange"></i></button>
</form>





    <!-- แสดงผลลัพธ์ -->
    <div class="feedback">
    R E S U L T
    <br>
    <span> * </span>
    
    	<?php  
			if(isset($filnalAmount) && isset($LastResult)){
				echo $filnalAmount." = ".$LastResult;
			}
			
		?>
	</div>

  


<!-- <p id="from">    0 xxx </p> : <p id="to">    0 xxx </p> -->



















  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  <script type="text/javascript">
	  	$( ".input" ).focusin(function() {
		  $( this ).find( "span" ).animate({"opacity":"0"}, 200);
		});

		$( ".input" ).focusout(function() {
		  $( this ).find( "span" ).animate({"opacity":"1"}, 300);
		});

		$(".convert").submit(function(){
		  $(this).find(".submit i").removeAttr('class').addClass("fa fa-check").css({"color":"#fff"});
		  $(".submit").css({"background":"#2ecc71", "border-color":"#2ecc71"});
		  $(".feedback").show().animate({"opacity":"1", "bottom":"-80px"}, 400);
		  $("input").css({"border-color":"#2ecc71"});
		  return false;
		});
  </script>







</div><!-- container -->

</body>
</html>