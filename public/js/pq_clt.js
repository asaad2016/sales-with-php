$(document).ready(function () {
	$("#datatogle").click(function () {
		loadpl_clt();
	$('#myModal').modal('show');
});
	$("#save").click(function (e) {
		e.preventDefault();
		searchpq_clt();
		$('#myModal').modal('hide');
	});

});	
function loadpl_clt(){
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
function searchpq_clt(){
	var obj={
	ajax_action:'pq_clt.search',
	num:$("#num").val(),
	discr:$("#discr").val(),
	clientid:$("#clientid").val(),
	object:$("#object").val()
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



