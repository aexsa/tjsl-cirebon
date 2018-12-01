
<?php /* /users/views/user_fields.php */

$currentMethod = $this->router->method;

$errorClass     = empty($errorClass) ? ' error' : $errorClass;
$controlClass   = empty($controlClass) ? 'span4' : $controlClass;
$registerClass  = $currentMethod == 'register' ? ' required' : '';
$editSettings   = $currentMethod == 'edit';

$defaultLanguage = isset($user->language) ? $user->language : strtolower(settings_item('language'));
$defaultTimezone = isset($user->timezone) ? $user->timezone : strtoupper(settings_item('site.default_user_timezone'));

?>
 
<div class="col-md-12">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row<?php echo form_error('email') ? $errorClass : ''; ?>" style="margin-right: 1px;">
                <input class="form-control " type="text" id="email" name="email" value="<?php echo set_value('email', isset($user) ? $user->email : ''); ?>" placeholder="masukkan email"/>
                <span class="help-inline"><?php echo form_error('email'); ?></span>
            </div>
        </div>
         <!-- tipe perusahaan -->
        <div class="col-md-6">
            <div class="form-group row" style="margin-left: 1px;">
                <select class="form-control" name="tipe_perusahaan_id" required>
                    <option value="">-- Tipe Perusahaan --</option>
                    <?php foreach ($list_tipe_perusahaan as $key => $value): ?>
                        <option value="<?php echo $key ?>"><?php echo $value ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row<?php echo form_error('display_name') ? $errorClass : ''; ?>" style="margin-right: 1px;">
                <input class="form-control <?php echo $controlClass; ?>" placeholder="masukkan Nama Lengkap" type="text" id="display_name" name="display_name" value="<?php echo set_value('display_name', isset($user) ? $user->display_name : ''); ?>" />
                <span class="help-inline"><?php echo form_error('display_name'); ?></span>
            </div>
        </div>
        <!-- nama perusahaan -->
        <div class="col-md-6">
            <div class="form-group row" style="margin-left: 1px;">
                <input class="form-control <?php echo $controlClass; ?>" placeholder="Nama Perusahaan" type="text" id="nama_perusahaan" name="nama_perusahaan" value="" />
                <span class="help-inline"><?php echo form_error('nama_perusahaan'); ?></span>
            </div>
        </div>
    </div>
    <div class="row">
    <?php if (settings_item('auth.login_type') !== 'email' || settings_item('auth.use_usernames')) : ?>
        <div class="col-md-6">
            <div class="form-group row<?php echo form_error('username') ? $errorClass : ''; ?>" style="margin-right: 1px;">
                <input class="form-control <?php echo $controlClass; ?>" placeholder="masukkan username" type="text" id="username" name="username" value="<?php echo set_value('username', isset($user) ? $user->username : ''); ?>" />
                <span class="help-inline"><?php echo form_error('username'); ?></span>
            </div>
        </div>
        <!-- SIUP perusahaan -->
        <div class="col-md-6">
            <div class="form-group row" style="margin-left: 1px;">
                <div class="col-md-12"><div class="name">SIUP :</div>
                <input class="form-dokumen" data-id="1" name="files" type="file" required></div>
            </div>
        </div>
    </div>
    <div class="row">
    <?php endif; ?>
       <div class="col-md-6">
            <div class="form-group row<?php echo form_error('us_role') ? $errorClass : ''; ?>" style="margin-right: 1px;">
                <select name="role_id" id="role_id" class="chzn-select <?php echo $controlClass; ?> form-control"> 
                    <option value="0"> -- Pilih Jenis User --</option>    
                    <option value="7">Admin Perusahaan</option>
                </select>
                <span class="help-inline"><?php echo form_error('display_name'); ?></span>
            </div>
        </div>
         <!-- kecamatan perusahaan -->
        <div class="col-md-6">
            <div class="form-group row" style="margin-left: 1px;">
                <select  name="selectSubDistrict" class="chosen-select form-control" id="selectSubDistrict" required>
                    <option value="">-- Pilih Kecamatan --</option>
                    <?php
                    foreach ($kecamatan as $kec) {
                        echo "<option value='$kec[id]'>$kec[nama]</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row<?php echo form_error('password') ? $errorClass : ''; ?>" style="margin-right: 1px;">
                <input class="form-control <?php echo $controlClass; ?>" type="password" id="password" placeholder="masukkan password" name="password" value="" />
                <span class="help-inline"><small><?php echo form_error('password'); ?></small></span>
                <p class="help-block"><small><?php echo isset($password_hints) ? $password_hints : ''; ?></small></p>
            </div>
        </div>
        <!-- kelurahan perusahaan -->
        <div class="col-md-6">
            <div class="form-group row" style="margin-left: 1px;">
                <select name="SelectSubSubDistrict" id="SelectSubSubDistrict" class="chosen-select form-control" data-rel="chosen" required>
                    <option value="">--pilih Kelurahan--</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row<?php echo form_error('pass_confirm') ? $errorClass : ''; ?>" style="margin-right: 1px;">
                <input class="form-control <?php echo $controlClass; ?>" type="password" id="pass_confirm" placeholder="Ulangi Password" name="pass_confirm" value="" />
                <span class="help-inline"><small><?php echo form_error('pass_confirm'); ?></small></span>
            </div>
        </div>
       <div class="col-md-6">
            <div class="form-group row" style="margin-left: 1px;">
                <input class="form-control" type="text" id="alamat" placeholder="Alamat Perusahaan" name="alamat" value="" />
            </div>
        </div>
    </div>
    
<?php if ($editSettings) : ?>
    <div class="col-md-6">
        <div class="form-group row<?php echo form_error('force_password_reset') ? $errorClass : ''; ?>">
            <label class="checkbox" for="force_password_reset">
                <input type="checkbox" id="force_password_reset" name="force_password_reset" value="1" <?php echo set_checkbox('force_password_reset', empty($user->force_password_reset)); ?> />
                <?php echo lang('us_force_password_reset'); ?>
            </label>
        </div>
    </div>
</div>
</div>
</div>
    <?php
    endif; ?>
<div hidden>
<?php if (! empty($languages) && is_array($languages)) :
    if (count($languages) == 1) :
?>
<input type="hidden" id="language" name="language" value="<?php echo $languages[0]; ?>" />
<?php
    else :
?>
<div class="form-group row<?php echo form_error('language') ? $errorClass : ''; ?>">
    <label class="col-md-2 " for="language"><?php echo lang('bf_language'); ?></label>
    <div class="col-md-4">
        <select name="language" id="language" class="chzn-select form-control <?php echo $controlClass; ?>">
            <?php foreach ($languages as $language) : ?>
            <option value="<?php e($language); ?>" <?php echo set_select('language', $language, $defaultLanguage == $language); ?>>
                <?php e(ucfirst($language)); ?>
            </option>
            <?php endforeach; ?>
        </select>
        <span class="help-inline"><?php echo form_error('language'); ?></span>
    </div>
</div>
<?php
    endif;
endif;
?>

<div class="form-group row<?php echo form_error('timezones') ? $errorClass : ''; ?>">
    <label class="col-md-2 " for="timezones"><?php echo lang('bf_timezone'); ?></label>
    <div class="col-md-4">
        <?php
        echo timezone_menu(
            set_value('timezones', isset($user) ? $user->timezone : $defaultTimezone),
            $controlClass,
            'timezones',
            array('id' => 'timezones')
        );
        ?>
        <span class="help-inline"><?php echo form_error('timezones'); ?></span>
    </div>
</div>
</div>

