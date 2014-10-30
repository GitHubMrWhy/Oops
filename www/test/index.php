	<?php

		$confirmUrl = "a.php";

		$confirmAjaxFlag = true;

		$cancelUrl = "";

		$cancelAjaxFlag = false;

	?>

	<html>

	<head>

	<meta http-equiv="refresh" content="2;url=test.html">

	</head>

	<body>



	Welcome <?php echo $_POST["username"]; ?><br>



	</body>

	<script>

	var XMLHttpReq;

	function createXMLHttpRequest() {

	    try {

	        XMLHttpReq = new ActiveXObject("Msxml2.XMLHTTP");

	    }

	    catch(E) {

	        try {

	            XMLHttpReq = new ActiveXObject("Microsoft.XMLHTTP");

	        }

	        catch(E) {

	            XMLHttpReq = new XMLHttpRequest();

	        }

	    }

	}

	function sendAjaxRequest(url) {

	    createXMLHttpRequest();                               

	    XMLHttpReq.open("post", url, true);

	    XMLHttpReq.onreadystatechange = processResponse; 

	    XMLHttpReq.send(null);

	}

	//回调函数

	function processResponse() {

	    if (XMLHttpReq.readyState == 4) {

	        if (XMLHttpReq.status == 200) {

	            var text = XMLHttpReq.responseText;

	            text = window.decodeURI(text);

	            alert(text);

	        }

	    }

	}



	var getAddress = function(){

		var myevent = confirm("May I Get Your Address");

		if (myevent == true) {

			<?php if($confirmUrl !=""){ ?>

				<?php if($confirmAjaxFlag == true){?>

					sendAjaxRequest(<?php echo "'".$confirmUrl."'" ?>);

				<?php }else{ ?>

					window.location.href = <?php echo "'".$confirmUrl."'" ?>;

				<?php } ?>

			<?php }else{?>

				alert('confirm get your address')

			<?php } ?>

		} else {

			<?php if($cancelUrl !=""){ ?>

				<?php if($cancelAjaxFlag == true){?>

					sendAjaxRequest(<?php echo "'".$cancelUrl."'" ?>);

				<?php }else{ ?>

					window.location.href = <?php echo "'".$cancelUrl."'" ?>;

				<?php } ?>

			<?php }else{?>

				alert('You pressed Cancel')

			<?php } ?>

		}

	}

	getAddress();

	</script>

	</html>