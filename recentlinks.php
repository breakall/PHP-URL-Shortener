<h2>Recently shortened URLs</h2>

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
loadRecentLinks();
function loadRecentLinks()
{
	$.getJSON("getrecentlinksJSON.php", 
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

