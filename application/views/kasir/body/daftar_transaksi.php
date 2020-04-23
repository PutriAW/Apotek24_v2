<div class="container">
<div class="box">
    <h2>Kasir > Data Transaksi</h2>
    <a href="<?php echo base_url()?>kasir"><button type="button" class="btn btn-primary">Kembali</button></a>
    <br><br>
    <table class="table table-bordered" id="table">
    	<thead>
    		<tr>
    			<th>ID Trnsaksi</th>
          <th>Tanggal</th>
    			<th>Item Obat</th>
    			<th>Total Harga</th>
          <th>edit</th>
          <th>hapus</th>
    		</tr>
    	</thead>
    	<tbody>
    		<?php foreach ($transaksi as $row){ ?>
    		<tr>
          <td><?php echo $row->id_transaksi?></td>
          <td><?php echo $row->tanggal_transaksi?></td>
          <?php 
            $x = $row->data_transaksi;
            $str_arr = explode (",", $x);
            $item = [];
            $harga = [];
            $jum = [];
            $it = 1;
            while($it <= sizeof($str_arr)) {
                $hr = $it+1;
                $jm = $hr+1;
                array_push($item, $str_arr[$it]);
                array_push($harga, $str_arr[$hr]);
                array_push($jum, $str_arr[$jm]);
                $it = $it + 4;
            }
          ?>
          <td>
            <table class="table table-bordered" id="table">
              <?php $i = 0?>
              <?php foreach ($item as $kow){ ?>
              <tr>
                <td><?php echo $item[$i]?></td>
                <td><?php echo $harga[$i]?></td>
                <td><?php echo $jum[$i]?></td>
                <?php $i++?>
              </tr>
              <?php }?>
            </table>
          </td>
          <td><?php echo $row->total?></td>
          <td>
            <a type="button" class="btn btn-warning"  href="<?= base_url('Kasir/edit_tr/').$row->id_transaksi?>"><button type="button" class="btn btn-warning"><i class="fas fa-user-edit"></i></button></a>
          </td>
          <td><a type="button" class="btn btn-danger"  href="<?= base_url('Kasir/delete_dat_transaksi/').$row->id_transaksi?>" onClick="return confirm('Apakah Anda Yakin?')" ><i class="fas fa-user-times"></i></a></td>
        </tr>
        <?php }?>
      </tbody>
    </table>
</div>
</div>
