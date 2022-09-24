$(document).ready(function () {
	$("#saveclient").click(function (e) {
		e.preventDefault();
		searchclient();
	});

});	

function searchclient(){
	var obj={
	ajax_action:'Client.search',
	client_name:$("#client_name").val()
	};
	$.post(
		'index.php',
		obj,
		function(data){
			$(".content table tbody").html(data);
		},
		'html'
		);
}

function deleteart(e){
	e.preventDefault();
	if(confirm("هل فعلا تريد الحذف")){
	var obj={
	ajax_action:'article.delete',
	art_id : $(".confirm").attr('art_id')
	};
	$.post(
		'index.php',
		obj,
		function(data){
			if(data==1){
				windows.location.reload();

			}
			else{
				alert(art_id);
				alert("هناك مشكلة لم يتم الحذف");
			}
		},
		'html'
		);

	}
	else
	{
	alert("تم الغاء الحذف");
	}
}




