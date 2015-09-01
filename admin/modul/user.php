<?php
error_reporting(0);
?>

<center>
    <div id="notif" align="center">
        <?php
        if($_GET['bsi']=='tambah'){
            echo"<div class=\"n_ok\"><p> Data Berhasil Ditambahkan ! </p></div>";
            echo "<meta http-equiv=\"refresh\" content=\"2; url=admin.php?p=user_l\">";
        }
 
        elseif($_GET['bsi']=='gagal'){
            echo"<div class=\"n_error\"><p>Data Tidak Berhasil Ditambahkan !</p></div>";
        }

        elseif($_GET['bsi']=='gagal_pass'){
            echo"<div class=\"n_error\"><p>Ulang Kata Sandi Tidak Sama !</p></div>";
        }
        ?>
    </div>
</center>
<h3 id="adduser"> <a href="user.php" class="useradd"> Add User </a></h3><hr>
    <form id="form" action="admin.php?p=user_t" method="post" enctype="multipart/form-data">
        <fieldset id="personal">
            <legend>USER INFORMATION</legend>
            <label>Nama Lengkap : </label>
            <input name="namalengkap" id="namalengkap" type="text" tabindex="2" />
            <br />
            <label>Nama User : </label>
            <input name="username" id="username" type="text" tabindex="2" />
            <br />
            <label>Kata Sandi : </label>
            <input name="password" id="password" type="password" tabindex="2" />
            <br />
            <label>Ulang Kata Sandi : </label>
            <input name="password2" id="password" type="password" tabindex="2" />
            <br />
            <label>Email : </label>
            <input name="email" id="email" type="text" tabindex="2" />
            <br />
            <label>Level : </label>
            <select name="level">
                <option value=""> --Select Level-- </option>
                <option value="All-Privileges"> All Privileges </option>
                <option value="User"> User </option>
            </select>
            <br />
            <label>Blokir : </label>
            <input name="blokir" id="blokir" type="radio" value="N" tabindex="2" checked /> N <input name="blokir" id="blokir" type="radio" value="Y" tabindex="2" /> Y
            <br />
        </fieldset>
        <div align="center">
            <input name="proses" id="button1" type="submit" value="Send" onclick='editor.post();' />
            <input id="button2" type="reset" />
        </div>
    </form>