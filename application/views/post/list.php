<!DOCTYPE html>
<html lang="en">
<head>
	<style>

			.pagination-container {
				display: flex;
				justify-content: center;
				margin-top: 20px;
			}

			.pagination {
				display: flex;
				list-style: none;
				padding: 0;
			}

			.pagination li {
				margin: 0 5px;
			}

			.pagination li a,
			.pagination li span {
				padding: 8px 12px;
				border-radius: 3px;
				text-decoration: none;
				color: #333;
			}

			.pagination li.active span {
				background-color: #337ab7;
				color: #fff;
			}

	</style>
	<?php $this->load->view('includes/header'); ?>
  	<title>CRUD-CodeIgniter</title>
</head>

<body>

<div class="container">
    <div class="row">
		<div class="col-lg-12 my-5">
        	<h2 class="text-center mb-3">Codeigniter CRUD Example</h2>
      	</div>

	<div class="col-lg-12">
		<?php echo $this->session->flashdata('message'); ?>

        <div class="d-flex justify-content-between mb-3">
        	<h4>Manage Posts</h4>
          	<a href="<?= base_url('post/create') ?>" class="btn btn-success"> <i class="fas fa-plus"></i> Add New Post</a>
        </div>
		<div class="mb-3">
            <input type="text" id="searchInput" class="form-control" placeholder="Search by title or description">
        </div>
            <div id="searchResults"></div>

        <table class="table table-bordered table-default">

        	<thead class="thead-light">
            	<tr>
            		<th width="2%">No.</th>
              		<th width="25%">Title</th>
              		<th width="53%">Description</th>
              		<th width="20%">Action</th>
            	</tr>
          	</thead>

        	<tbody>

            <?php $i = 1; foreach ($data as $post) { ?>

            	<tr>
                	<td><?php echo $i; ?></td>
                	<td><?php echo $post->title; ?></td>
                	<td><?php echo $post->description; ?></td>

                	<td>
                  		<a href="<?= base_url('post/edit/' . $post->id) ?>" class="btn-sm btn-primary"> <i class="fas fa-edit"></i> Edit </a> &nbsp
                  		<a href="<?= base_url('post/delete/' . $post->id) ?>" class="btn-sm btn-danger" onclick="return confirm('Are you sure want to delete this record?')"> <i class="fas fa-trash"></i> Delete </a>
                	</td>
              	</tr>

            <?php $i++; } ?>

          	</tbody>

        </table>

			<div class="pagination-container">
		<div class="pagination-box">
			<ul class="pagination">
				<?php if ($pagination): ?>
					<?php echo $pagination; ?>
				<?php endif; ?>
			</ul>
		</div>
		</div>


    	</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
var jq = $.noConflict();
jq(document).ready(function() {
    jq('#searchInput').keyup(function() {
        var searchValue = jq(this).val();
        jq.ajax({
            type: 'POST',
            url: '<?php echo base_url('post/search'); ?>', 
            data: { searchValue: searchValue },
            success: function(response) {
                jq('#searchResults').html(response);
            }
        });
    });
});
</script>



	<?php $this->load->view('includes/footer'); ?>

</body>

</html>