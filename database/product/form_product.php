<?php 
require_once '../dbkoneksi.php';
?>

<?php 
    // cek apakah terdapat parameter id pada URL, jika ada maka dilakukan edit data
    $_id = isset($_GET['id']) ? $_GET['id'] : null;
    if(!empty($_id)){
        // ambil data vendor berdasarkan id
        $sql = "SELECT * FROM `product` WHERE id=?";
        $st = $dbh->prepare($sql);
        $st->execute([$_id]);
        $row = $st->fetch();
    }else{
        // jika tidak ada parameter id pada URL, maka dianggap input data baru
        // inisialisasi variabel $row sebagai array kosong
        $row = [];
    }
?>

<form method="POST" action="proses_product.php">
  <div class="form-group row">
    
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-anchor"></i>
          </div>
        </div> 
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="sku" class="col-4 col-form-label">SKU</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-arrow-circle-o-left"></i>
          </div>
        </div> 
        <input id="name" name="name" 
        value="<?php if(isset($row['sku'])) echo $row['sku']; ?>" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="name" class="col-4 col-form-label">Nama</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-arrow-circle-up"></i>
          </div>
        </div> 
        <input id="name" name="name" value="<?php if(isset($row['name'])) echo $row['name']; ?>"
        type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="purchase_price" class="col-4 col-form-label">Harga Beli</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-arrow-circle-o-left"></i>
          </div>
        </div> 
        <input id="purchace_price" name="phone" value="<?php if(isset($row['purchace_price'])) echo $row['purchace_price']; ?>" type="text" class="form-control">
      </div>
    </div>
  <div class="form-group row">
    <label for="sell_price" class="col-4 col-form-label">Harga Jual</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-arrow-circle-o-left"></i>
          </div>
        </div> 
        <input id="sell_price" name="sell_price" value="<?php if(isset($row['sell_price'])) echo $row['sell_price']; ?>" type="text" class="form-control">
      </div>
    </div>
  <div class="form-group row">
    <label for="stock" class="col-4 col-form-label">Stok</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-arrow-circle-o-left"></i>
          </div>
        </div> 
        <input id="stock" name="stock" value="<?php if(isset($row['stock'])) echo $row['stock']; ?>" type="text" class="form-control">
      </div>
    </div>
  <div class="form-group row">
    <label for="min_stock" class="col-4 col-form-label">Min Stok</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-arrow-circle-o-left"></i>
          </div>
        </div> 
        <input id="min_stock" name="min_stock" value="<?php if(isset($row['min_stock'])) echo $row['min_stock']; ?>" type="text" class="form-control">
      </div>
  <div class="form-group row">
    <label for="product_type_id" class="col-4 col-form-label">Produk Type</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-arrow-circle-o-left"></i>
          </div>
        </div> 
        <input id="product_type_id" name="min_stock" value="<?php if(isset($row['product_type_id'])) echo $row['product_type_id']; ?>" type="text" class="form-control">
      </div>
  <div class="form-group row">
    <label for="restock_id" class="col-4 col-form-label">Restock</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-arrow-circle-o-left"></i>
          </div>
        </div> 
        <input id="restock" name="restock" value="<?php if(isset($row['restock'])) echo $row['restock']; ?>" type="text" class="form-control">
      </div>
       
  <div class="form-group row">
    <div class="offset-4 col-8">
    <?php
        $button = (empty($_id)) ? "Simpan":"Update"; 
    ?>
      <input type="submit" name="proses" type="submit" 
      class="btn btn-primary" value="<?=$button?>"/>
      <input type="hidden" name="id" value="<?=$_id?>"/>
    </div>
  </div>
</form>