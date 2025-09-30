function formatAngka(angka) {
	return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

function getDataResiko(url, baseUrl) {
	const table = $("#dt_monitoring_resiko");
	table.find("tbody").empty();
	$.ajax({
		url: url,
		method: "GET",
		success: function (data) {
			data = JSON.parse(data);

			const tbody = table.find("tbody");
			tbody.empty();

			if (data.length === 0) {
				const emptyRow = document.createElement("tr");
				emptyRow.innerHTML = `
                        <td colspan="9" class="text-center font-italic">Tidak ada data</td>
                    `;
				tbody.append(emptyRow);
				return;
			}

			let totalSkala = 0;
			let totalSkor = 0;

			data.forEach((group, index) => {
				const item = group.indikator;
				const row = document.createElement("tr");
				const target =
					item.target > 100 ? "Rp. " + item.target : item.target + "%";;
				const realisasi =
					item.realisasi > 100 ? "Rp. " + item.realisasi : item.realisasi + "%";
				totalSkala += parseInt(item.skala);
				totalSkor += parseInt(item.skor_penilaian) || 0;

				row.innerHTML = `
                        <td class="text-center font-weight-bold">
                            ${index + 1}
                        </td>
                        <td class="font-weight-bold">${item.nama_indikator}</td>
                        <td class="text-center font-weight-bold">
                            <span class="badge badge-lg badge-pill badge-success" style="font-size: 16px;">
                                ${item.bobot}%
                            </span>
                        </td>
                        <td class="text-center font-weight-bold">
                        ${target}
                        </td>
                        <td class="text-center font-weight-bold">
                        ${realisasi}
                        </td>
                        <td class="text-center font-weight-bold">
                            ${item.skala}
                        </td>
                        <td class="text-center font-weight-bold">
                            ${item.hasil_penilaian}
                        </td>
                        <td class="text-center font-weight-bold">
                            ${item.skor_penilaian || "-"}
                        </td>
                    `;

				tbody.append(row);

				group.sub.forEach((sub, i) => {
					totalSkala += parseInt(sub.skala);
					const subRow = document.createElement("tr");
					const target =
						sub.target > 100 ? "Rp. " + sub.target : sub.target + "%";;
					const realisasi =
						sub.realisasi > 100 ? "Rp. " + sub.realisasi : sub.realisasi + "%";;
					subRow.innerHTML = `
                            <td></td>
                            <td class="font-weight-bold">
                                4.${i + 1}. ${sub.nama_sub_indikator}
                            </td>
                            <td class="text-center font-weight-bold">
                                <span class="badge badge-lg badge-pill badge-success" style="font-size: 16px;">
                                    ${sub.bobot}%
                                </span>
                            </td>
                            <td class="text-center font-weight-bold">
                                ${target}
                            </td>
                            <td class="text-center font-weight-bold">
                                ${realisasi}
                            </td>
                            <td class="text-center font-weight-bold">
                                ${sub.skala}
                            </td>
                            <td class="text-center font-weight-bold">
                                ${sub.hasil_penilaian}
                            </td>
                            <td class="text-center font-weight-bold">
                                ${sub.skor_penilaian}
                            </td>
                        `;
					tbody.append(subRow);
				});
			});

			const totalNilai = document.createElement("tr");
			totalNilai.innerHTML = `
                    <td colspan="5" class="text-center font-weight-bold">Total Nilai</td>
                    <td class="text-center font-weight-bold">${totalSkala}</td>
                    <td></td>
                    <td class="text-center font-weight-bold">${totalSkor}</td>
                `;

			let kualitasLabel = "";
			let badgeClass = "badge-secondary";

			if (totalSkor > 90) {
				kualitasLabel = "Strong";
				badgeClass = "badge-success";
			} else if (totalSkor >= 85 && totalSkor <= 90) {
				kualitasLabel = "Satisfactory";
				badgeClass = "badge-success";
			} else if (totalSkor >= 80 && totalSkor <= 84) {
				kualitasLabel = "Fair";
				badgeClass = "badge-warning";
			} else if (totalSkor >= 75 && totalSkor <= 79) {
				kualitasLabel = "Marginal";
				badgeClass = "badge-danger";
			} else {
				kualitasLabel = "Unsatisfactory";
				badgeClass = "badge-danger";
			}

			const kualitas = document.createElement("tr");
			kualitas.innerHTML = `
                    <td colspan="7" class="text-center font-weight-bold">KUALITAS PENERAPAN MANAJEMEN RISIKO</td>
                    <td class="text-center font-weight-bold">
                        <span class="badge badge-lg badge-pill ${badgeClass}" style="font-size: 16px; font-weight: bold">
                            <i>${kualitasLabel}</i>
                        </span>
                    </td>
                `;

			tbody.append(totalNilai);
			tbody.append(kualitas);
		},
		error: function (data) {
			console.log(data);
		},
	});
}
