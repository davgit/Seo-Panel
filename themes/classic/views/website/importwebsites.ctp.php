<?php 
echo showSectionHead($spTextPanel['Import Websites']);

if (!empty($msg)) {
	?>
	<p class="dirmsg">
		<font class="success"><?php echo $msg?></font>
	</p>
	<? 
}
	
$scriptUrl = SP_WEBPATH . "/websites.php";	
?>
<div id='import_website_div'>
<form id="projectform" name="projectform" target="website_import_frame" action="<?php echo $scriptUrl; ?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="sec" value="import"/>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="left" width='30%'><?php echo $spTextPanel['Import Websites']; ?></td>
		<td class="right">&nbsp;</td>
	</tr>
	<?php if(!empty($isAdmin)){ ?>	
		<tr class="blue_row">
			<td class="td_left_col"><?php echo $spText['common']['User']?>:</td>
			<td class="td_right_col">
				<select name="userid" style="width:150px;">
					<?php foreach($userList as $userInfo){?>
						<?php if($userInfo['id'] == $userSelected){?>
							<option value="<?php echo $userInfo['id']?>" selected><?php echo $userInfo['username']?></option>
						<?php }else{?>
							<option value="<?php echo $userInfo['id']?>"><?php echo $userInfo['username']?></option>
						<?php }?>						
					<?php }?>
				</select>
			</td>
		</tr>
	<?php }?>
	<tr class="white_row">
		<td class="td_left_col"><?=$spTextWeb['Website CSV File']?>:</td>
		<td class="td_right_col">
			<input type="file" name="website_csv_file" style="height: 22px;">
			<br>
			CSV format
			name, url, meta title, meta description, meta keywords, status
			<br>  
			<a href="<?php echo SP_WEBPATH ?>/data/website_import_sample.csv" target="_blank"><?php echo $spText['common']['Sample CSV File']?></a>
		</td>
	</tr>		
	<tr class="blue_row">
		<td class="tab_left_bot_noborder"></td>
		<td class="tab_right_bot"></td>
	</tr>
	<tr class="listBot">
		<td class="left" colspan="1"></td>
		<td class="right"></td>
	</tr>
</table>
<table width="100%" cellspacing="0" cellpadding="0" border="0" class="actionSec">
	<tr>
    	<td style="padding-top: 6px;text-align:right;">
    		<a onclick="scriptDoLoad('websites.php', 'content')" href="javascript:void(0);" class="actionbut">
         		<?php echo $spText['button']['Cancel']?>
         	</a>&nbsp;
         	<?php $actFun = SP_DEMO ? "alertDemoMsg()" : 'projectform.submit();'; ?>
         	<a onclick="<?php echo $actFun?>" href="javascript:void(0);" class="actionbut">
         		<?php echo $spText['button']['Proceed']?>
         	</a>
    	</td>
	</tr>
</table>
</form>
</div>
<div><iframe style="border:none;" name="website_import_frame" id="website_import_frame"></iframe></div>