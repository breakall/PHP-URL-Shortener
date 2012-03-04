<?php

require('config.php');

$query = 'select long_url, referrals from ' . DB_TABLE . ' order by referrals desc limit 20';

$result = mysql_query($query);

echo recordSetToJson($result);

function recordSetToJson($mysql_result) 
{
	$data = array();
	while($row = mysql_fetch_array($mysql_result))
	{ 
		$data[] = array ('long_url'=>$row['long_url'], 'referrals'=>$row['referrals']);
	}
	return json_encode($data);
}

?>




