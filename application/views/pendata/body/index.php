<div class="container">
    <div class="box">
      <h2>Data Obat</h2>
          
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#btnTambah">TAMBAH OBAT</button>
      <br><br>
      <table class="table table-bordered" id="table">
        <thead>
          <tr>
            <th>No</th>
            <th>ID Obat</th>
            <th>Nama Obat</th>
            <th>Jenis</th>
            <th>Dosis</th>
            <th>Expire Date</th>
            <th>Komposisi</th>
            <th>Indikasi</th>
            <th>Aturan Pakai</th>
            <th>Harga</th>
            <th>ID Supplier</th>
            <th>Edit</th>
            <th>Hapus</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; foreach ($data as $d ) {?>
          <tr>
        <!--HINT UNTUK MENGHAPUS USER KALIAN DAPAT MENGGUNAKAN FORM, MENGGUNAKAN ANCHOR ATAU HREF PADA BUTTON-->
            <form action="">
              <td><?php echo $no++ ?></td>
              <td><?php echo $d->id_obat?></td>
              <td><?php echo $d->nama_obat ?></td>
              <td><?php echo $d->jenis ?></td>
              <td><?php echo $d->dosis ?></td>
              <td><?php echo $d->expire_date ?></td>
              <td><?php echo $d->komposisi ?></td>
              <td><?php echo $d->indikasi ?></td>
              <td><?php echo $d->aturan_pakai ?></td>
              <td><?php echo $d->harga ?></td>
              <td><?php echo $d->id_supplier ?></td>

              <!--BUTTON EDIT MAHASISWA-->
              <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?php echo $d->id_obat ?>"><i class="fas fa-user-edit"></i></button></td>
              <!--BUTTON HAPUS --- ISI LENGKAPI BUTTON INI -->
              <td><a type="button" class="btn btn-danger"  href="<?= base_url('index.php/Pendata/deleteObat/').$d->id_obat ?>" onClick="return confirm('Apakah Anda Yakin?')" ><i class="fas fa-user-times"></i></a></td>
            </form>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

<!-- Modal Edit Mahasiswa -->

<?php $no=1; foreach ($data as $d ) {?>
  <div class="modal fade" id="edit<?php echo $d->id_obat ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <center><h2>EDIT DATA MAHASISWA </h2></center>
        </div>
        <div class="modal-body">
        <!-- isi form ini -->
        <form method="post" action="<?= base_url('index.php/Pendata/updateObat') ?>">
        <input type="hidden" class="form-control" id="formGroupExampleInput" placeholder="ID Obat" name="id_obat" value="<?php echo $d->id_obat ?>"  required>
          <div class="form-group">
            <label for="formGroupExampleInput">Nama Obat</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama Obat" name="nama_obat"  value="<?php echo $d->nama_obat ?>" required>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Jenis</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Jenis" name="jenis" value="<?php echo $d->jenis ?>" required>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Dosis</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Dosis" name="dosis" value="<?php echo $d->dosis ?>" required>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Expire Date</label>
            <input type="date" class="form-control" id="formGroupExampleInput2" placeholder="Expire Date" name="expire_date" value="<?php echo $d->expire_date ?>" required>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Komposisi</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Komposisi" name="komposisi" value="<?php echo $d->komposisi ?>" required>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Indikasi</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Indikasi" name="indikasi" value="<?php echo $d->indikasi ?>" required>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Aturan Pakai</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Aturan Pakai" name="aturan_pakai" value="<?php echo $d->aturan_pakai ?>" required>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Harga</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Rp.</div>
                    </div>
                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Harga" name="harga" value="<?php echo $d->harga ?>" required>
                </div>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">ID Supplier</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="ID Suplier" name="id_supplier" value="<?php echo $d->id_supplier ?>" required>
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
<?php } ?>

<!-- Modal Tambah Obat -->
<div class="modal fade" id="btnTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <center><h2>TAMBAH DATA OBAT</h2></center>
      </div>
      <div class="modal-body">
      <!-- isi form ini -->
      <form method="POST" action="<?= base_url('index.php/Pendata/createObat') ?>">
        <div class="form-group">
          <label for="formGroupExampleInput">ID Obat</label>
          <input type="number" class="form-control" id="formGroupExampleInput" placeholder="ID Obat" name="id_obat" required >
        </div>

        <div class="form-group">
            <label for="formGroupExampleInput">Nama Obat</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama Obat" name="nama_obat" required>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Jenis</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Jenis" name="jenis" required>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Dosis</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Dosis" name="dosis"  required>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Expire Date</label>
            <input type="date" class="form-control" id="formGroupExampleInput2" placeholder="Expire Date" name="expire_date" required>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Komposisi</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Komposisi" name="komposisi" required>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Indikasi</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Indikasi" name="indikasi" required>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Aturan Pakai</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Aturan Pakai" name="aturan_pakai" required>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Harga</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">Rp.</div>
                </div>
                <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="Harga" name="harga" required>
            </div>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">ID Supplier</label>
            <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="ID Suplier" name="id_supplier" required>
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




</body>
  <script type="text/javascript">
    $(document).ready( function () {
        $('#table').DataTable();
    } );
  </script>
</html>
