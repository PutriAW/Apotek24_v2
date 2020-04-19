<div class="container">
    <div class="box">
      <h2>Data Obat</h2>
          
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#btnTambah">TAMBAH ACCOUNT</button>
      <br><br>
      <table class="table table-bordered" id="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Access</th>
            <th>Edit</th>
            <th>Hapus</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; foreach ($data as $d ) {?>
          <tr>
              <td><?php echo $no++ ?></td>
              <td><?php echo $d->nama?></td>
              <td><?php echo $d->username ?></td>
              <td><?php echo $d->jenis_kelamin ?></td>
              <td><?php echo $d->tempat_lahir ?></td>
              <td><?php echo $d->tgl_lahir ?></td>
              <td><?php echo $d->alamat ?></td>
              <td><?php echo $d->no_hp ?></td>
              <td>
                <?php
                  if($d->access != ""){
                    echo $d->access;
                  }else{ ?>
                    <button class="btn btn-info" data-toggle="modal" data-target="#btnTambah<?= $d->id_user ?>"><span class="fas fa-plus"></span></button>
                    
                    <!-- Modal Tambah Obat -->
                    <div class="modal fade" id="btnTambah<?= $d->id_user ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                          <center><h2>Add Access for <?= $d->nama ?></h2></center>
                          </div>
                          <div class="modal-body">
                          <form method="POST" action="<?= base_url() ?>admin/add_access">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Access</label>
                                <select name="access" id="" class="form-control">
                                  <option value="admin">Admin</option>
                                  <option value="pendata">Pendata</option>
                                  <option value="apoteker">Apoteker</option>
                                  <option value="kasir">Kasir</option>
                                </select>
                                <input type="hidden" value="<?= $d->id_user ?>" name="id">
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <input  type="submit" class="btn btn-primary" id="hapus" value="Submit" placeholder="Simpan">
                          </form>
                          </div>
                        </div>
                      </div>
                    </div>

                  <?php } ?>
              </td>
              <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?php echo $d->id_user ?>"><i class="fas fa-user-edit"></i></button></td>
              <td><a type="button" class="btn btn-danger"  href="<?= base_url('index.php/Pendata/deleteObat/').$d->id_user ?>" onClick="return confirm('Apakah Anda Yakin?')" ><i class="fas fa-user-times"></i></a></td>
            </form>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

</body>
  <script type="text/javascript">
    $(document).ready( function () {
        $('#table').DataTable();
    } );
  </script>
</html>
