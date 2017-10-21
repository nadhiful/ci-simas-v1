<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Daftar Transaksi". date('dmY_His').".xls" );
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Pragma: public");

$workbook = new Workbook();
$worksheet1 =& $workbook->add_worksheet(date('dmY_His'));

$header =& $workbook->add_format();
$header->set_color('blue'); // set warna huruf
$header->set_border_color('red'); // set warna border

$header->set_size(14); // Set ukuran font 

$header->set_align("center"); // set align rata tengah

$header->set_top(2); // set ketebalan border bagian atas cell 0 = border tidak tampil
$header->set_bottom(2); // set ketebalan border bagian atas cell 0 = border tidak tampil
$header->set_left(2); // set ketebalan border bagian atas cell 0 = border tidak tampil
$header->set_right(2); // set ketebalan border bagian atas cell 0 = border tidak tampil

$worksheet1->write_string(0,0,'ID Transaksi',$header);  // Set Nama kolom
$worksheet1->set_column(0,0,5); // Set lebar kolom
$worksheet1->write_string(0,1,'Nama Nasabah',$header);  // Set Nama kolom
$worksheet1->set_column(0,1,20); // Set lebar kolom 
$worksheet1->write_string(0,2,'Nama Agen',$header);  // Set Nama kolom
$worksheet1->set_column(0,2,15); // Set lebar kolom
$worksheet1->write_string(0,3,'Nominal',$header);  // Set Nama kolom
$worksheet1->set_column(0,3,15); // Set lebar kolom
$worksheet1->write_string(0,4,'Alamat Nasabah',$header);  // Set Nama kolom
$worksheet1->set_column(0,4,50); // Set lebar kolom
$worksheet1->write_string(0,5,'Nomor Telepon',$header);  // Set Nama kolom
$worksheet1->set_column(0,5,50); // Set lebar kolom
$content =& $workbook->add_format();
$content->set_size(11);

$content->set_top(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$content->set_bottom(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$content->set_left(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$content->set_right(1); // set ketebalan border bagian atas cell 0 = border tidak tampil

$row = 1;
foreach ($data as $key) {
    $worksheet1->write_string($row,0,  $key->id_pembayaran ,$content);
    $worksheet1->write_string($row,1,  $key->nama_nasabah ,$content);
    $worksheet1->write_string($row,2,  $key->nama_agen ,$content);
    $worksheet1->write_string($row,3,  $key->nominal ,$content);
    $worksheet1->write_string($row,4,  $key->alamat ,$content);
    $worksheet1->write_string($row,5,  $key->telepon ,$content);
    $row++;
}

$workbook->close();

/* 
 * Created by Pudyasto Adi Wibowo
 * Email : mr.pudyasto@gmail.com
 */


