<div class="col-md-12">
    <p>
        <a href="<?php echo admin_url() ?>levels/create" class="btn btn-primary"><span class="fa fa-plus-circle"></span> Create New</a>
    </p>
    <?php if ($levels) : ?>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Class</th>
                    <th>Level</th>
                    <th>Description</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($levels as $l) : ?>
                    <tr>
                        <td><?php if ($l->parent_id) echo $l->parent_id; else echo '-' ?></td>
                        <td><?php echo $l->level_name ?></td>
                        <td><?php echo $l->description ?></td>
                        <td width="150">
                            <a href="<?php echo admin_url() ?>levels/edit/<?php echo $l->level_id ?>" class="btn btn-primary btn-sm"><span class="fa fa-pencil-square"></span> Edit</a>
                            <a href="<?php echo admin_url() ?>levels/delete/<?php echo $l->level_id ?>" class="btn btn-danger btn-sm"><span class="fa fa-times"></span> Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <?php else : ?>

        <p>No data available. Please cretae a new one.</p>

    <?php endif; ?>
</div>
