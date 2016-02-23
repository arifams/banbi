<div class="col-md-12">
    <form action="<?php echo current_url() ?>" method="post" class="form-horizontal">
        
        <div class="form-group">
            <label class="col-md-2 control-label">Class</label>
            <div class="col-md-5">
                <select name="parent" class="form-control">
                    <option value="">--Select--</option>
                    <?php foreach ($levels as $l) : ?>
                    <option value="<?php echo $l->level_id ?>" <?php if ($l->level_id == $parent) echo "selected" ?>><?php echo $l->level_name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    
        <div class="form-group">
            <label class="col-md-2 control-label">Level Name</label>
            <div class="col-md-8">
                <input type="text" name="name" class="form-control" value="<?php echo $level_name ?>" placeholder="" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Description</label>
            <div class="col-md-8">
                <textarea class="form-control" name='description' id='editor'>
                    <?php echo $description ?>
                </textarea>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-2 control-label"></label>
            <div class="col-md-8">
                <input type="hidden" name="submit" value="1" />
                <input type="hidden" name="level_id" value="<?php echo $level_id ?>" />
                <button class="btn btn-warning"><span class="fa fa-save"></span> Save</button>
                <a href="<?php echo admin_url() ?>levels" class="btn btn-default"><span class="fa fa-angle-double-left"></span> Cancel</a>
            </div>
        </div>
    
    </form>
</div>

<script>
    $(document).ready(function() {
        $('#editor').summernote({
            height: 150
        });
    });
</script>