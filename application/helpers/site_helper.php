<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('dateView()'))
{
function dateView($date){
        $datestring = '%d, %m, %Y - %h:%i %a';
        if ($date == NULL) {
            return "Belum pernah login";
        } else {
            return mdate($datestring, $date);
        }
    }
}
if ( ! function_exists('cutText()'))
{
function cutText($text, $length, $mode = 2)
    {
    if ($mode != 1)
    {
        $char = $text{$length - 1};
        switch($mode)
        {
        case 2:
            while($char != ' ') {
            $char = $text{--$length};
            }
        case 3:
            while($char != ' ') {
            $char = $text{++$num_char};
            }
        }
    }
    return substr($text, 0, $length) . '...';
    }
}
 
function toJson($data){
	$ci =& get_instance();
	return $ci->output->set_content_type('application/json')->set_output(json_encode($data));
}

if ( ! function_exists('rupiah()'))
{
    function rupiah($angka){
    $jumlah_desimal ="0";
    $pemisah_desimal =",";
    $pemisah_ribuan =",";
    return 'Rp'.number_format($angka, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan);
    }
} 

if ( ! function_exists('money()'))
{
    function money($angka){
    $jumlah_desimal ="0";
    $pemisah_desimal =",";
    $pemisah_ribuan =",";
    return number_format($angka, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan);
    }
} 

if ( ! function_exists('setTimeToPay()'))
{
function setTimeToPay(){
    date_default_timezone_set('Asia/jakarta');
    $date = new DateTime();
    $tanggal = $date->format('Y-m-d H:i:s');

    $date = date_create($tanggal);
    date_add($date, date_interval_create_from_date_string('237 minutes'));
    return date_format($date, 'Y-m-d H:i:s');
    }
}

if ( ! function_exists('kode_barang'))
{
function kode_barang(){
    $ci = & get_instance();
    $ci->db->select('RIGHT(barang.kode_barang,5) as kode', FALSE);
    $ci->db->order_by('kode_barang','DESC');
    $query = $ci->db->get('barang');

    if($query->num_rows() <> 0) {
        $data = $query->row();
        $kode = intval($data->kode) + 1;
    } else {
        $kode = 1;
    }

    $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT);
    $kodejadi = "BR-".$kodemax;
    return $kodejadi;
    }
}

if ( ! function_exists('dateFormatBulan'))
{
function dateFormatBulan($type, $tanggal) {
    $bulan = array (1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
        );
    $bulan_singkat = array (1 =>   'Januari',
        'Feb',
        'Mar',
        'Apr',
        'Mei',
        'Jun',
        'Jul',
        'Agt',
        'Sep',
        'Okt',
        'Nov',
        'Des'
        );
    $hari = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');

    $split = explode('-', $tanggal);
    $split_waktu = explode(' ', $tanggal);
    $tgl = explode(' ', $split[2]);
    $tanggal = strtotime($tanggal);

    switch ($type) {
        case 0: //12, Maret 2017
        return $split[2] . ', ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
        break;

        case 1: //Bulan singkat
        return $bulan_singkat[ (int)$split[1] ];
        break;

        case 2: //Tanggal aja
        return $split[2];
        break;

        case 3: // Senin, 12 Maret 2017
        return $hari[date('w', $tanggal)].', '.$tgl[0] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0] . ' ' . $split_waktu[1];
        break;

        case 4: // Senin, 12 Maret 2017
        return $hari[date('w', $tanggal)].', '.$tgl[0] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
        break;

        default:
        return $split[2] . ', ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
        break;
    }
}
}

if ( ! function_exists('fileName'))
{
    function fileName($type, $prefix, $additional_name, $length) {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        switch ($type) {
            case 0: //nama file gambar artikel
            return $prefix."_".$slug."_".date('Ymdhis');
            break;

            case 1: //nama file gambar produk
            return $prefix."_".$randomString."_".date('Ymdhis');
            break;

            default:
            return $prefix."_".$additional_name."_".date('Ymdhis');
            break;
        }
    }
}
 

if ( ! function_exists('set_profile_picture'))
{
function set_profile_picture($file="")
{
    $file_name = 'blank.png';
    if (! empty($file) && file_exists(realpath('./././res/img/user/'.$file))) {
    $file_name = $file;
    }
    return $file_name;
}
}
if ( ! function_exists('set_news_picture'))
{
function set_news_picture($file="")
{
    $file_name = 'default.png';
    if (! empty($file) && file_exists(realpath('./././uploads/img/articles/'.$file))) {
    $file_name = $file;
    }
    return $file_name;
}
}

if ( ! function_exists('slugify'))
{
function slugify($string = "")
{
    $string = str_replace(' ', '-', strtolower($string));
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
}
}

if (! function_exists('time_ago')) {
function time_ago($date, $granularity=2) {
    $retval = '';
    $date = strtotime($date);
    $difference = time() - $date;
    $periods = array('decade' => 315360000,
    'tahun' => 31536000,
    'bulan' => 2628000,
    'minggu' => 604800,
    'hari' => 86400,
    'jam' => 3600,
    'menit' => 60,
    'detik' => 1);

    foreach ($periods as $key => $value) {
    if ($difference >= $value) {
        $time = floor($difference/$value);
        $difference %= $value;
        $retval .= ($retval ? ' ' : '').$time.' ';
        $retval .= (($time > 1) ? $key : $key);
        $granularity--;
    }
    if ($granularity == '0') { break; }
    }
    return $retval.' yang lalu';
}
}
