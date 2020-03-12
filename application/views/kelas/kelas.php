<div class="content-wrapper">

    <?= $navbar ?>
    <?= $sidebar ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
              Kelas
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('kelas') ?>"><i class="fas fa-school"></i> Kelas</a></li>
              <li class="breadcrumb-item active"><i class="fas fa-book"></i> <?= $kelas->nama_mata_pelajaran ?></li>
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
                  <i class="fas fa-book"></i>
                  <?= $kelas->nama_mata_pelajaran ?> | Guru : <i class="fas fa-teacher"></i><?= $kelas->nama_guru ?>
                </h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <?php if ($bab) { ?>
                  <?php foreach ($bab as $item) { ?>
                  <div class="col-md-12">
                    <a href="<?= base_url() ?>materi/<?= $item->id_bab_pelajaran ?>/1">
                      <div class="card card-success">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                          <h5><?= $item->nama_bab_pelajaran ?></h5>
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
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>