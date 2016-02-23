<div class="col-md-12">
    
    <p>
        <a href="<?php echo admin_url() ?>questions/create?level=<?php echo $level_id ?>" class="btn btn-primary">
            <span class="fa fa-plus-circle"></span> Create new question
        </a>
    </p>
    
    <?php if ($questions) : ?>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Question</th>
                    <th>Type</th>
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
                            <img src="<?php echo base_url() ?>uploads/<?php echo $q->question ?>" width="200" />
                            <?php elseif ($q->type == 'txt') : ?>
                            <?php echo $q->question ?>
                            <?php else : ?>
                            N/A
                            <?php endif; ?>
                        </td>
                        <td><?php echo $q->type ?></td>
                        <td>
                            <?php foreach ($this->question->getAnswersByQuestion($q->question_id) as $a) :?>
                            <?php echo $a->answer ?> <?php if ($a->answer_id == $q->answer_id) echo "(The answer)" ?><br>
                            <?php endforeach; ?>

                        </td>
                        <td width="200">
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
    
    <p>
        <a href="<?php echo admin_url() ?>questions" class="btn btn-default">Back to questions</a>
    </p>
    
</div>