<?php
defined('C5_EXECUTE') or die("Access Denied.");

$color_dlg = Core::make( 'helper/form/color' );
?>

<style>
  .properties-table .sp-replacer {
   
   width: 100% !important;   
  }
  
  .properties-table .sp-preview {
   width: 90% !important;   
  }
  
  .properties-table hr {
      margin-left: 0px !important;
      margin-right: 0px !important;
      margin-top: 10px !important;
      margin-bottom: 12px !important;
  }
</style>

  <script type="text/javascript">
    $(document).ready(function() {
      
      $("input").change( function() {
        $('#themes').val(0);
      });

      var themes = JSON.parse( '<?php echo $xml ?>' );
      $('#themes').change(function() {
        var id = $("select option:selected").val() - 1;

        if ( id == -1 )
          return;
        
        var theme = themes['theme'][id];

        var icon = theme['icon']['@attributes']['value'];

        $("input[name=icon][value=" + icon + "]").prop('checked', true);
        $("input[name=opacity]").val(theme['opacity']['@attributes']['value']);
        $("input[name=width]").val(theme['width']['@attributes']['value']);
        $("input[name=height]").val(theme['height']['@attributes']['value']);
        $("input[name=pos_left]").val(theme['pos_left']['@attributes']['value']);
        $("input[name=pos_top]").val(theme['pos_top']['@attributes']['value']);
        $("input[name=radius]").val(theme['radius']['@attributes']['value']);
        $("input[name=font_size]").val(theme['font_size']['@attributes']['value']);
        $("input[name=caption]").val(theme['caption']['@attributes']['value']);


        $("input[name=color]").spectrum('set', theme['color']['@attributes']['value']);
        $("input[name=hover_color]").spectrum('set', theme['hover_color']['@attributes']['value']);
        $("input[name=font_color]").spectrum('set', theme['font_color']['@attributes']['value']);
        
        $( "select#width_px").val( theme['width_px']['@attributes']['value'] );
        $( "select#height_px").val( theme['height_px']['@attributes']['value'] );
        
        $( "select#left_right").val( theme['left_right']['@attributes']['value'] );
        $( "select#top_bottom").val( theme['top_bottom']['@attributes']['value'] );
      });
    });
  </script>
  <div class="panel panel-primary">
    <div class="panel-heading"><b><?php echo t( 'Themes' ) ?></b></div>
    <div class="panel-body">
      <?php 
            $fill[0] = t( 'Custom theme' );
            $i=1;
            foreach ( $themes as $theme ) 
            {
              $name = $theme->name->attributes()->value;
              $fill[$i] = $name;
              $i++;
            }
      echo $form->select( 'themes', $fill, (int)$theme_id, array( 'style' => 'width: 100%; height: 35px;' ) );
      ?>
    </div>
  </div>

  <div class="panel panel-primary">
    <div class="panel-heading"><b><?php echo t( 'Icons' ) ?></b></div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-12">
          <table class="table table-bordered properties-table" style="margin-bottom: 0px">
            <thead>
              <tr>
                <th><?php echo t( 'Icon' ) ?></th>
                <th style="width:100%"><?php echo t( 'Description' ) ?></th>
                <th><?php echo t( 'Select' ) ?></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><i class="fa fa-arrow-up fa-2x" aria-hidden="true"></i></td>
                <td><?php echo t( 'Up Arrow' ) ?></td>
                <td>
                  <?php echo $form->radio( 'icon', 0, (int)$icon ) ?>
                </td>
              </tr>
              <tr>
                <td><i class="fa fa-caret-square-o-up fa-2x" aria-hidden="true"></i></td>
                <td><?php echo t( 'Toggle Up' ) ?></td>
                <td>
                  <?php echo $form->radio( 'icon', 1, (int)$icon ) ?>
                </td>
              </tr>
              <tr>
                <td><i class="fa fa-arrow-circle-o-up fa-2x" aria-hidden="true"></i></td>
                <td><?php echo t( 'Arrow Circle' ) ?></td>
                <td>
                  <?php echo $form->radio( 'icon', 2, (int)$icon ) ?>
                </td>
              </tr>
              <tr>
                <td><i class="fa fa-angle-up fa-2x" aria-hidden="true"></i></td>
                <td><?php echo t( 'Angle Up' ) ?></td>
                <td>
                  <?php echo $form->radio( 'icon', 3, (int)$icon ) ?>
                </td>
              </tr>
              <tr>
                <td><?php echo t( 'Text' ) ?></td>
                <td>
                  <?php echo $form->text( 'caption', h( $caption ), array( 'maxlenght' => '64', 'placeholder' => t( 'Button caption' ) ) ) ?>
                </td>
                <td>
                  <?php echo $form->radio( 'icon', 4, (int)$icon ) ?>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="panel-footer"></div>
  </div>




  <div class="panel panel-primary">
    <div class="panel-heading"><b><?php echo t( 'Appearance' ) ?></b></div>
    <div class="panel-body properties-table">

    <div class="row" style="padding-bottom: 15px">
      <div class="col-md-12">
        <h4 class=""><b><?php echo t( 'Color' ) ?></b></h4>
        <hr />
      </div>
    </div>

    <div class="row" style="padding-bottom: 10px">
      <div class="form-group">
        <div class="col-md-6 " ><?php echo t( 'background color' ) ?></div>  
        <div class="col-md-6">
          <?php 
          $defaultColor = h( $color );
          $color_dlg->output( 'color', $defaultColor ? $defaultColor : '#000000', [ 'preferredFormat' => 'hex' ] );
          ?>
        </div>
      </div>
    </div>
    
    <div class="row" style="padding-bottom: 10px">
      <div class="form-group">
        <div class="col-md-6 " ><?php echo t( 'hover color' ) ?></div>  
        <div class="col-md-6">
          <?php 
          $defaultColor = h( $hover_color );
          $color_dlg->output( 'hover_color', $defaultColor ? $defaultColor : '#666666', [ 'preferredFormat' => 'hex' ] );
          ?>
        </div>
      </div>
    </div>
    
    <div class="row" style="padding-bottom: 10px">
      <div class="form-group">
        <div class="col-md-6"><?php echo t( 'opacity' ) ?></div>  
        <div class="col-md-6">
              <div class="input-group">
                <?php echo $form->number( 'opacity', h( $opacity ), array( 'maxlenght' => '4', 'min' => '0', 'max' => '100', 'required' => '' ) ) ?>
                <span class="input-group-addon">%</span>
              </div>
        </div>
      </div>
    </div>
    
    
    <div class="row" style="padding-bottom: 15px; padding-top: 15px">
      <div class="col-md-12">
        <h4><b><?php echo t( 'Font' ) ?></b></h4>
        <hr />
      </div>
    </div> 
    <div class="row" style="padding-bottom: 10px">
      <div class="form-group">
        <div class="col-md-6 " ><?php echo t( 'font size' ) ?></div>  
        <div class="col-md-6">
              <div class="input-group">
                <?php echo $form->number( 'font_size', h( $font_size ), array( 'maxlenght' => '4', 'min' => '0', 'required' => '' ) ) ?>
                <span class="input-group-addon"><?php echo t( 'px' ) ?></span>
              </div>
        </div>
      </div>
    </div>
    
    <div class="row" style="padding-bottom: 10px">
      <div class="form-group">
        <div class="col-md-6 " ><?php echo t( 'font color' ) ?></div>  
        <div class="col-md-6">
          <?php 
          $defaultColor = h( $font_color );
          $color_dlg->output( 'font_color', $defaultColor ? $defaultColor : '#ffffff', [ 'preferredFormat' => 'hex' ] );
          ?>
        </div>
      </div>
    </div>
    
    <div class="row" style="padding-bottom: 15px; padding-top: 15px">
      <div class="col-md-12">
        <h4><b><?php echo t( 'Size' ) ?></b></h4>
        <hr />
      </div>
    </div>
    
    <div class="row" style="padding-bottom: 10px">
      <div class="form-group">
        <div class="col-md-6 " ><?php echo t( 'width' ); ?></div>  
        <div class="col-md-6">
          <?php echo $form->number( 'width', h( $width ), array( 'min' => '0', 'maxlenght' => '4', 'required' => '', 'style' => 'width: 60%; float: left' ) ) ?>
          <?php echo $form->select( 'width_px', array( 1 => t('px'), 0 => '%' ), (int)$width_px, array( 'style' => 'width: 40%; float: left') ) ?>
        </div>
      </div>
    </div>
        <div class="row" style="padding-bottom: 10px">
      <div class="form-group">
        <div class="col-md-6 " ><?php echo t( 'height' ) ?></div>  
        <div class="col-md-6">
          <?php echo $form->number( 'height', h( $height ), array( 'min' => '0', 'maxlenght' => '4', 'required' => '', 'style' => 'width: 60%; float: left' ) ) ?>
          <?php echo $form->select( 'height_px', array( 1 => t('px'), 0 => '%' ), (int)$height_px, array( 'style' => 'width: 40%; float: left') ) ?>
        </div>
      </div>
    </div>
    <div class="row" style="padding-bottom: 10px">
      <div class="form-group">
        <div class="col-md-6 " ><?php echo t( 'border radius' ) ?></div>  
        <div class="col-md-6">
              <div class="input-group">
                <?php echo $form->number( 'radius', h( $radius ), array( 'min' => '0', 'max' => '100', 'required' => '' ) ) ?>
                <span class="input-group-addon">%</span>
              </div>
        </div>
      </div>
    </div>
      <div class="row" style="padding-bottom: 15px; padding-top: 15px">
      <div class="col-md-12">
        <h4><b>Position</b></h4>
        <hr />
      </div>
    </div>
    
    <div class="row" style="padding-bottom: 10px">
      <div class="form-group">
        <div class="col-md-6 " >
          <?php echo $form->select( 'left_right', array( 1 => t('left'), 0 => t( 'right' ) ), (int)$left_right ) ?>
        </div>  
        <div class="col-md-6">
          <div class="input-group">
            <?php echo $form->number( 'pos_left', h( $pos_left ), array( 'min' => '0', 'maxlenght' => '4', 'required' => '' ) ) ?>
            <span class="input-group-addon"><?php echo t( 'px' ) ?></span>
          </div>
        </div>
      </div>
    </div>
    <div class="row" style="padding-bottom: 10px">
      <div class="form-group">
        <div class="col-md-6" >
          <?php echo $form->select( 'top_bottom', array( 1 => t('top'), 0 => t( 'bottom' ) ), (int)$top_bottom ) ?>
        </div>  
        <div class="col-md-6">
          <div class="input-group">
            <?php echo $form->number( 'pos_top', h( $pos_top ), array( 'min' => '0', 'maxlenght' => '4', 'required' => '' ) ) ?>
            <span class="input-group-addon"><?php echo t( 'px' ) ?></span>
          </div>
        </div>
      </div>
    </div>
    </div>
    <div class="panel-footer"></div>
  </div>
