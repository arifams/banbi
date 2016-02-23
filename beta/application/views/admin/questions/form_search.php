<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">Filter</div>
        <div class="panel-body">
            <form action="<?php echo current_url() ?>" method="post">

                <div class="form-group">
                    <label>Level</label>
                    <select class="form-control" name="level">
                        <option value="">--Select--</option>
                        <?php foreach ($levels as $l) : ?>
                            <option value="<?php echo $l->level_id ?>"><?php echo $l->level_name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <input type="hidden" name="submit" value="1" />
                <button class="btn btn-warning">Load questions</button>

            </form>
        </div>
    </div>

    <p>
        <a href="<?php echo admin_url() ?>questions/create" class="btn btn-primary"><span class="fa fa-plus-circle"></span> Create new</a>
    </p>

    <?php if ($questions) : ?>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Question</th>
                    <th>Answers</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                <?php foreach ($questions as $q) : ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td>
                            <?php if ($q->type == 'img') : ?>
                            <img src="<?php echo base_url() ?>uploads/<?php echo $q->question ?>" width="150" />
                            <?php elseif ($q->type == 'txt') : ?>
                                <?php echo $q->question ?>
                            <?php else : ?>
                                N/A
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php foreach ($this->question->getAnswersByQuestion($q->question_id) as $a) : ?>
                                <?php echo $a->answer ?> <?php if ($a->answer_id == $q->answer_id) echo "(The answer)" ?><br>
                            <?php endforeach; ?>

                        </td>
                        <td>
                            <a href="<?php echo admin_url() ?>questions/edit?qid=<?php echo $q->question_id ?>" class="btn btn-primary btn-sm"><span class="fa fa-edit"></span> Edit</a>
                            <a href="<?php echo admin_url() ?>questions/delete?qid=<?php echo $q->question_id ?>" class="btn btn-danger btn-sm"><span class="fa fa-times"></span> Delete</a>
                        </td>
                    </tr>
                    <?php $no++ ?>
                <?php endforeach; ?>
            </tbody>
        </table>

    <?php else : ?>
        <div class="alert alert-info">
            No question in this level.
        </div>
    <?php endif; ?>

</div>