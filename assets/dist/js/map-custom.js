// ==================================================================
//                      Maps Leaflet Javascipt
// ==================================================================
function getProgressStatus(phoDateStr, phoFile, totalDays = 1095) {
	const urlBase = window.location.origin + "/";
	const startDate = new Date(phoDateStr);
	const currentDate = new Date();
	const elapsedDays = Math.floor(
		(currentDate - startDate) / (1000 * 60 * 60 * 24)
	);

	if (elapsedDays >= totalDays) {
		const passedDays = elapsedDays - totalDays;
		const endDate = new Date(startDate);
		endDate.setDate(endDate.getDate() + totalDays);
		const endDateStr = endDate.toISOString().split("T")[0];
		return `<td>: <a style="color:red;" class="font-weight-bold" href="${urlBase}file_uploads/maps/${phoFile}" target="_blank"> Masa Berakhir sejak ${endDateStr} (lewat ${passedDays} hari)</a></td>`;
	} else {
		return `<td>: <a style="color:green;" class="font-weight-bold" href="${urlBase}file_uploads/maps/${phoFile}" target="_blank"> ${elapsedDays}/${totalDays} hari</a></td>`;
	}
}

function templatePopUpWithDetail(params) {
	let element = `
    <h6 class="font-weight-bold text-center mb-0">Detail</h6>
	<hr class="mt-1 mb-1">
	<table>
		<tr>
			<td>STA</td>
			<td>: ${params.properties.STA_1}</td>
		</tr>
		<tr>
			<td>Status</td>
			<td>: <b style="color:${
				params.properties.Status == "Operasi" ? "green" : "orange"
			}">${params.properties.Status}</b></td>
		</tr>
		<tr class="${params.properties.Status != "Operasi" ? "d-none" : ""}">
			<td>Tarif</td>
			<td>: <a href="${
				urlBase + "file_uploads/" + params.properties.tarif
			}" class="font-weight-bold text-info" target="_blank">Lihat Tarif</a></td>
		</tr>
		<tr class="${params.properties.Status != "Operasi" ? "d-none" : ""}">
			<td>Status Pemeliharaan</td>
			<td>: ${params.properties.status_pemeliharaan}</td>
		</tr>
		<tr class="${params.properties.Status != "Operasi" ? "d-none" : ""}">
			<td>Waktu Pemeliharaan</td>
			<td>: ${params.properties.waktu_pemeliharaan}</td>
		</tr>
		<tr class="${params.properties.Status != "Operasi" ? "d-none" : ""}">
			<td>Sisa Pemeliharaan</td>
			${
				params.properties.PHO_Date
					? getProgressStatus(
							params.properties.PHO_Date,
							params.properties.PHO_file
					  )
					: "-"
			}
		</tr>
	</table>
	<p class="text-center mb-0 mt-2">
		${
			params.properties.link
				? '<a class="btn btn-info btn-sm text-white" target="_blank" href="' +
				  params.properties.link +
				  '">Lihat Street View</a>'
				: ""
		}
	</p>`;
	return element;
}

// Membuat layer peta default menggunakan OpenStreetMap
let peta1 = L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
	attribution:
		'&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
	id: "mapbox/streets-v11",
});

// Membuat layer peta satellite dari Google
let peta2 = L.tileLayer("http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}", {
	subdomains: ["mt0", "mt1", "mt2", "mt3"],
});

// Membuat layer peta street (jalan) dari Google
let peta3 = L.tileLayer("http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}", {
	attribution:
		'&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors | <a href="https://www.google.com/maps">Google Maps</a>',
	subdomains: ["mt0", "mt1", "mt2", "mt3"],
});

// Membuat layer peta street (jalan) dari Google
let peta4 = L.tileLayer(
	"https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw",
	{
		attribution:
			'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: "mapbox/dark-v10",
	}
);
// Membuat objek map baru
const map = L.map("map", {
	center: [-7.7088, 110.3609],
	zoom: 11,
	layers: [peta2],
});

// Menambahkan control untuk pilih layer peta
const baseLayers = {
	Default: peta1,
	Satelite: peta2,
	Street: peta3,
	// 'Dark': peta4,
};

