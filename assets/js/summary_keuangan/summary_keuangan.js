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

function getSummaryKeuangan(params) {
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
	$("#editLahan").on("show.bs.modal", function (e) {
		alert("test");
		// var id_progres_lahan = $(e.relatedTarget).data("id_progres_lahan");
		// var rencana = $(e.relatedTarget).data("rencana");
		// var realisasi = $(e.relatedTarget).data("realisasi");
		// var kebutuhan_bidang = $(e.relatedTarget).data("kebutuhan_bidang");
		// var tgl_progres = $(e.relatedTarget).data("tgl_progres");
		// var seksi = $(e.relatedTarget).data("seksi");

		// $(e.currentTarget)
		// 	.find('input[name="id_progres_lahan_edit"]')
		// 	.val(id_progres_lahan);
		// $(e.currentTarget).find('input[name="rencana"]').val(rencana);
		// $(e.currentTarget).find('input[name="realisasi"]').val(realisasi);
		// $(e.currentTarget)
		// 	.find('input[name="kebutuhan_bidang"]')
		// 	.val(kebutuhan_bidang);
		// $(e.currentTarget).find('input[name="tgl"]').val(tgl_progres);

		// $(this).find("#seksi").val(seksi);
	});

	$("#editDtt").on("show.bs.modal", function (e) {
		let id_dtt = $(e.relatedTarget).data("id_dtt");
		let tanggal = $(e.relatedTarget).data("tanggal");
		let periode = $(e.relatedTarget).data("periode");
		let ad_kumulatif = $(e.relatedTarget).data("ad_kumulatif");
		let ad_periodik = $(e.relatedTarget).data("ad_periodik");
		let ad_pl = $(e.relatedTarget).data("ad_pl");
		let ad_dtt = $(e.relatedTarget).data("ad_dtt");
		let persetujuan_dtt = $(e.relatedTarget).data("persetujuan_dtt");
		let jenis = $(e.relatedTarget).data("jenis");

		$(e.currentTarget).find('input[name="id_dtt"]').val(id_dtt);
		$(e.currentTarget).find('input[name="tanggal"]').val(tanggal);
		$(e.currentTarget).find('input[name="periode"]').val(periode);
		$(e.currentTarget).find('input[name="dana_akumulatif"]').val(ad_kumulatif);
		$(e.currentTarget).find('input[name="dana_periodik"]').val(ad_periodik);
		$(e.currentTarget).find('input[name="dana_pl"]').val(ad_pl);
		$(e.currentTarget).find('input[name="dana_dtt"]').val(ad_dtt);
		$(e.currentTarget)
			.find('input[name="persetujuan_dtt"]')
			.val(persetujuan_dtt);
		$(this).find("#tanggal").val(tanggal);
		$(e.currentTarget)
			.find('select[name="jenis"]')
			.val(jenis)
			.trigger("change");
	});

	$("#editPenyerapanDtt").on("show.bs.modal", function (e) {
		let id_penyerapan = $(e.relatedTarget).data("id_penyerapan");
		let tanggal = $(e.relatedTarget).data("tanggal");
		let periode = $(e.relatedTarget).data("periode");
		let realisasi_internal_pl = $(e.relatedTarget).data(
			"realisasi_internal_pl"
		);
		let realisasi_internal_dtt = $(e.relatedTarget).data(
			"realisasi_internal_dtt"
		);
		let realisasi_tanah = $(e.relatedTarget).data("realisasi_tanah");
		let realisasi_pl = $(e.relatedTarget).data("realisasi_pl");
		let realisasi_dtt = $(e.relatedTarget).data("realisasi_dtt");
		let carry_over = $(e.relatedTarget).data("carry_over");
		let jenis = $(e.relatedTarget).data("jenis");

		$(e.currentTarget).find('input[name="id_penyerapan"]').val(id_penyerapan);
		$(e.currentTarget).find('input[name="tanggal"]').val(tanggal);
		$(e.currentTarget).find('input[name="periode"]').val(periode);
		$(e.currentTarget)
			.find('input[name="realisasi_internal_pl"]')
			.val(realisasi_internal_pl);
		$(e.currentTarget)
			.find('input[name="realisasi_internal_dtt"]')
			.val(realisasi_internal_dtt);
		$(e.currentTarget)
			.find('input[name="realisasi_tanah"]')
			.val(realisasi_tanah);
		$(e.currentTarget).find('input[name="realisasi_pl"]').val(realisasi_pl);
		$(e.currentTarget).find('input[name="realisasi_dtt"]').val(realisasi_dtt);
		$(e.currentTarget).find('input[name="carry_over"]').val(carry_over);
		$(this).find("#tanggal").val(tanggal);
		$(e.currentTarget)
			.find('select[name="jenis"]')
			.val(jenis)
			.trigger("change");
	});

	$("#editPengembalianLman").on("show.bs.modal", function (e) {
		let id_pengembalian_lman = $(e.relatedTarget).data("id_pengembalian_lman");
		let tanggal = $(e.relatedTarget).data("tanggal");
		let periode = $(e.relatedTarget).data("periode");
		let rekon_dtt = $(e.relatedTarget).data("rekon_dtt");
		let rekon_cof = $(e.relatedTarget).data("rekon_cof");
		let pengembalian_dtt = $(e.relatedTarget).data("pengembalian_dtt");
		let pengembalian_cof = $(e.relatedTarget).data("pengembalian_cof");
		let penerimaan_kembali_cof = $(e.relatedTarget).data(
			"penerimaan_kembali_cof"
		);
		let penerimaan_kembali_dtt = $(e.relatedTarget).data(
			"penerimaan_kembali_dtt"
		);
		let jenis = $(e.relatedTarget).data("jenis");

		$(e.currentTarget)
			.find('input[name="id_pengembalian_lman"]')
			.val(id_pengembalian_lman);
		$(e.currentTarget).find('input[name="tanggal"]').val(tanggal);
		$(e.currentTarget).find('input[name="periode"]').val(periode);
		$(e.currentTarget).find('input[name="rekon_dtt"]').val(rekon_dtt);
		$(e.currentTarget).find('input[name="rekon_cof"]').val(rekon_cof);
		$(e.currentTarget)
			.find('input[name="pengembalian_dtt"]')
			.val(pengembalian_dtt);
		$(e.currentTarget)
			.find('input[name="pengembalian_cof"]')
			.val(pengembalian_cof);
		$(e.currentTarget)
			.find('input[name="penerimaan_kembali_cof"]')
			.val(penerimaan_kembali_cof);
		$(e.currentTarget)
			.find('input[name="penerimaan_kembali_dtt"]')
			.val(penerimaan_kembali_dtt);
		$(this).find("#tanggal").val(tanggal);
		$(this).find("#jenis").val(jenis);
	});

	$("#editFasilitasDtt").on("show.bs.modal", function (e) {
		let id_fasilitas_dtt = $(e.relatedTarget).data("id_fasilitas_dtt");
		let tanggal = $(e.relatedTarget).data("tanggal");
		let periode = $(e.relatedTarget).data("periode");
		let plafon_kredit = $(e.relatedTarget).data("plafon_kredit");
		let penarikan_kredit = $(e.relatedTarget).data("penarikan_kredit");
		let pengembalian_hutang = $(e.relatedTarget).data("pengembalian_hutang");
		let sisa_plafon = $(e.relatedTarget).data("sisa_plafon");
		let jenis = $(e.relatedTarget).data("jenis");

		$(e.currentTarget)
			.find('input[name="id_fasilitas_dtt"]')
			.val(id_fasilitas_dtt);
		$(e.currentTarget).find('input[name="tanggal"]').val(tanggal);
		$(e.currentTarget).find('input[name="periode"]').val(periode);
		$(e.currentTarget).find('input[name="plafon_kredit"]').val(plafon_kredit);
		$(e.currentTarget)
			.find('input[name="penarikan_kredit"]')
			.val(penarikan_kredit);
		$(e.currentTarget)
			.find('input[name="pengembalian_hutang"]')
			.val(pengembalian_hutang);
		$(e.currentTarget).find('input[name="sisa_plafon"]').val(sisa_plafon);

		$(this).find("#tanggal").val(tanggal);
		$(this).find("#jenis").val(jenis);
	});
});
