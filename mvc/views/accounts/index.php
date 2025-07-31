
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-accounts"></i> <?=$this->lang->line('panel_title')?></h3>

       
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li class="active"><?=$this->lang->line('panel_title')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <?php if(($siteinfos->school_year == $this->session->userdata('defaultschoolyearID')) || ($this->session->userdata('usertypeID') == 1) || $this->session->userdata('usertypeID') == 5) { ?>
                    <?php if(permissionChecker('accounts_add')) { ?>
                        <h5 class="page-header">
                            <a href="<?php echo base_url('accounts/add') ?>">
                                <i class="fa fa-plus"></i> 
                                <?=$this->lang->line('add_title')?>
                            </a>
<a style="margin-left:30px;" class="btn btn-success" href="<?php echo base_url('transfer/index') ?>">Transfer</a>

                        </h5>
                    <?php } ?>
                <?php } ?>

                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th class="col-sm-1"><?=$this->lang->line('slno')?></th>
                                <th class="col-sm-2"><?=$this->lang->line('accounts_date')?></th>
                                <th class="col-sm-2"><?=$this->lang->line('account_name')?></th>
                                <?php if(($siteinfos->school_year == $this->session->userdata('defaultschoolyearID')) || ($this->session->userdata('usertypeID') == 1) || $this->session->userdata('usertypeID') == 5) { ?>

<?php if(permissionChecker('accounts_edit')) { ?>
                                        <th class="col-sm-2"><?=$this->lang->line('action')?></th>
                                    <?php } ?>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total_accounts = 0; if(customCompute($accountss)) {$i = 1; foreach($accountss as $accounts) { ?>
                                <tr>
                                    <td data-title="<?=$this->lang->line('slno')?>">
                                        <?php echo $i; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('accounts_date')?>">
                                        <?php echo date("d M Y", strtotime($accounts->date)); ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('accounts_accounts')?>">
                                        <?php echo $accounts->account_name; ?>
                                    </td>
                                     
                                    
<?php if(($siteinfos->school_year == $this->session->userdata('defaultschoolyearID')) || ($this->session->userdata('usertypeID') == 1) || $this->session->userdata('usertypeID') == 5) { ?>
<?php if(permissionChecker('accounts_edit')) { ?>

<td data-title="<?=$this->lang->line('action')?>">
<?php echo btn_edits('accounts/edit/'.$accounts->accountsID, $this->lang->line('edit')) ?>
<a href="<?php echo base_url('accountreport/') ?>" class="btn btn-success btn-xs mrg" data-placement="top" data-toggle="tooltip" data-original-title="View"><i class="fa fa-check-square-o"></i></a>
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