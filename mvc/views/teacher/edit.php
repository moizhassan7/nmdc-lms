<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-teacher"></i> <?=$this->lang->line('panel_title')?></h3>

       
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("teacher/index")?>">Faculty</a></li>
            <li class="active"><?=$this->lang->line('menu_edit')?> Faculty</li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                    <?php
                        if(form_error('name'))
echo "<div class='form-group has-error col-md-4' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-md-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="name_id" class="control-label">
                            <?=$this->lang->line("teacher_name")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="name_id" name="name" value="<?=set_value('name', $teacher->name)?>">
                        </div>
                        <span class="control-label">
                            <?php echo form_error('name'); ?>
                        </span>
                    </div>
                    
                    <?php
                        if(form_error('empcode'))
echo "<div class='form-group has-error col-md-4' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-md-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="empcode" class="control-label">
                            <?=$this->lang->line("teacher_empcode")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="empcode" name="empcode" value="<?=set_value('empcode', $teacher->empcode)?>">
                        </div>
                        <span class="control-label">
                            <?php echo form_error('empcode'); ?>
                        </span>
                    </div>
                    
                    <?php
                        if(form_error('fathname'))
echo "<div class='form-group has-error col-md-4' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-md-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="fathname_id" class="control-label">
                            <?=$this->lang->line("teacher_fathname")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="fathname_id" name="fathname" value="<?=set_value('fathname', $teacher->fathname)?>">
                        </div>
                        <span class="control-label">
                            <?php echo form_error('fathname'); ?>
                        </span>
                    </div>
                    
                    <?php
                        if(form_error('cnic'))
