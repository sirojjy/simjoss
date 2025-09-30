<style type="text/css">
    .highcharts-figure, .highcharts-data-table table {
    min-width: 360px; 
    max-width: 800px;
    margin: 1em auto;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #EBEBEB;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}
.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}
.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
    padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}
.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

#container h4 {
    text-transform: none;
    font-size: 14px;
    font-weight: normal;
}
#container p {
    font-size: 13px;
    line-height: 16px;
}

@media screen and (max-width: 600px) {
    #container h4 {
        font-size: 2.3vw;
        line-height: 3vw;
    }
    #container p {
        font-size: 2.3vw;
        line-height: 3vw;
    }
}
#direktur h4 {
    text-transform: none;
    font-size: 14px;
    font-weight: normal;
}
#direktur p {
    font-size: 13px;
    line-height: 16px;
}

@media screen and (max-width: 600px) {
    #direktur h4 {
        font-size: 2.3vw;
        line-height: 3vw;
    }
    #direktur p {
        font-size: 2.3vw;
        line-height: 3vw;
    }
}

</style>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/sankey.js"></script>
<script src="https://code.highcharts.com/modules/organization.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">STRUKTUR ORGANISASI PT JOGJASOLO MARGAMAKMUR</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Library</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <!-- <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <iframe src="<?php echo base_url('file_upload/Struktur_Organisasi_JMM2021.pdf') ?>" style="width:100%; height:800px;" frameborder="0"></iframe>
                </div>
            </div>
        </div>


    </div> -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    &emsp;<b>Dewan Komisaris</b>
                    <div class="col-md-10">
                        <div id="container" ></div>
                    </div>
                    &emsp;<b>Dewan Direksi</b>
                    <div class="col-md-12">
                        <div id="direktur"></div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>

</div>

<script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        height: 250,
        inverted: true
    },

    title: {
        text: ' '
    },
    credits: {
            enabled: false
    },
    accessibility: {
        point: {
            descriptionFormatter: function (point) {
                var nodeName = point.toNode.name,
                    nodeId = point.toNode.id,
                    nodeDesc = nodeName === nodeId ? nodeName : nodeName + ', ' + nodeId,
                    parentDesc = point.fromNode.id;
                return point.index + '. ' + nodeDesc + ', reports to ' + parentDesc + '.';
            }
        }
    },

    series: [{
        type: 'organization',
        name: 'Highsoft',
        keys: ['from', 'to'],
        data: [
            //['Shareholders', 'Board'],
            //['Board', 'CEO'],
            ['CEO', 'CTO'],
            ['CEO', 'CPO'],
            ['CEO', 'CSO'],
            //['CEO', 'HR'],
            //['CTO', 'Product'],
            //['CTO', 'Web'],
            //['CSO', 'Sales'],
            //['HR', 'Market'],
            //['CSO', 'Market'],
            //['HR', 'Market'],
            
        ],
        levels: [{
            level: 0,
            color: '#43d5e6',
             dataLabels: {
                color: 'black'
            },
            height: 25
        }, {
            level: 1,
            color: '#43d5e6',
             dataLabels: {
                color: 'black'
            }, 
            height: 25
        }, {
            level: 2,
            color: '#980104'
        }, {
            level: 4,
            color: '#359154'
        }],
        nodes: [{
            id: 'Shareholders'
        }, {
            id: 'Board'
        }, {
            id: 'CEO',
            // title: 'CEO',
            name: 'Komisaris Utama',
            // image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2020/03/17131126/Highsoft_03862_.jpg'
        }, {
            id: 'HR',
            title: 'HR/CFO',
            name: 'Anne Jorunn Fjærestad',
            color: '#007ad0',
            image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2020/03/17131210/Highsoft_04045_.jpg'
        }, {
            id: 'CTO',
            // title: 'CTO',
            name: 'Komisaris',
            // image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2020/03/17131120/Highsoft_04074_.jpg'
        }, {
            id: 'CPO',
            // title: 'CPO',
            name: 'Komisaris',
            // image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2020/03/17131213/Highsoft_03998_.jpg'
        }, {
            id: 'CSO',
            // title: 'CSO',
            name: 'Komisaris',
            // image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2020/03/17131156/Highsoft_03834_.jpg'
        }, {
            id: 'Product',
            name: 'Product developers'
        }, {
            id: 'Web',
            name: 'Web devs, sys admin'
        }, {
            id: 'Sales',
            name: 'Sales team'
        }, {
            id: 'Market',
            name: 'Marketing team',
            column: 5
        }],
        colorByPoint: false,
        color: '#007ad0',
        dataLabels: {
            color: 'white'
        },
        borderColor: 'white',
        nodeWidth: 65
    }],
    tooltip: {
        outside: true
    },
    exporting: {
        allowHTML: true,
        sourceWidth: 800,
        sourceHeight: 200
    }

});


