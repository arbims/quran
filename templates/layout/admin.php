<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= 'Administration|CodeArt' ?></title>

  <!-- Custom fonts for this template-->
  <?php echo $this->Html->css('../admin/css/all.min.css') ?>
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <?php echo $this->Html->css('../admin/css/sb-admin-2.min.css') ?>
  <?php echo $this->Html->css('../admin/css/style.css') ?>
  <?php echo $this->Html->css('../admin/css/basic.min.css') ?>
  <?php echo $this->Html->css('../admin/css/dropzone.min.css') ?>
  <?= $this->Html->css('../admin/css/jqueryui.min.css') ?>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body id="page-top" ndata-turbolinks="false">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php echo $this->element('admin/sidebar') ?>

    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php echo $this->element('admin/navbar') ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <?= $this->Flash->render() ?>
          <?= $this->fetch('content') ?>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->

      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright &copy; Codeart 2022</span>
      </div>
    </div>
  </footer>
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Voulez vous deconnecter ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">La session admin va etre fermer </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Anuller</button>
          <a class="btn btn-primary" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'logout', 'prefix' => false]) ?>">Deconnexion</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <?php echo $this->Html->script('../admin/js/jquery.min.js') ?>
  <?php echo $this->Html->script('../admin/js/jqueryui.min.js') ?>
  <?php echo $this->Html->script('../admin/js/bootstrap.bundle.min.js') ?>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
  <!-- Core plugin JavaScript-->
  <?php echo $this->Html->script('../admin/js/jquery.easing.min.js') ?>
  <!-- Custom scripts for all pages-->
  <?php echo $this->Html->script('../admin/js/sb-admin-2.min.js') ?>
  <?php echo $this->Html->script('../admin/js/datatables/jquery.dataTables.min.js') ?>
  <?php echo $this->Html->script('../admin/js/datatables/dataTables.bootstrap4.min.js') ?>
  <?php echo $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/dropzone/6.0.0-beta.2/dropzone-min.js') ?>
  <?php echo $this->Html->script('../admin/js/app.js') ?>

  <?php echo $this->fetch('script') ?>
</body>

</html>