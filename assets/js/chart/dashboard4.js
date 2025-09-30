function lineChartDashboard4(params) {
	Highcharts.chart(params.id, {
		exporting: { enabled: false },
		credits: { enabled: false },
		title: {
			text: params.title,
			align: "left",
		},

		subtitle: {
			text: params.subtitle,
			align: "left",
		},

		yAxis: {
			title: {
				text: params.yAxisTitle,
			},
		},

		xAxis: {
			categories: params.categories,
		},

		legend: {
			enabled: true,
		},

		plotOptions: {
			line: {
				dataLabels: { enabled: true },
				enableMouseTracking: true,
			},
			bar: {
				borderRadius: "50%",
				dataLabels: { enabled: true },
				groupPadding: 0.1,
				point: {
					events: {
						click: function () {
							if (typeof clickHandler === "function") {
								clickHandler(this.z);
							}
						},
					},
				},
			},
		},

		series: params.series,

		// responsive: {
		// 	rules: [
		// 		{
		// 			condition: {
		// 				maxWidth: 500,
		// 			},
		// 			chartOptions: {
		// 				legend: {
		// 					layout: "horizontal",
		// 					align: "center",
		// 					verticalAlign: "bottom",
		// 				},
		// 			},
		// 		},
		// 	],
		// },
	});
}
// function createChart(
// 	renderTo,
// 	chartType,
// 	title,
// 	subtitle,
// 	categories,
// 	yAxisTitle,
// 	series,
// 	max = null,
// 	clickHandler = null
// ) {
// 	let chartOptions = {
// 		chart: { type: chartType },
// 		title: { text: title, align: "left" },
// 		subtitle: subtitle ? { text: subtitle, align: "left" } : undefined,
// 		xAxis: { categories: categories },
// 		yAxis: {
// 			title: { text: yAxisTitle },
// 			max: max,
// 		},
// 		exporting: { enabled: false },
// 		credits: { enabled: false },
// 		tooltip: { shared: true },
// 		plotOptions: {
// 			line: {
// 				dataLabels: { enabled: true },
// 				enableMouseTracking: true,
// 			},
// 			bar: {
// 				borderRadius: "50%",
// 				dataLabels: { enabled: true },
// 				groupPadding: 0.1,
// 				point: {
// 					events: {
// 						click: function () {
// 							if (typeof clickHandler === "function") {
// 								clickHandler(this.z);
// 							}
// 						},
// 					},
// 				},
// 			},
// 		},
// 		legend: { enabled: false },
// 		series: series,
// 	};

// 	// If the chart type is 'bar', add extra bar specific configurations
// 	if (chartType === "bar") {
// 		chartOptions.legend.enabled = true; // Enable legend for bar charts
// 		chartOptions.xAxis.gridLineWidth = 1;
// 		chartOptions.yAxis.labels.formatter = function () {
// 			if (this.value > 100000000)
// 				return Highcharts.numberFormat(this.value / 1000000000, 1) + "M";
// 			return Highcharts.numberFormat(this.value, 0);
// 		};
// 		chartOptions.yAxis.gridLineWidth = 0;
// 	}

// 	// Create the chart
// 	Highcharts.chart(renderTo, chartOptions);
// }

// Data kategori bulan
const bulan = [
	"Jan",
	"Feb",
	"Mar",
	"Apr",
	"Mei",
	"Jun",
	"Jul",
	"Agu",
	"Sep",
	"Okt",
	"Nov",
	"Des",
];

// Chart Volume (Line)dd
// createChart(
// 	"line_volume",
// 	"line",
// 	"Perbandingan Volume Lalu Lintas",
// 	"",
// 	bulan,
// 	"Volume",
// 	[
// 		{
// 			name: "PPJT",
// 			data: [
// 				30914, 30914, 30914, 30914, 30914, 30914, 30914, 30914, 30914, 30914,
// 				30914, 30914,
// 			],
// 			color: "#f1bd1f",
// 			marker: {
// 				enabled: true,
// 				symbol: "circle",
// 			},
// 		},
// 		{
// 			name: "RKAP",
// 			data: [
// 				20861, 20861, 20861, 20754, 20754, 20754, 20754, 20754, 20754, 20754,
// 				20754, 20754,
// 			],
// 			color: "red",
// 			marker: {
// 				enabled: true,
// 				symbol: "circle",
// 			},
// 		},
// 		{
// 			name: "Prognosa",
// 			data: [
// 				null,
// 				null,
// 				null,
// 				30210,
// 				13996,
// 				12107,
// 				13287,
// 				12517,
// 				13851,
// 				13817,
// 				14424,
// 				16157,
// 			],
// 			color: "#a8dadc",
// 			dashStyle: "ShortDash",
// 			connectNulls: true,
// 			marker: {
// 				enabled: true,
// 				symbol: "circle",
// 			},
// 		},
// 		{
// 			name: "Realisasi",
// 			data: [
// 				18385,
// 				12086,
// 				13849,
// 				30210,
// 				null,
// 				null,
// 				null,
// 				null,
// 				null,
// 				null,
// 				null,
// 				null,
// 			],
// 			color: "#4a7ca8",
// 			marker: {
// 				enabled: true,
// 				symbol: "circle",
// 			},
// 		},
// 	]
// );

// // Chart Pendapatan (Line)
// createChart(
// 	"line_pendapatan",
// 	"line",
// 	"Perbandingan Pendapatan Tol",
// 	"Dalam jutaan Rupiah",
// 	bulan,
// 	"",
// 	[
// 		{
// 			name: "PPJT",
// 			data: [
// 				80036, 80036, 80036, 80036, 80036, 80036, 80036, 80036, 80036, 80036,
// 				80036, 80036,
// 			],
// 			color: "#f1bd1f",
// 			marker: {
// 				enabled: true,
// 				symbol: "circle",
// 			},
// 		},
// 		{
// 			name: "RKAP",
// 			data: [
// 				28967, 28033, 28967, 38645, 39934, 38645, 39934, 39934, 38645, 39934,
// 				38645, 39934,
// 			],
// 			color: "red",
// 			marker: {
// 				enabled: true,
// 				symbol: "circle",
// 			},
// 		},
// 		{
// 			name: "Prognosa",
// 			data: [
// 				null,
// 				null,
// 				null,
// 				28380,
// 				18511,
// 				15227,
// 				24499,
// 				23071,
// 				24809,
// 				25562,
// 				25833,
// 				29882,
// 			],
// 			color: "#a8dadc",
// 			dashStyle: "ShortDash",
// 			connectNulls: true,
// 			marker: {
// 				enabled: true,
// 				symbol: "circle",
// 			},
// 		},
// 		{
// 			name: "Realisasi",
// 			data: [
// 				21177,
// 				14724,
// 				15282,
// 				28380,
// 				null,
// 				null,
// 				null,
// 				null,
// 				null,
// 				null,
// 				null,
// 				null,
// 			],
// 			color: "#4a7ca8",
// 			marker: {
// 				enabled: true,
// 				symbol: "circle",
// 			},
// 		},
// 	]
// );
