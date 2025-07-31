<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-users"></i> <?=$this->lang->line('panel_title')?></h3>


        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("user/index")?>"><?=$this->lang->line('panel_titleb')?></a></li>
            <li class="active"><?=$this->lang->line('menu_add')?> <?=$this->lang->line('panel_titleb')?></li>
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
                            <?=$this->lang->line("user_name")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="name_id" name="name" value="<?=set_value('name')?>" >
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
                            <?=$this->lang->line("user_empcode")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="empcode" name="empcode" value="<?=set_value('empcode')?>" >
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
                            <?=$this->lang->line("user_fathname")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="fathname_id" name="fathname" value="<?=set_value('fathname')?>" >
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
                            <?=$this->lang->line("user_cnic")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="cnic_id" name="cnic" value="<?=set_value('cnic')?>" data-inputmask="'mask': '99999-9999999-9'"  placeholder="XXXXX-XXXXXXX-X">
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
                            <?=$this->lang->line("user_dob")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
            <input type="text" class="form-control" id="dob" name="dob" value="<?=set_value('dob')?>" >
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
                            <?=$this->lang->line("user_sex")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <?php
                                echo form_dropdown("sex", array($this->lang->line('user_sex_male') => $this->lang->line('user_sex_male'), $this->lang->line('user_sex_female') => $this->lang->line('user_sex_female')), set_value("sex"), "id='sex' class='form-control'");
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
                            <?=$this->lang->line("user_state")?> <span class="text-red">*</span>
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
                                echo form_dropdown("state", $stateArray, set_value("state"), "id='state' class='form-control select2'");
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
                            <?=$this->lang->line("user_domicile")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
<input type="text" class="form-control" id="domicile" name="domicile" value="<?=set_value('domicile')?>" >
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
                            <?=$this->lang->line("user_marstatus")?> <span class="text-red">*</span>
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
                                echo form_dropdown("marstatus", $marstatusArray, set_value("marstatus"), "id='marstatus' class='form-control select2'");
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
                            <?=$this->lang->line("user_religion")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <?php
                                $religionArray = array(
                                    'Muslim' => 'Muslim',
                                    'Non-Muslim' => 'Non-Muslim'
                                );
                                echo form_dropdown("religion", $religionArray, set_value("religion"), "id='religion' class='form-control select2'");
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
                 echo form_dropdown("sect", $sectArray, set_value("sect"), "id='sect' class='form-control select2'");
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
echo form_dropdown("sectb", $nonmuslimsArray, set_value("sectb"), "id='sectb' class='form-control select2'");
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
                     <?=$this->lang->line("user_nextofkin")?> (Name and Relation)
                        </label>
                        <div class="">
                         <input type="text" class="form-control" id="nextofkin" name="nextofkin" value="<?=set_value('nextofkin')?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('nextofkin'); ?>
                        </span>
                    </div>
                    
                    <?php
                        if(form_error('bgroup'))
echo "<div class='form-group col-sm-6 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-6' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="bgroup" class="control-label">
                            <?=$this->lang->line("user_bgroup")?>
                        </label>
                        <div class="">
                         <input type="text" class="form-control" id="bgroup" name="bgroup" value="<?=set_value('bgroup')?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('bgroup'); ?>
                        </span>
                    </div>

					<?php
                        if(form_error('nativelang'))
echo "<div class='form-group col-sm-6 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-6' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="nativelang" class="control-label">
                            <?=$this->lang->line("user_nativelang")?>
                        </label>
                        <div class="">
                         <input type="text" class="form-control" id="nativelang" name="nativelang" value="<?=set_value('nativelang')?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('nativelang'); ?>
                        </span>
                    </div>
                    
