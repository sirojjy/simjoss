function PieDashboard14(params) {
	Highcharts.chart(params.id, {
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			type: "pie",
		},
		title: {
			text: params.title,
		},
		credits: {
			enabled: false,
		},
		exporting: {
			enabled: false,
		},
		tooltip: {
			pointFormat: "{series.name}: <b>{point.y:.0f}</b>",
		},
		accessibility: {
			point: {
				valueSuffix: "%",
			},
		},
		plotOptions: params.plotOptions,
		legend: {
			enabled: true,
			labelFormat: "{name} ({y:.0f})",
		},
		series: params.series,
	});
}
