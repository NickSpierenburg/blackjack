getFreeSpots();

setInterval(function() {
getFreeSpots();
}, 5000);

function getFreeSpots() {
	$.ajax({url: "php/check_free_spots.php", success: function(result){
	  $('body').append(result);
	}});
}