<?php       

namespace Concrete\Package\CardImage;
use Package;
use BlockType;

defined('C5_EXECUTE') or die(_("Access Denied."));

class Controller extends Package
{

	protected $pkgHandle = 'card_image';
	protected $appVersionRequired = '5.7.1';
	protected $pkgVersion = '1.0.1';
	
	
	
	public function getPackageDescription()
	{
		return t("Add Card Images to your Site");
	}

	public function getPackageName()
	{
		return t("Card Image");
	}
	
	public function install()
	{
		$pkg = parent::install();
        BlockType::installBlockTypeFromPackage('image_card', $pkg); 
        
	}
}
?>