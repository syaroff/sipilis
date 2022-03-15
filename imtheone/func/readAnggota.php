<?php

    require_once "../config/konek.php";
    $batas = 10;
    $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
    $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	

    $previous = $halaman - 1;
    $next = $halaman + 1;

    $data = mysqli_query($konek,"SELECT * FROM anggota");
    $jumlah_data = mysqli_num_rows($data);
    $total_halaman = ceil($jumlah_data / $batas);
    if(!@$_GET['s']) {
        $data2 = $konek->query("SELECT * FROM anggota ORDER BY nama_anggota ASC LIMIT $halaman_awal, $batas");
        $nomor = $halaman_awal+1;
        $no=1;
        foreach($data2 as $row) {
?>
            <tr>
                <td><?=$no++?></td>
                <td><?=$row['id_anggota']?></td>
                <td><?=$row['username']?></td>
                <td><?=$row['nama_anggota']?></td>
                <td><?=$row['kelas']?></td>
                <td><?=$row['no_hp']?></td>
                <td>
                    <button onclick="edit('<?=$row['id_anggota']?>','<?=$row['username']?>','<?=$row['nama_anggota']?>','<?=$row['kelas']?>','<?=$row['no_hp']?>')" class="btn btn-info btn-sm"><i class="fas fa-pen"></i></button>
                    <a href="./func/anggota.php?d=<?=$row['id_anggota']?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
<?php
        }
    }
    else if(@$_GET['s']) {
        $data2 = $konek->query("SELECT * FROM anggota WHERE id_anggota LIKE '%$_GET[s]%' OR nama_anggota LIKE '%$_GET[s]%' OR kelas LIKE '%$_GET[s]%' OR username LIKE '%$_GET[s]%' ORDER BY nama_anggota ASC LIMIT $halaman_awal, $batas");
        $nomor = $halaman_awal+1;
        $no=1;
        foreach($data2 as $row) {
?>
            <tr>
                <td><?=$no++?></td>
                <td><?=$row['id_anggota']?></td>
                <td><?=$row['username']?></td>
                <td><?=$row['nama_anggota']?></td>
                <td><?=$row['kelas']?></td>
                <td><?=$row['no_hp']?></td>
                <td>
                    <button onclick="edit('<?=$row['id_anggota']?>','<?=$row['username']?>','<?=$row['nama_anggota']?>','<?=$row['kelas']?>','<?=$row['no_hp']?>')" class="btn btn-info btn-sm"><i class="fas fa-pen"></i></button>
                    <a href="./func/anggota.php?d=<?=$row['id_anggota']?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
<?php
        }
    }

?>