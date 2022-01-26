<div class="row">
  <div class="col-lg-6 mx-auto">
    <div class="card">
      <div class="card-body">
        <form action="report/jenis_pelayanan/cetak_jenis_pelayanan.php" method="GET">
          <div class="mb-3">
            <label for="filter" class="form-label">Filter</label>
            <input type="text" id="filter" class="form-control">
            <input type="hidden" name="start">
            <input type="hidden" name="end">
          </div>
          <div class="text-end">
            <button type="submit" class="btn btn-success">Cetak</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>