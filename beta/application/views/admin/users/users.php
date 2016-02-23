<div class="col-md-12">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $u) : ?>
            <tr>
                <td><?php echo $u->user_id ?></td>
                <td><?php echo $u->first_name ?> <?php echo $u->last_name ?></td>
                <td><?php echo $u->email ?></td>
                <td>
                    
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>