<!DOCTYPE html>
<html>
<head>
    <title> Daftar Karyawan </title>
</head>
<body>
    <table border="1px solid black">
        <tr>
            <th>id</th>
            <th>nama</th>
            <th>alamat</th>
            <th>divisi</th>
            <th>jabatan</th>
        </tr>
   
            <?php foreach ($user as $u) : ?>
                <tr>
                    <td><?php echo $u['id']; ?></td>
                    <td><?php echo $u['nama']; ?></td>
                    <td><?php echo $u['alamat']; ?></td>
                    <td><?php echo $u['divisi']; ?></td>
                    <td><?php echo $u['jabatan']; ?></td>
                </tr>
            <?php endforeach; ?>
    </table>
</body>
</html>