echo "<div class='form-group has-error col-md-4' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-md-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="cnic_id" class="control-label">
                            <?=$this->lang->line("teacher_cnic")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="cnic_id" name="cnic" value="<?=set_value('cnic', $teacher->cnic)?>" data-inputmask="'mask': '99999-9999999-9'"  placeholder="XXXXX-XXXXXXX-X">
                        </div>
                        <span class="control-label">
                            <?php echo form_error('cnic'); ?>
                        </span>
                    </div>
                    
                    <?php
                        if(form_error('dob'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="dob" class="control-label">
                            <?=$this->lang->line("teacher_dob")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
            <input type="text" class="form-control" id="dob" name="dob" value="<?=set_value('dob', date("d-m-Y", strtotime($teacher->dob)))?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('dob');?>
                        </span>
                    </div>

                    <?php
                        if(form_error('sex'))
echo "<div class='form-group has-error col-md-4' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-md-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="sex" class="control-label">
                            <?=$this->lang->line("teacher_sex")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <?php 
                                echo form_dropdown("sex", array($this->lang->line('teacher_sex_male') => $this->lang->line('teacher_sex_male'), $this->lang->line('teacher_sex_female') => $this->lang->line('teacher_sex_female')), set_value("sex", $teacher->sex), "id='sex' class='form-control'"); 
                            ?>
                            </div>
                        <span class="control-label">
                            <?php echo form_error('sex'); ?>
                        </span>
                    </div>
                    
                    <?php
                        if(form_error('state'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="state" class="control-label">
                            <?=$this->lang->line("teacher_state")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                        <?php
                                $stateArray = array(
                                    'Punjab' => 'Punjab',
                                    'KPK' => 'KPK',
                                    'AJK' => 'AJK',
                                    'Sindh' => 'Sindh',
                                    'Baluchistan' => 'Baluchistan',
									'Others' => 'Others'
                                );
                                echo form_dropdown("state", $stateArray, set_value("state", $teacher->state), "id='state' class='form-control select2'");
                            ?>
                        </div>
                        <span class="control-label">
                            <?php echo form_error('state'); ?>
                        </span>
                    </div>
                    
                    <?php
                        if(form_error('domicile'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="domicile" class="control-label">
                            <?=$this->lang->line("teacher_domicile")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
<input type="text" class="form-control" id="domicile" name="domicile" value="<?=set_value('domicile', $teacher->domicile)?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('domicile'); ?>
                        </span>
                    </div>
                    
                        <?php
                        if(form_error('marstatus'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="marstatus" class="control-label">
                            <?=$this->lang->line("teacher_marstatus")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <?php
                                $marstatusArray = array(
                                    'Single' => 'Single',
                                    'Married' => 'Married',
                                    'Widow / Widower' => 'Widow / Widower',
                                    'Divorced' => 'Divorced',
                                    'Seperated' => 'Seperated'
                                );
                                echo form_dropdown("marstatus", $marstatusArray, set_value("marstatus", $teacher->marstatus), "id='marstatus' class='form-control select2'");
                            ?>
                        </div>
                        <span class="control-label">
                            <?php echo form_error('marstatus'); ?>
                        </span>
                    </div>
                    
                        <?php
                        if(form_error('religion'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="religion" class="control-label">
   <?=$this->lang->line("teacher_religion")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <?php
                                $religionArray = array(
                                    'Muslim' => 'Muslim',
                                    'Non-Muslim' => 'Non-Muslim'
                                );
                                echo form_dropdown("religion", $religionArray, set_value("religion", $teacher->religion), "id='religion' class='form-control select2'");
                            ?>
                        </div>
                        <span class="control-label">
                            <?php echo form_error('religion'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('sect'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;' id='sectz'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;' id='sectz'>";
                    ?>
                        <label for="sect" class="control-label">
 						Sect <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <?php
                                $sectArray = array(
                                    'Sunni' => 'Sunni',
                                    'Shia' => 'Shia',
									'Kharijite' => 'Kharijite',
									'Murijite' => 'Murijite',
									'Mutazila' => 'Mutazila',
									'Ibadi' => 'Ibadi'
                                );
                 echo form_dropdown("sect", $sectArray, set_value("sect", $teacher->sect), "id='sect' class='form-control select2'");
                            ?>
                        </div>
                        <span class="control-label">
                            <?php echo form_error('sect'); ?>
                        </span>
                    </div>
                    
                    <?php
                        if(form_error('sectb'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px; display:none;' id='sectzb'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px; display:none;' id='sectzb'>";
                    ?>
                        <label for="sectb" class="control-label">
 						Non-Muslim Religion <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <?php
                                $nonmuslimsArray = array(
                                    'Christian' => 'Christian',
									'Hindu' => 'Hindu',
                                    'Sikh' => 'Sikh',
									'Aḥmadiyyah' => 'Aḥmadiyyah'
                                );
echo form_dropdown("sectb", $nonmuslimsArray, set_value("sectb", $teacher->sectb), "id='sectb' class='form-control select2'");
                            ?>
                        </div>
                        <span class="control-label">
                            <?php echo form_error('sectb'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('nextofkin'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="nextofkin" class="control-label">
                     <?=$this->lang->line("teacher_nextofkin")?> (Name and Relation)
                        </label>
                        <div class="">
                         <input type="text" class="form-control" id="nextofkin" name="nextofkin" value="<?=set_value('nextofkin', $teacher->nextofkin)?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('nextofkin'); ?>
                        </span>
                    </div>
                                                            
                     <?php
                        if(form_error('nativelang'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="nativelang" class="control-label">
                            <?=$this->lang->line("teacher_nativelang")?>
                        </label>
                        <div class="">
                         <input type="text" class="form-control" id="nativelang" name="nativelang" value="<?=set_value('nativelang', $teacher->nativelang)?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('nativelang'); ?>
                        </span>
                    </div>
                    
                                        <?php
                        if(form_error('bgroup'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="bgroup" class="control-label">
                            <?=$this->lang->line("teacher_bgroup")?>
                        </label>
                        <div class="">
                         <input type="text" class="form-control" id="bgroup" name="bgroup" value="<?=set_value('bgroup', $teacher->bgroup)?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('bgroup'); ?>
                        </span>
                    </div>
                    
                    <?php
                        if(form_error('pmdcno'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="pmdcno" class="control-label">
                             PMDC/PMC No <span class="text-red">*</span>
                        </label>
                        <div class="">
  <input type="text" class="form-control" id="pmdcno" name="pmdcno" value="<?=set_value('pmdcno', $teacher->pmdcno)?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('pmdcno'); ?>
                        </span>
                    </div>

<div class="col-sm-12" style="padding:0;">
<p class="form_titlez">OFFICIAL INFORMATION</p>                    
                        <?php
                        if(form_error('AppointmentDate'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="AppointmentDate" class="control-label">
                            <?=$this->lang->line("teacher_AppointmentDate")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                         <input type="text" class="form-control dob" id="AppointmentDate" name="AppointmentDate" value="<?=set_value('AppointmentDate', $teacher->AppointmentDate)?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('AppointmentDate'); ?>
                        </span>
                    </div>
                    
                        <?php
                        if(form_error('jod'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="jod" class="control-label">
        <?=$this->lang->line("teacher_jod")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                         <input type="text" class="form-control dob" id="jod" name="jod" value="<?=set_value('jod', $teacher->jod)?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('jod'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('FacultyType'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="FacultyType" class="control-label">
                            <?=$this->lang->line("teacher_FacultyType")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                        <?php
                                $FacultyTypeArray = array(
                                    'Basic Science' => 'Basic Science',
									'Clinical Science' => 'Clinical Science'
                                );
                                echo form_dropdown("FacultyType", $FacultyTypeArray, set_value("FacultyType", $teacher->FacultyType), "id='FacultyType' class='form-control select2'");
                            ?>
                        </div>
                        <span class="control-label">
                            <?php echo form_error('FacultyType'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('Department'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="Department" class="control-label">
                            <?=$this->lang->line("teacher_Department")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                        <?php
                                $DepartmentArray = array(
                                    'Anatomy' => 'Anatomy',
									'Physiology' => 'Physiology',
									'Biochemistry' => 'Biochemistry',
									'Pharmacology' => 'Pharmacology',
									'Pathology' => 'Pathology',
									'Forensic' => 'Forensic',
									'Community Medicine' => 'Community Medicine',
									'Medical Education' => 'Medical Education',
									'Medicine' => 'Medicine',
									'Surgery' => 'Surgery',
									'Gynaecology' => 'Gynaecology',
									'Ophthalmology' => 'Ophthalmology',
									'Otorhinolaryngology' => 'Otorhinolaryngology',
									'Pediatrics' => 'Pediatrics',
									'Radiology' => 'Radiology',
									'Anesthesia' => 'Anesthesia',
									'Behavior' => 'Behavior',
									'Orthopaedic' => 'Orthopaedic',
									'Oncology' => 'Oncology'
                                );
                                echo form_dropdown("Department", $DepartmentArray, set_value("Department", $teacher->Department), "id='Department' class='form-control select2'");
                            ?>
                        </div>
                        <span class="control-label">
                            <?php echo form_error('Department'); ?>
                        </span>
                    </div>

                        <?php
                        if(form_error('designation'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="designation" class="control-label">
         <?=$this->lang->line("teacher_designation")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                                <?php
                                $designationArray = array(
									'Professor (HOD)' => 'Professor (HOD)',
									'Professor' => 'Professor',
									'Associate Professor' => 'Associate Professor',
									'Assistant Professor' => 'Assistant Professor',
									'Senior Demonstrator' => 'Senior Demonstrator',
									'Demonstrator' => 'Demonstrator',
									'Psychologist' => 'Psychologist',
									'Senior Registrar' => 'Senior Registrar',
									'Registrar' => 'Registrar',
								'Senior Medical Officer' => 'Senior Medical Officer',
									'Medical Officer' => 'Medical Officer',
									'House Officer' => 'House Officer',
									'Optometrist' => 'Optometrist',
								'Clinical Psychologist' => 'Clinical Psychologist',
								'Medical Superintendent' => 'Medical Superintendent',
								'Pharmacist' => 'Pharmacist',
									'Night MO' => 'Night MO',
									'Night WMO' => 'Night WMO',
									'WMO' => 'WMO'
                                );
                                echo form_dropdown("designation", $designationArray, set_value("designation", $teacher->designation), "id='designation' class='form-control select2'");
                            ?>
                        </div>
                        <span class="control-label">
                            <?php echo form_error('designation'); ?>
                        </span>
                    </div>

                        <?php
                        if(form_error('currentdesignation'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="currentdesignation" class="control-label">
                  <?=$this->lang->line("teacher_currentdesignation")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                                <?php
                                $currentdesignationArray = array(
									'Professor (HOD)' => 'Professor (HOD)',
									'Professor' => 'Professor',
									'Associate Professor' => 'Associate Professor',
									'Assistant Professor' => 'Assistant Professor',
									'Senior Demonstrator' => 'Senior Demonstrator',
									'Demonstrator' => 'Demonstrator',
									'Psychologist' => 'Psychologist',
									'Senior Registrar' => 'Senior Registrar',
									'Registrar' => 'Registrar',
								'Senior Medical Officer' => 'Senior Medical Officer',
									'Medical Officer' => 'Medical Officer',
									'House Officer' => 'House Officer',
									'Optometrist' => 'Optometrist',
								'Clinical Psychologist' => 'Clinical Psychologist',
								'Medical Superintendent' => 'Medical Superintendent',
								'Pharmacist' => 'Pharmacist',
									'Night MO' => 'Night MO',
									'Night WMO' => 'Night WMO',
									'WMO' => 'WMO'
                                );
                                echo form_dropdown("currentdesignation", $currentdesignationArray, set_value("currentdesignation", $teacher->currentdesignation), "id='currentdesignation' class='form-control select2'");
                            ?>
                        </div>
                        <span class="control-label">
                            <?php echo form_error('currentdesignation'); ?>
                        </span>
                    </div>

                        <?php
                        if(form_error('Qualification'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="Qualification" class="control-label">
                   <?=$this->lang->line("teacher_Qualification")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                         <input type="text" class="form-control" id="Qualification" name="Qualification" value="<?=set_value('Qualification', $teacher->Qualification)?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('Qualification'); ?>
                        </span>
                    </div>

                        <?php
                        if(form_error('Specialization'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="Specialization" class="control-label">
              <?=$this->lang->line("teacher_Specialization")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                         <input type="text" class="form-control" id="Specialization" name="Specialization" value="<?=set_value('Specialization', $teacher->Specialization)?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('Specialization'); ?>
                        </span>
                    </div>
                       
					   <?php
                        if(form_error('EmploymentMode'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="EmploymentMode" class="control-label">
                    <?=$this->lang->line("teacher_EmploymentMode")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <?php
                                $EmploymentModeArray = array(
                                    'Regular' => 'Regular',
									'Contract' => 'Contract',
                                    'Internee' => 'Internee',
									'House Job' => 'House Job'
                                );
                                echo form_dropdown("EmploymentMode", $EmploymentModeArray, set_value("EmploymentMode", $teacher->EmploymentMode), "id='EmploymentMode' class='form-control select2'");
                            ?>
                        </div>
                        <span class="control-label">
                            <?php echo form_error('EmploymentMode'); ?>
                        </span>
                    </div>

					   <?php
                        if(form_error('shift_id'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="shift_id" class="control-label">
                    Shift <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <?php
                                $shiftArray = array(0 => 'Select Shift');
                                foreach ($shifts as $shift) {
                                    $shiftArray[$shift->id] = $shift->name;
                                }
                                echo form_dropdown("shift_id", $shiftArray, set_value("shift_id", $teacher->shift_id), "id='shift_id' class='form-control select2'");
                            ?>
                        </div>
                        <span class="control-label">
                            <?php echo form_error('shift_id'); ?>
                        </span>
                    </div>

                        <?php
                        if(form_error('EmploymentStatus'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="EmploymentStatus" class="control-label">
                    <?=$this->lang->line("teacher_EmploymentStatus")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <?php
                                $EmploymentStatusArray = array(
                                    'Active' => 'Active',
									'Leave' => 'Leave',
									'Left' => 'Left',
                                    'Others' => 'Others'
                                );
                                echo form_dropdown("EmploymentStatus", $EmploymentStatusArray, set_value("EmploymentStatus", $teacher->EmploymentStatus), "id='EmploymentStatus' class='form-control select2'");
                            ?>
                        </div>
                        <span class="control-label">
                            <?php echo form_error('EmploymentStatus'); ?>
                        </span>
                    </div>

                        <?php
                        if(form_error('ContractStartDate'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="ContractStartDate" class="control-label">
                <?=$this->lang->line("teacher_ContractStartDate")?>
                        </label>
                        <div class="">
<?php if(empty($teacher->ContractStartDate)){ ?>
<input type="text" class="form-control dob" id="ContractStartDate" name="ContractStartDate" value="<?=set_value('ContractStartDate', $teacher->ContractStartDate)?>" >
<?php }else{ ?>
<input type="text" class="form-control dob" id="ContractStartDate" name="ContractStartDate" value="<?=set_value('ContractStartDate', date("d-m-Y", strtotime($teacher->ContractStartDate)))?>" >
<?php } ?>
                        </div>
                        <span class="control-label">
                            <?php echo form_error('ContractStartDate'); ?>
                        </span>
                    </div>

                        <?php
                        if(form_error('ContractEndDate'))
echo "<div class='form-group col-sm-6 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-6' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="ContractEndDate" class="control-label">
                <?=$this->lang->line("teacher_ContractEndDate")?>
                        </label>
                        <div class="">
<?php if(empty($teacher->ContractEndDate)){ ?>
<input type="text" class="form-control dob" id="ContractEndDate" name="ContractEndDate" value="<?=set_value('ContractEndDate', $teacher->ContractEndDate)?>" >
<?php }else{ ?>
<input type="text" class="form-control dob" id="ContractEndDate" name="ContractEndDate" value="<?=set_value('ContractEndDate', date("d-m-Y", strtotime($teacher->ContractEndDate)))?>" >
<?php } ?>
                        </div>
                        <span class="control-label">
                            <?php echo form_error('ContractEndDate'); ?>
                        </span>
                    </div>

                        <?php
                        if(form_error('LastPromotionDate'))
echo "<div class='form-group col-sm-6 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-6' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="LastPromotionDate" class="control-label">
                <?=$this->lang->line("teacher_LastPromotionDate")?>
                        </label>
                        <div class="">
<?php if(empty($teacher->LastPromotionDate)){ ?>
<input type="text" class="form-control dob" id="LastPromotionDate" name="LastPromotionDate" value="<?=set_value('LastPromotionDate', $teacher->LastPromotionDate)?>" >
<?php }else{ ?>
<input type="text" class="form-control dob" id="LastPromotionDate" name="LastPromotionDate" value="<?=set_value('LastPromotionDate', date("d-m-Y", strtotime($teacher->LastPromotionDate)))?>" >
<?php } ?>
                        </div>
                        <span class="control-label">
                            <?php echo form_error('LastPromotionDate'); ?>
                        </span>
                    </div>

<div class="clearfix"></div>
<p class="form_titlez">ACADEMIC RECORD</p>
<div class="col-sm-12" style="padding:15px;">
<table class="table table-bordered" style="margin-bottom:5px;">
<tr>
<th class="form_titlezb">Examination</th>
<th class="form_titlezb">Year</th>
<th class="form_titlezb">Marks/Grades</th>
<th class="form_titlezb">Institution Name</th>
</tr>

<tr>
<th>MBBS</th>
<td>
<select name="MBBSyear" id="MBBSyear" class="form-control">
<option value="0">Select</option>
<?php $cyear=date('Y'); for($a=$cyear; $a>=1947; $a--){?>
<option <?php if($teacher->MBBSyear == $a){ echo "selected"; }?>><?php echo $a ; ?></option>
<?php } ?>
</select>
</td>
<td><input type="text" name="MBBSmarks" class="form-control" id="MBBSmarks" value="<?=set_value('MBBSmarks'), $teacher->MBBSmarks?>"></td>
<td><input type="text" name="MBBSinst" class="form-control" id="MBBSinst" value="<?=set_value('MBBSinst', $teacher->MBBSinst)?>"></td>
</tr>
<tr>
<th>Mphil</th>
<td>
<select name="Mphilyear" id="Mphilyear" class="form-control">
<option value="0">Select</option>
<?php $cyear=date('Y'); for($a=$cyear; $a>=1947; $a--){?>
<option <?php if($teacher->Mphilyear == $a){ echo "selected"; }?>><?php echo $a ; ?></option>
<?php } ?>
</select>
</td>
<td><input type="text" name="Mphilmarks" class="form-control" id="Mphilmarks" value="<?=set_value('Mphilmarks'), $teacher->Mphilmarks?>"></td>
<td><input type="text" name="Mphilinst" class="form-control" id="Mphilinst" value="<?=set_value('Mphilinst', $teacher->Mphilinst)?>"></td>
</tr>
<tr>
<th>FCPS</th>
<td>
<select name="FCPSyear" id="FCPSyear" class="form-control">
<option value="0">Select</option>
<?php $cyear=date('Y'); for($a=$cyear; $a>=1947; $a--){?>
<option <?php if($teacher->FCPSyear == $a){ echo "selected"; }?>><?php echo $a ; ?></option>
<?php } ?>
</select>
</td>
<td><input type="text" name="FCPSmarks" class="form-control" id="FCPSmarks" value="<?=set_value('FCPSmarks'), $teacher->FCPSmarks?>"></td>
<td><input type="text" name="FCPSinst" class="form-control" id="FCPSinst" value="<?=set_value('FCPSinst', $teacher->FCPSinst)?>"></td>
</tr>
<tr>
<th>MCPS</th>
<td>
<select name="MCPSyear" id="MCPSyear" class="form-control">
<option value="0">Select</option>
<?php $cyear=date('Y'); for($a=$cyear; $a>=1947; $a--){?>
<option <?php if($teacher->MCPSyear == $a){ echo "selected"; }?>><?php echo $a ; ?></option>
<?php } ?>
</select>
</td>
<td><input type="text" name="MCPSmarks" class="form-control" id="MCPSmarks" value="<?=set_value('MCPSmarks'), $teacher->MCPSmarks?>"></td>
<td><input type="text" name="MCPSinst" class="form-control" id="MCPSinst" value="<?=set_value('MCPSinst', $teacher->MCPSinst)?>"></td>
</tr>
<tr>
<th>PHD</th>
<td>
<select name="PHDyear" id="PHDyear" class="form-control">
<option value="0">Select</option>
<?php $cyear=date('Y'); for($a=$cyear; $a>=1947; $a--){?>
<option <?php if($teacher->PHDyear == $a){ echo "selected"; }?>><?php echo $a ; ?></option>
<?php } ?>
</select>
</td>
<td><input type="text" name="PHDmarks" class="form-control" id="PHDmarks" value="<?=set_value('PHDmarks'), $teacher->PHDmarks?>"></td>
<td><input type="text" name="PHDinst" class="form-control" id="PHDinst" value="<?=set_value('PHDinst', $teacher->PHDinst)?>"></td>
</tr>
<tr>
<th>MRCP</th>
<td>
<select name="MRCPyear" id="MRCPyear" class="form-control">
<option value="0">Select</option>
<?php $cyear=date('Y'); for($a=$cyear; $a>=1947; $a--){?>
<option <?php if($teacher->MRCPyear == $a){ echo "selected"; }?>><?php echo $a ; ?></option>
<?php } ?>
</select>
</td>
<td><input type="text" name="MRCPmarks" class="form-control" id="MRCPmarks" value="<?=set_value('MRCPmarks'), $teacher->MRCPmarks?>"></td>
<td><input type="text" name="MRCPinst" class="form-control" id="MRCPinst" value="<?=set_value('MRCPinst', $teacher->MRCPinst)?>"></td>
</tr>
<tr>
<th>MRCS</th>
<td>
<select name="MRCSyear" id="MRCSyear" class="form-control">
<option value="0">Select</option>
<?php $cyear=date('Y'); for($a=$cyear; $a>=1947; $a--){?>
<option <?php if($teacher->MRCSyear == $a){ echo "selected"; }?>><?php echo $a ; ?></option>
<?php } ?>
</select>
</td>
<td><input type="text" name="MRCSmarks" class="form-control" id="MRCSmarks" value="<?=set_value('MRCSmarks'), $teacher->MRCSmarks?>"></td>
<td><input type="text" name="MRCSinst" class="form-control" id="MRCSinst" value="<?=set_value('MRCSinst', $teacher->MRCSinst)?>"></td>
</tr>
<tr>
<th>MRCPCH</th>
<td>
<select name="MRCPCHyear" id="MRCPCHyear" class="form-control">
<option value="0">Select</option>
<?php $cyear=date('Y'); for($a=$cyear; $a>=1947; $a--){?>
<option <?php if($teacher->MRCPCHyear == $a){ echo "selected"; }?>><?php echo $a ; ?></option>
<?php } ?>
</select>
</td>
<td><input type="text" name="MRCPCHmarks" class="form-control" id="MRCPCHmarks" value="<?=set_value('MRCPCHmarks'), $teacher->MRCPCHmarks?>"></td>
<td><input type="text" name="MRCPCHinst" class="form-control" id="MRCPCHinst" value="<?=set_value('MRCPCHinst', $teacher->MRCPCHinst)?>"></td>
</tr>
<tr>
<th>MPH</th>
<td>
<select name="MPHyear" id="MPHyear" class="form-control">
<option value="0">Select</option>
<?php $cyear=date('Y'); for($a=$cyear; $a>=1947; $a--){?>
<option <?php if($teacher->MPHyear == $a){ echo "selected"; }?>><?php echo $a ; ?></option>
<?php } ?>
</select>
</td>
<td><input type="text" name="MPHmarks" class="form-control" id="MPHmarks" value="<?=set_value('MPHmarks'), $teacher->MPHmarks?>"></td>
<td><input type="text" name="MPHinst" class="form-control" id="MPHinst" value="<?=set_value('MPHinst', $teacher->MPHinst)?>"></td>
</tr>
<tr>
<th>MS/MD</th>
<td>
<select name="MS_MDyear" id="MS_MDyear" class="form-control">
<option value="0">Select</option>
<?php $cyear=date('Y'); for($a=$cyear; $a>=1947; $a--){?>
<option <?php if($teacher->MS_MDyear == $a){ echo "selected"; }?>><?php echo $a ; ?></option>
<?php } ?>
</select>
</td>
<td><input type="text" name="MS_MDmarks" class="form-control" id="MS_MDmarks" value="<?=set_value('MS_MDmarks'), $teacher->MS_MDmarks?>"></td>
<td><input type="text" name="MS_MDinst" class="form-control" id="MS_MDinst" value="<?=set_value('MS_MDinst', $teacher->MS_MDinst)?>"></td>
</tr>
</table>
</div>

<div class="col-sm-12" style="padding:0;">
<p class="form_titlez">CORRESPONDENCE INFORMATION</p>                    

                        <?php
                        if(form_error('PermanentAddress'))
echo "<div class='form-group col-sm-12 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-12' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="PermanentAddress" class="control-label">
            <?=$this->lang->line("teacher_PermanentAddress")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                         <input type="text" class="form-control" id="PermanentAddress" name="PermanentAddress" value="<?=set_value('PermanentAddress', $teacher->PermanentAddress)?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('PermanentAddress'); ?>
                        </span>
                    </div>
                    
                        <?php
                        if(form_error('address'))
echo "<div class='form-group col-sm-12 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-12' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="address" class="control-label">
           <?=$this->lang->line("teacher_address")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                         <input type="text" class="form-control" id="address" name="address" value="<?=set_value('address', $teacher->address)?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('address'); ?>
                        </span>
                    </div>

                        <?php
                        if(form_error('phone'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="phone" class="control-label">
                          <?=$this->lang->line("teacher_phone")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                         <input type="text" class="form-control" id="phone" name="phone" value="<?=set_value('phone', $teacher->phone)?>" data-inputmask="'mask': '0399-99999999'" maxlength="12">
                        </div>
                        <span class="control-label">
                            <?php echo form_error('phone'); ?>
                        </span>
                    </div>


                        <?php
                        if(form_error('LandlineNo'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="LandlineNo" class="control-label">
                            <?=$this->lang->line("teacher_LandlineNo")?>
                        </label>
                        <div class="">
                         <input type="text" class="form-control" id="LandlineNo" name="LandlineNo" value="<?=set_value('LandlineNo', $teacher->LandlineNo)?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('LandlineNo'); ?>
                        </span>
                    </div>
                    
                    <?php
                        if(form_error('photo'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="photo" class="control-label">
                            <?=$this->lang->line("teacher_photo")?>
                        </label>
                        <div class="">
                            <div class="input-group image-preview">
                                <input type="text" class="form-control image-preview-filename" disabled="disabled">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                        <span class="fa fa-remove"></span>
                                        <?=$this->lang->line('teacher_clear')?>
                                    </button>
                                    <div class="btn btn-success image-preview-input">
                                        <span class="fa fa-repeat"></span>
                                        <span class="image-preview-input-title">
                                        <?=$this->lang->line('teacher_file_browse')?></span>
                    <input type="file" accept="image/png, image/jpeg, image/gif" name="photo"/>
                                    </div>
                                </span>
                            </div>
                        </div>

                        <span class="">
                            <?php echo form_error('photo'); ?>
                        </span>
                    </div>
                    
                    <div class="clearfix"></div>
 
                    <?php
                        if(form_error('devicecode'))
echo "<div class='form-group col-sm-3 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-3' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="devicecode" class="control-label">
                            <?=$this->lang->line("teacher_devicecode")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                         <input type="text" class="form-control" id="devicecode" name="devicecode" value="<?=set_value('devicecode', $teacher->devicecode)?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('devicecode'); ?>
                        </span>
                    </div>

                        <?php
                        if(form_error('attempcode'))
echo "<div class='form-group col-sm-3 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-3' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="attempcode" class="control-label">
                            <?=$this->lang->line("teacher_attempcode")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                         <input type="text" class="form-control" id="attempcode" name="attempcode" value="<?=set_value('attempcode', $teacher->attempcode)?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('attempcode'); ?>
                        </span>
                    </div>
                                        
						<?php
                        if(form_error('email'))
echo "<div class='form-group col-sm-3 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-3' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="email" class="control-label">
                            <?=$this->lang->line("teacher_email")?>
                        </label>
                        <div class="">
                         <input type="text" class="form-control" id="email" name="email" value="<?=set_value('email', $teacher->email)?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('email'); ?>
                        </span>
                    </div>                    
                                        
                    <?php
                        if(form_error('username'))
echo "<div class='form-group col-sm-3 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-3' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="username" class="control-label">
                            <?=$this->lang->line("teacher_username")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="username" name="username" value="<?=set_value('username', $teacher->username)?>" >
                        </div>
                         <span class="control-label">
                            <?php echo form_error('username'); ?>
                        </span>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-10 col-sm-2">
<input type="submit" class="btn btn-success" value="<?=$this->lang->line("update_teacher")?>" style="float:right; margin-right:20px;">
                        </div>
                    </div>

                </form>
            </div><!-- col-sm-8 --> 
        </div>
    </div>
</div>


<script type="text/javascript">
$( ".select2" ).select2();

$('#username').keyup(function() {
    $(this).val($(this).val().replace(/\s/g, ''));
});

$('#dob').datepicker({ startView: 2 });
$('.dob').datepicker({ startView: 2 });
$('#jod').datepicker();

$(document).on('click', '#close-preview', function(){ 
    $('.image-preview').popover('hide');
    // Hover befor close the preview

    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
           $('.content').css('padding-bottom', '120px');
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
        $(".image-preview-input-title").text("<?=$this->lang->line('teacher_file_browse')?>");
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
            $(".image-preview-input-title").text("<?=$this->lang->line('teacher_file_browse')?>");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);            
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
            $('.content').css('padding-bottom', '120px');
        }        
        reader.readAsDataURL(file);
    });  
});
</script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>

<script>
    $(":input").inputmask();
</script>
<script>
$(document).ready(function(e) {

var religion=$('#religion').val();
		if(religion=="Non-Muslim")
		{
		$('#sectzb').show();
		$('#sectz').hide();	
		}else{
		$('#sectzb').hide();
		$('#sectz').show();	
		}
		    
	$('#religion').change(function(e) {
        
		var religion=$('#religion').val();
		if(religion=="Non-Muslim")
		{
		$('#sectzb').show();
		$('#sectz').hide();	
		}else{
		$('#sectzb').hide();
		$('#sectz').show();	
		}
		
    });
	
});
</script>