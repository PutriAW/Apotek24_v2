<div class="container">
    <div class="box">
      <h2>Data Obat</h2>
          
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#btnTambahResep">TAMBAH RESEP</button>
      <br><br>
      <table class="table table-bordered" id="table">
        <thead>
          <tr>
            <th>No</th>
            <th>ID Resep</th>
            <th>ID User</th>
            <th>Tanggal</th>
            <th>Deskripsi</th>
            <th>Edit</th>
            <th>Hapus</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; foreach ($data as $d ) {?>
          <tr>
            <form action="">
              <td><?php echo $no++ ?></td>
              <td><?php echo $d->id_resep?></td>
              <td><?php echo $d->id_user ?></td>
              <td><?php echo $d->tgl_resep ?></td>
              <td><?php echo $d->deskripsi ?></td>
              <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?php echo $d->id_resep ?>"><i class="fas fa-user-edit"></i></button></td>
              <td><a type="button" class="btn btn-danger"  href="<?= base_url('index.php/Apoteker/deleteResep/').$d->id_resep ?>" onClick="return confirm('Apakah Anda Yakin?')" ><i class="fas fa-user-times"></i></a></td>
            </form>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

<!-- Modal Edit Resep -->

<?php $no=1; foreach ($data as $d ) {?>
  <div class="modal fade" id="edit<?php echo $d->id_resep ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h2>EDIT RESEP </h2>
        </div>
        <div class="modal-body">
        <form method="post" action="<?= base_url('index.php/Apoteker/updateResep') ?>">
        <input type="hidden" class="form-control" id="formGroupExampleInput" placeholder="ID Resep" name="id_resep" value="<?php echo $d->id_resep ?>"  required>
          <div class="form-group">
            <label for="formGroupExampleInput">ID User</label>
            <input type="number" class="form-control" id="formGroupExampleInput" placeholder="ID User" name="id_user"  value="<?php echo $d->id_user ?>" required>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Tanggal</label>
            <input type="date" class="form-control" id="formGroupExampleInput2" placeholder="Tanggal" name="tgl_resep" value="<?php echo $d->tgl_resep ?>" required>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Deskripsi</label>
              <div class="input-group mb-2">  
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Deskripsi" name="deskripsi" value="<?php echo $d->deskripsi ?>" required>
              </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <input  type="submit" class="btn btn-primary" id="hapus" value="Submit" placeholder="Simpan">
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<!-- Modal Tambah Resep -->
<div class="modal fade" id="btnTambahResep" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <center><h2>TAMBAH RESEP</h2></center>
      </div>
      <div class="modal-body">
      <form method="POST" action="<?= base_url('index.php/Apoteker/createResep') ?>">
        <div class="form-group">
          <label for="formGroupExampleInput">ID Resep</label>
          <input type="number" class="form-control" id="formGroupExampleInput" placeholder="ID Resep" name="id_resep" required >
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">ID User</label>
            <input type="number" class="form-control" id="formGroupExampleInput1" placeholder="ID User" name="id_user" required>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Tanggal</label>
            <input type="date" class="form-control" id="formGroupExampleInput2" placeholder="Tanggal" name="tgl_resep" required>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Deskripsi</label>
          <div class="input-group mb-2">  
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Deskripsi" name="deskripsi" required>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <input  type="submit" class="btn btn-primary" id="hapus" value="Submit" placeholder="Simpan">
        </div>  
      </form>
      </div>
    </div>
  </div>
</div>




</body>
  <script type="text/javascript">
    $(document).ready( function () {
        $('#table').DataTable();
    } );
  </script>
</html>
