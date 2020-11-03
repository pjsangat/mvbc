<?php
defined('C5_EXECUTE') or die("Access Denied.");
$u = new User();
?>
<?php if ($u->isRegistered()) {
    $ui = $u->getUserInfoObject();
    ?>
	<div class="ccm-conversation-avatar"><?=$ui->getUserAvatar()->output()?></div>
<?php 
} else {
	
    // non-logged-in posting. ?>
	<div class="form-group">
		<!-- <label class="control-label" for="cnvMessageAuthorName"><?=t('Full Name')?></label> -->
		<input type="text" class="form-control" name="cnvMessageAuthorName" placeholder="<?=t('Full Name')?>"/>
	</div>
	<div class="form-group">
		<!-- <label class="control-label" for="cnvMessageAuthorEmail"><?=t('Email Address')?></label> -->
		<input type="text" class="form-control" name="cnvMessageAuthorEmail" placeholder="<?=t('Email Address')?>"/>
	</div>
    <div class="form-group">
        <!-- <label class="control-label" for="cnvMessageAuthorWebsite"><?=t('Website')?></label> -->
        <input type="hidden" class="form-control" name="cnvMessageAuthorWebsite" value="" placeholder="<?=t('Website')?>"/>
    </div>
	<?php
    $captcha = Core::make('captcha');
    ?>
	<div class="form-group">
		<?php $captcha->label()?>
		<?php $captcha->showInput();
    ?>
		<?php $captcha->display();
    ?>
	</div>
<?php 
} ?>