const layerControl = L.control.layers(baseLayers).addTo(map);

// Highlight ketika mouseover (tidak aktif disini)
function highlightFeature(e) {
	var layer = e.target;

	layer.setStyle({
		weight: 5,
		color: "#666",
		dashArray: "",
		fillOpacity: 0.7,
	});

	layer.bringToFront();
}

// Reset tampilan highlight
function resetHighlight(e) {
	geoLayer.resetStyle(e.target);
}

// Zoom ke fitur tertentu saat klik
function zoomToFeature(e) {
	map.fitBounds(e.target.getBounds());
}

// function onEachFeature(feature, layer) {
//     layer.on({
//         // mouseover: highlightFeature,
//         // mouseout: resetHighlight,
//         click: zoomToFeature
//     });
//     var content = layer.feature.properties.Propinsi.toString();
//     layer.bindTooltip(content, {
//       direction: 'center',
//       permanent: false,
//     //   className: 'styleLabelBidang'
//     });

// }

// Menambahkan tooltip di setiap fitur peta
function onEachFeature(feature, layer) {
	layer.on({
		// mouseover: highlightFeature,
		// mouseout: resetHighlight,
		click: zoomToFeature,
	});
	var content = layer.feature.properties.STA_1.toString(); // Ambil data STA_1 dari geojson
	layer.bindTooltip(content, {
		direction: "center",
		permanent: false,
		className: "styleLabelBidang",
	});
}

// Membuat icon custom besar (bandara)
var LeafIcon = L.Icon.extend({
	options: {
		// shadowUrl: 'leaf-shadow.png',
		iconSize: [40, 50],
		iconAnchor: [20, 30],
		popupAnchor: [-8, -30],
	},
});

// Membuat icon custom kecil (prambanan, marker polos)
var polosIcon = L.Icon.extend({
	options: {
		// shadowUrl: 'leaf-shadow.png',
		iconSize: [15, 25],
		iconAnchor: [10, 20],
		popupAnchor: [-8, -30],
	},
});

// Load icon gambar
var bandara = new LeafIcon({ iconUrl: "file_uploads/maps/bandara.png" }),
	redIcon = new polosIcon({ iconUrl: "file_uploads/maps/red.png" }),
	blueIcon = new polosIcon({ iconUrl: "file_uploads/maps/blue.png" }),
	pramIcon = new polosIcon({ iconUrl: "file_uploads/maps/prambanan.png" });

// var marker = new L.marker([-7.67648,110.59157], { opacity: 0.01 });
//             marker.bindLabel("Simpang Susun", {noHide: true, className: "styleLabelBidang", offset: [0, 0] });
//             marker.addTo(map);

// Menambahkan marker bandara dengan icon custom
L.marker([-7.895927, 110.060492], { icon: bandara })
	.bindPopup("<center><h6><b>NYIA</b></h6></center>")
	.addTo(map);
L.marker([-7.7857558, 110.4372211], { icon: bandara })
	.bindPopup("<center><h6>Bandar Udara <br>Adi Sucipto</h6></center>")
	.addTo(map);
L.marker([-7.515496122028939, 110.75711912862944], { icon: bandara })
	.bindPopup("<center><h6>Bandar Udara <br>Adi Soemarmo</h6></center>")
	.addTo(map);
// L.marker([-7.751903661120661, 110.49189655335714], {icon: pramIcon}).bindPopup("<center><h6>Prambanan</h6></center>").addTo(map);

// Menambahkan marker SS (simpang susun) dengan opacity 0.01 (marker transparan, hanya label yang terlihat)
L.marker([-7.551785, 110.707362], { opacity: 0.01 })
	.bindTooltip("SS Kartasura", {
		permanent: true,
		className: "styleLabelPermanent",
		offset: [-5, 20],
	})
	.addTo(map);
L.marker([-7.6386116, 110.6631632], { opacity: 0.01 })
	.bindTooltip("SS Karanganom", {
		permanent: false,
		className: "styleLabelPermanent",
		offset: [-35, 55],
	})
	.addTo(map);
