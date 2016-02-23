<div class="col-md-8 col-md-offset-2">
    <h1>Questions of Level <?php echo $level->level_name ?></h1>

    <?php foreach ($questions as $q) : ?>

        <?php if ($q->type == 'img') : ?>
            <div class="thumbnail">
                <img src="<?php echo base_url() ?>uploads/<?php echo $q->question ?>" width="80%" />
            </div>
        <?php else : ?>
            <h3><?php echo $q->question ?></h3>
        <?php endif; ?>
        <?php foreach ($this->question->getAnswersByQuestion($q->question_id) as $a) : ?>
            <div class="col-md-6">
                <a href="<?php echo base_url() ?>questions/answer?qid=<?php echo $q->question_id ?>&aid=<?php echo $a->answer_id ?>&offset=<?php echo $offset ?>" class="btn btn-warning btn-block btn-lg">
                    <p><?php echo $a->answer ?></p>
                </a>
            </div>
        <?php endforeach; ?>

    <?php endforeach; ?>

</div>