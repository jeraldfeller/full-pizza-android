	{* ---------- Restaurant Commission ----------------- *}
	
	<div class="form-group">
		<span class="control-label col-sm-4 font-normal">Bank Name </span>
		<div class="col-sm-4">
    		<input class="form-control" type="text" name="res_bank_name" id="res_bank_name" value="{if $smarty.get.eid neq ''}{$restaurantEditList.0.res_bank_name|stripslashes}{/if}" />
    		<span id="resCommErr"></span>
        </div>
	</div>
	
	<div class="form-group">
		<span class="control-label col-sm-4 font-normal">Bank A/C No <span class="color1"></span></span>
		<div class="col-sm-4">
    		<input class="form-control" type="text" name="res_ac_no" id="res_ac_no" value="{if $smarty.get.eid neq ''}{$restaurantEditList.0.res_ac_no|stripslashes}{/if}" />
    		<span id="resCommErr"></span>
        </div>
	</div>
	
	<div class="form-group">
		<span class="control-label col-sm-4 font-normal">Routine No <span class="color1"></span></span>
		<div class="col-sm-4">
    		<input class="form-control" type="text" name="res_routine_no" id="res_routine_no" value="{if $smarty.get.eid neq ''}{$restaurantEditList.0.res_routine_no|stripslashes}{/if}" />
    		<span id="resCommErr"></span>
        </div>
	</div>
	
	<div class="form-group">
		<span class="control-label col-sm-4 font-normal">Swift Code <span class="color1"></span></span>
		<div class="col-sm-4">
    		<input class="form-control" type="text" name="res_swift_code" id="res_swift_code" value="{if $smarty.get.eid neq ''}{$restaurantEditList.0.res_swift_code|stripslashes}{/if}" />
    		<span id="resCommErr"></span>
        </div>
	</div>