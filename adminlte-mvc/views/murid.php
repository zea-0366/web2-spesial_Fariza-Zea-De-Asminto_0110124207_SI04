<div class="container-fluid">
  <div class="card">
    <div class="card-body">
         <button type="button" class="btn btn-warning btn-sm" data-toogle="modal" data-target="#tambah">Tambah</button>

         <div class="modal fade" id ="tambahData">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Edit Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&time;</span>
                </button>
              </div>
            </div>
          </div>
         </div>
            
          <!-- /.modal-content -->
        </div>
      <div class="table-responsive">
        <table id="example1" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Created at</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require_once('Controllers/Student.php');
            $no = 1;
            foreach ($student->index() as $item): 
            ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $item['name'] ?></td>
              <td><?= $item['email'] ?></td>
              <td><?= date('d F Y', strtotime ($item['created_at'] )) ?></td>
              <td class="d-flex">
                 <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $item['id'] ?>">
                  edit
                </button>
                 <div class="modal fade" id="edit<?= $item['id'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="post">
              <div class="modal-body">
                <div class="from-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" id="name" class="form-control" required>
                  <input type="hidden" name="id" value="<?= $item['id']?>">
                </div>
               <div class="from-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" id="email" class="form-control" required>
                </div>
              </div>
             <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" name="tipe" value="edit"class="btn btn-primary">Save changes</input>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
                <form method="post">
                  <input type="hidden" name="id" value="<?= $item['id'] ?>">
                  <input type="submit" value="delete" name="tipe" class="btn btn-danger btn-sm">
                </form>
              </td>
            </tr>
            <?php
            
          endforeach;
           if (isset($_REQUEST['tipe'])) {
              if ($_POST['tipe'] == "delete") {
                $student->delete($_POST['id']);
                echo '<meta http-equiv="refresh" content="0; url=?=murid"><script>alert("data berhasil dihapus")</script>';
              } elseif ($_POST['tipe'] == "edit") {
                $data = $student->show($_POST['id']);
                $data = [
                  "name" => $_POST['name'],
                  "email" => $_POST['email'],
                ];
                $data = [
                  "name" => $_POST['name'],
                  "email" => $_POST['email'],
                ];
                
              }elseif ($_POST['tipe'] == "simpan") {
                $data = [
                  "name" => $_POST['name'],
                  "email" => $_POST['email'],
                  "created_at" => date('Y-m-d H:i:s'),
                ];
                $student->create($data);
                 echo '<meta http-equiv="refresh" content="0; url=?=murid"><script>alert("data berhasil simpan")</script>';
              }
            }
            ?>
          
          </tbody>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Created at</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>