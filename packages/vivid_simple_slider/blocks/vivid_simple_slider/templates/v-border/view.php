<?php  
    defined('C5_EXECUTE') or die(_("Access Denied.")); 
	$ih = Loader::helper("image");
	$nav = Loader::helper("navigation");
    if(count($items)<1){ ?>
        <div class="well"><?php echo t('You have not entered any slides')?></div>
    <?php  } else { ?>
    <script type="text/javascript" src="<?php echo $blockURL?>/js/swiper.js"></script>
    <script type="text/javascript">
    $(function(){
        function sliderBackground<?php echo $bID?>(){
            //if window is greater than the first breakpoint
            if($("body").width() > <?php echo $breakpoint2?>){
                //if it's bigger than the first, it might be bigger than the second.
                if($("body").width() > <?php echo $breakpoint3?>){
                    $(".swiper-slide").each(function(){
                        var bg = $(this).attr("data-large-background");
                        $(this).css("background-image", "url('"+bg+"')");
                    });
                } else {
                    $(".swiper-slide").each(function(){
                        var bg = $(this).attr("data-medium-background");
                        $(this).css("background-image", "url('"+bg+"')");
                    });
                }
            } else{
                $(".swiper-slide").each(function(){
                    var bg = $(this).attr("data-small-background");
                    $(this).css("background-image", "url('"+bg+"')");
                });
            }
        }
        var swiper<?php echo $bID?> = $('.swiper-container').swiper({
            autoplay: <?php echo $duration?>000,
            speed: <?php echo $speed?>,
            mode:'horizontal',
            loop: true,
            <?php  if($pagination=="yes"){?>
            pagination: '#swiper-pagination-<?php echo $bID?>',
            paginationClickable: true,
            <?php  } ?>
            onFirstInit: function(swiper){
                sliderBackground<?php echo $bID?>();   
            }
        });       
        window.onresize = function(event) {    
            sliderBackground<?php echo $bID?>();        
        };
        $("#btn-slide-next-<?php echo $bID?>").click(function(){
            swiper<?php echo $bID?>.swipeNext();    
        });
        $("#btn-slide-prev-<?php echo $bID?>").click(function(){
            swiper<?php echo $bID?>.swipePrev();    
        });
    });
    </script>
    <style>
        #vivid-simple-slider-<?php echo $bID?>, #vivid-simple-slider-<?php echo $bID?> .swiper-slide { position: relative; width: 100%; height: <?php echo $breakpoint1height?>px; }
        #vivid-simple-slider-<?php echo $bID?> .swiper-wrapper {  }
            #vivid-simple-slider-<?php echo $bID?> .swiper-slide { position: relative; text-align: center; background-position: center center; background-repeat: no-repeat; background-size: cover; }   
        @media only screen and (min-width:<?php echo $breakpoint2?>px){
            #vivid-simple-slider-<?php echo $bID?>, #vivid-simple-slider-<?php echo $bID?> .swiper-slider  { height: <?php echo $breakpoint2height?>px; }
        }
        @media only screen and (min-width:<?php echo $breakpoint3?>px){
            #vivid-simple-slider-<?php echo $bID?>, #vivid-simple-slider-<?php echo $bID?> .swiper-slider  { height: <?php echo $breakpoint3height?>px; }
        }

            .vivid-simple-slider .text-container { padding: 20px; text-align: left; }
                .vivid-simple-slider .slide-title { color: #fff; text-shadow: 0 0 10px rgba(0,0,0,0.4); font-size: 34px; }
                .vivid-simple-slider .slide-desc { color: #fff;  text-shadow: 0 0 10px rgba(0,0,0,0.4); font-size: 18px; width: 60%; }
                .vivid-simple-slider .slide-btn { margin-top: 20px; }
            @media only screen and (min-width:<?php echo $breakpoint2?>px){
            .vivid-simple-slider .text-container { padding: 50px 20px; }
                .vivid-simple-slider .slide-title { font-size: 45px; }
                .vivid-simple-slider .slide-desc { font-size: 22px; }    
            }
            @media only screen and (min-width:<?php echo $breakpoint3?>px){
            .vivid-simple-slider .text-container { padding: 100px 0 0 10%; width: 57%;}
                .vivid-simple-slider .slide-title { font-size: 45px; }
                .vivid-simple-slider .slide-desc { font-size: 22px; } 
                .vivid-simple-slider .slide-btn { margin-top: 50px; }   
            }
    
        .btn-slide-prev, .btn-slide-next { display: none; position: absolute; top: 35%; cursor: pointer; opacity: .6; }
        .btn-slide-prev:hover, .btn-slide-next:hover { opacity: 1; }       
        .btn-slide-prev { font-size: 80px; left: 20px; }
        .btn-slide-next { font-size: 80px; right: 20px; }
        .swiper-pagination { position: absolute; bottom: 20px; right: 20px; }
            .swiper-pagination-switch { display: inline-block; width: 15px; height: 15px; background: rgba(255,255,255,0.6); border-radius: 50%; margin-left: 8px; cursor: pointer; }
            .swiper-pagination-switch.swiper-active-switch { background: #fff; }


        .slider-bg{
            background: url('<?php echo $blockURL; ?>/img/header_banner-1.png') center center no-repeat;
            height: 400px;
            position: absolute;
            bottom: -40px;
            width: 100%;
            background-size: cover;
        }
        @media only screen and (min-width:<?php echo $breakpoint2?>px){
           .btn-slide-prev, .btn-slide-next { display: block; }    

        }
        
        @media (max-width: 767px){
            #vivid-simple-slider-<?php echo $bID?>, #vivid-simple-slider-<?php echo $bID?> .swiper-slide{
                height: 340px;
            }
            .slider-bg{
                display: none;
            }
        }
        @media (max-width: 1300px) and (min-width: 992px){
            .slider-bg{
                height: 300px;
                bottom: 0;
            }
        }
        @media (max-width: 991px) and (min-width: 768px){
           .slider-bg{
                height: 200px;
            }
        }        
        @media (max-width: 767px){
            #vivid-simple-slider-<?php echo $bID?>, #vivid-simple-slider-<?php echo $bID?> .swiper-slide{
                height: 260px;
            }
            .vivid-simple-slider .slide-title{
                font-size: 25px;
                line-height: 28px;
            }
            .vivid-simple-slider .slide-desc{
                font-size: 17px;
                line-height: 20px;
            }
            .vivid-simple-slider .slide-desc{
                width: 90%;
            }
        }
    </style>
    <div class="swiper-container vivid-simple-slider" id="vivid-simple-slider-<?php echo $bID?>">
        
        <div class="swiper-wrapper">
            <?php 
        	foreach($items as $item){ 
        		if($item['pageID']){
        			//if set, grab the page object.
        			$page = Page::getByID($item['pageID']);
                    if(is_object($page)){
            			$pageName = $page->getCollectionName();
            			$theLink = $nav->getLinkToCollection($page);
                    }
        		}
        		if($item['fID']){
        			//if set, grab the file object
        			$fileObj = File::getByID($item['fID']);
                    if(is_object($fileObj) && $fileObj->getApprovedVersion()){
            			//set thumbs
            			$crop = true;
            			$small = $ih->getThumbnail($fileObj,$breakpoint1width,$breakpoint1height,$crop);
                        $medium = $ih->getThumbnail($fileObj,$breakpoint2width,$breakpoint2height,$crop);
                        $large = $ih->getThumbnail($fileObj,$breakpoint3width,$breakpoint3height,$crop);
        		 
            ?>
            <div class="swiper-slide" data-small-background="<?php echo $small->src?>" data-medium-background="<?php echo $medium->src?>" data-large-background="<?php echo $large->src?>">
                
                <div class="text-container">

                    <div class="text-container-border">
                        <?php  if($item['title']){?>
                        <div class="slide-title"><?php echo $item['title']?></div>
                        <?php  } ?>
                        <?php  if($item['slidedesc']){?>
                        <div class="slide-desc"><?php echo $item['slidedesc']?></div>
                        <?php  } ?>
                        <?php  if($item['btnText']){?>
                        <a class="btn btn-secondary slide-btn" href="<?php echo $theLink?>"><?php echo $item['btnText']?></a>
                        <?php  } ?>
                    </div>
                    
                </div>
                
            </div><!-- .swiper-slide -->
            <?php    }//if is object
                }//if fID
            }//each 
            ?>
        </div><!-- .swiper-wrapper -->  
        
        <?php  if($arrows=="yes"){?>
        <div class="btn-slide-prev" id="btn-slide-prev-<?php echo $bID?>"><img src="<?php echo $blockURL?>/img/arrow-left.png"></div>
        <div class="btn-slide-next" id="btn-slide-next-<?php echo $bID?>"><img src="<?php echo $blockURL?>/img/arrow-right.png"></div>
        <?php  } ?>
        
        <?php  if($pagination=="yes"){?>
        <div class="swiper-pagination" id="swiper-pagination-<?php echo $bID?>"></div>
        <?php  } ?>
            <div class="slider-bg"></div>
    </div><!-- .swiper-container -->
    
<?php  }//else - show slides ?>