Highcharts.chart('direktur', {
    chart: {
        height: 350,
        inverted: true
    },

    title: {
        text: ' '
    },
    credits: {
            enabled: false
    },
    accessibility: {
        point: {
            descriptionFormatter: function (point) {
                var nodeName = point.toNode.name,
                    nodeId = point.toNode.id,
                    nodeDesc = nodeName === nodeId ? nodeName : nodeName + ', ' + nodeId,
                    parentDesc = point.fromNode.id;
                return point.index + '. ' + nodeDesc + ', reports to ' + parentDesc + '.';
            }
        }
    },

    series: [{
        type: 'organization',
        name: 'Highsoft',
        keys: ['from', 'to'],
        data: [
            //['Shareholders', 'Board'],
            //['Board', 'CEO'],
            ['dir', 'teknik'],
            ['dir', 'umum'],
            ['dir', 'finance'],
            ['teknik', 'gmtek'],
            ['teknik', 'lahan'],
            ['teknik', 'pimpro'],
            ['umum', 'sdm'],
            ['umum', 'legal'],
            ['finance', 'gmfin'],
            // ['gmtek', 'matek'],
            // ['gmtek', 'mdesain'],
            // ['gmtek', 'mbim'],
            // ['lahan', 'mlahan'],
            // ['lahan', 'mutil'],
            // ['pimpro', 'pimpro1'],
            //  ['pimpro', 'pimpro2'],
            // ['pimpro', 'pimpro3'],
            // ['sdm', 'sdm1'],
            // ['sdm', 'sdm2'],
            // ['legal', 'legal1'],
        ],
        levels: [{
            level: 0,
            color: '#f2d383',
             dataLabels: {
                color: 'black'
            },
            height: 25
        }, {
            level: 1,
            color: '#f2d383',
             dataLabels: {
                color: 'black'
            }, 
            height: 25
        }, {
            level: 2,
            color: 'silver',
             dataLabels: {
                color: 'black'
            }, 
        }, {
            level: 3,
            color: 'silver',
             dataLabels: {
                color: 'black'
            },
        }],
        nodes: [{
            id: 'Shareholders'
        }, {
            id: 'Board'
        }, {
            id: 'dir',
            // title: 'CEO',
            name: 'Direktur Utama',
            // image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2020/03/17131126/Highsoft_03862_.jpg'
        },{
            id: 'teknik',
            // title: 'CTO',
            name: 'Direktur Teknik',
            // image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2020/03/17131120/Highsoft_04074_.jpg'
        }, {
            id: 'umum',
            // title: 'CPO',
            name: 'Direktur Umum dan Legal',
            // image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2020/03/17131213/Highsoft_03998_.jpg'
        }, {
            id: 'finance',
            // title: 'CSO',
            name: 'Direktur Keuangan dan Administrasi',
            // image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2020/03/17131156/Highsoft_03834_.jpg'
        }, {
            id: 'gmtek',
            // title: 'CSO',
            name: 'GM Teknik',
            // image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2020/03/17131156/Highsoft_03834_.jpg'
        }, {
            id: 'lahan',
            // title: 'CSO',
            name: 'GM Lahan dan Utilitas',
            // image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2020/03/17131156/Highsoft_03834_.jpg'
        }, {
            id: 'pimpro',
            // title: 'CSO',
            name: 'Pimpinan Proyek',
            // image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2020/03/17131156/Highsoft_03834_.jpg'
        }, {
            id: 'sdm',
            // title: 'CSO',
            name: 'GM SDM dan Umum',
            // image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2020/03/17131156/Highsoft_03834_.jpg'
        }, {
            id: 'legal',
            // title: 'CSO',
            name: 'GM Legal ',
            // image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2020/03/17131156/Highsoft_03834_.jpg'
        }, {
            id: 'gmfin',
            // title: 'CSO',
            name: 'GM Keuangan dan Administrasi ',
            // image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2020/03/17131156/Highsoft_03834_.jpg'
        }, 
        // {
        //     id: 'matek',
        //     // title: 'CSO',
        //     name: 'Manajer Teknik',
        //     // image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2020/03/17131156/Highsoft_03834_.jpg'
        // }, {
        //     id: 'mdesain',
        //     // title: 'CSO',
        //     name: 'Manajer Pengendalian Desain',
        //     // image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2020/03/17131156/Highsoft_03834_.jpg'
        // }, {
        //     id: 'mbim',
        //     // title: 'CSO',
        //     name: 'Manajer BIM',
        //     // image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2020/03/17131156/Highsoft_03834_.jpg'
        // }, {
        //     id: 'mlahan',
        //     // title: 'CSO',
        //     name: 'Manajer Lahan',
        //     // image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2020/03/17131156/Highsoft_03834_.jpg'
        // }, {
        //     id: 'mutil',
        //     // title: 'CSO',
        //     name: 'Manajer Utilitas',
        //     // image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2020/03/17131156/Highsoft_03834_.jpg'
        // }, {
        //     id: 'pimpro1',
        //     // title: 'CSO',
        //     name: 'Manajer Utilitas',
        //     // image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2020/03/17131156/Highsoft_03834_.jpg'
        // }, {
        //     id: 'pimpro2',
        //     // title: 'CSO',
        //     name: 'Manajer Utilitas',
        //     // image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2020/03/17131156/Highsoft_03834_.jpg'
        // }, {
        //     id: 'pimpro3',
        //     // title: 'CSO',
        //     name: 'Manajer Utilitas',
        //     // image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2020/03/17131156/Highsoft_03834_.jpg'
        // },
        //  {
        //     id: 'sdm1',
        //     // title: 'CSO',
        //     name: 'Manajer Utilitas',
        //     // image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2020/03/17131156/Highsoft_03834_.jpg'
        // }, {
        //     id: 'sdm2',
        //     // title: 'CSO',
        //     name: 'Manajer Utilitas',
        //     // image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2020/03/17131156/Highsoft_03834_.jpg'
        // }, {
        //     id: 'legal1',
        //     // title: 'CSO',
        //     name: 'Manajer Utilitas',
            // image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2020/03/17131156/Highsoft_03834_.jpg'
        ],
        colorByPoint: false,
        color: '#007ad0',
        dataLabels: {
            color: 'white'
        },
        borderColor: 'white',
        nodeWidth: 65
    }],
    tooltip: {
        outside: true
    },
    exporting: {
        allowHTML: true,
        sourceWidth: 800,
        sourceHeight: 200
    }

});
</script>