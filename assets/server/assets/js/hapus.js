$(document).ready(function(){
	// $('#modal-hapus-tutor').on('show.bs.modal', function (event) {
	// 	var div = $(event.relatedTarget)
	// 	var id = div.data('id')
	// 	var modal = $(this)
	// 	modal.find('#hapus-true-data').attr("href","tutor/hapus/"+id);
	// });

	$('#modal-hapus-admin').on('show.bs.modal', function (event) {
		var div = $(event.relatedTarget)
		var id = div.data('id')
		var modal = $(this)
		modal.find('#hapus-true-data').attr("href","admin/hapus/"+id);
	});

	$('#modal-hapus-member').on('show.bs.modal', function (event) {
		var div = $(event.relatedTarget)
		var id = div.data('id')
		var modal = $(this)
		modal.find('#hapus-true-data').attr("href","member/hapus/"+id);
	});

	$('#modal-hapus-banner').on('show.bs.modal', function (event) {
		var div = $(event.relatedTarget)
		var id = div.data('id')
		var modal = $(this)
		modal.find('#hapus-true-data').attr("href","banner/hapus/"+id);
	});


	$('#modal-hapus-slider').on('show.bs.modal', function (event) {
		var div = $(event.relatedTarget)
		var id = div.data('id')
		var modal = $(this)
		modal.find('#hapus-true-data').attr("href","slider/hapus/"+id);
	});

	$('#modal-hapus-news').on('show.bs.modal', function (event) {
		var div = $(event.relatedTarget)
		var id = div.data('id')
		var modal = $(this)
		modal.find('#hapus-true-data').attr("href","news/hapus/"+id);
	});


	$('#modal-hapus-poli').on('show.bs.modal', function (event) {
		var div = $(event.relatedTarget)
		var id = div.data('id')
		var modal = $(this)
		modal.find('#hapus-true-data').attr("href","poli/hapus/"+id);
	});

	$('#modal-hapus-roleadmin').on('show.bs.modal', function (event) {
		var div = $(event.relatedTarget)
		var id = div.data('id')
		var modal = $(this)
		modal.find('#hapus-true-data').attr("href","roleadmin/hapus/"+id);
	});

	$('#modal-hapus-dokter').on('show.bs.modal', function (event) {
		var div = $(event.relatedTarget)
		var id = div.data('id')
		var modal = $(this)
		modal.find('#hapus-true-data').attr("href","dokter/hapus/"+id);
	});

	$('#modal-hapus-layanan').on('show.bs.modal', function (event) {
		var div = $(event.relatedTarget)
		var id = div.data('id')
		var modal = $(this)
		modal.find('#hapus-true-data').attr("href","layanan/hapus/"+id);
	});

	$('#modal-hapus-useradmin').on('show.bs.modal', function (event) {
		var div = $(event.relatedTarget)
		var id = div.data('id')
		var modal = $(this)
		modal.find('#hapus-true-data').attr("href","useradmin/hapus/"+id);
	});

	$('#modal-hapus-kritiksaran').on('show.bs.modal', function (event) {
		var div = $(event.relatedTarget)
		var id = div.data('id')
		var modal = $(this)
		modal.find('#hapus-true-data').attr("href","kritiksaran/hapus/"+id);
	});

	$('#modal-hapus-konsultasi').on('show.bs.modal', function (event) {
		var div = $(event.relatedTarget)
		var id = div.data('id')
		var modal = $(this)
		modal.find('#hapus-true-data').attr("href","konsultasi/hapus/"+id);
	});
	

});
