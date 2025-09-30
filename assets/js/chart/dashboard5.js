function formatRupiah(angka) {
	angka = parseFloat(angka) || 0;
	return angka.toLocaleString("id-ID", {
		minimumFractionDigits: 2,
		maximumFractionDigits: 2,
	});
}

function barDashboard5(params) {
	Highcharts.chart(params.id, {
		chart: {
			type: "bar",
		},
		title: {
			text: params.title,
		},
		subtitle: {
			text: params.subtitle,
		},
		xAxis: {
			categories: params.xCategories,
			title: {
				text: null,
			},
			gridLineWidth: 1,
			lineWidth: 0,
		},
		yAxis: {
			min: 0,
			title: {
				text: "Nilai (Rp.)",
				align: "high",
			},
			labels: {
				formatter: function () {
					if (this.value > 100000000)
						return Highcharts.numberFormat(this.value / 1000000000, 1) + "M"; //  only switch if > 1000
					return Highcharts.numberFormat(this.value, 0);
				},
			},
			gridLineWidth: 0,
		},
		tooltip: {
			valueSuffix: " ",
			shared: true,
		},
		plotOptions: {
			bar: {
				borderRadius: "50%",
				dataLabels: {
					enabled: true,
				},
				groupPadding: 0.1,
				point: {
					events: params.events,
				},
			},
		},
		legend: {
			enabled: true,
		},
		credits: {
			enabled: false,
		},
		exporting: {
			enabled: false,
		},
		series: params.series,
	});
}

function showGrafik(params) {
	$.ajax({
		type: "GET",
		url: params.url,
		data: {
			id_tw: params.id,
		},
		success: function (response) {
			let data = "";
			let totalRencana = 0;
			let totalRealisasi = 0;
			let totalDeviasi = 0;
			const twList = ["", "I", "II", "III", "IV"];

			$.each(JSON.parse(response), function (index, item) {
				const limit = index + 1;
				const tw = twList[item.tw] || "-";
				const rencana = parseFloat(item.rencana) || 0;
				const realisasi = parseFloat(item.realisasi) || 0;
				const deviasi = rencana - realisasi;
				const persen =
					rencana === 0 ? 0 : ((realisasi / rencana) * 100).toFixed(2);

				totalRencana += rencana;
				totalRealisasi += realisasi;
				totalDeviasi += deviasi;

				const warnaDeviasi = deviasi < 0 ? "red" : "green";

				data += `<tr>
					<td class="text-center">${limit}</td>
                    <td class="text-center">${tw}</td>
                    <td>${item.keterangan}</td>
                    <td class="text-right font-weight-bold">${formatRupiah(
											rencana
										)}</td>
					<td class="text-right font-weight-bold">${formatRupiah(realisasi)}</td>
					<td class="text-right font-weight-bold" style="color:${warnaDeviasi};">${formatRupiah(
					deviasi
				)}</td>
					<td class="text-center font-weight-bold">${persen}</td>
					</tr>`;
			});

			// Tambah baris total
			data += `<tr class="font-weight-bold" style="background-color:#f2f2f2;">
			<td class="text-center" colspan="3" style="color:blue;">TOTAL</td>
			<td class="text-right" style="color:blue; ">${formatRupiah(totalRencana)}</td>
            <td class="text-right" style="color:blue; ">${formatRupiah(
							totalRealisasi
						)}</td>
			<td class="text-right" style="color:blue; ">${formatRupiah(totalDeviasi)}</td>
            <td></td>
            </tr>`;

			$(params.idDetail).html(data);
		},
	});

	$(params.idModal).modal("show");
}
