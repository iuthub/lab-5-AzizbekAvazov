<?php 
	
		$name = $_POST["sucker_name"];
		$section = $_POST["sucker_section"];
		$cc_num = $_POST["sucker_ccard"];		
		$cc_type = $_POST["cc"];

		$fp = fopen("suckers.txt", "a");
		$savestring = $name . ";" . $section . ";" . $cc_num . ";" . $cc_type . ";" . "\r\n";
		fwrite($fp, $savestring);
		fclose($fp);
		// check wether all fields are filled
		$required = array('sucker_name', 'sucker_section', 'sucker_ccard', 'cc');
		$error = false;
		foreach($required as $field) 
		{
	 		if (empty($_POST[$field])) 
	 		{
	    		$error = true;
	  		}
		}

		if ($error) 
		{
		  header('Location: error.html');
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Buy Your Way to a Better Education!</title>
		<link href="buyagrade.css" type="text/css" rel="stylesheet" />
	</head>
	
	<body>
		<h1>Thanks, sucker!</h1>

		<p>
			Your information has been recorded.
		</p>

		<dl>
			<dt>Name</dt>
			<dd>
				<?php echo $name; ?>
			</dd>
			
			<dt>Section</dt>
			<dd>
				<?php echo $section; ?>
			</dd>
			
			<dt>Credit Card</dt>
			<dd>
				<?php echo $cc_num . "(" . $cc_type . ")"; ?>
			</dd>
		</dl>
		<div>
			<p>Here are all the suckers who have submitted here:</p>
			<?php
				if ($fh = fopen('suckers.txt', 'r')) 
				{
 			    	while (!feof($fh)) 
 			    	{
	        			$line = fgets($fh);
	        			echo '<pre>'; echo $line; echo '<pre>';
    				}
    				fclose($fh);
				} 	
			?>
		</div>
	</body>
</html>