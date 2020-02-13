<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Amazon EC2 instance</title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />

</head>
<body> 

 
<div id="content-outer">
<!-- start content -->
<center>
<div id="content">
	<table border="0" width="50%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">

<?php
# Get geo information through NAT Gateway
$response = file_get_contents('http://ip-api.com/json');                   
$response = json_decode($response);

# Get Client ip
// from http://www.xpertdeveloper.com/2011/09/get-real-ip-address-using-php/
if (!empty($_SERVER["HTTP_CLIENT_IP"]))
{
 //check for ip from share internet
 $ip = $_SERVER["HTTP_CLIENT_IP"];
}
elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
{
 // Check for the Proxy User
 $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
}
else
{
 $ip = $_SERVER["REMOTE_ADDR"];
}


# Get the instance ID from meta-data and store it in the $instance_id variable
  $url = "http://169.254.169.254/latest/meta-data/instance-id";
  $instance_id = file_get_contents($url);
# Get the instance's availability zone from metadata and store it in the $zone variable
  $url = "http://169.254.169.254/latest/meta-data/placement/availability-zone";
  $zone = file_get_contents($url);
# Get the instance's local-ipv4 from metadata and store it in the $local_ipv4 variable
  $url = "http://169.254.169.254/latest/meta-data/local-ipv4";
  $local_ipv4 = file_get_contents($url);
# Get the instance's public-ipv4 from metadata and store it in the $public_ipv4 variable
  $url = "http://169.254.169.254/latest/meta-data/public-ipv4";
  $public_ipv4 = file_get_contents($url);
# Get the instance's local-hostname from metadata and store it in the $local_hostname variable
  $url = "http://169.254.169.254/latest/meta-data/local-hostname";
  $local_hostname = file_get_contents($url);
# Get the instance's public-hostname from metadata and store it in the $public_hostname variable
  $url = "http://169.254.169.254/latest/meta-data/public-hostname";
  $public_hostname = file_get_contents($url);
  # Print the data

?>
			<center>
				<img src="images/world.jpg" width="600"/>
				<br/>
				<br/>
				<h1>Public IP Address</h1><h2><?php echo $response->query; ?></h2>
                                <h1>Client IP Address</h1><h2><?php echo $ip; ?></h2>
				<h1>Country</h1><h2><?php echo $response->country; ?></h2>
				<h1>City</h1><h2><?php echo $response->city; ?> <?php echo $response->region; ?></h2>
				<h1>Time Zone</h1><h2><?php echo $response->timezone; ?></h2>
				<h1>Lattitude / Longitude</h1><h2><?php echo $response->lat; ?> / <?php echo $response->lon; ?></h2>
				<p>This information has been retrieved from <a href="http://ip-api.com/json">ip-api.com</a>.</p>
				<p>You are connected to instance <b><?php echo $instance_id; ?></b> in <b><?php echo $zone; ?></b>.	</p>
				<p>Other instance info get from metadata as below</p>
				<p>local-ipv4<b><?php echo $local_ipv4; ?></b>
				<p>public-ipv4<b><?php echo $public_ipv4; ?></b>
				<p>local-hostname<b><?php echo $local_hostname ?></b>
				<p>public-hostname<b><?php echo $public_hostname; ?></b>

		
			</center>
			</div>
			<!--  end table-content  -->
	
			<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>
	<div class="clear">&nbsp;</div>

</div>
</center>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
 
</body>
</html>