L.marker([-7.676208, 110.591498], { opacity: 0.01 })
	.bindTooltip("SS Klaten", {
		permanent: false,
		className: "styleLabelPermanent",
		offset: [-40, 40],
	})
	.addTo(map);
L.marker([-7.791832, 110.302509], { opacity: 0.01 })
	.bindTooltip("SS Gamping", {
		permanent: false,
		className: "styleLabelPermanent",
		offset: [-10, 50],
	})
	.addTo(map);
L.marker([-7.8119895, 110.2162326], { opacity: 0.01 })
	.bindTooltip("SS Sentolo", {
		permanent: false,
		className: "styleLabelPermanent",
		offset: [0, 40],
	})
	.addTo(map);
L.marker([-7.845436, 110.152476], { opacity: 0.01 })
	.bindTooltip("SS Wates", {
		permanent: true,
		className: "styleLabelPermanent",
		offset: [5, 30],
	})
	.addTo(map);
// L.marker([-7.67552,110.59109], {icon: redIcon}).bindTooltip("<center><p>Simpang Susun Klaten</p></center>",{ permanent: false }).addTo(map);

$(document).ready(function () {
	// Load GeoJSON seksi 1-1
	// Line Seksi 1.1 (Kartasura-Klaten)
	$.getJSON("file_uploads/maps/seksi1-1.geojson", function (data) {
		const styleLine = {
			radius: 7,
			fillColor: "#ff9500",
			color: "#ff9500",
			weight: 14,
			opacity: 1,
			fillOpacity: 0.8,
			onEachFeature: onEachFeature,
		};

		geoLayer = L.geoJson(data, {
			pointToLayer: function (feature, latlng) {
				return L.Polyline(latlng, styleLine);
			},
			style: function () {
				return { color: "#ff9500" };
			},
			// onEachFeature: function (feature, layer) {
			// 	// layer.bindPopup('<center><h6><b>Detail</b></h6></center><hr>'+
			// 	//                 '<center><img src="<?=base_url()?>assets/assets/images/foto_jalan.jpg" alt="map photo" height="120px"/></center>'+
			// 	//                 // '<p>Seksi &emsp;&emsp;&emsp; : Seksi 1 </p>'+
			// 	//                 '<p>Paket &emsp;&emsp;&emsp; : Paket 1.1 </p>'+
			// 	//                 '<p>Panjang &emsp;&emsp; : 22.3 km </p>'+
			// 	//                 '<p>Status &emsp;&emsp;&emsp;: Operasi</p>'
			// 	// ,{minWidth : 200});
			// },
		}).addTo(map);
	});

	// Load GeoJSON simpang susun
	// Simpang Susun 1.1 (Kartasura & Klaten)
	$.getJSON("file_uploads/maps/simpang_susun11.geojson", function (data) {
		const styleLine = {
			radius: 5,
			fillColor: "#ff006e",
			color: "#ff006e",
			weight: 7,
			opacity: 1,
			fillOpacity: 0.8,
			onEachFeature: onEachFeature,
		};

		geoLayer = L.geoJson(data, {
			pointToLayer: function (feature, latlng) {
				return L.Polyline(latlng, styleLine);
			},
			style: function () {
				return { color: "#ff9500" };
			},
		}).addTo(map);
	});

	// Load GeoJSON seksi 1-2
	// Line Seksi 1.2 (Klaten-Purwomartani)
	$.getJSON("file_uploads/maps/seksi1-2.geojson", function (data) {
		const styleLine = {
			radius: 5,
			fillColor: "#ff006e",
			color: "#ff006e",
			weight: 7,
			opacity: 1,
			fillOpacity: 0.8,
			onEachFeature: onEachFeature,
		};

		geoLayer = L.geoJson(data, {
			pointToLayer: function (feature, latlng) {
				return L.Polyline(latlng, styleLine);
			},
			style: function () {
				return { color: "#ff9500" };
			},
			onEachFeature: function (feature, layer) {
				layer.bindPopup(
					"<center><h6><b>Detail</b></h6></center><hr>" +
						// '<p>Seksi &emsp;&emsp;&emsp; : Seksi 1 </p>'+
						"<p>Paket &emsp;&emsp;&emsp; : Paket 1.2 </p>" +
						"<p>Panjang &emsp;&emsp; : 22.3 km </p>" +
						"<p>Status &emsp;&emsp;&emsp;: Konstruksi</p>"
				);
			},
		}).addTo(map);
	});

	// Load GeoJSON simpang susun 12
	// Simpang Susun 1.2 (Prambanan)
	$.getJSON("file_uploads/maps/simpang_susun12.geojson", function (data) {
		const styleLine = {
			radius: 5,
			fillColor: "#ff006e",
			color: "#ff006e",
			weight: 7,
			opacity: 1,
			fillOpacity: 0.8,
			onEachFeature: onEachFeature,
		};

		geoLayer = L.geoJson(data, {
			pointToLayer: function (feature, latlng) {
				return L.Polyline(latlng, styleLine);
			},
			style: function () {
				return { color: "#ff9500" };
			},
		}).addTo(map);
	});

	// Load GeoJSON seksi 13
	// Line Seksi 1.3 (Puwomartani-Maguwoharjo)
	$.getJSON("file_uploads/maps/seksi13.geojson", function (data) {
		const styleLine = {
			radius: 5,
			fillColor: "#ff006e",
			color: "#ff006e",
			weight: 7,
			opacity: 1,
			fillOpacity: 0.8,
			onEachFeature: onEachFeature,
		};

		geoLayer = L.geoJson(data, {
			pointToLayer: function (feature, latlng) {
				return L.Polyline(latlng, styleLine);
			},
			style: function () {
				return { color: "#ff3014" };
			},
			// onEachFeature: function (feature, layer) {
			// 	layer.bindPopup(
			// 		"<center><h6><b>Detail</b></h6></center><hr>" +
			// 			// '<p>Seksi &emsp;&emsp;&emsp; : Seksi 2 </p>'+
			// 			"<p>Panjang &emsp;&emsp; : 6.88 km </p>" +
			// 			"<p>Status &emsp;&emsp;&emsp;: Konstruksi</p>"
			// 	);
			// },
		}).addTo(map);
	});

	// Load GeoJSON seksi 3
	// Line Seksi 3 (Maguwoharjo-Kulon Progo)
	$.getJSON("file_uploads/maps/seksi3.geojson", function (data) {
		const styleLine = {
			radius: 5,
			fillColor: "#ff006e",
			color: "#ff006e",
			weight: 7,
			opacity: 1,
			fillOpacity: 0.8,
			onEachFeature: onEachFeature,
		};

		geoLayer = L.geoJson(data, {
			pointToLayer: function (feature, latlng) {
				return L.Polyline(latlng, styleLine);
			},
			style: function () {
				return { color: "#4fb051" };
			},
			// onEachFeature: function (feature, layer) {
			// 	layer.bindPopup(
			// 		"<center><h6><b>Detail</b></h6></center><hr>" +
			// 			// '<p>Seksi &emsp;&emsp;&emsp; : Seksi 3 </p>'+
			// 			"<p>Panjang &emsp;&emsp; : 38.57 km </p>" +
			// 			"<p>Status &emsp;&emsp;&emsp;: Persiapan</p>"
			// 	);
			// },
		}).addTo(map);
	});

	// Load GeoJSON junction (Yogya, Kulon Progo, Bawen)
	$.getJSON("file_uploads/maps/junction.geojson", function (data) {
		const styleLine = {
			radius: 5,
			fillColor: "#ff006e",
			color: "#ff006e",
			weight: 7,
			opacity: 1,
			fillOpacity: 0.8,
			onEachFeature: onEachFeature,
		};

		geoLayer = L.geoJson(data, {
			pointToLayer: function (feature, latlng) {
				return L.Polyline(latlng, styleLine);
			},
			style: function () {
				return { color: "#ff3014" };
			},
			onEachFeature: function (feature, layer) {
				layer.bindPopup(
					"<center><h6><b>Detail</b></h6></center><hr>" +
						// '<p>Seksi &emsp;&emsp;&emsp; : Seksi 3 </p>'+
						"<p>Panjang &emsp;&emsp; : 38.57 km </p>" +
						"<p>Status &emsp;&emsp;&emsp;: <b style='color:orange'>Konstruksi</b></p>"
				);
			},
		}).addTo(map);
	});

	// Load GeoJSON simpang susun 3
	// Simpang Susun 3 (Kulon Progo)
	$.getJSON("file_uploads/maps/simpang_susun3.geojson", function (data) {
		const styleLine = {
			radius: 5,
			fillColor: "#ff006e",
			color: "#ff006e",
			weight: 7,
			opacity: 1,
			fillOpacity: 0.8,
			onEachFeature: onEachFeature,
		};

		geoLayer = L.geoJson(data, {
			pointToLayer: function (feature, latlng) {
				return L.Polyline(latlng, styleLine);
			},
			style: function () {
				return { color: "#4fb051" };
			},
		}).addTo(map);
	});

	// Load GeoJSON simpang sta1.1 (Kartasura-Klaten)
	$.getJSON("file_uploads/maps/sta11_new.geojson", function (data) {
		const geojsonMarkerOptions = {
			radius: 4,
			fillColor: "#ff9500",
			color: "#0000",
			weight: 3,
			opacity: 1,
			fillOpacity: 0.8,
			onEachFeature: onEachFeature,
		};

		geoLayer = L.geoJson(data, {
			pointToLayer: function (feature, latlng) {
				return L.circleMarker(latlng, geojsonMarkerOptions);
			},
			onEachFeature: function (feature, layer) {
				layer.bindPopup(templatePopUpWithDetail(feature), { minWidth: 200 });
			},
		}).addTo(map);
	});

	// Load GeoJSON sta 1.2 (Klaten-Purwomartani)
	$.getJSON("file_uploads/maps/sta12_new.geojson", function (data) {
		const geojsonMarkerOptions = {
			radius: 4,
			fillColor: "#ff9500",
			color: "#0000",
			weight: 3,
			opacity: 1,
			fillOpacity: 0.8,
			onEachFeature: onEachFeature,
		};

		geoLayer = L.geoJson(data, {
			pointToLayer: function (feature, latlng) {
				return L.circleMarker(latlng, geojsonMarkerOptions);
			},
			onEachFeature: function (feature, layer) {
				layer.bindPopup(templatePopUpWithDetail(feature), { minWidth: 200 });
			},
		}).addTo(map);
	});

	// Load GeoJSON sta 2 (Purwomartani-Monjali)
	$.getJSON("file_uploads/maps/sta2.geojson", function (data) {
		const geojsonMarkerOptions = {
			radius: 4,
			fillColor: "#ff3014",
			color: "#0000",
			weight: 3,
			opacity: 1,
			fillOpacity: 0.8,
			onEachFeature: onEachFeature,
		};

		geoLayer = L.geoJson(data, {
			pointToLayer: function (feature, latlng) {
				return L.circleMarker(latlng, geojsonMarkerOptions);
			},
			onEachFeature: function (feature, layer) {
				layer.bindPopup(templatePopUpWithDetail(feature), { minWidth: 200 });
			},
		}).addTo(map);
	});

	// Load GeoJSON sta 3 (Monjali-Kulon Progo)
	$.getJSON("file_uploads/maps/sta3_new.geojson", function (data) {
		const geojsonMarkerOptions = {
			radius: 4,
			fillColor: "#4fb051",
			color: "#0000",
			weight: 3,
			opacity: 1,
			fillOpacity: 0.8,
			onEachFeature: onEachFeature,
		};

		geoLayer = L.geoJson(data, {
			pointToLayer: function (feature, latlng) {
				return L.circleMarker(latlng, geojsonMarkerOptions);
			},
			onEachFeature: function (feature, layer) {
				var content = layer.feature.properties.STA_1.toString();
				// layer.bindTooltip(content, {
				// 	direction: "center",
				// 	permanent: false,
				// 	className: "styleLabelBidang",
				// 	offset: [0, 22],
				// });
				// layer.bindPopup(
				// 	"<center><h6><b>Detail</b></h6></center><hr>" +
				// 		"<p>STA &emsp;&emsp;&emsp;&emsp;: " +
				// 		feature.properties.STA_1 +
				// 		" </p>" +
				// 		// '<p>Paket &emsp;&emsp;&emsp; : '+feature.properties.Seksi+' </p>'+
				// 		'<p>Status &emsp;&emsp;&emsp;: <b><font color="' +
				// 		(feature.properties.Status == "Operasi" ? "green" : "orange") +
				// 		'">' +
				// 		feature.properties.Status +
				// 		"</font></b>" +
				// 		'<br><center><a class="btn btn-info btn-sm" style="color:white" target="_blank" href="' +
				// 		feature.properties.link +
				// 		'"> Lihat Street View </a></center>' +
				// 		"</p>",
				// 	{ minWidth: 200 }
				// );

				layer.bindPopup(templatePopUpWithDetail(feature), { minWidth: 200 });
			},
		}).addTo(map);
	});
});

