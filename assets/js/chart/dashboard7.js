function modalPembiayaanTahap(params) {
	$(params).modal("show");
}

const rawData = [
	{
		name: "2024",
		data: [
			9157128654, 2708870720600, 0, 0, 32379927083, 0, 0, 19127896078,
			9370161833, 291845719425,
		],
		color: "#7cb5ec",
	},
	{
		name: "2023",
		data: [
			11640946026, 3315527775348, 0, 0, 26779610303, 0, 0, 17633668005,
			16316218821, 100545558842,
		],
		color: "#f7a35c",
	},
	{
		name: "2022",
		data: [
			5961218700, 835816338552, 0, 0, 22414959218, 0, 0, 17747628593,
			7972172579, 457264524,
		],
		color: "#fcd116",
	},
	{
		name: "2021",
		data: [
			29193222124, 1566366332442, 0, 0, 12388926376, 0, 0, 15009875196,
			7063348420, 0,
		],
		color: "#e67e22",
	},
	{
		name: "2020",
		data: [47250000, 0, 0, 0, 425667285, 0, 0, 2035641186, 2988940280, 0],
		color: "#d9534f",
	},
];

const rawDataOutstanding = [
	{
		name: "Sisa fasilitas Kredit",
		data: [
			109508260423, 2902612790584, 0, 20234900000, 32487954530, 681284800000,
			417834980402, 118430015122, 137046700000, 285053789141,
		],

		color: "#7cb5ec",
	},
	{
		name: "Penarikan Tahun 2024",
		data: [
			4312366307, 2264454667295, 0, 0, 25188530945, 0, 246525112353, 0, 0,
			183776953517,
		],
		color: "#fcd116",
	},
	{
		name: "Penarikan Tahun 2023",
		data: [
			11840961458, 1342504649621, 0, 0, 22876795725, 0, 152189783374,
			1078000224, 0, 62381757342,
		],
		color: "#a6a6a6",
	},
	{
		name: "Penarikan Tahun 2022",
		data: [
			13777011812, 765184892500, 0, 0, 6112318800, 0, 85711623871, 805884654, 0,
			0,
		],
		color: "#e67e22",
	},
];

const kategori = [
	"Desain",
	"Konstruksi",
	"Clear Zone",
	"Peralatan Tol",
	"Supervisi",
	"Eskalasi",
	"PPn",
	"Overhead",
	"Financial Cost",
	"IDC",
];

const totalPerKategori = Array(kategori.length).fill(0);
rawData.forEach((serie) => {
	serie.data.forEach((val, i) => {
		totalPerKategori[i] += val;
	});
});

const totalPerKategoriOutstanding = Array(kategori.length).fill(0);
rawDataOutstanding.forEach((serie) => {
	serie.data.forEach((val, i) => {
		totalPerKategoriOutstanding[i] += val;
	});
});

const dataPersenOutstanding = rawDataOutstanding.map((serie) => {
	return {
		name: serie.name,
		color: serie.color,
		data: serie.data.map((val, i) => {
			const total = totalPerKategoriOutstanding[i];
			return {
				y: total > 0 ? (val / total) * 100 : 0, // persentase
				raw: val, // nilai asli
			};
		}),
	};
});

const dataPersen = rawData.map((serie) => {
	return {
		name: serie.name,
		color: serie.color,
		data: serie.data.map((val, i) => {
			const total = totalPerKategori[i];
			return {
				y: total > 0 ? (val / total) * 100 : 0, // persentase
				raw: val, // nilai asli
			};
		}),
	};
});

function BarChart3D(params) {
	Highcharts.chart(params.id, {
		chart: {
			type: "bar",
			options3d: {
				// enabled: true,
				// alpha: 10,
				// beta: 15,
				// depth: 50,
				// viewDistance: 25,
			},
		},
		exporting: {
			enabled: false,
		},
		credits: {
			enabled: false,
		},
		title: {
			text: params.title,
		},
		xAxis: {
			categories: params.kategori,
			// reversedStack: params.reversedStack || false,
		},
		yAxis: {
			title: {
				text: "",
			},
			max: 100,
			labels: {
				overflow: "justify",
				format: "{value}%",
			},
		},
		plotOptions: {
			series: {
				stacking: "normal",
			},
		},
		legend: {
			reversed: params.reversedLegend || false,
		},
		tooltip: params.tooltip,
		series: params.series,
	});
}

function pieDashboard7(params) {
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
		// legend: {
		// 	useHTML: true,
		// 	labelFormatter: function () {
		// 		return this.name_custom;
		// 	},
		// },
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
