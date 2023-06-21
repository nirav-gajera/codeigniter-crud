<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('includes/header'); ?>
  <title>Add New Post</title>
</head>

<body>

  <div class="container">
    <div class="row">

      <div class="col-lg-12 my-5">
        <h2 class="text-center mb-3">CRUD Example</h2>
      </div>

      <div class="col-lg-12">

        <div class="d-flex justify-content-between ">
          <h4>Add New Post</h4> 
          <a class="btn btn-warning" href="<?php echo base_url(); ?>"> <i class="fas fa-angle-left"></i> Back</a>
        </div>

        <form method="post" action="<?php echo base_url('post/store'); ?>" enctype="multipart/form-data">

          <div class="form-group">
            <label>Title</label>
            <input class="form-control" type="text" name="title">
          </div>

          <!-- <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control-file">
          </div> -->

          <div class="form-group">
            <label>Description</label>
            <textarea class="form-control"  rows="5" name="description"></textarea>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-success"> <i class="fas fa-check"></i> Submit </button>
          </div>

        </form>


      </div>
    </div>
  </div>



  <?php $this->load->view('includes/footer'); ?>

</body>

</html>