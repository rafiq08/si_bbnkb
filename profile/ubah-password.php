<?php

$id_user = $_SESSION["ses_id"];
$query = "SELECT * FROM tb_user WHERE id_user=$id_user";
$userQuery = mysqli_query($link, $query);
$loggedUser = mysqli_fetch_object($userQuery); // user yang sedang login

$errorPasswordLama = '';
$errorPasswordBaru = '';
$valid = true;

if (!empty($_POST)) {
    $passwordLama = trim($_POST['password-lama']);
    $passwordBaru = trim($_POST['password-baru']);

    if ($passwordLama == '') {
        $errorPasswordLama = 'Harap masukkan password lama';
        $valid = false;
    }

    if ($passwordBaru == '') {
        $errorPasswordBaru = 'Harap masukkan password baru';
        $valid = false;
    }

    if ($valid) {
        if ($loggedUser->password !== md5($passwordLama)) {
            $valid = false;
            $errorPasswordLama = 'Password lama salah.';
        }

        if ($valid) {
            $md5 = md5($passwordBaru);
            $query = "UPDATE tb_user SET password='$md5' WHERE id_user='$loggedUser->id_user'";
            if (mysqli_query($link, $query)) {
                $_SESSION["ses_password"] = $md5;
                echo "<script>Swal.fire({title: 'Password berhasil diperbarui',text: '',icon: 'success',confirmButtonText: 'OK'}).then((result) => {if (result.value){window.location = 'index.php?page=profile';}})</script>";
            } else {
                echo "<script>Swal.fire({title: 'Gagal memperbarui password',text: '',icon: 'error',confirmButtonText: 'OK'}).then((result) => {if (result.value){window.location = 'index.php?page=profile.edit';}})</script>";
            }
        }
    }
}

?>
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card shadow">
            <div class="card-header bg-success">
                <h5 class="mb-0">Ubah Password</h5>
            </div>
            <div class="card-body">
                <form action="?page=profile.ubah-password" method="POST">
                    <div class="mb-3">
                        <label for="password-lama" class="form-label">Password Lama</label>
                        <input type="password" name="password-lama" id="password-lama" class="form-control <?= ($errorPasswordLama != '') ? 'is-invalid' : '' ?>">
                        <small class="text-danger"><?= $errorPasswordLama ?></small>
                    </div>
                    <div class="mb-3">
                        <label for="password-baru" class="form-label">Password Baru</label>
                        <input type="password" name="password-baru" id="password-baru" class="form-control <?= ($errorPasswordBaru != '') ? 'is-invalid' : '' ?>">
                        <small class="text-danger"><?= $errorPasswordBaru ?></small>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="?page=profile" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>