function hitungRataRata(arrayAngka) {
	if (!Array.isArray(arrayAngka) || arrayAngka.length === 0) {
		return "0.00";
	}
	const total = arrayAngka.reduce((acc, val) => acc + val, 0);
	return parseFloat((total / arrayAngka.length).toFixed(2));
}

function barChartProgres(params) {
	Highcharts.chart(params.id, {
		chart: {
			type: "column",
		},
		credits: {
			enabled: false,
		},
		exporting: {
			enabled: false,
		},
		title: {
			text: params.title,
		},

		xAxis: {
			categories: params.categories,
			crosshair: true,
			labels: {
				useHTML: true, // penting untuk render <br> dan <b>
			},
		},
		yAxis: {
			min: 0,
			max: 100,
			title: {
				text: "Progres (%)",
			},
		},
		tooltip: {
			shared: true,
			useHTML: true,
			formatter: function () {
				const kategori = this.points?.[0]?.key || ""; // key berisi label kategori di mode shared
				let tooltip = `<strong>${kategori}</strong><br/>`;

				this.points.forEach((point) => {
					const colorBox = `<span style="color:${point.series.color}">\u25CF</span>`;
					const name =
						point.series.userOptions.originalName || point.series.name;
					tooltip += `${colorBox} ${name}: <b>${point.y}%</b><br/>`;
				});

				return tooltip;
			},
			positioner: function (labelWidth, labelHeight, point) {
				const chart = this.chart;

				// Hitung posisi X tengah dari plot area
				const tooltipX = chart.plotLeft + chart.plotWidth / 2 - labelWidth / 2;

				// Tempatkan tooltip di atas plot area
				const tooltipY = chart.plotTop + 10;

				return {
					x: tooltipX,
					y: tooltipY,
				};
			},
		},
		legend: {
			labelFormatter: function () {
				const data = this.userOptions.data;
				const avg = hitungRataRata(data);
				return `${this.userOptions.originalName} : <strong>${avg}%</strong>`;
			},
			useHTML: true,
		},
		plotOptions: {
			column: {
				pointPadding: 0.1,
				groupPadding: 0.3,
				borderWidth: 0,
				dataLabels: {
					enabled: true,
					format: "{point.y:.2f}%",
					style: {
						fontSize: "12px",
						color: "black",
					},
				},
			},
		},
		series: params.series,
	});
}

function donut_chart(params) {
	Highcharts.chart(params.id, {
		chart: {
			type: "pie",
			options3d: {
				enabled: true,
				alpha: 45,
			},
		},
		title: {
			text: params.title,
		},
		exporting: {
			enabled: false,
		},
		credits: {
			enabled: false,
		},
		subtitle: {
			text: params.subtitle,
		},
		tooltip: {
			format: "{series.name}: Rp {point.y:,.0f}",
		},
		plotOptions: {
			pie: {
				innerSize: 100,
				depth: 45,
				dataLabels: {
					format: "{point.percentage:.2f}%",
					distance: -40,
					style: {
						textOutline: "none",
					},
				},
				showInLegend: true,
			},
			series: {
				cursor: "pointer",
				events: {
					click: function (event) {
						$(params.idModal).modal("show");
					},
				},
			},
		},
		series: params.series,
	});
}

donut_chart({
	id: "donutTahap1",
	title: "Tahap 1",
	subtitle: "Rp 11.712.099.439.720",
	idModal: "#modalPieChartTahap1",
	series: [
		{
			name: "Nilai",
			colors: ["#03A9F4", "#FFC107"],
			data: [
				["Terbayar", 7698018511881],
				["Belum Terbayar", 4014080927839],
			],
		},
	],
});

donut_chart({
	id: "donutTahap2",
	title: "Tahap 2",
	subtitle: "Rp 0",
	series: [
		{
			name: "Nilai",
			colors: ["#03A9F4", "#FFC107"],
			data: [
				["Terbayar", 0],
				["Belum Terbayar", 0],
			],
		},
	],
});

donut_chart({
	id: "donutTahap3",
	title: "Tahap 3",
	subtitle: "Rp 0",
	series: [
		{
			name: "Nilai",
			colors: ["#03A9F4", "#FFC107"],
			data: [
				["Terbayar", 0],
				["Belum Terbayar", 0],
			],
		},
	],
});
