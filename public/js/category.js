$(document).ready(function () {
	$("#savecat").click(function (e) {
		e.preventDefault();
		searchcategory();
	});

});	

function searchcategory(){
	var obj={
	ajax_action:'Category.search',
	cat_name:$("#cat_name").val()
	};
	$.post(
		'index.php',
		obj,
		function(data){
			$(".content table tbody").html(" ");
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




