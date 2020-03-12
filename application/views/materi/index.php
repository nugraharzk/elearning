<div class="content-wrapper">

    <?= $navbar ?>
    <?= $sidebar ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
              Materi Siswa
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url() ?>kelas"><i class="fas fa-school"></i> Kelas</a></li>
              <li class="breadcrumb-item active"><i class="fas fa-book"></i> <?= $bab->nama_mata_pelajaran ? $bab->nama_mata_pelajaran : "" ?>
              <li class="breadcrumb-item active"><i class="fas fa-book"></i> <?= $bab->nama_bab_pelajaran ? $bab->nama_bab_pelajaran : "" ?></li>
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
              <?php if ($materi != null) { ?>
              <div class="card-header">
                <div class="row">
                  <div class="col-lg-4 my-auto">
                    <h3 class="card-title">
                      <i class="fas fa-book"></i>
                      <?= $bab->nama_mata_pelajaran ?> - <?= $bab->nama_bab_pelajaran ?>
                    </h3>
                  </div>
                  <div class="col-lg-8 text-right">
                    <?php if($materi->jenis_materi == 1) { ?>
                    <a href="<?= base_url() ?>materi/<?= $materi->id_bab_pelajaran ?>/2" class="btn btn-danger">Video</a>
                    <?php } else if ($materi->jenis_materi == 2) { ?>
                    <a href="<?= base_url() ?>materi/<?= $materi->id_bab_pelajaran ?>/1" class="btn btn-success">Teks</a>
                    <?php } ?>
                    <a href="#" class="btn btn-primary" disabled>Audio</a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 p-3">
                    <?php if ($materi->jenis_materi == 1) { ?>
                    <p>
                      <?= $materi->materi ?>
                    </p>
                    <?php } else if ($materi->jenis_materi == 2) { ?>
                    <div class="container">
                      <div class="text-center">
                        <video controls width="900" src="<?= base_url() . 'video/' . $materi->path ?>"/>
                      </div>
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
              <?php } else { ?>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 p-3">
                    <h4>Belum ada materi</h4> <br/>
                    <a href=""></a>
                  </div>
                </div>
              </div>
              <?php } ?>
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