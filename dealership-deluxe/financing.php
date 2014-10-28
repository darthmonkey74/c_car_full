<?php
/*
Template Name: Financing
*/
?>
<?php get_header(); ?>	
<div class="top-single-bar hide">
            <div class="backToInventory show-for-small"><a href="javascript: history.go(-1)">< Back</a></div>
            <div class="show-for-small refine-search-single"><a id="searchBoxPop2" href="#"></a></div>
            <div class="clear"></div>
            </div>
            <div id="sidebar-search" > 
		<?php if ( ! dynamic_sidebar( 'Search Module' )) : ?>
				<?php endif; ?>
				</div>
				<?php cps_ajax_search_results(); ?>
				<div id="content-single">		
			<div class="cpsAjaxLoaderCenter"></div> 
				<div class="detail-page-content hideOnSearch">
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<div class="page-post">                 	 
					<h1 class="common"><?php the_title();?></h1>	
					<div class="thumb_articles"><a href="<?php the_permalink();?>"><?php  gorilla_img($post->ID,'featured'); ?></a></div>
						<?php the_content();?>
					</div>
					<script language="JavaScript">
function checkForZero(field)
{
    if (field.value == 0 || field.value.length == 0) {
        alert ("This field can't be 0!");
        field.focus(); }
    else
        calculatePayment(field.form);
}
function cmdCalc_Click(form)
{
    if (form.price.value == 0 || form.price.value.length == 0) {
        alert ("The Price field can't be 0!");
        form.price.focus(); }
    else if (form.ir.value == 0 || form.ir.value.length == 0) {
        alert ("The Interest Rate field can't be 0!");
        form.ir.focus(); }
    else if (form.term.value == 0 || form.term.value.length == 0) {
        alert ("The Term field can't be 0!");
        form.term.focus(); }
    else
        calculatePayment(form);
}
function calculatePayment(form)
{
    princ = form.price.value - form.dp.value;
    intRate = (form.ir.value/100) / 12;
    months = form.term.value * 12;
    form.pmt.value = Math.floor((princ*intRate)/(1-Math.pow(1+intRate,(-1*months)))*100)/100;
    form.principle.value = princ;
    form.payments.value = months;
}
</script>
<script language="JavaScript">
function checkForZero(field)
{
    if (field.value == 0 || field.value.length == 0) {
        }
    else
        calculatePayment(field.form);
}
function cmdCalc_Click(form)
{
    if (form.price.value == 0 || form.price.value.length == 0) {
        alert ("The Price field can't be 0!");
        form.price.focus(); }
    else if (form.ir.value == 0 || form.ir.value.length == 0) {
        alert ("The Interest Rate field can't be 0!");
        form.ir.focus(); }
    else if (form.term.value == 0 || form.term.value.length == 0) {
        alert ("The Term field can't be 0!");
        form.term.focus(); }
    else
        calculatePayment(form);
}
function calculatePayment(form)
{
    princ = form.price.value - form.dp.value;
    intRate = (form.ir.value/100) / 12;
    months = form.term.value * 12;
    form.pmt.value = Math.floor((princ*intRate)/(1-Math.pow(1+intRate,(-1*months)))*100)/100;
    form.principle.value = princ;
    form.payments.value = months;
}
</script>
<div class="common_calc formsec">
    <form name="Loan Calculator" class="calc">
<div class="pro_fields">
	<li>
		<label class="head_label"><?php _e('Fill-in Your Loan Information','language');?></label>		
	</li>
</div>     
    <div class="pro_fields fleft">        
    <div class="pro_fields">
	<li>
		<label class="head_label"><?php _e('Purchase information','language');?></label>			
	</li>
</div> 
	<div class="title_field">		
			<label class="field_label"><?php _e('Purchase Price:  ','language')?></label>
				<div>								
			<input type="text" size="20" name="price" value="0"  onBlur="checkForZero(this)" onChange="checkForZero(this)">								
			</div> 
	</div>		
	<div class="title_field">		
			<label class="field_label"><?php _e('Down Payment:  ','language')?></label>
				<div>									
				<input type="text" size="20"  name="dp" value="0" onChange="calculatePayment(this.form)">							
			</div>
	</div>		
	<div class="title_field">		
			<label class="field_label"><?php _e('Interest Rate: ','language')?></label>
				<div>
	<input type="text" size="5" name="ir" value="0" onBlur="checkForZero(this)" onChange="checkForZero(this)"> % 
			</div>
	</div>
		<div class="title_field">		
			<label class="field_label"><?php _e('Loan Term: ','language')?></label>
				<div>	
		<input type="text" size="4"  name="term" value="30"  onBlur="checkForZero(this)" onChange="checkForZero(this)"> Yrs.
			</div>  
	</div>
</div> 
    <div class="pro_fields fright">   
		<div class="pro_fields">
	<li>
		<label class="head_label"><?php _e('Your Results','language');?></label>
	</li>
</div> 
<div class="title_field">		
			<label class="field_label"><?php _e('Principal: ','language')?></label>
				<div>				
					<input type="label" size="20" value="0" name="principle">
			</div>
	</div>		
	<div class="title_field">
			<label class="field_label"><?php _e('Total Payments: ','language')?></label>
				<div>				
					 <input type="label" size="20" value="0"  name="payments">					
			</div> 
	</div>
<div class="title_field">		
			<label class="field_label monthly"><?php _e('Monthly Payment: ','language')?></label>
				<div>
					 <input type="label" size="20" value="0" name="pmt">					
			</div>
	</div>
	<div style="clear:both"></div>
</div> 
      </form>
</div>	
				<?php endwhile; ?>	
                  </div>				
		</div><!--end of content div-->	
<div id="sidebar" class="common"> 
            	<?php if ( ! dynamic_sidebar( 'Sidebar' )) : ?>
				<?php endif; ?>
			</div>
		<div class="clearfix"></div>		 
	</div><!--end of container div-->      
 <?php get_footer(); ?>