<?php
/**
 * 
 * @author Alexander Volosenkov
 * @url www.monochromatic.ru 
 * 
 * 
 * 
 */
namespace Concrete\Package\ScrollToTop\Block\ScrollToTop; 

use Concrete\Core\Block\BlockController;
use Concrete\Core\Support\Facade\Application as Application;
use Package;
use BlockType;
use Core;
use Concrete\Core\Error;


defined('C5_EXECUTE') or die("Access Denied.");


class Controller extends BlockController
{
    protected $btTable = 'btScrollToTop';
    
    /**
     * This function returns the functionality description ofthe package.
     * 
     * @param void 
     * @return string $description
     * 
     */
    public function getBlockTypeDescription()
    {
        return t( 'Adds a fully customizable "Scroll To Top" button to your site' );
    }
    
    /**
     * This function returns the name of the package.
     * 
     * @param void
     * @return string $name
     * 
     */
    public function getBlockTypeName()
    {
        return t( 'Scroll To Top' );
    }
    
    public function view()
    {
        $this->requireAsset( 'font-awesome' );
    }
    
    public function edit()
    {
        // Load themes from xml file
        $url = Package::getByHandle( 'scroll_to_top' )->getPackagePath();

        $xml = simplexml_load_file( $url . '/blocks/scroll_to_top/themes.xml' );
        
        if( is_object( $xml ) )
        {
            $this->set( 'xml', json_encode( $xml )  );
            $this->set( 'themes', $xml );
        }
    }
    
    public function add()
    {
        // Default settings
        $this->set( 'icon', 0 );
        $this->set('theme_id', 1 );
        $this->set( 'size', 82 );
        $this->set( 'pos_top', 20 );
        $this->set( 'pos_left', 20 );
        $this->set( 'radius', 50 );
        $this->set( 'font_size', 52 );
        $this->set( 'width', 82 );
        $this->set( 'height', 82 );
        $this->set( 'opacity', 95 );
        $this->set( 'caption', t( 'Home' ) );
        $this->set( 'width_px', 1 );
        $this->set( 'height_px', 1 );
        $this->set( 'top_bottom', 0 );
        $this->set( 'left_right', 0 );

        $url = Package::getByHandle( 'scroll_to_top' )->getPackagePath();
        
        $xml = simplexml_load_file( $url . '/blocks/scroll_to_top/themes.xml' );
        
        if( is_object( $xml ) )
        {
            $this->set( 'xml', json_encode( $xml )  );
            $this->set( 'themes', $xml );
        }

    }
    
    public function save( $args )
    {
        $val = Core::make( 'helper/validation/form' );
        
        $args['opacity'] = abs( (int)$args['opacity'] );
        $args['width'] = abs( (int)$args['width'] );
        $args['height'] = abs( (int)$args['height'] );
        $args['radius'] = abs( (int)$args['radius'] );
        $args['pos_left'] = abs( (int)$args['pos_left'] );
        $args['pos_top'] = abs( (int)$args['pos_top'] );
        $args['font_size'] = abs( (int)$args['font_size'] );
        
        $args['caption'] = substr( $args['caption'], 0, 64 );
        $args['color'] = substr( $args['color'], 0, 10 );
        $args['hover_color'] = substr( $args['hover_color'], 0, 10 );
        $args['font_color'] = substr( $args['font_color'], 0, 10 );
        
        $args['theme_id'] = abs( (int)$args['themes'] );
        
        $val->setData( $args );
        
        // run validation tests
        $val->test();
        $e = $val->getError();
        
        if( !$e->has() )
            parent::save( $args );

    }

}