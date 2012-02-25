<!DOCTYPE html>
<html>
<title>URL shortener</title>
<meta name="robots" content="noindex, nofollow">
</html>
<body>
<form method="post" action="shorten.php" id="shortener">
<label for="longurl">URL to shorten</label> <input type="text" name="longurl" id="longurl"> <input type="submit" value="Shorten">
</form>
</form>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
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
			
		}});
		
		
		return false;
	});

});
</script>

<div id="origurl"></div>
<a id="newurl"></div>

</body>
</html>