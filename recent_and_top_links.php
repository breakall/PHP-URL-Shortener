
<div id="tabs">
	<ul>
		<li><a href="#recent_links_container"><span>Recent Links</span></a></li>
		<li><a href="#top_links_container"><span>Top Links</span></a></li>
	</ul>
	<div id="recent_links_container"></div>
	<div id="top_links_container"> </div>
</div>



<script type="text/javascript">
	
//get jquery tabs ready
$(document).ready(function() {
	$("#tabs").tabs();
});

//load recent and top links into the divs
loadRecentLinksDiv();
loadTopLinksDiv();


//get recent links from getrecentlinksJSON.php in JSON format
function loadRecentLinksDiv()
{
	$('#recent_links_container').append('<div class="recentlinks_url">Original URL</div><div>Hits</div>');
	$.getJSON("getrecentlinksJSON.php", 
	function(data)
	{
		$.each(data, function(index) 
		{
			//create div
			var rowtext = '<div class="recentlinks_url"><a href="' + data[index].long_url + '">' 
				+ data[index].long_url + '</a></div><div class="recentlinks_hits">' + data[index].referrals + '</div>';
			
			//add the divs to the container
			$('#recent_links_container').append(rowtext);
		});
	});
}

//get top links from gettoplinksJSON.php in JSON format
function loadTopLinksDiv()
{
	$('#top_links_container').append('<div class="recentlinks_url">Original URL</div><div>Hits</div>');
	$.getJSON("gettoplinksJSON.php", 
	function(data)
	{
		$.each(data, function(index) 
		{
			//create div
			var rowtext = '<div class="recentlinks_url"><a href="' + data[index].long_url + '">' 
				+ data[index].long_url + '</a></div><div class="recentlinks_hits">' + data[index].referrals + '</div>';
			
			//add the divs to the container
			$('#top_links_container').append(rowtext);
		});
	});
}
</script>

