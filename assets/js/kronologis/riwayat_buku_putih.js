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

function getRiwayatBukuPutih(params) {
	$(params.id).DataTable({
		processing: true,
		serverSide: true,
		order: [],
		columnDefs: [
			{
				targets: 0,
				width: "1%",
				className: "dt-nowrap",
			},
			{
				orderable: false,
				targets: [-1, -2],
			},
		],
		ajax: {
			url: params.url,
			type: "POST",
		},
		columns: [
			{
				data: "id",
				className: "text-center",
			},
			{
				data: "jenis_dokumen",
				className: "font-weight-bold",
			},
			{
				data: "tahapan",
				className: "text-center",
			},
			{
				data: "tanggal",
				className: "text-center",
			},
			{
				data: "nomor_dokumen",
				className: "text-center",
			},
			{
				data: "pihak",
			},
			{
				data: "file",
				className: "text-center",
			},
			{
				data: "aksi",
				className: "text-center",
			},
		],
		language: lang,
	});
}

function updateFile(id_kronologis) {
	$("#id_kronologis").val(id_kronologis);
	$("#updateFile").modal("show");
}

function showFile(id_kronologis, file) {
	$("#id_kronologis_show").val(id_kronologis);
	$("#showFileButton").attr("href", file);
	$("#showFile").modal("show");
}

$("#buttonCatatan").click(function () {
	$("#catatan").toggleClass("d-none");
});
