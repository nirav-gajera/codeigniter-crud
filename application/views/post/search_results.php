<?php if (!empty($data)) { ?>
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
            <?php $i = 1;
            foreach ($data as $post) { ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $post->title; ?></td>
                    <td><?php echo $post->description; ?></td>
                    <td>
                        <a href="<?= base_url('post/edit/' . $post->id) ?>" class="btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a> &nbsp
                        <a href="<?= base_url('post/delete/' . $post->id) ?>" class="btn-sm btn-danger" onclick="return confirm('Are you sure want to delete this record?')"><i class="fas fa-trash"></i> Delete</a>
                    </td>
                </tr>
            <?php $i++;
            } ?>
        </tbody>
    </table>
<?php } else { ?>
    <div class="alert alert-info">No results found.</div>
<?php } ?>
