function getDokumenDasar(params) {
	$.ajax({
		type: "POST",
		url: params.url,
		data: {
			id_kontrak: params.id_kontrak,
		},
		success: function (response) {
			response = JSON.parse(response);

			response.forEach((item, index) => {
				const row = document.createElement("tr");

				row.innerHTML = `
				    <td class="text-center">${index + 1}</td>
				    <td class="font-weight-bold">${item.nama_dok}</td>
				    <td class="text-center">${item.nomor_dok}</td>
                    <td class="text-center">${
											item.tanggal_dok
												? moment(item.tanggal_dok).format("DD-MM-YYYY")
												: "-"
										}</td>
				    <td class="text-center">${
							item.kantor == null || item.kantor === "" ? "-" : item.kantor
						}</td>
				    <td class="text-center">${
							item.pic == null || item.pic === "" ? "-" : item.pic
						}</td>
				    <td class="text-center">
                    ${
											item.dok_file
												? "<a href='" +
												  params.base_url +
												  "file_uploads/kontrak_konstruksi/" +
												  item.dok_file +
												  "' target='_blank' class='btn btn-sm  btn-primary'><i class='fa fa-print'></i></a>"
												: "<button class='btn btn-sm btn-danger' disabled>Belum Diupload</button>"
										}
                    </td>
				`;

				$(params.id_table).find("tbody").append(row);
			});
		},
		error: function (xhr, ajaxOptions, thrownError) {
			alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
		},
	});
}

function getDokumenLain(params) {
	$.ajax({
		type: "POST",
		url: params.url,
		data: {
			id_kontrak_konstruksi: params.id_kontrak,
		},
		success: function (response) {
			response = JSON.parse(response);
			console.log(response);
		},
		error: function (xhr, ajaxOptions, thrownError) {
			alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
		},
	});
}
