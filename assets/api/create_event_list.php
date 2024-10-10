<?php
include 'koneksi.php';

$p=$_GET['p']; //port
$i=$_GET['i']; //id
$r=$_GET['r'];

if($p==0){
    $port = "RS485";
}
else{
    $port = "TCP/IP";
}




  
// checking whether file exists or not
$files = glob('file_Ev/*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file)) {
    unlink($file); // delete file
  }
}
  


// $query="select * from filedr where port_device=$p AND id_device=$i ";
// $result=mysqli_query($db_handle,$query); 
// while($data=mysqli_fetch_array($result)) {
$query="SELECT
          fileEvent.port_device,
          fileEvent. data,
          fileEvent. status,
          fileEvent.lokasi,
          fileEvent.id_device,
          fileEvent.jumlah_data,
          device_list.ip_address,
          device_list.type,
          device_list.port_type,
          device_list.port_number,
          device_list.rack_location
        FROM
          fileEvent
        INNER JOIN device_list ON fileEvent.id_device = device_list.id_device
        WHERE
          fileEvent.port_device = '$p'
        AND fileEvent.id_device = '$i'
        AND device_list.port_type = fileEvent.port_device ";
$result=mysqli_query($db_handle,$query); 
while($data=mysqli_fetch_array($result)) { 
    $ip = $data['ip_address'];
    $array1[] = $data['data'];
    $array2[] = $data['status'];
    $array3[] = $data['lokasi'];

}

$file = array_map('trim',explode(',',implode(',',$array1)));
$status = array_map('trim',explode(',',implode(',',$array2)));
$lokasi = array_map('trim',explode(',',implode(',',$array3)));

$hitungFile = count($file);
$hitungStatus = count($status);
$hitungLokasi = count($lokasi);

//unset($file[$hitungFile-1]);
//unset($status[$hitungFile-1]);
//unset($lokasi[$hitungLokasi-1]);
print_r($file);

date_default_timezone_set('Asia/Jakarta');

if($p==0){
  $portName= "Port Number ";
}
else{
  $portName= "IP ";
  $i = $ip;

}

$namaFile = "file_EV/Log Event Record ".$r."_".$portName.$i."_".date('d-m-Y').".zip";
$namaPdf = "file_EV/List Log Event Record ".$r."_".$portName.$i.".pdf";
$renamePdf = "List Log Event Record "."_".$portName.$i.".pdf"; 

ob_start();
require('fpdf/fpdf.php');

$pdf = new FPDF();



$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->Image('pln.png',10,6,40);
$pdf->Cell(80);
$pdf->Cell(111,5,'Log Event Record '.$r.'',0,0,'R');
$pdf->Ln(2);
$pdf->SetFont('Arial','',10);
$pdf->Cell(191,10,'File From Relay Type '.$port.' | '.$portName.$i.'',0,0,'R');
$pdf->Ln(50);

$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(224,235,255);
$pdf->Cell(8,10,"No",1,0,'C');
$pdf->Cell(95,10,"File Name",1,0,'C');
//$pdf->Cell(30,10,"Status",1,0,'C');
$pdf->Cell(70,10,"Rack Location",1,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','',12);

$no=1;
foreach($file as $index => $value) {
    // echo $cobaku1[$index].$cobaku2[$index];
    // echo "<br/>";
    print_r($no);
    $pdf->Cell(8,10,$no++,1,0,'C');
    $pdf->Cell(95,10,$file[$index],1);

    //$pdf->Cell(30,10,ucwords($status[$index]),1);
    $pdf->Cell(70,10,$lokasi[$index],1);
    $pdf->Ln();
 }
#print_r($no);
 

// $pdf->Output();
$pdf->Output('F',$namaPdf);

$zip = new ZipArchive;
if ($zip->open($namaFile, ZipArchive::CREATE) === TRUE) {
     // point 1        
     foreach($file as $index => $value) {
       //path:  /home/pi/Desktop/DMSv1.2/zipFile/
       $zip->addFile('/home/pi/Desktop/DMSv1.2/dataEV/'.$file[$index],'Log '.$r.' '.$portName.$i.'/'.$file[$index]);
       // $zip->addFile('/home/pi/Desktop/DMSv1.2/zipDR/07.16.2021 15.34.15.072000 Disturbance.000.zip');
     }   
     $zip->addFile($namaPdf,'Log '.$r.' '.$portName.$i.'/'.$renamePdf);
     $zip->close();  
 }
 
 $url = $namaFile;
  
 $file_url = $url;
 header('Content-Type: application/octet-stream');
 header("Content-Transfer-Encoding: Binary"); 
 header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\""); 
 if(readfile($file_url)){
    // header('location:listlog.php');

 } 
 

?>
