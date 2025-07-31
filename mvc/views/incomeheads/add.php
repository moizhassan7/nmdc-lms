
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-income"></i> <?=$this->lang->line('panel_titleb')?></h3>

       
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("income/index")?>"><?=$this->lang->line('menu_income')?></a></li>
  <li><a href="<?=base_url("incomeheads/index")?>"><?=$this->lang->line('panel_titleb')?></a></li>
  <li class="active"><?=$this->lang->line('menu_add')?> <?=$this->lang->line('menu_income')?> Head</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
            <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                    <?php 
                        if(form_error('income_head')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="income_head" class="col-sm-2 control-label">
                            <?=$this->lang->line("income_income")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="income_head" name="income_head" value="<?=set_value('income_head')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('income_head'); ?>
                        </span>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
     <input type="submit" class="btn btn-success" value="<?=$this->lang->line("add_income")?> Head">
                        </div>
                    </div>

                </form>
                <?php if ($siteinfos->note==1) { ?>
                    <div class="callout callout-danger">
                        <p><b>Note:</b> Add your institute income head</p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>