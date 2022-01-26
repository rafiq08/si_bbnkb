<?php

$id_user = $_SESSION["ses_id"];

$query = "SELECT * FROM tb_user WHERE id_user=$id_user";

$userQuery = mysqli_query($link, $query);

$user = mysqli_fetch_object($userQuery);

?>
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card shadow">
            <div class="card-body">
                <div class="py-5 px-3 text-center bg-info mb-3">
                    <h4 class="mb-0"><?= $user->nama ?></h4>
                </div>
                <div class="card border-lg">
                    <div class="card-body">
                        <table class="table mb-3">
                            <tr>
                                <td>Nama Lengkap</td>
                                <td>:</td>
                                <td><?= $user->nama ?></td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td>:</td>
                                <td><?= $user->username ?></td>
                            </tr>
                            <tr>
                                <td>Level</td>
                                <td>:</td>
                                <td><?= $user->level ?></td>
                            </tr>
                        </table>
                        <div class="text-center">
                            <a href="?page=profile.edit" class="btn btn-primary">Edit Profil</a>
                            <a href="?page=profile.ubah-password" class="btn btn-primary">Ubah Password</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>