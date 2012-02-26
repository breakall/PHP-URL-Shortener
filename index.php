<!DOCTYPE html>
<head>
<title>URL shortener</title>
<meta name="robots" content="noindex, nofollow">
</head>
<body onload="loadRecentLinks()">
	
<h1><?php echo $_SERVER['HTTP_HOST'];?></h1>
	
<form method="post" action="shorten.php" id="shortener">
<label for="longurl">URL to shorten</label> <input type="text" name="longurl" id="longurl"> <input type="submit" value="Shorten">
</form>
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



<div id="origurl"></div><br>
<a id="newurl"></a>


<h2>Recently shortened URLs</h2>
<ul id="list"></ul>

<!-- loadRecentLinks function fills this table -->
<table id="table_recentlinks">
	<tbody>
		<tr align="left">
			<th>Link</th>
			<th>Hits</th>
		</tr>
	</tbody>
</table>



<script type="text/javascript">
function loadRecentLinks()
{
	$.getJSON("recentlinks.php", 
		function(data)
		{
			$.each(data, function(index) 
			{
				//construct rows out of the returned JSON data
				var rowtext = '<tr><td><span style="display: inline-block; overflow: hidden; white-space: nowrap; width: 600px; text-overflow: ellipsis;">';
				rowtext = rowtext + '<a href="' + data[index].long_url + '">' + data[index].long_url + '</a></span></td>';
				rowtext = rowtext + '<td>' + data[index].referrals + '</td></tr>';
				
				//add the rows to the table
				$('#table_recentlinks').find('tbody').append(rowtext);
			});
		});
}

</script>
</body>
</html>
