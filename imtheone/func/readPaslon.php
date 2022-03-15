<?php

    if(!@$_GET['s']) {
        $no=1;
        $data = $konek->query("SELECT * FROM paslon");
        foreach($data as $row) {
?>
            <tr>
                <td><?=$no++?></td>
                <td><?=$row['id_paslon']?></td>
                <td class="text-left">
                    <img src="../assets/img/<?=$row['foto']?>" alt="foto_paslon" class="img-fluid" style="width: 8rem;">
                </td>
                <td ><?=$row['nama_paslon']?></td>
                <td>
                    <textarea id="visi-data" cols="30" rows="5" class="form-control" disabled><?=$row['visi']?></textarea>
                </td>
                <td>
                    <textarea id="visi-data" cols="30" rows="5" class="form-control" disabled><?=$row['misi']?></textarea>
                </td>
                <td>
                    <button onclick="edit('<?=$row['id_anggota']?>','<?=$row['username']?>','<?=$row['nama_anggota']?>','<?=$row['kelas']?>','<?=$row['no_hp']?>')" class="btn btn-info btn-sm"><i class="fas fa-pen"></i></button>
                    <a href="./func/anggota.php?d=<?=$row['id_anggota']?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
<?php
 
        }
    }

?>