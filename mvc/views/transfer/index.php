
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-transfer"></i><?=$this->lang->line('panel_title')?></h3>

       
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("accounts/index")?>">Accounts</a></li>
            <li class="active"><?=$this->lang->line('panel_title')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <?php if(($siteinfos->school_year == $this->session->userdata('defaultschoolyearID')) || ($this->session->userdata('usertypeID') == 1) || $this->session->userdata('usertypeID') == 5) { ?>
                    <?php if(permissionChecker('transfer_add')) { ?>
                        <h5 class="page-header">
                            <a href="<?php echo base_url('transfer/add') ?>">
                                <i class="fa fa-plus"></i> 
                                <?=$this->lang->line('add_title')?>
                            </a>
                        </h5>
                    <?php } ?>
                <?php } ?>

                <div id="hide-table">
        <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th><?=$this->lang->line('slno')?></th>
                                <th><?=$this->lang->line('transfer_date')?></th>
                                <th><?=$this->lang->line('transfer_from')?></th>
                                <th><?=$this->lang->line('transfer_to')?></th>
                                <th>Voucher No.</th>
                                <th><?=$this->lang->line('transfer_name')?></th>
                                <th><?=$this->lang->line('transfer_amount')?></th>
                                <th><?=$this->lang->line('transfer_uname')?></th>
                                <th><?=$this->lang->line('transfer_note')?></th>
                                <th><?=$this->lang->line('transfer_file')?></th>
                                <?php if(($siteinfos->school_year == $this->session->userdata('defaultschoolyearID')) || ($this->session->userdata('usertypeID') == 1) || $this->session->userdata('usertypeID') == 5) { ?>
                                    <?php if(permissionChecker('transfer_edit') || permissionChecker('transfer_delete')) { ?>
                                        <th><?=$this->lang->line('action')?></th>
                                    <?php } ?>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total_transfer = 0; if(customCompute($transfers)) {$i = 1; foreach($transfers as $transfer) { ?>
                                <tr>
                                    <td data-title="<?=$this->lang->line('slno')?>">
                                        <?php echo $i; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('transfer_date')?>">
                                        <?php echo date("d M Y", strtotime($transfer->date)); ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('transfer_from')?>">
<?php
$this->data['accounts'] = $this->Accounts_m->get_single_accounts(array('accountsID' => $transfer->transfer_from));

if(customCompute($this->data['accounts'])) {

echo $transfer_from = $this->data['accounts']->account_name;
	
}
?>
                                   </td>
<td data-title="<?=$this->lang->line('transfer_to')?>">
<?php
$this->data['accounts'] = $this->Accounts_m->get_single_accounts(array('accountsID' => $transfer->transfer_to));

if(customCompute($this->data['accounts'])) {

echo $transfer_to = $this->data['accounts']->account_name;
	
}
?>
</td>
                           <td data-title="Voucher No.">
                            <?=$transfer->voucher_number?>
                           </td>

                                    <td data-title="<?=$this->lang->line('transfer_name')?>">
                                        <?php echo $transfer->transfer; ?>
                                    </td>
                                    
                                    <td data-title="<?=$this->lang->line('transfer_amount')?>">
                                        <?php echo $transfer->amount; ?>
                                    </td>
                                    
                                    <td data-title="<?=$this->lang->line('transfer_uname')?>">
                                        <?=isset($alluser[$transfer->usertypeID][$transfer->userID]) ? $alluser[$transfer->usertypeID][$transfer->userID]->name : ''?>
                                    </td>

                                    <td data-title="<?=$this->lang->line('transfer_note')?>">
                                        <?php echo $transfer->note; ?>
                                    </td>

                                    <td data-title="<?=$this->lang->line('transfer_file')?>">
                                        <?php 
                                            if($transfer->file) { 
                                                echo btn_download_file('transfer/download/'.$transfer->transferID, $this->lang->line('transfer_download'), $this->lang->line('transfer_download')); 
                                            }
                                        ?>
                                    </td>

                                    <?php if(($siteinfos->school_year == $this->session->userdata('defaultschoolyearID')) || ($this->session->userdata('usertypeID') == 1) || $this->session->userdata('usertypeID') == 5) { ?>
                                        <?php if(permissionChecker('transfer_edit') || permissionChecker('transfer_delete')) { ?>
                                            <td data-title="<?=$this->lang->line('action')?>">
<?php echo btn_edit('transfer/edit/'.$transfer->transferID, $this->lang->line('edit')) ?>
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