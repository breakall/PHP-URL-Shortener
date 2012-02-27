<h2>Recently shortened URLs</h2>

<div id="recent_links_container"></div>

<script type="text/javascript">
loadRecentLinksDiv();

function loadRecentLinksDiv()
{
	$.getJSON("getrecentlinksJSON.php", 
	function(data)
	{
		$.each(data, function(index) 
		{
			//div
			var rowtext = '<div class="recentlinks_url"><a href="' + data[index].long_url + '">' 
				+ data[index].long_url + '</a></div><div class="recentlinks_hits">' + data[index].referrals + '</div>';
			
			//add the divs to the container
			$('#recent_links_container').append(rowtext);
		});
	});
}
</script>

