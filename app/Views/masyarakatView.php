<?=$this->extend('layouts/admin')?>
<?=$this->section('judul')?>
Masyarakat
<?=$this->endSection()?>
<?=$this->section('content')?>
<div class="row">
    <div class="col-lg-8 col-md-10">
        <div class="card">
            <div class="card-header">
                <h3>Data Masyarakat</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama Lengkap</th>
                            <th>Username</th>
                            <th>Telp</th>
                            <th>Blokir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 0;
                            foreach($masyarakat as $row){
                                $no++;
                                ?>
                                <tr>
                                    <td><?=$no?></td>
                                    <td><?=$row['nik']?></td>
                                    <td><?=$row['nama']?></td>
                                    <td><?=$row['username']?></td>
                                    <td><?=$row['telp']?></td>
                                    <td>
                                        <a onclick="return confirm('Yakin akan memblokir data?')" href="/masy/blokir/<?=$row['nik']?>" class="btn btn-danger"><i class="fas fa-trash"></i> Blokir</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?=$this->endSection()?>