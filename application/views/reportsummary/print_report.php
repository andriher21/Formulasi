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

            size: A4;
        }

        @media print {
            tr.page-break {
                display: block;
                page-break-before: always;
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
            font-weight: 700 !important;
        }


        .table1,
        th {
            padding: 5px 10px;
            border: 1px solid #9a9a9a;
        }

        .table1,
        td {
            padding: 4px 15px;
            border: 1px solid #9a9a9a;
            white-space: nowrap;
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
            border-top: 1px dashed black;
        }

        .bordered-bottom {
            border-bottom: 1px dashed black;
        }

        .text-right {
            text-align: right;
        }
        
    </style>
<div colspan="2" class="text-center"><h3>Report Summarry</h3> </div>
    <hr>
    <table class="table-header">
        <tbody>
            <tr>
                <td width="100px">Date</td>
                <td>: <?= date('d M Y', strtotime($start))?> - <?= date('d M Y', strtotime($end))?></td>
            </tr>

        </tbody>
    </table>
    <hr>
    <br>
    <div colspan="2" class="text-center">Weight Finish Good</div>
    <table class="table1">
        <thead>
            <tr>
                <th>FG Name</th>
                <th>Material Name</th>
                <th>Weight</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($report as $u) : ?>
            <tr>
                <td><?= $u['flvname']; ?></td>
                <td><?= $u['matdesc']; ?></td>
                <td><?= $u['actweight']; ?></td>
            </tr>
            <?php endforeach ?>
                                    
        </tbody>
    </table>
    <br>
    <br>
    <div colspan="2" class="text-center"> Weight Material </div>
    <table class="table1">
        <thead>
            <tr>
                <th>Material Name</th>
                <th>Weight</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($report2 as $u) : ?>
            <tr>
                <td><?= $u['matdesc']; ?></td>
                <td><?= $u['actweight']; ?></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    <br>

    <script>
        window.onload = function() {
            // parent.iframeLoaded();
            window.print();
        }
    </script>

</body>

</html>