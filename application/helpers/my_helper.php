<?php

function detectCSVFileDelimiter($path)
{
    $handle = fopen($path, "r");
    $delimiters = array(',' => 0, ';' => 0, "\t" => 0, '|' => 0);
    $firstLine = '';
    if ($handle) {
        $firstLine = fgets($handle);
        fclose($handle);
    } else {
        fclose($handle);
    }
    if ($firstLine) {
        foreach ($delimiters as $delimiter => &$count) {
            $count = count(str_getcsv($firstLine, $delimiter));
        }
        return array_search(max($delimiters), $delimiters);
    } else {
        return ',';
    }
}

function getSchActiveDate()
{
    $ci = &get_instance();
    $current = date('Y-m-d');

    $active_date = date('Y-m-d', strtotime($current));
    $yesterday_date = date('Y-m-d', strtotime($current . '- 1 DAY'));
    $sql = "SELECT * FROM sys_sch_users WHERE tanggal = ? OR tanggal = ?";
    $setup = $ci->db->query($sql, array($yesterday_date, $active_date))->result_array();

    $today_setup = array_values(array_filter($setup, function ($s) use ($active_date) {
        return $s['tanggal'] == $active_date;
    }));

    if (!isset($today_setup[0]) || strtotime($current) < strtotime(date('Y-m-d', strtotime($active_date . '' . $today_setup[0]['tanggal'])))) {
        $setup = array_values(array_filter($setup, function ($s) use ($yesterday_date) {
            return $s['tanggal'] == $yesterday_date;
        }));
        $active_date = $yesterday_date;
    }
    return $active_date;
}

function getScanActiveDate()
{
    $ci = &get_instance();
    $current = date('Y-m-d');

    $active_date = date('Y-m-d', strtotime($current));
    $yesterday_date = date('Y-m-d', strtotime($current . '- 1 DAY'));
    $sql = "SELECT * FROM sys_data_scan WHERE tanggal = ? OR tanggal = ?";

    $setup = $ci->db->query($sql, array($yesterday_date, $active_date))->result_array();
    $today_setup = array_values(array_filter($setup, function ($s) use ($active_date) {
        return $s['tanggal'] == $active_date;
    }));

    if (!isset($today_setup[0]) || strtotime($current) < strtotime(date('Y-m-d', strtotime($active_date . '' . $today_setup[0]['tanggal'])))) {
        $setup = array_values(array_filter($setup, function ($s) use ($yesterday_date) {
            return $s['tanggal'] == $yesterday_date;
        }));
        $active_date = $yesterday_date;
    }
    return $active_date;
}

function getActiveDate()
{
    $ci = &get_instance();
    $current = date('Y-m-d');

    $active_date = date('Y-m-d', strtotime($current));
    $yesterday_date = date('Y-m-d', strtotime($current . '- 1 DAY'));

    $active_date_day = date('w', strtotime($active_date));
    $yesterday_date_day = date('w', strtotime($yesterday_date));

    $sql = "SELECT * FROM sys_dates WHERE day = ? OR day = ? ORDER BY day";
    $setup = $ci->db->query($sql, array(
        $yesterday_date_day,
        $active_date_day
    ))->result_array();

    $today_setup = array_values(array_filter($setup, function ($s) use ($active_date_day) {
        return $s['day'] == $active_date_day;
    }));

    if (!isset($today_setup[0])) {
        $setup = array_values(array_filter($setup, function ($s) use ($yesterday_date_day) {
            return $s['day'] == $yesterday_date_day;
        }));
        $active_date = $yesterday_date;
    }

    return $active_date;
}
