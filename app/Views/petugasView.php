<?=$this->extend('layouts/admin')?>
<?=$this->section('judul')?>
Petugas
<?=$this->endSection()?>
<?=$this->section('content')?>
<div class="row">
    <div class="col-lg-8 col-md-10">
        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary" data-toggle="modal" data-target="#tambah-data">
                    <i class="fas fa-plus"></i> Tambah Data
                </button>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Petugas</th>
                            <th>Username</th>
                            <th>Telp</th>
                            <th>Level</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 0;
                            foreach($petugas as $row){
                                $no++;
                                ?>
                                <tr>
                                    <td><?=$no?></td>
                                    <td><?=$row['nama_petugas']?></td>
                                    <td><?=$row['username']?></td>
                                    <td><?=$row['telp']?></td>
                                    <td><?=$row['level']?></td>
                                    <td>
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#edit-petugas<?=$row['id_petugas']?>">
                                        <i class="fas fa-edit"></i> Edit
                                        </button>
                                    </td>
                                    <td>
                                        <a onclick="return confirm('Yakin akan menghapus data?')" href="/petugas/hapus/<?=$row['id_petugas']?>" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="edit-petugas<?=$row['id_petugas']?>">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h4 class="modal-title">Edit Data Petugas</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <form action="/petugas/edit/<?=$row['id_petugas']?>" method="post">
                                            <div class="modal-body">
                                            <div class="form-group">
                                                <label for="">Nama Petugas</label>
                                                <input type="text" name="nama_petugas" class="form-control" value="<?=$row['nama_petugas']?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Username</label>
                                                <input type="text" name="username" class="form-control" value="<?=$row['username']?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Password</label>
                                                <input type="text" name="password" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Telepon</label>
                                                <input type="text" name="telp" class="form-control" value="<?=$row['telp']?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Level</label>
                                                <select name="level" class="form-control">
                                                    <option value="">==pilih level==</option>
                                                    <option value="admin" <?=$row['nama_petugas']=='admin'?'selected':''?>>Admin</option>
                                                    <option value="petugas" <?=$row['nama_petugas']=='petugas'?'selected':''?>>Petugas</option>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save changes</button>
                                            </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                        <!-- /.modal-dialog -->
                                </div>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="tambah-data">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data Petugas</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="/petugas" method="post">
            <div class="modal-body">
              <div class="form-group">
                <label for="">Nama Petugas</label>
                <input type="text" name="nama_petugas" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="username" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Password</label>
                <input type="text" name="password" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Telepon</label>
                <input type="text" name="telp" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Level</label>
                <select name="level" class="form-control">
                    <option value="">==pilih level==</option>
                    <option value="admin">Admin</option>
                    <option value="petugas">Petugas</option>
                </select>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save changes</button>
            </div>
            </form>
        </div>
          <!-- /.modal-content -->
    </div>
        <!-- /.modal-dialog -->
</div>
<?=$this->endSection()?>