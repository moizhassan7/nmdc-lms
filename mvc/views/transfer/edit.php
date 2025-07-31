
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-transfer"></i> <?=$this->lang->line('panel_title')?></h3>

       
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("accounts/index")?>">Accounts</a></li>
            <li><a href="<?=base_url("transfer/index")?>"><?=$this->lang->line('panel_title')?></a></li>
            <li class="active"><?=$this->lang->line('menu_edit')?> <?=$this->lang->line('panel_title')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
                <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                    <?php 
                        if(form_error('transfer_from')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="transfer_from" class="col-sm-2 control-label">
                            <?=$this->lang->line("transfer_from")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                                <?php
                                    $array = array();
                                    foreach ($accounts as $parent) {
                                        $account_name = '';
                                        if($parent->account_name) {
                                            $parentsemail = " (" . $parent->account_name ." )";
                                        }
                                        $array[$parent->accountsID] = $parent->account_name;
                                    }
                                    echo form_dropdown("transfer_from", $array, set_value("transfer_from", $transfer->transfer_from), "id='transfer_from' class='form-control transfer_from select2'");
                                ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('transfer_from'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('transfer_to')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="transfer_to" class="col-sm-2 control-label">
                            <?=$this->lang->line("transfer_to")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                                <?php
                                    $array = array();
                                    foreach ($accounts as $parent) {
                                        $account_name = '';
                                        if($parent->account_name) {
                                            $parentsemail = " (" . $parent->account_name ." )";
                                        }
                                        $array[$parent->accountsID] = $parent->account_name;
                                    }
                                    echo form_dropdown("transfer_to", $array, set_value("transfer_to", $transfer->transfer_to), "id='transfer_to' class='form-control transfer_to select2'");
                                ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('transfer_to'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('voucher_number')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="voucher_number" class="col-sm-2 control-label">
                            Voucher No. <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
<input type="text" name="voucher_number" class="form-control" id="voucher_number" value="<?=set_value('voucher_number',$transfer->voucher_number)?>">
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('voucher_number'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('transfer')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="namea" class="col-sm-2 control-label">
                            <?=$this->lang->line("transfer_name")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="namea" name="transfer" value="<?=set_value('transfer', $transfer->transfer)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('transfer'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('date')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="date" class="col-sm-2 control-label">
                            <?=$this->lang->line("transfer_date")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="date" name="date" value="<?=set_value('date', date("d-m-Y", strtotime($transfer->date)))?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('date'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('amount')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="amount" class="col-sm-2 control-label">
                            <?=$this->lang->line("transfer_amount")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            
                           <input type="text" class="form-control" id="amount" name="amount" value="<?=set_value('amount', $transfer->amount)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('amount'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('file')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="file" class="col-sm-2 control-label">
                            <?=$this->lang->line("transfer_file")?>
                        </label>
                        <div class="col-sm-6">
                            <div class="input-group image-preview">
                                <input type="text" class="form-control image-preview-filename" disabled="disabled">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                        <span class="fa fa-remove"></span>
                                        <?=$this->lang->line('transfer_clear')?>
                                    </button>
                                    <div class="btn btn-success image-preview-input">
                                        <span class="fa fa-repeat"></span>
                                        <span class="image-preview-input-title">
                                        <?=$this->lang->line('transfer_file_browse')?></span>
                                        <input type="file" name="file" accept="image/png, image/jpeg, image/gif, application/pdf, application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf"/>
                                    </div>
                                </span>
                            </div>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('file'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('note')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="note" class="col-sm-2 control-label">
                            <?=$this->lang->line("transfer_note")?>
                        </label>
                        <div class="col-sm-6">
                            <textarea style="resize:none;" class="form-control" id="note" name="note"><?=set_value('note', $transfer->note)?></textarea>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('note'); ?>
                        </span>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-success" value="<?=$this->lang->line("update_transfer")?>" >
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $("#date").datepicker({
        autoclose: true,
        format: 'dd-mm-yyyy',
        startDate:'<?=$schoolyearsessionobj->startingdate?>',
        endDate:'<?=$schoolyearsessionobj->endingdate?>',
    });

    $(document).on('click', '#close-preview', function(){ 
        $('.image-preview').popover('hide');
        // Hover befor close the preview
        $('.image-preview').hover(
            function () {
               $('.image-preview').popover('show');
               $('.content').css('padding-bottom', '100px');
            }, 
             function () {
               $('.image-preview').popover('hide');
               $('.content').css('padding-bottom', '20px');
            }
        );    
    });

    $(function() {
        // Create the close button
        var closebtn = $('<button/>', {
            type:"button",
            text: 'x',
            id: 'close-preview',
            style: 'font-size: initial;',
        });
        closebtn.attr("class","close pull-right");
        // Set the popover default content
        $('.image-preview').popover({
            trigger:'manual',
            html:true,
            title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
            content: "There's no image",
            placement:'bottom'
        });
        // Clear event
        $('.image-preview-clear').click(function(){
            $('.image-preview').attr("data-content","").popover('hide');
            $('.image-preview-filename').val("");
            $('.image-preview-clear').hide();
            $('.image-preview-input input:file').val("");
            $(".image-preview-input-title").text("<?=$this->lang->line('transfer_file_browse')?>"); 
        }); 
        // Create the preview image
        $(".image-preview-input input:file").change(function (){     
            var img = $('<img/>', {
                id: 'dynamic',
                width:250,
                height:200,
                overflow:'hidden'
            });      
            var file = this.files[0];
            var reader = new FileReader();
            // Set preview image into the popover data-content
            reader.onload = function (e) {
                $(".image-preview-input-title").text("<?=$this->lang->line('transfer_file_browse')?>");
                $(".image-preview-clear").show();
                $(".image-preview-filename").val(file.name);
            }        
            reader.readAsDataURL(file);
        });  
    });
</script>