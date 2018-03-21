function joinTable(playerid) {
	$.ajax({url: "php/join_free_spot.php?playerid=" + playerid, success: function(result){
	  $('#serverMessage').html(result);
	}});
}