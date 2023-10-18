<html>

<head>
    <title>Regio Personnel</title>
</head>

<body>
    <!-- <body> -->
    <!--  -->

    <style>
        @page {
            /* auto is the initial value */

            /* this affects the margin in the printer settings */

            size: A4 ;
             margin: 3cm 2cm 2cm 2cm; 
        }

        @media print {
            tr.page-break {
                display: block;
                page-break-before: always;
            }
            #myChart {
            width: 100% !important;
            height: auto !important;
            }
        }

        table {
            page-break-inside: auto
        }

        tr {
            page-break-inside: avoid;
            page-break-after: auto
        }

        thead {
            display: table-header-group
        }

        tfoot {
            display: table-footer-group
        }

        * {
            font-family: sans-serif;
        }

        .table1 {
            font-family: sans-serif;
            color: #444;
            border-collapse: collapse;
            width: 100%;
            font-size: 10px !important;
        }

        .table-header {
            font-family: sans-serif;
            color: #444;
            border-collapse: collapse;
            width: 100%;
            font-size: 10px !important;
        }

        .table1 tr th {
            background: #f2f2f2;
            color: #000;
            font-weight: normal;
            white-space: nowrap;
            /* text-align:right; */
        }

        .table-header tr th {
            background: #35A9DB;
            color: #000;
            font-weight: normal;
            /* text-align:right */
        }

        th {
            font-weight: 700 ;
        }


        .table1,
        th {
            padding: 5px 10px;
            border: 1px solid #9a9a9a;
            height: 60px;
            font-size: 20px;
        }

        .table1,
        td {
            padding: 4px 15px;
            border: 1px solid #9a9a9a;
            white-space: nowrap;
            height: 60px;
            font-size: 20px;
        }

        .table-header>thead>th>td,
        .table-header>tbody>tr>td {
            padding: 2px 2px;
            border: none;
        }

        th {
            /* text-align:left !important; */
        }

        .table1 tr:hover {
            background-color: #f5f5f5;
        }

        .table1 tr:nth-child(even) {
            /* background-color: #f2f2f2; */
        }

        .text-right {
            text-align: right;
        }

        body {
            /* this affects the margin on the content before sending to printer */
            margin: 0px;
            font-size: 14px !important;
        }

        .text-center {
            text-align: center;
        }

        .weigh_in {
            width: 70px;
        }

        .header {
            width: 120px;
        }

        .bordered-top {
            border-top: 5px dashed black;
        }

        .bordered-bottom {
            border-bottom: 5px dashed black;
        }

        .text-right {
            text-align: right;
        }
       
        
    </style>

    <div colspan="2" class="text-center"><h1>PT Regio Teknologi<br>
    Demo TESING</h1>
    </div>
    <?php foreach ($bending as $u) : ?>
        <div>
                             <table class="table1">
                                <tbody>
                                        <tr>
                                        <th >Batch No</th>
                                        <td ><?= $u['batchb_no']; ?></td>
                                        <!-- <th >Test Date</th>
                                        <td ><?= date('d/m/Y',strtotime($u['batchb_date']));?></td>
                                        </tr>
                                        <tr>
                                        <th >Sample Type</th>
                                        <td><?= $u['batchb_sampletype']; ?></td>
                                        <th>Span(mm)</th>
                                        <td><?= $u['batchb_span'];?></td>
                                        </tr>
                                        <tr>
                                        <th >Diameter(mm)</th>
                                        <td><?= $u['batchb_diameter']; ?></td>
                                        <th>Sample No</th>
                                        <td><?= $u['batchb_sampleno']; ?></td>
                                        </tr>
                                        <tr>
                                        <th >FBC(kN)</th>
                                            <td class="text-center"colspan="3"><?= $u['batchb_fbc']; ?></td>
                                        </tr> -->
                                    </tbody>
                                </table>
                                <div >
                                        <canvas class='canvas'id="myChart"></canvas>
                                </div>
                            <?php endforeach ?>
    <br>
    <!-- <table class="table-header">
            <tbody><tr>
                <td width="75%">
                
                </td>
                <td width="">
                Dibuat oleh,
                <br><br><br><br><br>
                Bayu Operator                <br><b>Operator</b>
                </td>
                <td>
                Disetujui,
                <br><br><br><br><br>
                Boyke Atmaja                <br><b>Spv. Gudang RM</b>
                </td>
            </tr>
        </tbody></table> -->
     <!-- <script>
        window.onload = function() {
            // parent.iframeLoaded();
            window.print();
        }
    </script>  -->
    <script src="<?= base_url() ?>/js/chart.js"></script>
    <script src="<?= base_url() ?>/vendor/jquery/jquery.min.js"></script>
    <?php
    if (isset($bendinglist)) {
        echo '<script>var load = [];
            var i= 0;</script>';
        foreach ($bendinglist as $list) :
            echo '<script> var labels = ['.$list['time'].'];
                         load[i] = ['.$list['load'].'];
                        i++;</script>';

             endforeach;
    }
    if (isset($content_scripts)) {
        foreach ($content_scripts as $path) :

            $path = preg_match('/http/', $path) ? $path : base_url() . $path;
            echo '<script src="' . $path . '"></script>';

        endforeach;
    }
    
    ?>
</body>

</html>