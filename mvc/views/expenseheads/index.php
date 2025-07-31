
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-expense"></i> <?=$this->lang->line('panel_titleb')?></h3>

       
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("expense/index")?>"><?=$this->lang->line('menu_expense')?></a></li>
            <li class="active"><?=$this->lang->line('panel_titleb')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <?php if(($siteinfos->school_year == $this->session->userdata('defaultschoolyearID')) || ($this->session->userdata('usertypeID') == 1) || $this->session->userdata('usertypeID') == 5) { ?>
                    <?php if(permissionChecker('expense_add')) { ?>
                        <h5 class="page-header">
                            <a href="<?php echo base_url('expenseheads/add') ?>">
                                <i class="fa fa-plus"></i> 
                                <?=$this->lang->line('add_titleb')?>
                            </a>
                        </h5>
                    <?php } ?>
                <?php } ?>

                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th class="col-sm-1"><?=$this->lang->line('slno')?></th>
                                <th class="col-sm-2"><?=$this->lang->line('expense_date')?></th>
                                <th class="col-sm-2">Expense Head</th>
                                <?php if(($siteinfos->school_year == $this->session->userdata('defaultschoolyearID')) || ($this->session->userdata('usertypeID') == 1) || $this->session->userdata('usertypeID') == 5) { ?>

<?php if(permissionChecker('expense_edit') || permissionChecker('expense_delete')) { ?>
                                        <th class="col-sm-2"><?=$this->lang->line('action')?></th>
                                    <?php } ?>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total_expense = 0; if(customCompute($expenses)) {$i = 1; foreach($expenses as $expense) { ?>
                                <tr>
                                    <td data-title="<?=$this->lang->line('slno')?>">
                                        <?php echo $i; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('expense_date')?>">
                                        <?php echo date("d M Y", strtotime($expense->date)); ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('expense_expense')?>">
                                        <?php echo $expense->expense_head; ?>
                                    </td>
                                    
<?php if(($siteinfos->school_year == $this->session->userdata('defaultschoolyearID')) || ($this->session->userdata('usertypeID') == 1) || $this->session->userdata('usertypeID') == 5) { ?>
<?php if(permissionChecker('expense_edit') || permissionChecker('expense_delete')) { ?>

<td data-title="<?=$this->lang->line('action')?>">
<?php echo btn_edits('expenseheads/edit/'.$expense->expenseheadID, $this->lang->line('edit')) ?>
<?php echo btn_deletes('expenseheads/delete/'.$expense->expenseheadID, $this->lang->line('delete')) ?>
</td>
                                        <?php } ?>
                                    <?php } ?>
                                </tr>
                                <?php $i++; }} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>