<div class="starter-template">
    <div class="jumbotron">
        <h1>Level Up! Awesome!!!</h1>
        <p>Congratulation, <?php echo $user->first_name ?>. Your level is up!</p>
        <p>Now you're in <strong><?php echo $level->level_name ?></strong> and your score is</p>
        
        <h3><?php echo $score ?></h3>
                
        <p>
            <?php if ($next_questions) : ?>
            <a href="<?php echo base_url() ?>questions/next_level" class="btn btn-primary btn-lg">Just Continue <span class="fa fa-arrow-circle-right"></span></a>
            <?php else : ?>
            <a href="<?php echo base_url() ?>questions/finish" class="btn btn-primary btn-lg">Just Continue <span class="fa fa-arrow-circle-right"></span></a>
            <?php endif; ?>
        </p>
    </div>
</div>