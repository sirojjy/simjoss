function bar_kepatuhan(params) {
	Highcharts.chart(params.id, {
		chart: {
			type: "bar",
		},
		exporting: {
			enabled: false,
		},
		title: {
			text: "Compliance Obligation",
		},
		subtitle: {
			text: "2025",
		},
		xAxis: {
			categories: ["Operation", "Korporasi", "Perizinan", "Regulasi"],
		},
		yAxis: {
			min: 0,
			max: 100,
			title: {
				enabled: false,
			},
			labels: {
				overflow: "justify",
				format: "{value}%",
			},
		},
		tooltip: {
			format: "{series.name}: <b>{point.y:.2f}%</b>",
		},
		plotOptions: {
			bar: {
				dataLabels: {
					enabled: true,
					inside: true,
					format: "{point.y:,.2f}%",
					style: {
						textOutline: "none",
					},
				},
			},
		},
		legend: {
			enabled: false,
		},
		credits: {
			enabled: false,
		},
		series: params.series,
	});
}
