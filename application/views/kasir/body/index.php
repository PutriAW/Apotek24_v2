<div class="container">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<div class="box">
		<h2>KASIR</h2>
		<br><br>
		<div class="row">
			<div class="col-sm-8">
        <center><h4>PILIHAN OBAT</h4></center>
				<table class="table table-bordered" id="table">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Obat</th>
							<th>Harga</th>
							<th>Option</th>
						</tr>
					</thead>
					<tbody>
					<script>
						var total = 0;
						var data = [];
						var dataobat = [];
					</script>
						<?php $no=1; foreach ($data as $d ) {?>
						<tr>
							<th><?php echo $no++ ?></th>
							<th><?php echo $d->nama_obat ?></th>
							<th><?php echo $d->harga ?></th>
              <th><button id="buat<?php echo $no ?>" type="button" class="btn btn-success" data-target="#btnTambah">Tambah</button>
              <div style="display:none" id="option<?php echo $no ?>">
              <button id="tambah<?php echo $no ?>" type="button" class="btn btn-success" data-target="#btnTambah">+</button><button id="kurang<?php echo $no ?>"
									style="margin-left : 5px;" type="button" class="btn btn-danger" data-target="#btnTambah">-</button></div>
							</th>
            </tr>
            <script type="text/javascript">
              $(document).ready(function(){
                var jumlah<?php echo $no ?>;
                //membuat data di tabel pembelian
                $("#buat<?php echo $no ?>").click(function(){
					jumlah<?php echo $no ?> = 1;
                  console.log("haha")
                  $("#datapembelian").append("<tr id='nama<?php echo $no ?>'><td><?php echo $d->nama_obat ?></td><td id='jumlah<?php echo $no ?>'>"+jumlah<?php echo $no ?>+"</td><td id='total<?php echo $no ?>'><?php echo $d->harga ?></td></tr>");
                  $("#buat<?php echo $no ?>").css("display","none");
                  $("#option<?php echo $no ?>").css("display","block");
				  dataobat = ["<?php echo $d->id_obat ?>","<?php echo $d->nama_obat ?>","<?php echo $d->harga ?>",jumlah<?php echo $no ?>];
                  data.push(dataobat);
				  total = total + <?php echo $d->harga ?>;
				  $("#makmintotal").text(total);
				  console.log(data)
                })
                $("#tambah<?php echo $no ?>").click(function(){
                  console.log("haha")
                  jumlah<?php echo $no ?>++;
                  total = total + <?php echo $d->harga ?>;
				  i = 0;
                  while (data[i][1] != "<?php echo $d->nama_obat ?>") {
                    i++;
                  }
                  data[i].pop();
                  data[i].push(jumlah<?php echo $no ?>);
				  console.log(data);
				  $("#jumlah<?php echo $no ?>").text(jumlah<?php echo $no ?>);
				  $("#makmintotal").text(total);
                })
				$("#kurang<?php echo $no ?>").click(function(){
                  jumlah<?php echo $no ?>--;				  
                  total = total - <?php echo $d->harga ?>;
				  i = 0;
				  while (data[i][1] != "<?php echo $d->nama_obat ?>") {
                    i++;
                  }
                  data[i].pop();
                  data[i].push(jumlah<?php echo $no ?>);
				  if (jumlah<?php echo $no ?> == 0) {
					i = 0;
					while (data[i][1] != "<?php echo $d->nama_obat ?>") {
                        i++;
                    }
                    data.splice(i,1);
					console.log(data);
					$("#buat<?php echo $no ?>").css("display","block");
                    $("#option<?php echo $no ?>").css("display","none");
					$("#nama<?php echo $no ?>").remove();						  
				  }
				  console.log(data);
				  $("#jumlah<?php echo $no ?>").text(jumlah<?php echo $no ?>);
				  $("#makmintotal").text(total);
                })
                

              })
            </script>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<div class="col-sm-4">
        		<center><h4>PEMBELIAN</h4></center>
      			<table class="table table-bordered" id="table">
					<thead>
						<tr>
							<th>Nama Obat</th>
							<th>Jumlah</th>
							<th>Harga</th>
						</tr>
					</thead>
					<tbody id="datapembelian">
						
					</tbody>
        		</table>
        		<p>TOTAL :  <a style="margin-left:65%" id="makmintotal"></a></p>
        		<form id="myForm" method="post" action="<?= base_url('index.php/Kasir/createtransaksi') ?>">
			  		<input style="display:none" id="kirimdata" type="text" name="data">
					  <input style="display:none" id="totalharga" type="text" name="total">
			  		<button onclick="formFunction()" style="width:100%;" type="button" class="btn btn-primary" data-target="#btnTambah">BAYAR</button>
				</form>
			</div>	
		</div>
		<script type="text/javascript">
		function formFunction() {
                    $("#kirimdata").val(data);
					$("#totalharga").val(total);
					var r = confirm("Anda yakin menyelesaikan transaksi ?");
					if (r == true) {
						document.getElementById("myForm").submit();
					} 					
			}
		</script>
	</div>
</div>
</div>
