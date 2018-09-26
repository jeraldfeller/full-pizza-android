<div class="searchResultRight">
		<span class="organize">{$LANG.search_orgby}</span>
		<form name="search1" method="post" action="">
			<div class="mapSelect">
				<select class="mapSearchIndex1" name="organizeby" id="organizeby" onchange="searchResultLeft();">
					<!--<option value="default">Default </option>-->
					<option value="mostpopular">{$LANG.search_orgmostpopular} </option>
					<option value="toprated" {if $smarty.request.organizeby eq 'toprated'}selected="selected"{/if}>{$LANG.search_orgtoprated} </option>
					<option value="newest" {if $smarty.request.organizeby eq 'newest'}selected="selected"{/if}>{$LANG.search_orgnewest} </option>
					<option value="minorder" {if $smarty.request.organizeby eq 'minorder'}selected="selected"{/if}>{$LANG.search_orgminorder}</option>
					<option value="deliveryfee" {if $smarty.request.organizeby eq 'deliveryfee'}selected="selected"{/if}>{$LANG.search_orgdelfee} </option>
					<option value="cashcoupon" {if $smarty.request.organizeby eq 'cashcoupon'}selected="selected"{/if}>{$LANG.search_orggetcoupon} </option>
				</select>
			</div>
		</form>
		<!--Map-->
		<!--<span class="flt"><img src="{$SITE_IMAGE_URL}/map.jpg" alt="" title="" /></span> --> 
		<!--<span id="showGoogleMaps" class="flt">{$GoogleMap}</span>-->
		<div id="showGoogleMaps" style="width: 208px; height: 240px;border:3px solid #EEE;"></div>
	</div>