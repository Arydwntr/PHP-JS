<?php
include "connection.php";
$id = $_GET['id'];

$query = mysqli_query($connection,"SELECT * FROM pelanggan where id='$id'");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data Pelanggan</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <!-- Menampilkan data order dan customer dalam tabel menggunakan bootstrap -->
    <div class="container">
    <?php
        while($data = mysqli_fetch_array($query)){
            ?>
        <div class="m-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded">
            <h1 class="text-center">Edit Data Pelanggan</h1>
            <form id="form_tambah" action="proses_edit_pelanggan.php?id=<?= $data['id']?>" method="post">
                <div class="form-group mb-3">
                    <div class="form-label">Nama </div>
                    <input type="text" name="nama" data-name="Nama" class="required form-control" value="<?= $data['nama']?>">
                </div>
                <div class="form-group mb-3">
                    <div class="form-label">Jenis Kelamin
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="pria" id="pria">
                            <label class="form-check-label" for="pria">
                                Pria
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="wanita" id="wanita">
                            <label class="form-check-label" for="wanita">
                                Wanita
                            </label>
                        </div>
                    </div>
                </div>
                 <div class="form-group mb-3">
                    <div class="form-label">telpon</div>
                    <input type="number" name="telpon" data-name="Telpon" class="required form-control" value="<?= $data['telpon']?>">
                </div>
                <div class="form-group mb-3">
                    <div class="form-label">Alamat</div>
                    <textarea name="alamat" data-name="Alamat" class="required form-control"><?= $data['alamat']?></textarea>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <a href="supplier.php" class="btn btn-danger btn-sm"><i class="bi bi-chevron-left"></i> Kembali</a>
                    <input type="submit" name="Submit" value="Edit Data" class="btn btn-warning btn-sm">
                </div>
                </tbody>
                </table>
            </form>
        </div>
        <?php } ?>
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