<div class="clearfix"></div>
<div class="col-sm-12" style="padding:0;">
<p class="form_titlez">OFFICIAL INFORMATION</p>
                        <?php
                        if(form_error('AppointmentDate'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="AppointmentDate" class="control-label">
                            <?=$this->lang->line("user_AppointmentDate")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                         <input type="text" class="form-control dob" id="AppointmentDate" name="AppointmentDate" value="<?=set_value('AppointmentDate')?>" >
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
        <?=$this->lang->line("user_jod")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                         <input type="text" class="form-control dob" id="jod" name="jod" value="<?=set_value('jod')?>" >
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
                            <?=$this->lang->line("user_FacultyType")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                        <?php
                                $FacultyTypeArray = array(
                                    'Basic Science' => 'Basic Science',
									'Clinical Science' => 'Clinical Science'
                                );
                                echo form_dropdown("FacultyType", $FacultyTypeArray, set_value("FacultyType"), "id='FacultyType' class='form-control select2'");
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
                            <?=$this->lang->line("user_Department")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                        <?php
                                $DepartmentArray = array(
                                    'Top Management' => 'Top Management',
									'Admin Staff' => 'Admin Staff',
								'General Support Staff' => 'General Support Staff',
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
									'Oncology' => 'Oncology',
									'Peads' => 'Peads',
									'Staff Nurse' => 'Staff Nurse',
									'Dispencer' => 'Dispencer',
									'Security Staff' => 'Security Staff',
									'Mess Staff' => 'Mess Staff',
									'Admin' => 'Admin',
									'College' => 'College',
									'Hospital' => 'Hospital',
									'Boys Hostel' => 'Boys Hostel',
									'Girls Hostel' => 'Girls Hostel',
                                );
                                echo form_dropdown("Department", $DepartmentArray, set_value("Department"), "id='Department' class='form-control select2'");
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
         <?=$this->lang->line("user_designation")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                                <?php
                                $designationArray = array(
							'Chairman' => 'Chairman',
							'Director Admin/Finance' => 'Director Admin/Finance',
							'Managing Director' => 'Managing Director',
							'Assistant Admin Officer' => 'Assistant Admin Officer',
							'Accountant' => 'Accountant',
							'Assistant Admin Hospital' => 'Assistant Admin Hospital',
							'HR' => 'HR',
							'General Admin' => 'General Admin',
							'PA to Principal' => 'PA to Principal',
							'Assistant Accountant' => 'Assistant Accountant',
							'Assistant AAO' => 'Assistant AAO',
							'IT Assistant' => 'IT Assistant',
					'Assistant Warden Girls Hostel' => 'Assistant Warden Girls Hostel',
							'Reception Admin' => 'Reception Admin',
							'Reception Hospital' => 'Reception Hospital',
							'Store Keeper' => 'Store Keeper',
							'Library' => 'Library',
							'Bio Medical Tech' => 'Bio Medical Tech',
									'Head Nurse' => 'Head Nurse',
									'Nurse' => 'Nurse',
									'LHW' => 'LHW',
									'LHV' => 'LHV',
									'Midwife' => 'Midwife',
									'Clinical Assistant' => 'Clinical Assistant',
									'Dispenser' => 'Dispenser',
									'Lab Technician' => 'Lab Technician',
								'Clinical Assistant' => 'Clinical Assistant',
							'Clinical Assistant (O-T)' => 'Clinical Assistant (O-T)',
									'OTA' => 'OTA',
									'Helper Radiographer' => 'Helper Radiographer',
									'DH Assistant' => 'DH Assistant',
								'Lab Attendant' => 'Lab Attendant',
									'Computer Operator' => 'Computer Operator',
									'Peon' => 'Peon',
									'Ward Boy' => 'Ward Boy',
									'Ward Aya' => 'Ward Aya',
									'Main Gate Keeper' => 'Main Gate Keeper',
									'Bus Driver' => 'Bus Driver',
									'Van Driver' => 'Van Driver',
									'Electrician' => 'Electrician',
									'Plumber' => 'Plumber',
									'Gardner' => 'Gardner',
									'Imam Masjid' => 'Imam Masjid',
									'Guard' => 'Guard',
									'Sanitary Worker' => 'Sanitary Worker',
									'Aya' => 'Aya',
									'Mess Supervisor' => 'Mess Supervisor',
									'Cook' => 'Cook',
									'Helper Cook' => 'Helper Cook',
									'Tandorchi' => 'Tandorchi',
									'Tandorchi Helper' => 'Tandorchi Helper',
									'Faculty Waiter' => 'Faculty Waiter',
									'Waiter' => 'Waiter',
									'Waitress' => 'Waitress',
									'Dish Washer' => 'Dish Washer',
									'Cleaner' => 'Cleaner'
                                );
                                echo form_dropdown("designation", $designationArray, set_value("designation"), "id='designation' class='form-control select2'");
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
                  <?=$this->lang->line("user_currentdesignation")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                                <?php
                                $currentdesignationArray = array(
							'Chairman' => 'Chairman',
							'Director Admin/Finance' => 'Director Admin/Finance',
							'Managing Director' => 'Managing Director',
							'Assistant Admin Officer' => 'Assistant Admin Officer',
							'Accountant' => 'Accountant',
							'Assistant Admin Hospital' => 'Assistant Admin Hospital',
							'HR' => 'HR',
							'General Admin' => 'General Admin',
							'PA to Principal' => 'PA to Principal',
							'Assistant Accountant' => 'Assistant Accountant',
							'Assistant AAO' => 'Assistant AAO',
							'IT Assistant' => 'IT Assistant',
					'Assistant Warden Girls Hostel' => 'Assistant Warden Girls Hostel',
							'Reception Admin' => 'Reception Admin',
							'Reception Hospital' => 'Reception Hospital',
							'Store Keeper' => 'Store Keeper',
							'Library' => 'Library',
							'Bio Medical Tech' => 'Bio Medical Tech',
									'Head Nurse' => 'Head Nurse',
									'Nurse' => 'Nurse',
									'LHW' => 'LHW',
									'LHV' => 'LHV',
									'Midwife' => 'Midwife',
									'Clinical Assistant' => 'Clinical Assistant',
									'Dispenser' => 'Dispenser',
									'Lab Technician' => 'Lab Technician',
								'Clinical Assistant' => 'Clinical Assistant',
							'Clinical Assistant (O-T)' => 'Clinical Assistant (O-T)',
									'OTA' => 'OTA',
									'Helper Radiographer' => 'Helper Radiographer',
									'DH Assistant' => 'DH Assistant',
								'Lab Attendant' => 'Lab Attendant',
									'Computer Operator' => 'Computer Operator',
									'Peon' => 'Peon',
									'Ward Boy' => 'Ward Boy',
									'Ward Aya' => 'Ward Aya',
									'Main Gate Keeper' => 'Main Gate Keeper',
									'Bus Driver' => 'Bus Driver',
									'Van Driver' => 'Van Driver',
									'Electrician' => 'Electrician',
									'Plumber' => 'Plumber',
									'Gardner' => 'Gardner',
									'Imam Masjid' => 'Imam Masjid',
									'Guard' => 'Guard',
									'Sanitary Worker' => 'Sanitary Worker',
									'Aya' => 'Aya',
									'Mess Supervisor' => 'Mess Supervisor',
									'Cook' => 'Cook',
									'Helper Cook' => 'Helper Cook',
									'Tandorchi' => 'Tandorchi',
									'Tandorchi Helper' => 'Tandorchi Helper',
									'Faculty Waiter' => 'Faculty Waiter',
									'Waiter' => 'Waiter',
									'Waitress' => 'Waitress',
									'Dish Washer' => 'Dish Washer',
									'Cleaner' => 'Cleaner'
                                );
                                echo form_dropdown("currentdesignation", $currentdesignationArray, set_value("currentdesignation"), "id='currentdesignation' class='form-control select2'");
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
                   <?=$this->lang->line("user_Qualification")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                         <input type="text" class="form-control" id="Qualification" name="Qualification" value="<?=set_value('Qualification')?>" >
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
              <?=$this->lang->line("user_Specialization")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                         <input type="text" class="form-control" id="Specialization" name="Specialization" value="<?=set_value('Specialization')?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('Specialization'); ?>
                        </span>
                    </div>
                    
                      <?php
                        if(form_error('AddQualification'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="AddQualification" class="control-label">
      <?=$this->lang->line("user_AddQualification")?>
                        </label>
                        <div class="">
                         <input type="text" class="form-control" id="AddQualification" name="AddQualification" value="<?=set_value('AddQualification')?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('AddQualification'); ?>
                        </span>
                    </div>
                                           
					   <?php
                        if(form_error('EmploymentMode'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="EmploymentMode" class="control-label">
                    <?=$this->lang->line("user_EmploymentMode")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <?php
                                $EmploymentModeArray = array(
                                    'Regular' => 'Regular',
									'Contract' => 'Contract',
                                    'Internee' => 'Internee',
									'House Job' => 'House Job'
                                );
                                echo form_dropdown("EmploymentMode", $EmploymentModeArray, set_value("EmploymentMode"), "id='EmploymentMode' class='form-control select2'");
                            ?>
                        </div>
                        <span class="control-label">
                            <?php echo form_error('EmploymentMode'); ?>
                        </span>
                    </div>
                    
                    

                        <?php
                        if(form_error('EmploymentStatus'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="EmploymentStatus" class="control-label">
                    <?=$this->lang->line("user_EmploymentStatus")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <?php
                                $EmploymentStatusArray = array(
                                    'Active' => 'Active',
									'Leave' => 'Leave',
									'Left' => 'Left',
                                    'Others' => 'Others'
                                );
                                echo form_dropdown("EmploymentStatus", $EmploymentStatusArray, set_value("EmploymentStatus"), "id='EmploymentStatus' class='form-control select2'");
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
                <?=$this->lang->line("user_ContractStartDate")?>
                        </label>
                        <div class="">
                         <input type="text" class="form-control dob" id="ContractStartDate" name="ContractStartDate" value="<?=set_value('ContractStartDate')?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('ContractStartDate'); ?>
                        </span>
                    </div>

                        <?php
                        if(form_error('ContractEndDate'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="ContractEndDate" class="control-label">
                <?=$this->lang->line("user_ContractEndDate")?>
                        </label>
                        <div class="">
                         <input type="text" class="form-control dob" id="ContractEndDate" name="ContractEndDate" value="<?=set_value('ContractEndDate')?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('ContractEndDate'); ?>
                        </span>
                    </div>

                        <?php
                        if(form_error('LastPromotionDate'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="LastPromotionDate" class="control-label">
                <?=$this->lang->line("user_LastPromotionDate")?>
                        </label>
                        <div class="">
                         <input type="text" class="form-control dob" id="LastPromotionDate" name="LastPromotionDate" value="<?=set_value('LastPromotionDate')?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('LastPromotionDate'); ?>
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
                                echo form_dropdown("shift_id", $shiftArray, set_value("shift_id"), "id='shift_id' class='form-control select2'");
                            ?>
                        </div>
                        <span class="control-label">
                            <?php echo form_error('shift_id'); ?>
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
<th>Matriculation</th>
<td>
<select name="Matricyear" id="Matricyear" class="form-control">
<option value="0">Select</option>
<?php $cyear=date('Y'); for($a=$cyear; $a>=1947; $a--){?>
<option><?php echo $a ; ?></option>
<?php } ?>
</select>
</td>
<td><input type="text" name="Matricmarks" class="form-control" id="Matricmarks" value="<?=set_value('Matricmarks')?>"></td>
<td><input type="text" name="Matricinst" class="form-control" id="Matricinst" value="<?=set_value('Matricinst')?>"></td>
</tr>
<tr>
<th>FA/FSC/Equal</th>
<td>
<select name="Fscyear" id="Fscyear" class="form-control">
<option value="0">Select</option>
<?php $cyear=date('Y'); for($a=$cyear; $a>=1947; $a--){?>
<option><?php echo $a ; ?></option>
<?php } ?>
</select>
</td>
<td><input type="text" name="Fscmarks" class="form-control" id="Fscmarks" value="<?=set_value('Fscmarks')?>"></td>
<td><input type="text" name="Fscinst" class="form-control" id="Fscinst" value="<?=set_value('Fscinst')?>"></td>
</tr>
<tr>
<th>BA/BSC</th>
<td>
<select name="BSCyear" id="BSCyear" class="form-control">
<option value="0">Select</option>
<?php $cyear=date('Y'); for($a=$cyear; $a>=1947; $a--){?>
<option><?php echo $a ; ?></option>
<?php } ?>
</select>
</td>
<td><input type="text" name="BSCmarks" class="form-control" id="BSCmarks" value="<?=set_value('BSCmarks')?>"></td>
<td><input type="text" name="BSCinst" class="form-control" id="BSCinst" value="<?=set_value('BSCinst')?>"></td>
</tr>
<tr>
<th>MA/MSc</th>
<td>
<select name="MScyear" id="MScyear" class="form-control">
<option value="0">Select</option>
<?php $cyear=date('Y'); for($a=$cyear; $a>=1947; $a--){?>
<option><?php echo $a ; ?></option>
<?php } ?>
</select>
</td>
<td><input type="text" name="MScmarks" class="form-control" id="MScmarks" value="<?=set_value('MScmarks')?>"></td>
<td><input type="text" name="MScinst" class="form-control" id="MScinst" value="<?=set_value('MScinst')?>"></td>
</tr>
<tr>
<th>BS</th>
<td>
<select name="BSyear" id="BSyear" class="form-control">
<option value="0">Select</option>
<?php $cyear=date('Y'); for($a=$cyear; $a>=1947; $a--){?>
<option><?php echo $a ; ?></option>
<?php } ?>
</select>
</td>
<td><input type="text" name="BSmarks" class="form-control" id="BSmarks" value="<?=set_value('BSmarks')?>"></td>
<td><input type="text" name="BSinst" class="form-control" id="BSinst" value="<?=set_value('BSinst')?>"></td>
</tr>
<tr>
<th>MS</th>
<td>
<select name="MSyear" id="MSyear" class="form-control">
<option value="0">Select</option>
<?php $cyear=date('Y'); for($a=$cyear; $a>=1947; $a--){?>
<option><?php echo $a ; ?></option>
<?php } ?>
</select>
</td>
<td><input type="text" name="MSmarks" class="form-control" id="MSmarks" value="<?=set_value('MSmarks')?>"></td>
<td><input type="text" name="MSinst" class="form-control" id="MSinst" value="<?=set_value('MSinst')?>"></td>
</tr>
<tr>
<th>PHD</th>
<td>
<select name="PHDyear" id="PHDyear" class="form-control">
<option value="0">Select</option>
<?php $cyear=date('Y'); for($a=$cyear; $a>=1947; $a--){?>
<option><?php echo $a ; ?></option>
<?php } ?>
</select>
</td>
<td><input type="text" name="PHDmarks" class="form-control" id="PHDmarks" value="<?=set_value('PHDmarks')?>"></td>
<td><input type="text" name="PHDinst" class="form-control" id="PHDinst" value="<?=set_value('PHDinst')?>"></td>
</tr>
<tr>
<th>OTHER</th>
<td>
<select name="OTHERyear" id="OTHERyear" class="form-control">
<option value="0">Select</option>
<?php $cyear=date('Y'); for($a=$cyear; $a>=1947; $a--){?>
<option><?php echo $a ; ?></option>
<?php } ?>
</select>
</td>
<td><input type="text" name="OTHERmarks" class="form-control" id="OTHERmarks" value="<?=set_value('OTHERmarks')?>"></td>
<td><input type="text" name="OTHERinst" class="form-control" id="OTHERinst" value="<?=set_value('OTHERinst')?>"></td>
</tr>
</table>
</div>

<div class="clearfix"></div>
<div class="col-sm-12" style="padding:0;">
<p class="form_titlez">CORRESPONDENCE INFORMATION</p>                    

                        <?php
                        if(form_error('PermanentAddress'))
echo "<div class='form-group col-sm-12 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-12' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="PermanentAddress" class="control-label">
            <?=$this->lang->line("user_PermanentAddress")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                         <input type="text" class="form-control" id="PermanentAddress" name="PermanentAddress" value="<?=set_value('PermanentAddress')?>" >
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
           <?=$this->lang->line("user_address")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                         <input type="text" class="form-control" id="address" name="address" value="<?=set_value('address')?>" >
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
                          <?=$this->lang->line("user_phone")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                         <input type="text" class="form-control" id="phone" name="phone" value="<?=set_value('phone')?>" data-inputmask="'mask': '0399-99999999'" maxlength= "12">
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
                            <?=$this->lang->line("user_LandlineNo")?>
                        </label>
                        <div class="">
                         <input type="text" class="form-control" id="LandlineNo" name="LandlineNo" value="<?=set_value('LandlineNo')?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('LandlineNo'); ?>
                        </span>
                    </div>
                                        
                        <?php
                        if(form_error('email'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="email" class="control-label">
                            <?=$this->lang->line("user_email")?>
                        </label>
                        <div class="">
                         <input type="text" class="form-control" id="email" name="email" value="<?=set_value('email')?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('email'); ?>
                        </span>
                    </div>                    
                    
                    <?php
                        if(form_error('photo'))
echo "<div class='form-group col-sm-6 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-6' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="photo" class="control-label">
                            <?=$this->lang->line("user_photo")?>
                        </label>
                        <div class="">
                            <div class="input-group image-preview">
                                <input type="text" class="form-control image-preview-filename" disabled="disabled">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                        <span class="fa fa-remove"></span>
                                        <?=$this->lang->line('user_clear')?>
                                    </button>
                                    <div class="btn btn-success image-preview-input">
                                        <span class="fa fa-repeat"></span>
                                        <span class="image-preview-input-title">
                                        <?=$this->lang->line('user_file_browse')?></span>
                                        <input type="file" accept="image/png, image/jpeg, image/gif" name="photo"/>
                                    </div>
                                </span>
                            </div>
                        </div>

                        <span class="">
                            <?php echo form_error('photo'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('usertypeID'))
echo "<div class='form-group col-sm-6 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-6' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="usertypeID" class="control-label">
                            <?=$this->lang->line("user_usertype")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <?php
                                $array[0] = $this->lang->line('user_select_usertype');
                                $blockuser = array(1, 2, 3, 4);
                                if(customCompute($usertypes)) {
                                    foreach ($usertypes as $key => $usertype) {
                                        if(!in_array($usertype->usertypeID, $blockuser)) {
                                            $array[$usertype->usertypeID] = $usertype->usertype;
                                        }
                                    }
                                }
                                echo form_dropdown("usertypeID", $array,
                                    set_value("usertypeID"), "id='usertypeID' class='form-control select2'"
                                );
                            ?>
                        </div>
                        <span class="control-label">
                            <?php echo form_error('usertypeID'); ?>
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
                            <?=$this->lang->line("user_devicecode")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="devicecode" name="devicecode" value="<?=set_value('devicecode')?>" >
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
                            <?=$this->lang->line("user_attempcode")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="attempcode" name="attempcode" value="<?=set_value('attempcode')?>" >
                        </div>
                         <span class="control-label">
                            <?php echo form_error('attempcode'); ?>
                        </span>
                    </div>
                    
					<?php
                        if(form_error('username'))
echo "<div class='form-group col-sm-3 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-3' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="username" class="control-label">
                            <?=$this->lang->line("user_username")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="username" name="username" value="<?=set_value('username')?>" >
                        </div>
                         <span class="control-label">
                            <?php echo form_error('username'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('password'))
echo "<div class='form-group col-sm-3 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-3' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="password" class="control-label">
                            <?=$this->lang->line("user_password")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <input type="password" class="form-control" id="password" name="password" value="<?=set_value('password')?>" >
                        </div>
                         <span class="control-label">
                            <?php echo form_error('password'); ?>
                        </span>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-10 col-sm-2">
       <input type="submit" class="btn btn-success" value="<?=$this->lang->line("add_user")?>"  style="float:right; margin-right:20px;">
                        </div>
                    </div>

                </form>
                <?php if ($siteinfos->note==1) { ?>
                    <div class="callout callout-danger">
                        <p><b>Note:</b> Create user role before create a user. User like as school staff.</p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$( ".select2" ).select2();

$('#username').keyup(function() {
    $(this).val($(this).val().replace(/\s/g, ''));
});

$('#dob').datepicker({ startView: 2 });
$('#jod').datepicker({ dateFormat : 'dd-mm-yyyy' });

$('.dob').datepicker({ startView: 2 });
$('.jod').datepicker({ dateFormat : 'dd-mm-yyyy' });

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
        $(".image-preview-input-title").text("<?=$this->lang->line('user_file_browse')?>");
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
            $(".image-preview-input-title").text("<?=$this->lang->line('user_file_browse')?>");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
            $('.content').css('padding-bottom', '100px');
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