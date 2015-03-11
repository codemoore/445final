$(document).ready(function () {
	$("#sign-in-button").ready(function (e) {
		console.log($("#sign-in-button"));
		$("#sign-in-button").click(function(e) {
			console.log("signin");
			$(location).attr('href', "./login.php");
		});	
	});

	$("#list").ready(function() {
		$(".navbar-nav li").removeClass("active");
		$("#list").addClass("active");
		var orderBy = 'Date';
		var ascDesc = 'Desc';
		getTradeList("TradeList" + ascDesc + orderBy, "#list");

		$("#ORDER").change(function() {
			orderBy === 'Date' ? orderBy = 'Title' : orderBy = 'Date';
			console.log(ascDesc + orderBy);
			getTradeList("TradeList" + ascDesc + orderBy);
		});

		$("#ASC").change(function() {
			console.log(ascDesc + orderBy);
			ascDesc === 'Desc' ? ascDesc = 'Asc' : ascDesc = 'Desc';
			getTradeList("TradeList" + ascDesc + orderBy);
		});
	});


	$("#user").ready(function() {

	});

});

function getTradeList(qType, dom) {
	$.ajax({
		url: "query.php",
		type: 'GET',
		data: {type: qType}
	}).done(function (html) {
		$(dom).empty();
		$(dom).append(html);
	});
}



