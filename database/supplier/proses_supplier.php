<?php 
// Include file koneksi database
require_once '../dbkoneksi.php';

// Ambil data dari form
$_name = $_POST['name'];
$_phone = $_POST['phone'];
$_address = $_POST['address'];
$_contact_name = $_POST['contact_name'];

$_proses = $_POST['proses'];

// Simpan data ke dalam array
$ar_data[]=$_name;
$ar_data[]=$_phone;
$ar_data[]=$_address;
$ar_data[]=$_contact_name;

// Cek aksi yang dilakukan: Simpan atau Update
if($_proses == "Simpan"){
    // Jika Simpan, buat SQL INSERT
    $sql = "INSERT INTO supplier (name,phone,address,contact_name)VALUES (?,?,?,?)";
}else if($_proses == "Update"){
    // Jika Update, tambahkan ID ke array dan buat SQL UPDATE
    $ar_data[]=$_POST['id'];
    $sql = "UPDATE supplier SET name=?,phone=?,address=?,contact_name=? WHERE id=?";
}

// Jika ada perintah SQL, jalankan perintah prepare dan execute dengan array data
if(isset($sql)){
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
}

// Redirect ke halaman daftar produk
header('location:list_supplier.php');
?>
