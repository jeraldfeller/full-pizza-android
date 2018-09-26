<div class="rightContHeading Heading">{if $smarty.get.eid neq ''}Edit Sub Addons{else}Add Sub Addons{/if}</div>
<div class="rightContBody">
	<div class="riteContWrap1">
	<div id="errormsg"></div>
	
	<form name="addNewAddons" method="post" action="addonsAddEdit.php" onsubmit="return {if $smarty.get.eid neq ''}subaddonsValidateEdit();{else}subaddonsValidateNew();{/if}">
		<input type="hidden" name="eid" id="eid" value="{$smarty.get.eid}">
		<input type="hidden" name="said" id="said" value="{$smarty.get.said}">
		
		<!--Addons Name-->
		<div class="addPageCont">
			<span class="addPageRightFont">Sub Addons Name:</span>
			<input class="textbox" type="text" name="addons_name" id="addons_name" value="{if $smarty.get.eid neq ''}{$addonsname|stripslashes}{/if}" />
			<script>document.addNewAddons.addons_name.focus();</script>
		</div>
		
		<div class="buttonCont">
			<input type="submit" class="button" name="addEdit" value="{if $smarty.get.eid}Edit{else}Add{/if}"> 
			<a class="CanceButton" href="addonsSubManage.php?said={$smarty.get.said}">Cancel</a>
		</div>
	</form>
</div>
</div>