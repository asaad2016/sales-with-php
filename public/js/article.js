$(document).ready(function () {
	$("#datatogle").click(function () {
		loadsuppliers();
	$('#myModal').modal('show');
});
	$("#save").click(function (e) {
		e.preventDefault();
		searcharticle();
		$('#myModal').modal('hide');
	});

});	
function loadsuppliers(){
	var obj={
	ajax_action:'Supplier.model',
	
	};
	$.post(
		'index.php',
		obj,
		function(data){
			$(".modal-content .modal-body table tbody").html(data);
		},
		'html'
		);
}
function searcharticle(){
	var obj={
	ajax_action:'Article.search',
	desig:$("#desig").val(),
	category_id:$("#category_id").val(),
	unit_id:$("#unit_id").val(),
	tax:$("#tax").val(),
	supplier_id:$("#supplier_id").val(),
	'ref':$("#ref").val()
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
function selectsupplier(btn){
	var tr=$(btn).parent().parent();
	$("#supplier_info").val($(btn).attr("supplier_id"));
	$("#supplier_name").text($(tr).children(".supplier_name").text());
	$("#supplier_info1").val($(btn).attr("supplier_id"));
	$('#myModal').modal('hide');
}



