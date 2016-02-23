<div class="starter-template">
    <div class="jumbotron">
        <h1>Welcome to Level <?php echo $level->level_name ?></h1>

        <?php echo $level->description ?>

        <br>
        <br>
        <p>
            <a href="<?php echo base_url() ?>questions/level" class="btn btn-primary btn-lg">Proceed <span class="fa fa-arrow-circle-right"></span></a>
        </p>
    </div>
</div>