//   $.getJSON("<?= base_url('file_uploads/maps/simpang_susun1.geojson') ?>", function(data){

//     const styleLine = {
//         radius: 5,
//         fillColor : "#ff006e",
//         color : "#ff006e",
//         weight: 7,
//         opacity: 1,
//         fillOpacity : 0.8,
//         onEachFeature: onEachFeature
//     }

//     geoLayer = L.geoJson(data, {
//         pointToLayer: function(feature,latlng){
//             return L.Polyline(latlng, styleLine)
//         },
//         style: function(){
//             return { color: '#ff9500' }
//         }
//     }).addTo(map);

// })

// Fungsi membuat keterangan di pojok kiri bawah
var legend = L.control({ position: "bottomleft" });

legend.onAdd = function (map) {
	var div = L.DomUtil.create("div", "legend");
	div.innerHTML += "<h4><b>Legend</b></h4>";
	div.innerHTML +=
		'<i style="background: #ff9500"></i><span>Tahap 1</span><br>';
	div.innerHTML +=
		'<i style="background: #4fb051"></i><span>Tahap 2</span><br>';
	div.innerHTML +=
		'<i style="background: #ff3014"></i><span>Tahap 3</span><br>';

	// div.innerHTML += '<i style="background: #FFFFFF"></i><span>Ice</span><br>';
	// div.innerHTML += '<i class="icon" style="background-image:`<?=base_url()?>assets/img/red.PNG`;"></i><span>Lubang</span><br>';

	return div;
};
// legend.onAdd = function (map) {
// 	var div = L.DomUtil.create("div", "legend");
// 	div.innerHTML += "<h4><b>Legend</b></h4>";
// 	div.innerHTML +=
// 		'<i style="background: #1dd3b0"></i><span>Paket 1.1 (Operasi)</span><br>';
// 	div.innerHTML +=
// 		'<i style="background: #ff9500"></i><span>Paket 1.2</span><br>';
// 	div.innerHTML +=
// 		'<i style="background: #ff3014"></i><span>Paket 2 (Elevated)</span><br>';
// 	div.innerHTML +=
// 		'<i style="background: #4fb051"></i><span>Paket 3</span><br>';

// 	// div.innerHTML += '<i style="background: #FFFFFF"></i><span>Ice</span><br>';
// 	// div.innerHTML += '<i class="icon" style="background-image:`<?=base_url()?>assets/img/red.PNG`;"></i><span>Lubang</span><br>';

// 	return div;
// };

legend.addTo(map);

// Fungsi merubah angka menjadi Rupiah Indonesia (IDR)
function IDRFormatter(angka, prefix) {
	var number_string = angka.toString().replace(/[^,\d]/g, ""),
		split = number_string.split(","),
		sisa = split[0].length % 3,
		rupiah = split[0].substr(0, sisa),
		ribuan = split[0].substr(sisa).match(/\d{3}/gi);

	if (ribuan) {
		separator = sisa ? "." : "";
		rupiah += separator + ribuan.join(".");
	}

	rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
	return prefix == undefined ? rupiah : rupiah ? "" + rupiah : "";
}
