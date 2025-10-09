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

function getDataKPI(params) {
	$("#dt_kpi").DataTable({
		processing: params.processing,
		serverSide: params.serverSide,
		searching: params.searching,
		ordering: params.ordering,
		info: params.info,
		paging: params.paging,
		lengthMenu: params.lengthMenu,
		columnDefs: params.columnDefs,
		ajax: {
			url: params.url,
			type: "GET",
		},
		columns: params.columns,
		language: lang,
		footerCallback: function (row, data, start, end, display) {
			let api = this.api();
			let intVal = (i) =>
				typeof i === "string"
					? parseInt(i.replace(/\./g, ""))
					: typeof i === "number"
					? i
					: 0;

			let calcTotal = (colIndex) =>
				api
					.column(colIndex, {
						search: "applied",
					})
					.data()
					.reduce((a, b) => intVal(a) + intVal(b), 0);

			[
				["total_bobot", 4],
				["total_rencana_q1", 7],
				["total_rencana_q2", 8],
				["total_rencana_q3", 9],
				["total_rencana_1y", 10],
				["total_realisasi_q1", 11],
				["total_realisasi_q2", 12],
				["total_realisasi_q3", 13],
				["total_realisasi_1y", 14],
			].forEach(([id, colIndex]) => {
				let total = calcTotal(colIndex);
				$(`#${id}`).html(
					`<strong>${new Intl.NumberFormat("id-ID").format(total)}%</strong>`
				);
			});
		},
	});
}
