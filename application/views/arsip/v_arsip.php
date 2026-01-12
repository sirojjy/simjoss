<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand font-weight-bold" href="javascript:void(0);">Pencarian Arsip </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-align-justify"></i>
    </button>
</nav>

<div class="container-fluid">
    <div class="row clearfix">
        <div class="col">
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $this->session->flashdata('error') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
            <?php elseif ($this->session->flashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $this->session->flashdata('success') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
            <?php else: ?>
            <?php endif; ?>
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex w-100 justify-content-between">
                        <div class="row w-100">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control show-tick ms select2" name="divisi" id="divisi">
                                            <option value="">-- Divisi --</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="form-control show-tick ms select2" name="sub_divisi" id="sub_divisi">
                                            <option value="">-- Sub Divisi --</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="form-control show-tick ms select2" name="lokasi" id="lokasi">
                                            <option value="">-- Lokasi --</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="form-control show-tick ms select2" name="status" id="status">
                                            <option value="">-- Status --</option>
                                            <option value="aktif">Aktif</option>
                                            <option value="kadaluarsa">Kadaluarsa</option>
                                            <option value="dipinjam">Dipinjam</option>
                                            <option value="hilang">Hilang</option>
                                            <option value="inaktif">Inaktif</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="w-100 d-flex">
                                    <div class="w-100">
                                        <input type="text" id="search"
                                            name="search" class="form-control"
                                            placeholder="Search Nama Dokumen">
                                    </div>
                                    <div class="w-auto btn btn-default ml-3" type="button" id="btn_search">
                                        Cari
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dt_arsip" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr class="text-center" style="background-color: #98D4FF">
                                    <th claas="">No</th>
                                    <th class="">Kode Dokumen</th>
                                    <th class="">Nama Dokumen</th>
                                    <th class="">Lokasi Fisik</th>
                                    <th class="">Rak-Baris-Box</th>
                                    <th class="">Jenis Dokumen</th>
                                    <th class="">Nama SOP</th>
                                    <th class="">Sub Divisi</th>
                                    <th class="">Divisi</th>
                                    <th class="">Status</th>
                                    <th class="">File</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Preview -->
<div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="previewModalLabel">Dokument Name</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex w-100 justify-content-end">
                    <!-- <button type="button" class="btn btn-primary btn-sm w-auto mb-4" onclick="downloadIframePDF(this)">Download</button> -->
                </div>
                <div class="" id="previewPDF"></div>
            </div>
        </div>
    </div>
</div>

<!-- scripts -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    const lang = {
        "sProcessing": "Sedang memproses...",
        "sLengthMenu": "Tampilkan _MENU_ entri",
        "sZeroRecords": "Tidak ditemukan data yang sesuai",
        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
        "sInfoPostFix": "",
        "sSearch": "Cari:",
        "sUrl": "",
        "oPaginate": {
            "sFirst": "<<",
            "sPrevious": "<",
            "sNext": ">",
            "sLast": ">>"
        }
    };

    const API_BASE_URL = "<?= $api_url ?>";
    const API_TOKEN = "<?= $api_key ?>";

    $(document).ready(function() {
        let table = $('#dt_arsip').DataTable({
            "processing": true,
            "serverSide": true,
            "searching": false,
            "deferLoading": 0,
            ajax: {
                url: API_BASE_URL + "search/list",
                type: "GET",
                data: function(d) {
                    d.division = $('#divisi').val();
                    d.sub_division = $('#sub_divisi').val();
                    d.location = $('#lokasi').val();
                    d.status = $('#status').val();
                    d.search = $('#search').val();
                },
                beforeSend: function(xhr) {
                    xhr.setRequestHeader("Authorization", "Bearer " + API_TOKEN);
                },
                error: function(xhr, status, error) {
                    console.error("DataTables Error:", xhr.responseText);
                }
            },

            "order": [1, 'desc'],
            "columnDefs": [{
                "orderable": false,
                "targets": -1,
            }],
            "columns": [{
                data: null,
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            }, {
                'data': 'document_code',
            }, {
                'data': 'document_name',
            }, {
                'data': 'location_name',
            }, {
                'data': 'placement',
            }, {
                'data': 'sop_document_name',
            }, {
                'data': 'sop_name',
            }, {
                'data': 'sub_division_name',
            }, {
                'data': 'division_name',
            }, {
                'data': 'document_status',
            }, {
                'data': 'file',
                "searchable": false,
                "orderable": false,
                render: function(data, type, row) {
                    if (!data) return '';

                    let urlMatch = data.match(/data-file-url="([^"]+)"/);
                    let nameMatch = data.match(/data-document_name="([^"]+)"/);

                    let fileUrl = urlMatch ? urlMatch[1] : '';
                    let docName = nameMatch ? nameMatch[1] : 'Tanpa Nama';

                    return `
                    <button type="button" 
                        class="btn btn-sm btn-primary btn-preview"
                        data-file-url="${fileUrl}"
                        data-document_name="${docName}"
                        data-toggle="modal"
                        data-target="#previewModal">
                        <i class="mdi mdi-eye"></i> Lihat
                    </button>
                `;
                }
            }],
            "language": lang
        });

        $('#btn_search').on('click', function() {
            table.ajax.reload();
        });
    });

    // Select 2
    $(document).ready(function() {
        $.ajax({
            url: API_BASE_URL + "division/list",
            type: "GET",
            beforeSend: function(xhr) {
                xhr.setRequestHeader("Authorization", "Bearer " + API_TOKEN);
            },
            error: function(xhr, status, error) {
                console.error("DataTables Error:", xhr.responseText);
            },
            dataType: "json",
            success: function(data) {
                $.each(data, function(i, item) {
                    $('#divisi').append(
                        $('<option>', {
                            value: item.id,
                            text: item.name
                        })
                    );
                });
            },
            error: function() {
                alert("Gagal ambil data divisi!");
            }
        });

        $('#divisi').on('change', function() {
            let divisionId = $(this).val();
            $('#sub_divisi').empty().append('<option value="">-- Sub Divisi --</option>');

            if (divisionId) {
                $('#sub_divisi').prop('disabled', false);
                $.ajax({
                    url: API_BASE_URL + "division/" + divisionId + "/list",
                    type: "GET",
                    beforeSend: function(xhr) {
                        xhr.setRequestHeader("Authorization", "Bearer " + API_TOKEN);
                    },
                    error: function(xhr, status, error) {
                        console.error("DataTables Error:", xhr.responseText);
                    },
                    dataType: "json",
                    success: function(data) {
                        $.each(data, function(i, item) {
                            $('#sub_divisi').append(
                                $('<option>', {
                                    value: item.id,
                                    text: item.name
                                })
                            );
                        });
                    }
                });
            } else {
                $('#sub_divisi').prop('disabled', true);
            }
        });

        $.ajax({
            url: API_BASE_URL + "location/list",
            type: "GET",
            dataType: "json",
            beforeSend: function(xhr) {
                xhr.setRequestHeader("Authorization", "Bearer " + API_TOKEN);
            },
            error: function(xhr, status, error) {
                console.error("DataTables Error:", xhr.responseText);
            },
            success: function(data) {
                $.each(data, function(i, item) {
                    $('#lokasi').append(
                        $('<option>', {
                            value: item.id,
                            text: item.name
                        })
                    );
                });
            },
            error: function() {
                alert("Gagal ambil data divisi!");
            }
        });
    });

    // modal pdf 
    function printIframe() {
        const iframe = document.getElementById('iframePDF');
        iframe.focus();
        iframe.contentWindow.print();
    }

    $(document).on('click', '.btn-preview', function() {
        const id = $(this).data('id');
        const fileUrl = $(this).data('file-url');
        const document_name = $(this).data('document_name');

        const fullUrl = API_BASE_URL.replace("/api/", "") + fileUrl;

        $('#previewModalLabel').text(`Dokumen Preview - ${document_name}`);

        $('#previewPDF').html(`
                <iframe id="iframePDF" src="${fullUrl}" width="100%" height="600px" style="border: none;"></iframe>
        `);
    });
</script>