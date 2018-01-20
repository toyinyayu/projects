 <?php require_once 'connections/biggames.php';
		 
		 session_start();
if (!isset($_SESSION['userSession'])) {
 header("Location: login.php");
}
$inactive = 300; // Set timeout period in seconds

if (isset($_SESSION['timeout'])) {
    $session_life = time() - $_SESSION['timeout'];
    if ($session_life > $inactive) {
        session_destroy();
        header("Location: login.php");
    }
}
$_SESSION['timeout'] = time();


$conn    = Connect();



$user_check=$_SESSION['userSession'];


$query = "SELECT * FROM fiveofninety WHERE reg_email='".$user_check."' LIMIT 10";
if ($result = $conn->query($query)) {
    while ($rows = $result->fetch_assoc()) {
        $values[] = $rows;
    }
    foreach($values as $row) {
        $category = $row['reg_user'];
        $amount   = $row['reg_email'];
        echo $category;
    }
    $result->close();
}

?>



 
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Testing Lottery Game</title>
<link rel="stylesheet"
 href="css/lottery.css" />
 <link rel="stylesheet" href="css/checked.css" />
 <link rel="stylesheet" href="css/bootstrap.css" />
 

 <script type="text/javascript" src="js/checked.js"></script>
 
</head>

<style>
body { 
  font-family: 'Open Sans', sans-serif;
  color: #fff;
  background-color:#000;
  background-image:url(images/lottery-background-image-representing-concept-numbers-folders-32015250.jpg);

  
}

/* STRUCTURE */

#pagewrap {
	padding: 5px;
	width: 100%;
	margin: 20px auto;
}
header {
	height: 100px;
	
	padding: 0 15px;
	background-color:#FFF;
	color:#999;
}
#content {
	width: 400px;
	float: left;
	padding: 5px 15px;
	
}

#middle {
	width: 294px; /* Account for margins + border values */
	float: right;
	padding: 5px 15px;
	margin: 0px 5px 5px 5px;
}

#sidebar {
	width: 550px;
	padding: 10px 10px;
	float: right;
}

#sidebar1 {
	width: 270px;
	height:400px;
	padding: 5px 15px;
	float: left;
}
footer {
	clear: both;
	padding: 0 15px;
}

/************************************************************************************
MEDIA QUERIES
*************************************************************************************/
/* for 980px or less */
@media screen and (max-width: 980px) {
	
	#pagewrap {
		width: 94%;
	}
	#content {
		width: 41%;
		padding: 1% 4%;
	}
	#middle {
		width: 41%;
		padding: 1% 4%;
		margin: 0px 0px 5px 5px;
		float: right;
	}
	
	#sidebar {
		clear: both;
		padding: 1% 4%;
		width: auto;
		float: none;
	}
	
	#sidebar1 {
		clear: both;
		padding: 1% 4%;
		width: auto;
		float: none;
	}

	header, footer {
		padding: 1% 4%;
	}
}

/* for 700px or less */
@media screen and (max-width: 600px) {

	#content {
		width: auto;
		float: none;
	}
	
	#middle {
		width: auto;
		float: none;
		margin-left: 0px;
		background-color:#F00;
	}
	
	#sidebar {
		width: auto;
		float: none;
	
	}
	
	#sidebar1 {
		width: auto;
		float: none;
	
	}

}

/* for 480px or less */
@media screen and (max-width: 480px) {

	header {
		height: auto;
		
	}
	h1 {
		font-size: 2em;
	}
	#sidebar {
		display: none;
	}

}


#content {
	background: ;
}
#sidebar {
	background: #F00;
}

#sidebar1 {
	background: #F00;
}
header, #content, #middle, #sidebar {
	margin-bottom: 5px;
}

#pagewrap, header, #content, #middle, #sidebar, footer {
	border: solid 1px #ccc;
}


#content2 {
	width: 400px;
	float: left;
	padding: 5px 15px;
	
	background-image:url(images/Lottery-balls-014%20(1).jpg);
	
	

}

.balls{
  margin: 40px 50px;
  width:300px;
  height:300px;
  border-radius:50%;
  position:relative;
  z-index:2;
}

