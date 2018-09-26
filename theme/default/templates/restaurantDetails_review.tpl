{$objSearchDetails->restaurantReviewDetails()}
<div class="searchResultInner">
	<div class="contents_review_left">
		{*<div class="cont_review_head_left">
			<div class="cont_review_head1">{$LANG.res_details_review}</div>
			{if $restaurant_reviews_count gt 0}
			<div class="cont_review_head2">
				<span class="flt">{$LANG.res_details_revieworganize}:</span>
				<select name="organize_review" id="organize_review" onchange="organizeReview(this.value,'{$smarty.get.resid}');">
					<option>{$LANG.res_details_revieworgall}</option>
					<option value="newest">{$LANG.res_details_revieworgnew}</option>
					<option value="today">{$LANG.res_details_revieworgtoday}</option>
					<option value="ratingasc">{$LANG.res_details_reviewrating1}</option>
					<option value="ratingdesc">{$LANG.res_details_reviewrating5}</option>
				</select>
			</div>
			{/if}
		</div>*}
		<div id="revieworganizeby">
			{section name="review" loop=$restaurant_reviews}
			{if $smarty.section.review.rownum is odd}
				{assign var="reviews" value="cont_review_head_left1"}
			{else}
				{assign var="reviews" value="cont_review_head_left2"}
			{/if}
			<div class="{$reviews}">
				<div class="upDownImg col-md-1 col-xs-3 col-sm-1">
					{*if $restaurant_reviews[review].rating eq '5' or $restaurant_reviews[review].rating eq '4' or $restaurant_reviews[review].rating eq '3'}
					<img alt="" title="" src="{$SITE_IMAGE_URL}/review_img.png" />
					{else}
					<img alt="" title="" src="{$SITE_IMAGE_URL}/review_img.png" />
					{/if*}
				</div>
				<div class="likeTex col-md-11 col-xs-9 col-sm-11">
					<span class="cont_review_post col-md-10 col-xs-6 col-sm-10">{*$LANG.res_details_reviewpostby*} <span style="color:#faaf0e;">{$restaurant_reviews[review].customername|ucfirst|stripslashes}</span> <span style="color:#9f9f9f">{$LANG.res_details_reviewposton}</span> {$restaurant_reviews[review].addeddate|date_format:"%d.%m.%Y"}</span>
					<span class="col-md-2 col-xs-6 col-sm-2">
					<span class="newcont_review_star1 pull-right">
						{if $restaurant_reviews[review].rating eq '1'} <span class="reviewStar reviewStar1"></span>
						{elseif $restaurant_reviews[review].rating eq '2'} <span class="reviewStar reviewStar2"></span>
						{elseif $restaurant_reviews[review].rating eq '3'}<span class="reviewStar reviewStar3"></span>
						{elseif $restaurant_reviews[review].rating eq '4'} <span class="reviewStar reviewStar4"></span>
						{elseif $restaurant_reviews[review].rating eq '5'} <span class="reviewStar"></span>
						{/if}
						
					</span></span>
					<div class="col-md-12 col-xs-12 col-sm-12">
						<span class="cont_review_para"><span class="open_quotes"><img src="{$SITE_IMAGE_URL}/open_quotes.png" /></span>{$restaurant_reviews[review].message|ucfirst|stripslashes}<span class="close_quotes"><img src="{$SITE_IMAGE_URL}/close_quotes.png" /></span></span>
					</div>
					<!--<span class="cont_review_star1">
					{if $restaurant_reviews[review].rating eq '1'} <img alt="" title="" src="{$SITE_IMAGE_URL}/single-star.png" /> 
					{elseif $restaurant_reviews[review].rating eq '2'} <img alt="" title="" src="{$SITE_IMAGE_URL}/double-star.png" /> 
					{elseif $restaurant_reviews[review].rating eq '3'} <img alt="" title="" src="{$SITE_IMAGE_URL}/triple-star.png" /> 
					{elseif $restaurant_reviews[review].rating eq '4'} <img alt="" title="" src="{$SITE_IMAGE_URL}/four-star.png" /> 
					{elseif $restaurant_reviews[review].rating eq '5'} <img alt="" title="" src="{$SITE_IMAGE_URL}/five-star.png" /> 
					{/if}
					</span>-->
					
					
				</div>
			</div>
			{sectionelse}
				<div style="color:red; text-align:center;">{$LANG.res_details_reviewno} </div>
			{/section}
		</div>
		<!--<div class="cont_review_head_left1">
			<span class="cont_review_para">Very bad food, not fresh, high in salt. naans were very hard.will not order again.</span>
			<span class="cont_review_post">Posted by <b>Gaurav</b> on <b>07/06/2011</b></span>
		</div>-->
	</div>
	<!--<div class="reviewWriterbtn1">
		<a class="review1NewBtn1" title="Write a Review" href="javascript:void(0);">
			{* <img alt="" title="" src="{$SITE_IMAGE_URL}/review_button.png" />*}
			{$LANG.res_details_writereview}
		</a>
	</div>-->
</div>
