//$(".navbar-light .navbar-nav .nav-link, nav-link active").click(function(){
//	
//	
//	$(".navbar-light .navbar-nav .nav-link, nav-link active").css({
//		" color":"",
//	"background-color":"", 
//	"border-bottom-right-radius": "",
//    "border-top-left-radius": ""
//	});
//	
//	$(this).css({
//		" color":"#fff",
//	"background-color":"#39749d", 
//	"border-bottom-right-radius": "25px",
//    "border-top-left-radius": "25px"
//	});
//	
//});

// start section header

$(".header").innerHeight($(window).height());


// end section header
// section all projects 
$("#myAllProjects").click(function(){
	
	$(".myrow").toggle(500)
});

$("#myAndroidProjects").click(function(){
	
	$("#myRow").toggle(500)
});

// end section all projects 