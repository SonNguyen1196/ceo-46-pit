<?php
require (PLUGIN_DIR.'/class/class-instagram-api.php');
add_shortcode( 'gallary_instagram_block', 'gallary_instagram' );
function gallary_instagram(){
	$instargram_api =  new InstarGram_API();
	$data_images = $instargram_api->getAPI();
	?>
	<section id="project" class="padding-bottom-half padding-top">
	    <div class="container">   
	    	<div class="row">
	    		<?php
	    			if ($data_images) {
	    				foreach ($data_images as $info_images) {
		           			foreach ($info_images as $single_image) {
		           				if (isset($single_image['images'])) {
		           					$caption = (isset($single_image['caption']['text'])) ? $single_image['caption']['text'] : '' ;
		           					?>
		           					<div class="col-lg-4 col-md-4 thumb">
					                  	<a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="<?php echo $single_image['caption']['text'] ?>"
					                     data-image="<?php echo $single_image['images']['standard_resolution']['url'] ?>"
					                     data-target="#image-gallery">
					                      <img class="img-responsive" src="<?php echo $single_image['images']['standard_resolution']['url'] ?>" alt="<?php echo $single_image['caption']['text'] ?>">
					                  	</a>
						            </div>
		           					<?php
		           				}
		
		           			}
		           		}
	    			}
	           		
	           ?>
	    	</div>
	    	<div class="row">
	    		 <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		            <div class="modal-dialog modal-lg my-custom-modal">
		                <div class="modal-content">
		                  	<button type="button" class="close close-custom-modal" data-dismiss="modal"><span class="hidden-icon" aria-hidden="true">×</span><span class="sr-only">Close</span>
		                        </button>
		                    <div class="modal-body">
		                        <img id="image-gallery-image" class="img-responsive" src="">
		                        <div class="title-poup-modal">
		                        	<h4 class="modal-title" id="image-gallery-title"></h4>
		                        </div>
		                    </div>
		                        <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-angle-left"></i>
		                        </button>

		                        <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-angle-right"></i>
		                        </button>
		                </div>
		            </div>
       			 </div>
	    	</div>
	      
	    </div>
	</section>
	<?php
}
?>
