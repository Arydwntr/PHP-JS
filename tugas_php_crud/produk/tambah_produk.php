<!DOCTYPE html>
<html>

<head>
    <?php 
    
    include "connection.php";

    $supplier = mysqli_query($connection, "SELECT * FROM supplier");

    ?>

    <title>Data Produk</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
</head>

<body>
    <!-- Menampilkan data order dan customer dalam tabel menggunakan bootstrap -->
    <div class="container">
        <div class="m-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded">
            <h1 class="text-center">Tambah Data</h1>
            <form id="form_tambah" action="proses_tambah_produk.php" method="post">
                <div class="form-group mb-3">
                    <div class="form-label">Nama Produk</div>
                    <input type="text" name="nama_produk" data-name="Nama Produk" class="required form-control">
                </div>
                <div class="form-group mb-3">
                    <div class="form-label">Harga</div>
                    <input type="number" name="harga" data-name="Harga" class="required form-control">
                </div>
                 <div class="form-group mb-3">
                    <div class="form-label">Stok</div>
                    <input type="number" name="stok" data-name="Stok" class="required form-control">
                </div>
                <div class="form-group mb-3">
                    <div class="form-label">Satuan</div>
                    <input type="text" name="satuan" data-name="Satuan" class="required form-control">
                </div>
                <div class="form-group mb-3">
                    <div class="form-label">ID Supplier</div>
                    <select name="supplier_id" class="form-control">
                            <?php foreach ($supplier as $supplier) { ?>
                                        <option value=" <?php echo $supplier['id'] ?> ">
                                            <?php echo $supplier['id'] . ' - ' . $supplier['nama']; ?>
                                        </option>
                            <?php } ?>
                    </select>
                </div>
                <div class="d-flex justify-content-between mb-3">
                <a href="produk.php" class="btn btn-danger btn-sm"><i class="bi bi-chevron-left"></i> Kembali</a>
                    <input type="submit" name="Submit" value="+ Tambah Data" class="btn btn-primary btn-sm">
                </div>
            </form>
        </div>
    </div>
    <script>
            $(document).ready(function() {
                $('#form_tambah').submit(function(e) {
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

</html>