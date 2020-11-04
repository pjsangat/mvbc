<?php
defined('C5_EXECUTE') or die("Access Denied.");

$c = Page::getCurrentPage();

if ( $c->isEditMode() )
{ ?>

<h2><?php echo t( 'Scroll To Top.' ) ?> <br /><?php echo t( 'Click left mouse button here to edit' ) ?></h2>
<div><?php echo t( 'This block visible in edit mode only' ) ?></div>
<?php } ?>
    
<style>
.round-button:hover {
	background-color: <?php echo h( $hover_color ) ?>;
}

.round-button {
    background-color: <?php echo h( $color ) ?>;
    color: <?php echo h( $font_color ) ?>;
    opacity: <?php echo (int)$opacity / 100 ?>;
    border-radius: <?php echo h( $radius ) ?>%;
    font-size: <?php echo (int)$font_size ?>px;
    width: <?php echo h( $width ); ?><?php echo ( (int)$width_px === 1 ) ? 'px' : '%' ?>; 
    height: <?php echo h( $height ); ?><?php echo ( (int)$height_px === 1 ) ? 'px' : '%' ?>;
    <?php echo ( (int)$left_right === 1 ) ? 'left' : 'right'  ?>: <?php echo h( $pos_left ) ?>px; 
    <?php echo ( (int)$top_bottom === 1 ) ? 'top' : 'bottom'  ?>: <?php echo h( $pos_top ) ?>px;
}
</style>

<?php

    switch( intval( $icon ) )
    {
        case 0:
            $fa_icon = 'fa fa-arrow-up';
            break;
            
        case 1:
            $fa_icon = 'fa fa-caret-square-o-up';
            break;
    
        case 2:
            $fa_icon = 'fa fa-arrow-circle-o-up';
            break;
    
        case 3:
            $fa_icon = 'fa fa-angle-up';
            break;
            
        case 4:
            $fa_icon = '';
            break;
            
        default:
            $fa_icon = '';
            break;
    }
?>

<button class="round-button scrollup" style="display: none; padding: 0px; margin: 0px" title="<?php echo t( 'Go to top' ) ?>" >
    <i class="<?php echo $fa_icon ?>" aria-hidden="true"></i><?php if( intval( $icon ) === 4 ) echo h( $caption ) ?>
</button>

<script type="text/javascript">

    jQuery(document).ready( (function ($) {

        $(window).scrollTop(0);
        
        $(window).scroll(function () {
            
            if ($(window).scrollTop() > 100) {
                $('.scrollup').show();
            } else {
                $('.scrollup').fadeOut();
            }
        });
    
        $('.scrollup').on( 'click', function () {
            
            $("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });

})(jQuery) );

</script>