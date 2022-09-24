$(document).ready(function(){
	$("#search").click(function(e) {
		e.preventDefault();
		$("#search-box").slideToggle(800);
		$(".content").toggleClass("marginheader");
	});
	$("#search-cat").click(function(e) {
		e.preventDefault();
		$("#search-box-cat").slideToggle(800);
		$(".content").toggleClass("marginheader");
	});
	$("#search-unit").click(function(e) {
		e.preventDefault();
		$("#search-box-unit").slideToggle(800);
		$(".content").toggleClass("marginheader");
	});
	$("#search-supplier").click(function(e) {
		e.preventDefault();
		$("#search-box-supplier").slideToggle(800);
		$(".content").toggleClass("marginheader");
	});
	$("#search-client").click(function(e) {
		e.preventDefault();
		$("#search-box-client").slideToggle(800);
		$(".content").toggleClass("marginheader");
	});
	$("#chooseimg").click(function (){
		$("#thumb").click();
	});
	$("#chooseimg").click(function (){
		$("#avtar").click();
	});
});
function readdir(input) {
	if(input.files && input.files[0]){
		var file=input.files[0];
		var reader=new FileReader();
		reader.readAsDataURL(file);
		reader.onload=function(e){
			$("#uploadimg").attr('src',e.target.result);
		}
	}
}