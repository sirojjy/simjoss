function getData(params) {
	$(params).modal("show");
}
function pieDashboard8(params) {
	Highcharts.chart(params.id, {
		credits: {
			enabled: false,
		},
		exporting: {
			enabled: false,
		},
		chart: {
			type: "pie",
			zooming: {
				type: "xy",
			},
			panning: {
				enabled: true,
				type: "xy",
			},
			panKey: "shift",
		},
		title: {
			text: params.title,
		},
		tooltip: {
			formatter: function () {
				return "<b>" + this.point.name + "</b>";
			},
		},
		legend: {
			useHTML: true,
			labelFormatter: function () {
				return this.name_custom;
			},
		},
		plotOptions: {
			pie: {
				allowPointSelect: false,
				cursor: "pointer",
				dataLabels: [
					{
						enabled: false,
						distance: 20,
					},
					{
						enabled: true,
						distance: -40,
						format: "{point.percentage:.1f}%",
						style: {
							fontSize: "1em",
							textOutline: "none",
							opacity: 0.7,
						},
					},
				],
				showInLegend: true,
				point: params.point ?? null,
			},
		},
		series: params.series,
	});
}

function toggleDashboard8(params) {
	$(params).toggleClass("d-none");
}

function chartDashboard8(params) {
	Highcharts.setOptions({
		lang: {
			numericSymbols: ["K", "J", "M", "T"],
		},
	});
	Highcharts.chart(params.id, {
		chart: {
			type: "bar",
		},
		exporting: {
			enabled: false,
		},
		credits: {
			enabled: false,
		},
		title: {
			text: params.title ?? "",
		},
		subtitle: {
			text: params.subtitle ?? "",
		},
		xAxis: {
			categories: [
				"Realisasi s/d Desember 2024",
				"Realisasi s/d Desember 2025",
			],
			gridLineWidth: 1,
			lineWidth: 0,
		},
		yAxis: {
			min: 0,
			title: {
				text: "(dalam jutaan)",
				align: "high",
			},
			labels: {
				overflow: "justify",
			},
			gridLineWidth: 0,
		},
		tooltip: {
			valuePrefix: "Rp. ",
		},
		plotOptions: {
			series: {
				stacking: "normal",
			},
			bar: {
				dataLabels: {
					enabled: true,
				},
				groupPadding: 0.1,
			},
		},
		series: [
			{
				name: "Realisasi TW 1",
				color: "#0639BD",
				data: [0, 460792862119],
			},
			{
				name: "Realisasi TW 2",
				color: "#FFB848",
				data: [0, 745287837039],
			},
			{
				name: "Realisasi TW 3",
				color: "#28B779",
				data: [0, 658343697972],
			},
			{
				name: "Realisasi TW 4",
				color: "#B74293",
				data: [10572759334160, 453141528327],
			},
		],
	});
}
