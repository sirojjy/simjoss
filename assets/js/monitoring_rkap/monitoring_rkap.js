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

function getRKAP(params) {
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
				targets: [-1],
			},
		],
		ajax: {
			url: params.url,
			type: "POST",
			data: {
				jenis: params.jenis,
			},
		},
		columns: [
			{
				data: "id",
				className: "text-center",
			},
			{
				data: "keterangan",
				className: "font-weight-bold",
			},
			{
				data: "tw",
				className: "text-center",
			},
			{
				data: "tahun",
				className: "text-center",
			},
			{
				data: "rencana",
				className: "text-right",
			},
			{
				data: "realisasi",
				className: "text-right",
			},
			{
				data: "deviasi",
				className: "text-right",
			},
			{
				data: "aksi",
				className: "text-center",
			},
		],
		language: lang,
	});
}
