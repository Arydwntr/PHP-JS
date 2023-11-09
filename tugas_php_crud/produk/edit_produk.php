<!DOCTYPE html>
<html>

<head>
    <?php 
    include "connection.php";
    $id = $_GET['id'];

    $supplier = mysqli_query($connection, "SELECT * FROM supplier");

    // Perbarui query untuk mengambil data produk yang akan diedit
    $query_produk = mysqli_query($connection, "SELECT * FROM produk WHERE id = $id");
    $data = mysqli_fetch_assoc($query_produk); // Mendapatkan data produk

    ?>

    <title>Data Produk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
</head>

<body>
    <!-- Menampilkan data order dan customer dalam tabel menggunakan bootstrap -->
    <div class="container">
        <div class="m-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded">
            <h1 class="text-center">Edit Data</h1>
            <form id="form_edit" action="proses_edit_produk.php?id=<?= $data['id']?>" method="post">
                <div class="form-group mb-3">
                    <div class="form-label">Nama Produk</div>
                    <input type="text" name="nama_produk" data-name="Nama Produk" class="required form-control" value="<?= $data['nama_produk']?>">
                </div>
                <div class="form-group mb-3">
                    <div class="form-label">Harga</div>
                    <input type="number" name="harga" data-name="Harga" class="required form-control" value="<?= $data['harga']?>">
                </div>
                <div class="form-group mb-3">
                    <div class "form-label">Stok</div>
                    <input type="number" name="stok" data-name="Stok" class="required form-control" value="<?= $data['stok']?>">
                </div>
                <div class="form-group mb-3">
                    <div class="form-label">Satuan</div>
                    <input type="text" name="satuan" data-name="Satuan" class="required form-control" value="<?= $data['satuan']?>">
                </div>
                <div class="form-group mb-3">
                    <div class="form-label">ID Supplier</div>
                    <select name="supplier_id" class="form-control">
                        <?php foreach ($supplier as $sup) { ?>
                            <option value="<?php echo $sup['id'] ?>" <?php if ($sup['id'] == $data['supplier_id']) echo "selected"; ?>>
                                <?php echo $sup['id'] . ' - ' . $sup['nama']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <a href="produk.php" class="btn btn-danger btn-sm"><i class="bi bi-chevron-left"></i> Kembali</a>
                    <input type="submit" name="Submit" value="Simpan Perubahan" class="btn btn-primary btn-sm">
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#form_edit').submit(function(e) {
                e.preventDefault(); // Mencegah pengiriman form

                // Menghapus pesan error yang mungkin ada
                $('.error').remove();

                // Cek setiap input dengan class "required"
                $('.required').each(function() {
                    if ($(this).val() === '') {
                        // Mendapatkan nama kolom dari atribut data-name
                        var columnName = $(this).data('name');

                        // Jika input kosong, tambahkan pesan error dan beri warna merah di kolomnya
                        $(this).after('<div class=" form-text error text-danger" style="font-size: 12px;">' + columnName + ' tidak boleh kosong</div>');
                        $(this).css('border-color', 'red');
                    }
                });

                // Jika tidak ada input yang kosong, submit form
                if ($('.error').length === 0) {
                    $(this).unbind('submit').submit();
                }
            });

            // Menghapus pesan error dan warna merah saat input diubah
            $('.required').keyup(function() {
                $(this).next('.error').remove();
                $(this).css('border-color', '');
            });
        });
    </script>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</html>