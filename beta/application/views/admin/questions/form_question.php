<div class="col-md-12">
    <form action="<?php echo current_full_url() ?>" enctype="multipart/form-data" method="post" class="form-horizontal">
    
        <div class="form-group">
            <label class="col-md-2 control-label">Level</label>
            <div class="col-md-3">
                <select name="level" class="form-control">
                    <option value="">--Select--</option>
                    <?php foreach ($levels as $l) : ?>
                    <option value="<?php echo $l->level_id ?>" <?php if ($l->level_id == $level_id) echo "selected" ?>><?php if ($l->parent_id) echo $l->parent_id ?> <?php echo $l->level_name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Type</label>
            <div class="col-md-3">
                <select name="type" class="form-control select-type">
                    <option value="">--Select--</option>
                    <option value="txt" <?php if ($type == 'txt') echo "selected" ?>>Text</option>
                    <option value="img" <?php if ($type == 'img') echo "selected" ?>>Image</option>
                </select>
            </div>
        </div>
        
        <div class="form-group img-text">
            <label class="col-md-2 control-label">Questions</label>
            <div class="col-md-8">
                <input type="text" name="question" class="form-control" value="<?php echo $question ?>" placeholder="" />
            </div>
        </div>
        
        <div class="form-group img-upload">
            <label class="col-md-2 control-label">Image</label>
            <div class="col-md-8">
                <input type="file" name="userfile" />
            </div>
        </div>
        
        <?php for ($i = 1; $i <= 4; $i++) : ?>
        <div class="form-group">
            <label class="col-md-2 control-label">Answer <?php echo $i ?></label>
            <div class="col-md-8">
                <input type="text" name="answer[]" class="form-control" value="" placeholder="" />
            </div>
        </div>
        <?php endfor; ?>
                
        <div class="form-group">
            <label class="col-md-2 control-label"></label>
            <div class="col-md-8">
                <input type="hidden" name="submit" value="1" />
                <input type="hidden" name="question_id" value="<?php echo $question_id ?>" />
                <button class="btn btn-warning"><span class="fa fa-save"></span> Save</button>
                <a href="<?php echo admin_url() ?>questions" class="btn btn-default"><span class="fa fa-angle-double-left"></span> Cancel</a>
            </div>
        </div>
    
    </form>
</div>

<script>
    $(document).ready(function(){
                
        $('.img-upload').hide();
        $('.img-text').hide();
        
        $('.select-type').change(function(){
            var type = $('.select-type').val();
            
            if (type === 'img'){
                $('.img-upload').show();
                $('.img-text').hide();
            }
            else {
                $('.img-upload').hide();
                $('.img-text').show();
            }
        })
        
    })
</script>