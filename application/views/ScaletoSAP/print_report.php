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

    <div colspan="2" class="text-center"><h1>PT TESTANA INDOTEKNIKA<br>
    TENSILE TESTING</h1>
    </div>
    <?php foreach ($tensile as $u) : ?>
        <div>
                             <table class="table1">
                                <tbody>
                               <tr>
                                            <th >Batch No</th>
                                            <td class="text-center"><?= $u['batcht_no']; ?></td>
                                            <th >Spesifikasi</th>
                                            <td class="text-center"><?= $u['batcht_spesifikasi']; ?></td>
                                        </tr>
                                        <tr>
                                            <th >Test Date</th>
                                            <td class="text-center"><?= date('d/m/Y',strtotime($u['batcht_date']));?></td>
                                            <th >Size 1(mm)</th>
                                            <td class="text-center"><?= $u['batcht_size1']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Lo(mm)</th>
                                            <td class="text-center"><?= $u['batcht_lo'];?></td>
                                            <th >Lu(mm)</th>
                                            <td class="text-center"><?= $u['batcht_lu']; ?></td>
                                        </tr>
                                        <tr>
                                            <th >Fm(kN)</th>
                                                <td class="text-center"><?= $u['batcht_fm']; ?></td>
                                            <th >Rm(MPa)</th>
                                            <td class="text-center"><?= $u['batcht_rm']; ?></td>
                                        </tr>
                                        <tr>
                                            <th >FeH(kN)</th>
                                                <td class="text-center"><?= $u['batcht_feh']; ?></td>
                                            <th >ReH(MPa)</th>
                                            <td class="text-center"><?= $u['batcht_reh']; ?></td>
                                        </tr>
                                        <tr>
                                            <th >FeL(kN)</th>
                                                <td class="text-center"><?= $u['batcht_fel']; ?></td>
                                            <th >ReL(MPa)</th>
                                            <td class="text-center"><?= $u['batcht_rel']; ?></td>
                                        </tr>
                                        <tr>
                                            <th >A(%)</th>
                                            <td class="text-center"><?= $u['batcht_a']; ?></td>
                                            <th >Z(%)</th>
                                            <td class="text-center"><?= $u['batcht_z']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div >
                                        <canvas class='canvas'id="myChart"></canvas>
                                </div>
                            <?php endforeach ?>
    <br>
  
    <script src="<?= base_url() ?>/js/chart.js"></script>
    <script src="<?= base_url() ?>/vendor/jquery/jquery.min.js"></script>
    <?php
    if (isset($tensilelist)) {
        foreach ($tensilelist as $list) :
            echo '<script>const labels = ['.$list['time'].'];
                        var load = ['.$list['load'].'];</script>';

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