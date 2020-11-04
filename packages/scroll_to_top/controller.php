<?php
namespace Concrete\Package\ScrollToTop;

use Package;
use BlockType;
use Database;


defined('C5_EXECUTE') or die("Access Denied.");

class Controller extends Package
{
    protected $pkgHandle = 'scroll_to_top';
    protected $appVersionRequired = '5.7.5';
    protected $pkgVersion = '1.0.0';

    
    public function getPackageDescription() 
    {
        return t( "Scroll To Top button for your site" );
    }

    public function getPackageName() 
    {
        return t( "Scroll To Top" );
    }

    public function install() 
    {
        $pkg = parent::install();

        BlockType::installBlockType( 'scroll_to_top', $pkg );
    }
    
    public function uninstall()
    {
        parent::uninstall();
        
        $db = Database::connection();
		$db->executeQuery( 'DROP TABLE IF EXISTS btScrollToTop' );
    }
    

}