$(document).ready(function () {
	$("#savesupplier").click(function (e) {
		e.preventDefault();
		searchsupplier();
	});

});	

function searchsupplier(){
	var obj={
	ajax_action:'Supplier.search',
	supplier_name:$("#supplier_name").val()
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




