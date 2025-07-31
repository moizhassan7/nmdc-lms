
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-expense"></i> <?=$this->lang->line('panel_titleb')?></h3>

       
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("expense/index")?>"><?=$this->lang->line('menu_expense')?></a></li>
     <li><a href="<?=base_url("expenseheads/index")?>"><?=$this->lang->line('panel_titleb')?></a></li>
  <li class="active"><?=$this->lang->line('menu_add')?> <?=$this->lang->line('menu_expense')?> Head</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
            <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                    <?php 
                        if(form_error('expense_head')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="expense_head" class="col-sm-2 control-label">
                            <?=$this->lang->line("expense_expense")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="expense_head" name="expense_head" value="<?=set_value('expense_head')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('expense_head'); ?>
                        </span>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
     <input type="submit" class="btn btn-success" value="<?=$this->lang->line("add_expense")?> Head">
                        </div>
                    </div>

                </form>
                <?php if ($siteinfos->note==1) { ?>
                    <div class="callout callout-danger">
                        <p><b>Note:</b> Add your institute expense head</p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>