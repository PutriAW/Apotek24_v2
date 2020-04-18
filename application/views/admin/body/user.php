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
            <form action="">
              <td><?php echo $no++ ?></td>
              <td><?php echo $d->nama?></td>
              <td><?php echo $d->username ?></td>
              <td><?php echo $d->jenis_kelamin ?></td>
              <td><?php echo $d->tempat_lahir ?></td>
              <td><?php echo $d->tgl_lahir ?></td>
              <td><?php echo $d->alamat ?></td>
              <td><?php echo $d->no_hp ?></td>
              <td><?php echo $d->access ?> <span class="fas fa-user-edit"></span></td>
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
