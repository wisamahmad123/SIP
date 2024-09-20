<section class="content-header">
  <div class="content-header-left">
    <h1>Manajemen Survey</h1>
  </div>
  <div class="content-header-right">
    <a href="add-kategori.php" class="btn btn-success btn-sm"
      style="background-color: #28a745; border-color: #28a745;">+
      Tambah Kategori</a>
  </div>

</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
        <div class="box-body table-responsive">
          <table id="example1" class="table table-bordered table-hover table-striped">
            <thead class="thead-dark">
              <tr>
                <th width="10">No.</th>
                <th width="60">Sasaran</th>

                <th width="80">Pengaturan</th>
              </tr>
            </thead>
            <tbody>
              <?php
							$products = [
								[
									'p_id' => 1,
									'p_name' => 'Lingkungan Kerja dan Pengembangan Profesional
                  ',
								],
								[
									'p_id' => 2,
									'p_name' => 'Kategori Kesejahteraan/Gaji',
								],
							];

							$i = 0;
							foreach ($products as $row) {
								$i++;
								?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['p_name']; ?></td>
                <td>
                  <a href="add-pertanyaan.php" class="btn btn-success btn-xs">Tambah Pertanyaan</a>
                  <a href="" class="btn btn-success btn-xs">Edit</a>
                  <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#confirm-delete">Hapus</a>
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
</section>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure want to delete this item?</p>
        <p style="color:red;">Be careful! This product will be deleted from the order table, payment table, size table,
          color table and rating table also.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <a class="btn btn-danger btn-ok">Delete</a>
      </div>
    </div>
  </div>
</div>