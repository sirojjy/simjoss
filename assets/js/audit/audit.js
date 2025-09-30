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

function getAudit(params) {
	$(params.id).DataTable({
		processing: true,
		serverSide: true,
		order: [],
		columnDefs: params.columnDefs,
		ajax: {
			url: params.url,
			type: "POST",
			data: {
				jenis_audit: params.jenis_audit,
			},
		},
		columns: params.columns,
		language: lang,
	});
}
