<?php require('config.php');?>
<!DOCTYPE html>
<head>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<title>URL shortener</title>
<meta name="robots" content="noindex, nofollow">
<style type="text/css">
	div.recentlinks_url 
	{
		float: left;
		display: inline-block; 
		overflow: hidden; 
		white-space: nowrap; 
		width: 600px; 
		text-overflow: ellipsis;
	}
</style>
</head>
<body>
	
<h1><?php echo $_SERVER['HTTP_HOST'];?></h1>
	
<form method="post" action="shorten.php" id="shortener">
<label for="longurl">URL to shorten</label> <input type="text" name="longurl" id="longurl"> <input type="submit" value="Shorten">
</form>




<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script type="text/javascript">
$(function() 
{
  $("#longurl").focus();
});
</script>
<script type="text/javascript">
$(function () {
	var _shorturl;
	$('#shortener').submit(function () {
		$.ajax({data: {longurl: $('#longurl').val()}, url: 'shorten.php', complete: function (XMLHttpRequest, textStatus) {
			//$('#shorturl').text(XMLHttpRequest.responseText);
			_shorturl = XMLHttpRequest.responseText;
			$('#origurl').text($('#longurl').val());
			$('#newurl').text(_shorturl);
			$('#newurl').attr('href', _shorturl);
			$('#longurl').val('');
		}});
		return false;
	});
});
</script>

<br />
<br />
Shortened URL: <a id="newurl"></a><br /><br />

Original URL: <div id="origurl"></div>
<br />
<br />


<?php if(SHOW_RECENT_AND_TOP)
	require('recent_and_top_links.php');?>

</body>
</html>
