<?php 
// Include file koneksi database
require_once '../dbkoneksi.php';

// Ambil data dari form
$_code = $_POST['code'];
$_name = $_POST['name'];
$_discount = $_POST['discount'];
$_member_fee = $_POST['member_fee'];

$_proses = $_POST['proses'];

// Simpan data ke dalam array
$ar_data[]=$_code;
$ar_data[]=$_name;
$ar_data[]=$_discount;
$ar_data[]=$_member_fee;

// Cek aksi yang dilakukan: Simpan atau Update
if($_proses == "Simpan"){
    // Jika Simpan, buat SQL INSERT
    $sql = "INSERT INTO card (code,name,discount,member_fee)VALUES (?,?,?,?)";
}else if($_proses == "Update"){
    // Jika Update, tambahkan ID ke array dan buat SQL UPDATE
    $ar_data[]=$_POST['id'];
    $sql = "UPDATE card SET code=?,name=?,discount=?,member_fee=? WHERE id=?";
}

// Jika ada perintah SQL, jalankan perintah prepare dan execute dengan array data
if(isset($sql)){
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
}

// Redirect ke halaman daftar produk
header('location:list_card.php');
?>
