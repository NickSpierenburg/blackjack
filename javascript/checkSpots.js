getFreeSpots();

setInterval(function() {
getFreeSpots();
manageServer();
}, 1000);

function getFreeSpots() {
	$.ajax({url: "php/check_free_spots.php", success: function(result){
	  $('body').append(result);
	}});
}

function manageServer() {
	$.ajax({url: "php/manage_server.php", success: function(result){
	  console.log(result);
	  // $('body').append(result);
	}});
}