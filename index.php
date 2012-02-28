<?php require('config.php');?>
<!DOCTYPE html>
<head>
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




<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
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


<div style="float:left; margin: 10px;"><a id="newurl"></a></div>
<div style="margin: 10px;" id="origurl"></div>


<?php if(SHOW_RECENT)
	require('recentlinks.php');?>

</body>
</html>
