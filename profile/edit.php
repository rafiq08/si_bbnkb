<?php

$id_user = $_SESSION["ses_id"];
$query = "SELECT * FROM tb_user WHERE id_user=$id_user";
$userQuery = mysqli_query($link, $query);
$loggedUser = mysqli_fetch_object($userQuery); // user yang sedang login

$errorNama = '';
$errorUsername = '';
$valid = true;

if (!empty($_POST)) {
    $nama = trim($_POST['nama']);
    $username = trim($_POST['username']);

    if ($nama == '') {
        $errorNama = 'Harap masukkan nama lengkap';
        $valid = false;
    }

    if ($username == '') {
        $errorUsername = 'Harap masukkan username';
        $valid = false;
    }

    if ($valid) {
        if ($username != $loggedUser->username) {
            $query = "SELECT * FROM tb_user WHERE username='$username'";
            $userQuery = mysqli_query($link, $query);
            $user = mysqli_fetch_object($userQuery);

            if ($user) {
                $errorUsername = 'Username sudah digunakan';
                $valid = false;
            }
        }

        if ($valid) {
            $query = "UPDATE tb_user SET nama='$nama', username='$username' WHERE id_user='$loggedUser->id_user'";
            if (mysqli_query($link, $query)) {
                $_SESSION["ses_nama"] = $nama;
                $_SESSION["ses_username"] = $username;
                echo "<script>Swal.fire({title: 'Profil berhasil diperbarui',text: '',icon: 'success',confirmButtonText: 'OK'}).then((result) => {if (result.value){window.location = 'index.php?page=profile';}})</script>";
            } else {
                echo "<script>Swal.fire({title: 'Gagal memperbarui profil',text: '',icon: 'error',confirmButtonText: 'OK'}).then((result) => {if (result.value){window.location = 'index.php?page=profile.edit';}})</script>";
            }
        }
    }
}

?>
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card shadow">
            <div class="card-header bg-success">
                <h5 class="mb-0">Edit Profil</h5>
            </div>
            <div class="card-body">
                <form action="?page=profile.edit" method="POST">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input value="<?= $loggedUser->nama ?>" type="text" name="nama" id="nama" class="form-control <?= ($errorNama != '') ? 'is-invalid' : '' ?>">
                        <small class="text-danger"><?= $errorNama ?></small>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input value="<?= $loggedUser->username ?>" type="text" name="username" id="username" class="form-control <?= ($errorUsername != '') ? 'is-invalid' : '' ?>">
                        <small class="text-danger"><?= $errorUsername ?></small>
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