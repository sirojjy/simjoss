// ==================================================================
//                Card Modal Kewajiban Kepatuhan JMJ
// ==================================================================

// Fungsi View Berdasarkan Aspek
$(document).ready(function () {
    $('#table_kepatuhan').on('show.bs.modal', function (e) {
        var judul = $(e.relatedTarget).data('judul');
        var id = $(e.relatedTarget).data('id');
        var url = $(e.relatedTarget).data('url'); // ambil URL dari HTML

        $("#aspekk").html('(ASPEK ' + judul + ')');

        $.ajax({
            url: url, // ganti dari PHP ke data-url
            type: "GET",
            data: { id_jenis: id },
            success: function (response) {
                $("#kewajiban_kepatuhan").html(response);
            }
        });
    });
});

// ==================================================================
//      Card Modal Kronologis Pendirian PT Jasamarga Jogja Solo
// ==================================================================

// Fungsi View Berdasarkan Tahap 
function view_pra_perencanaan(value) {
    const steps = {
        1: "#div-pra_perencanaan",
        2: "#div-perencanaan",
        3: "#div-penyiapan",
        4: "#div-pelaksanaan",
        5: "#div-pengembalian"
    };

    // Sembunyikan semua
    Object.values(steps).forEach(id => $(id).hide());

    // Tampilkan sesuai value
    if (steps[value]) {
        $(steps[value]).show();
    }
}

// Fungsi Button .btn-step
$(document).ready(function () {
    $(".btn-step").on("click", function () {
        const value = $(this).data("step");
        view_pra_perencanaan(value);
    });
});

// ==================================================================
//      Card Modal Kronologis Pendirian PT Jasamarga Jogja Solo
// ==================================================================
















function view_nilai(id_dok) {
    if (id_dok != null) {
        $("#view_nilai" + id_dok).modal('show');
    }
}

function view_detail_capex(id_tw) {
    const url = $('#detail_capex_table').data('url'); // Ambil dari HTML
    $.ajax({
        type: "GET",
        url: url,
        data: { id_tw: id_tw },
        success: function (response) {
            let data = "";
            let i = 1;

            $.each(JSON.parse(response), function (index, item) {
                const limit = i++;

                const formatRupiah = (value) => {
                    let number_string = value.toString(),
                        sisa = number_string.length % 3,
                        rupiah = number_string.substr(0, sisa),
                        ribuan = number_string.substr(sisa).match(/\d{3}/g);

                    if (ribuan) {
                        const separator = sisa ? '.' : '';
                        rupiah += separator + ribuan.join('.');
                    }
                    return rupiah;
                };

                const rencanaFormatted = formatRupiah(item.rencana);
                const realisasiFormatted = formatRupiah(item.realisasi);

                const twText = ["I", "II", "III", "IV"][item.tw - 1] || "-";

                data += `
                    <tr>
                        <td style='color:black; text-align:center'>${limit}</td>
                        <td style='color:black; text-align:center'>${twText}</td>
                        <td style='color:black;'>${item.keterangan}</td>
                        <td style='color:black; text-align:right'>${rencanaFormatted}</td>
                        <td style='color:black; text-align:right'>${realisasiFormatted}</td>
                    </tr>
                `;
            });

            $("#detail_capex").html(data);
            $("#view_detailCapex").modal('show');
        }
    });
}
