
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-liability"></i> <?=$this->lang->line('panel_title')?></h3>

       
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
                    <?php if(permissionChecker('liability_add')) { ?>
                        <h5 class="page-header">
                            <a href="<?php echo base_url('liability/add') ?>">
                                <i class="fa fa-plus"></i> 
                                <?=$this->lang->line('add_title')?>
                            </a>
<a style="margin-left:30px;" class="btn btn-success" href="<?php echo base_url('liabilityheads/index') ?>">View Liability Heads</a>
                        </h5>
                    <?php } ?>
                <?php } ?>

                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th><?=$this->lang->line('slno')?></th>
                                <th><?=$this->lang->line('liability_date')?></th>
                                <th><?=$this->lang->line('account_name')?></th>
                                <th>Voucher No.</th>
                                <th><?=$this->lang->line('liability_head')?></th>
                                <th><?=$this->lang->line('liability_liability')?></th>
                                <th><?=$this->lang->line('liability_amount')?></th>
                             <!--<th><?=$this->lang->line('liability_uname')?></th>-->
                                <th><?=$this->lang->line('liability_note')?></th>
                                <th><?=$this->lang->line('liability_file')?></th>
                                <?php if(($siteinfos->school_year == $this->session->userdata('defaultschoolyearID')) || ($this->session->userdata('usertypeID') == 1) || $this->session->userdata('usertypeID') == 5) { ?>
                                    <?php if(permissionChecker('liability_edit') || permissionChecker('liability_delete')) { ?>
                                        <th><?=$this->lang->line('action')?></th>
                                    <?php } ?>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total_liability = 0; if(customCompute($liabilitys)) {$i = 1; foreach($liabilitys as $liability) { ?>
                                <tr>
                                    <td data-title="<?=$this->lang->line('slno')?>">
                                        <?php echo $i; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('liability_date')?>">
                                        <?php echo date("d M Y", strtotime($liability->date)); ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('account_name')?>">
<?php
$this->data['accounts'] = $this->Accounts_m->get_single_accounts(array('accountsID' => $liability->accountsID));

if(customCompute($this->data['accounts'])) {

echo $account_name = $this->data['accounts']->account_name;
	
}
?>
                                   </td>
                           <td data-title="Voucher No.">
                            <?=$liability->voucher_number?>
                           </td>
                                    <td data-title="<?=$this->lang->line('liability_head')?>">
<?php
$this->data['liabilityhead'] = $this->Liabilityhead_m->get_single_liabilityhead(array('liabilityheadID' => $liability->liabilityheadID));

if(customCompute($this->data['liabilityhead'])) {

echo $liability_head = $this->data['liabilityhead']->liability_head;
	
}
?>
                                   </td>
                                    <td data-title="<?=$this->lang->line('liability_liability')?>">
<?php 
if($liability->liability != 1){
echo $liability->liability;
}else{
echo "Security via Invoice";	
}
?>
                                    </td>
                                    
                                    <td data-title="<?=$this->lang->line('liability_amount')?>">
                                        <?php echo $liability->amount; ?>
                                    </td>
                                    
                                    <!--<td data-title="<?=$this->lang->line('liability_uname')?>">
                                        <?=isset($alluser[$liability->usertypeID][$liability->userID]) ? $alluser[$liability->usertypeID][$liability->userID]->name : ''?>
                                    </td>-->
                                    
                                    <td data-title="<?=$this->lang->line('liability_note')?>">
                                        <?php echo $liability->note; ?>
                                    </td>

                                    <td data-title="<?=$this->lang->line('liability_file')?>">
                                        <?php 
                                            if($liability->file) { 
                                                echo btn_download_file('liability/download/'.$liability->liabilityID, $this->lang->line('liability_download'), $this->lang->line('liability_download')); 
                                            }
                                        ?>
                                    </td>

<?php if(($siteinfos->school_year == $this->session->userdata('defaultschoolyearID')) || ($this->session->userdata('usertypeID') == 1) || $this->session->userdata('usertypeID') == 5) { ?>

<?php if(permissionChecker('liability_edit') || permissionChecker('liability_delete')) { ?>
<td data-title="<?=$this->lang->line('action')?>">
<?php
if($liability->liability != 1){ ?>
<?php echo btn_edit('liability/edit/'.$liability->liabilityID, $this->lang->line('edit')); ?>
<?php echo btn_delete('liability/delete/'.$liability->liabilityID, $this->lang->line('delete')); ?>
<?php } ?>
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