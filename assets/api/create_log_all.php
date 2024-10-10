<?php
include 'koneksi.php';





  
// checking whether file exists or not
$files = glob('file_log/*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file)) {
    unlink($file); // delete file
  }
}
  


// $query="select * from filedr where port_device=$p AND id_device=$i ";
// $result=mysqli_query($db_handle,$query); 
// while($data=mysqli_fetch_array($result)) {
$query="SELECT fileDR.port_device, fileDR.data, fileDR.status, fileDR.lokasi, fileDR.id_device, fileDR.jumlah_data, device_list.ip_address, device_list.type, device_list.port_type, device_list.port_number, device_list.rack_location 
FROM fileDR INNER JOIN device_list ON fileDR.id_device=device_list.port_number  
WHERE device_list.port_type=fileDR.port_device ";
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

// print_r($file);
$trimFile = array_filter($file);
$trimStatus = array_filter($status);
$trimLokasi = array_filter($lokasi);
print_r($cobaTrim);

$hitungFile = count($trimFile);
$hitungStatus = count($trimStatus);
$hitungLokasi = count($trimLokasi);



// unset($file[$hitungFile-(array_search(" ",$file)]);
// unset($status[$hitungStatus-(array_search(" ",$status)]);
// unset($lokasi[$hitungLokasi-(array_search(" ",$lokasi)]);

date_default_timezone_set('Asia/Jakarta');



$namaFile = "file_log/Log Disturbance Record_All Log_".date('d-m-Y').".zip";
$namaPdf = "file_log/List Log Disturbance Record_All Log_".$portName.$i.".pdf";
$renamePdf = "List Log Disturbance Record_All Log".".pdf"; 


ob_start();
require('fpdf/fpdf.php');

$pdf = new FPDF();



$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->Image('pln.png',10,6,40);
$pdf->Cell(80);
$pdf->Cell(111,5,'Log Disturbance Record',0,0,'R');
$pdf->Ln(2);
$pdf->SetFont('Arial','',10);
$pdf->Cell(191,10,'File From All Relay Log on DMS',0,0,'R');
$pdf->Ln(50);

$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(224,235,255);
$pdf->Cell(8,10,"No",1,0,'C');
$pdf->Cell(95,10,"File Name",1,0,'C');
$pdf->Cell(30,10,"Status",1,0,'C');
$pdf->Cell(56,10,"Rack Location",1,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','',12);

$no=1;
foreach($trimFile as $index => $value) {
    // echo $cobaku1[$index].$cobaku2[$index];
    // echo "<br/>";
    $pdf->Cell(8,10,$no++,1,0,'C');
    $pdf->Cell(95,10,$trimFile[$index],1);
    $pdf->Cell(30,10,ucwords($trimStatus[$index]),1);
    $pdf->Cell(56,10,$trimLokasi[$index],1);
    $pdf->Ln();
 }

 

// $pdf->Output();
$pdf->Output('F',$namaPdf);

$zip = new ZipArchive;
if ($zip->open($namaFile, ZipArchive::CREATE) === TRUE) {
     // point 1        
     foreach($trimFile as $index => $value) {
        $zip->addFile('/home/pi/Desktop/DMSv1.2/zipDR/'.$file[$index],'All Log/'.$file[$index]);
     }   
     $zip->addFile($namaPdf,'All Log/'.$renamePdf);
     $zip->close();  
 }
 
 $url = $namaFile;
  
 $file_url = $url;
 header('Content-Type: application/octet-stream');
 header("Content-Transfer-Encoding: Binary"); 
 header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\""); 
 if(readfile($file_url)){
//     // header('location:listlog.php');

 } 
 

?>