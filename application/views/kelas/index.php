<div class="content-wrapper">

    <?= $navbar ?>
    <?= $sidebar ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
              Kelas Siswa
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><i class="fas fa-school"></i> Kelas</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-school"></i>
                  Kelas Saya
                </h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <?php if ($kelas) { ?>
                  <?php foreach ($kelas as $item) { ?>
                  <div class="col-md-4">
                    <a href="<?= base_url() ?>kelas/<?= $item->id_kelas ?>">
                      <div class="card card-primary">
                        <div class="card-header">
                          <h5><?= $item->nama_mata_pelajaran ?></h5>
                        </div>
                        <div class="card-body">
                          <p>Guru : <?= $item->nama_guru ?></p>
                        </div>
                      </div>
                    </a>
                  </div>
                  <?php } ?>
                  <?php } else { ?>
                  <div class="col-md-12">
                    <h3 class="text-center">Belum ada kelas</h3>
                  </div>
                  <?php } ?>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- ./row -->
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-plus"></i>
              Tambah Kelas
            </h3>
          </div>
          <div class="card-body">
            <form action="<?= base_url() ?>kelas/tambah" method="post">
              <div class="row">
                <div class="col-sm-2">
                  <div class="form-group">
                    <label for="kode">Masukkan kode</label>
                  </div>
                </div>
                <div class="col-sm-8">
                  <div class="form-group">
                    <input type="text" name="kode" id="kode" class="form-control"/>
                  </div>
                  <?= $this->session->flashdata('message'); ?>
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    <input type="submit" value="Tambah Kelas" class="form-control btn btn-success">
                  </div>
                </div>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>