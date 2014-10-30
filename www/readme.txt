(1)安装wamp
(2)test放到wamp目录下的www目录下
(3)访问http://localhost/test

代码配置解释
	$confirmUrl = "getAddress.php";//For file that get address
	$confirmAjaxFlag = true;//  When it is true, click to confirm it is  ajax , and then print out return value. When it is false, jump to getAddress.php

	$cancelUrl = "cancelGetAddress.php";//To cancel get address

	$cancelAjaxFlag = false;// When it is true, click to confirm ajax request, After request $cancelUrl, print return value. When it is false, jump to cancelGetAddress.php

a.php: test file
