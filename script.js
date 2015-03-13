$(window).load(function () {
	console.log("load");
	if(document.getElementById("sign-in-button")){
		document.getElementById("sign-in-button").onclick = function () {
			$(location).attr('href', "./login.php");
		}
	}
	// JQUERY way Not Working for some reason
	// $("#sign-in-button").click(function (e) {
	// 	$(location).attr('href', "./login.php");
	// });
	$("#sign-out-button").click(function (e) {
		$(location).attr('href', "./logout.php");
	});	

	var links = document.getElementsByClassName("navLink");
	for (var i = 0; i < links.length; i++) {
		links[i].className = links[i].className.replace(/\bactive\b/, "");
	}
	//Jquery method also not working for this
	//$(".navLink").removeClass("active");

	for( var i = 0; i < $(".navLink").length; i++) {
		console.log($(".navLink")[i]);
		$(".navLink").removeClass("active");
	}

	console.log($("#list"));
//	$("#list").ready(function() {
	if (document.getElementById("list")) {
		$("#list-nav").addClass("active");
		var orderBy = 'Date';
		var ascDesc = 'Desc';
		getTradeList("TradeList" + ascDesc + orderBy, "#list");

		$("#ORDER").change(function() {
			orderBy === 'Date' ? orderBy = 'Title' : orderBy = 'Date';
			console.log(ascDesc + orderBy);
			getTradeList("TradeList" + ascDesc + orderBy, "#list");

		});

		$("#ASC").change(function() {
			console.log(ascDesc + orderBy);
			ascDesc === 'Desc' ? ascDesc = 'Asc' : ascDesc = 'Desc';
			getTradeList("TradeList" + ascDesc + orderBy, "#list");
		});
	}
	if(document.getElementById("add-new")) {
		$("#myAccount").addClass("active")
	}

	$("#user").ready(function() {
		$(".nav-tabs li").click(function (e) {
			$(".nav-tabs li").removeClass("active");
			$(e.target.parentElement).addClass("active");

			$(".user-info").removeClass("foreground");
			$(".user-info").addClass("background");

			$(e.target.getAttribute("href")).removeClass("background");
			$(e.target.getAttribute("href")).addClass("foreground");

		});
	});
	$("#add-image").click(function (e) {
		e.preventDefault();
		var i = $("#choose-file input").length;
		$("#choose-file").append('<input name="file' + i + '" type="file">');
		console.log("add image")
	})
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



