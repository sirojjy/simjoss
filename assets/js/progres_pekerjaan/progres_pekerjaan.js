const lang = {
	sProcessing: "Sedang memproses...",
	sLengthMenu: "Tampilkan _MENU_ entri",
	sZeroRecords: "Tidak ditemukan data yang sesuai",
	sInfo: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
	sInfoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
	sInfoFiltered: "(disaring dari _MAX_ entri keseluruhan)",
	sInfoPostFix: "",
	sSearch: "Cari:",
	sUrl: "",
	oPaginate: {
		sFirst: "<<",
		sPrevious: "<",
		sNext: ">",
		sLast: ">>",
	},
};

function getProgresPekerjaan(params) {
	$(params.id).DataTable({
		processing: true,
		serverSide: true,
		order: [],
		columnDefs: params.columnDefs,
		ajax: {
			url: params.url,
			type: "POST",
		},
		columns: params.columns,
		language: lang,
	});
}

$(document).ready(function () {
	// Lahan
	$("#editLahan").on("show.bs.modal", function (e) {
		let id_progres_lahan = $(e.relatedTarget).data("id_progres_lahan");
		let rencana = $(e.relatedTarget).data("rencana");
		let realisasi = $(e.relatedTarget).data("realisasi");
		let kebutuhan_bidang = $(e.relatedTarget).data("kebutuhan_bidang");
		let tgl_progres = $(e.relatedTarget).data("tgl_progres");
		let seksi = $(e.relatedTarget).data("seksi");

		$(e.currentTarget)
			.find('input[name="id_progres_lahan_edit"]')
			.val(id_progres_lahan);
		$(e.currentTarget).find('input[name="rencana"]').val(rencana);
		$(e.currentTarget).find('input[name="realisasi"]').val(realisasi);
		$(e.currentTarget)
			.find('input[name="kebutuhan_bidang"]')
			.val(kebutuhan_bidang);
		$(e.currentTarget).find('input[name="tgl"]').val(tgl_progres);

		// seksi select option
		$(e.currentTarget)
			.find('select[name="seksi"]')
			.val(seksi)
			.trigger("change");
	});

	// Konstruksi/Fisik
	$("#edit_konstruksi").on("show.bs.modal", function (e) {
		let id_progres_konstruksi = $(e.relatedTarget).data(
			"id_progres_konstruksi"
		);
		let rencana = $(e.relatedTarget).data("rencana");
		let realisasi = $(e.relatedTarget).data("realisasi");
		let tgl_progres = $(e.relatedTarget).data("tgl_progres");
		let seksi = $(e.relatedTarget).data("seksi");

		$(e.currentTarget)
			.find('input[name="id_progres_kons_edit"]')
			.val(id_progres_konstruksi);
		$(e.currentTarget).find('input[name="rencana"]').val(rencana);
		$(e.currentTarget).find('input[name="realisasi"]').val(realisasi);
		$(e.currentTarget).find('input[name="tgl"]').val(tgl_progres);

		// seksi select option
		$(e.currentTarget)
			.find('select[name="seksi"]')
			.val(seksi)
			.trigger("change");
	});

	// RTA
	$("#edit_rta").on("show.bs.modal", function (e) {
		let id_progres_rta = $(e.relatedTarget).data("id_progres_rta");
		let rencana = $(e.relatedTarget).data("rencana");
		let realisasi = $(e.relatedTarget).data("realisasi");
		let tgl_progres = $(e.relatedTarget).data("tgl_progres");
		let seksi = $(e.relatedTarget).data("seksi");

		$(e.currentTarget)
			.find('input[name="id_progres_rta_edit"]')
			.val(id_progres_rta);
		$(e.currentTarget).find('input[name="rencana_edit"]').val(rencana);
		$(e.currentTarget).find('input[name="realisasi_edit"]').val(realisasi);
		$(e.currentTarget).find('input[name="tgl_edit"]').val(tgl_progres);
		$(e.currentTarget)
			.find('select[name="seksi_edit"]')
			.val(seksi)
			.trigger("change");
	});
});