.blue{
  background: -webkit-radial-gradient(50% 120%, circle cover, #81e8f6, #76deef 10%, #055194 80%, #062745 100%);
  background: radial-gradient(50% 120%, circle cover, #81e8f6, #76deef 10%, #055194 80%, #062745 100%);
}

.black{
  background:-webkit-radial-gradient(50% 120%, circle cover, #323232, #0a0a0a 80%, #000000 100%);
  background:-radial-gradient(50% 120%, circle cover, #323232, #0a0a0a 80%, #000000 100%);
} 
.black:before{
  content:"";
  index:2;
  width:90%;
  height:100%;
  border-radius:50%;
  position:absolute;
  left:5%;
  bottom:2.5%;
  background:-webkit-radial-gradient(50% 120%, circle cover, rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0) 70%);
  opacity: 0.6;
  -webkit-filter:blur(5px);
}
.black:after{
  content:"";
  width:100%;
  height:100%;
  border-radius:50%;
  position:absolute;
  left:10%;
  top:5%;
  background:-webkit-radial-gradient(50% 50%, circle, rgba(255, 255, 255, .8), rgba(255, 255, 255, .8) 14%, rgba(255, 255, 255, 0) 24%);
  -webkit-transform: translateX(-65px) translateY(-60px) skewX(-20deg);
  -transform: translateX(-65px) translateY(-60px) skewX(-20deg);
  -webkit-filter:blur(10px);
}
.label{
  color:black;
  font-size:65px;
  text-align:center;
  background:white;
  width:65px;
  height:65px;
  line-height:65px;
  border-radius:50%;
  -webkit-transform: skewX(20deg);
  position:absolute;
  top:20px;
  right:25px;
}

.white{
  background:-webkit-radial-gradient(50% 40%, circle cover, #fcfcfc, #efeff1 66%, #9b5050 100%);
}
.white:after{
  content:"";
  width:100%;
  height:100%;
  border-radius:50%;
  background:-webkit-radial-gradient(50% 50%, circle cover, rgba(255, 255, 255, 1), rgba(255,255,255, .8) 14%, rgba(255, 255, 255, 0) 24%);
  position:absolute;
  top:10%;
  left:10%;
  -webkit-transform:translateX(-60px) translateY(-60px) skewX(-20deg);
  -webkit-filter:blur(10px);
}

.eye{
  width:40%;
  height:40%;
  border-radius:50%;
  background: -webkit-radial-gradient(50% 50%, circle cover, #208ab4 0%, #6fbfff 30%, #4381b2 100%);
  position:absolute;
  top:30%;
  right:30%;
  -webkit-animation: eye-skew 5s ease-out infinite;
}

.eye:before{
  content:"";
  width:33%;
  height:33%;
  border-radius:50%;
  background: black;
  position:absolute;
  top:33%;
  left:33%;
}
.eye:after{
  content:"";
  width:25%;
  height:25%;
  border-radius:50%;
  background:rgba(255, 255, 255, .3);
  position:absolute;
  top:22%;
  left:22%;
}
@-webkit-keyframes eye-skew{
  0%{
    -webkit-transform:none;
  }
  20%,30%{
    -webkit-transform:translateX(-35px) translateY(35px) skewX(10deg) scale(.95);
  }
  35%,55% {
    -webkit-transform:none;
  }
  70%, 80%{
    -webkit-transform:translateX(35px) translateY(-35px) skewX(10deg) scale(.95);   
  }
  85%, 100%{
    -webkit-transform: none;
  }
}
.bubble{
  background:-webkit-radial-gradient(50% 55%, circle cover, rgba(240, 245, 255, 0.9), rgba(240, 245, 255, 0.9) 40%, rgba(225, 238, 255, 0.8) 60%, rgba(43, 130, 255, 0.4));
  -webkit-animation: bubble-skew 2s ease-out infinite;
  float:left;
}
.bubble:before{
  content:"";
  height:80%;
  width:40%;
  float:left;
  border-radius:50%;
  position:absolute;
  -webkit-transform: translateX(99px) translateY(95px) rotate(-5deg);
  background:-webkit-radial-gradient(-30% -30%, circle cover, rgba(255, 255, 255, 0),rgba(255, 255, 255,0) 50%,rgba(255, 255, 255,.7) 58%,rgba(255, 255, 255,0) 65%);
}
.bubble:after{
  content:"";
  height:90%;
  width:90%;
  border-radius:50%;
  position:absolute;
  top:6%;
  left:6%;
  background:-webkit-radial-gradient(120% 120%, circle cover, rgba(255, 255, 255, 0),rgba(255, 255, 255,0) 80%,rgba(255, 255, 255,.7) 90%);
    
}
@-webkit-keyframes bubble-skew{
  0%{
    -webkit-transform:scale(1);
  }
  15%{
    -webkit-transform:scaleX(1.05) scaleY(.95);
  }
  30%{
    -webkit-transform:scaleX(.95) scaleY(1.08);
  }
  50%{
    -webkit-transform:scale(1);
  }
  68%{
    -webkit-transform:scaleX(.95) scaleY(1.05);
  }
  84%{
    -webkit-transform:scaleX(1.05) scaleY(.95);
  }
  100%{
    -webkit-transform:scale(1);
  }
}
.shadow{
  width:150px;
  height:30px;
  border-radius:75px/15px;
  background:rgba(100, 100, 100, .4);
  box-shadow:0 0 10px 5px rgba(100, 100, 100, .4);
  position:absolute;
  left:30px;
  bottom:-25px;
  z-index:1;
}


.chip {
    display: inline-block;
    padding: 0 25px;
    height: 50px;
    font-size: 18px;
    line-height: 50px;
    border-radius: 25px;
    background-color: #f1f1f1;
}

.chip img {
    float: left;
    margin: 0 10px 0 -25px;
    height: 50px;
    width: 50px;
    border-radius: 50%;
}



.closebtn:hover {
    color: #000;
}

</style>

<body>
<div id="pagewrap">


  <header>
   <font color="#FF0000" size="+1"><marquee behavior="scroll" direction="left"> The last draw result </marquee></font>

		<h3><img src="images/about-logo.png" width="98" height="76" />
        Hi <?php echo $_SESSION['userSession'];?> ! 
        
<table width="700" border="0" align="right">
  <tr>
   
    <td><a href="https://www.infogridbank3d.com/WebPayment/Products/SimpleCustomization_GLOBAL.WebPayment/Entry.aspx?pCode=BGL&cCode=BGL"><button class="btn btn-primary">Top Up</button></a></td>
  
   
  </tr>
</table>
  </h3>

       
	</header>
		
	<section id="content">
		
		<div id ="content2">
  
      <img src="images/xTiTnKnMV2zDyTxhug.gif" width="466" height="430" /> </div>
	</section>

	<section id="middle">
		<aside id="sidebar1">
		<h2>Play Game</h2>
        <p>Ensure you read the Game rules before your proceed to play. The company would not be responsible for any Error.</p>
        <p><a href="doc/games_rules.pdf" target="_blank">Click Here for the Game Rules</a></p>
       

    

 <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">


function RemoveErrorMessageFromPage()
{
   var IDofContainer = "my-error-message-container";
   document.getElementById(IDofContainer).innerHTML = "";
   document.getElementById(IDofContainer).style.display = "none";
}

function InsertErrorMessageIntoPage(content)
{
   var IDofContainer = "my-error-message-container";
   document.getElementById(IDofContainer).style.display = "";
   document.getElementById(IDofContainer).innerHTML = content;
}

function ErrorCheck()
{
   RemoveErrorMessageFromPage();
   var email = document.getElementById("email-address").value;
   if( ! email.length )
   {
      InsertErrorMessageIntoPage("The email address is required.");
      return false;
   }
   if( ! email.match(/\w@\w+\.\w/) )
   {
      InsertErrorMessageIntoPage("The email address appears to be invalid.");
      return false;
   }
   return true;
}



    $(document).ready(function() {
        $("button").click(function(){
            var favorite = [];
            $.each($("input[name='check_list[]']:checked"), function(){            
                favorite.push($(this).val());
            });
            InsertErrorMessageIntoPage("You have selected the following numbers: <br>" + favorite.join(", "));
        });
    });
</script>
<form name="car_form"action="get.php" method="post">

<p id="my-error-message-container" style="display:none; border:1px solid red; color:red; background-color:white; font-weight:bold; padding:5px; width:188px;"></p>


<p> Stake Amount </p>





    
    
   
</aside>

</section>

  <aside id="sidebar">
	
   
<h2> Select your lucky Number </h2>
<p></p>


      
  <div id="wrapper">
    <div id="c1">
    <script type="text/javascript">
  function KeepCount()  { 
    var elements = document.getElementsByName("check_list[]");
    var total = 0;
    for(var i in elements) {
        var element = elements[i];
        if(element.checked) total++;
        if(total>5) {
            alert("You cannot pick more than 5 Numbers. Try Again");
            element.checked = false;
            return false;    
        }
    }
  } 
  </script>

<section>



</div>


</aside>


	
	<footer>
    

 
	</footer>

</div>

</body>
</html>
