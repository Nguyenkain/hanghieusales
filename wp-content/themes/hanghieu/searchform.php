<div id="search-form">
	<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="clearfix" id="search-form">
		<select name="cat" id="category">
			<?php
            $args_search = array(
                'type'                     => 'product',
                'child_of'                 => 0,
                'parent'                   => 0,
                'orderby'                  => 'name',
                'order'                    => 'ASC',
                'hide_empty'               => 1,
                'hierarchical'             => 1,
                'exclude'                  => '',
                'include'                  => '',
                'number'                   => '',
                'taxonomy'                 => 'product_cat',
                'pad_counts'               => false
            );
            $category_search  = get_categories($args_search);
            if(isset($_GET['cat'])) { $cat = $_GET['cat']; } else { $cat = -1; }
            ?>
			<option value="0">Tất cả danh mục</option>
			<?php if(!empty($category_search)) {
				foreach($category_search as $search) {
					$args_search2 = array(
	                    'type'                     => 'product',
	                    'child_of'                 => 0,
	                    'parent'                   => $search->term_id,
	                    'orderby'                  => 'name',
	                    'order'                    => 'ASC',
	                    'hide_empty'               => 1,
	                    'hierarchical'             => 1,
	                    'exclude'                  => '',
	                    'include'                  => '',
	                    'number'                   => '',
	                    'taxonomy'                 => 'product_cat',
	                    'pad_counts'               => false
	                );
	                $category_search2  = get_categories($args_search2);
					?>
					<option <?php if($cat == $search->slug) { echo 'selected="selected"'; } ?> value="<?php echo $search->slug; ?>"><?php echo $search->name; ?></option>
					<?php if(!empty($category_search2)) {
						foreach($category_search2 as $category_search2) {
							?>
							<option <?php if($cat == $category_search2->slug) { echo 'selected="selected"'; } ?> value="<?php echo $category_search2->slug; ?>"> -- <?php echo $category_search2->name; ?></option>
							<?php
						}
						} ?>
					<?php
				}
			} ?>
		</select>
		<input type="text" id="autocomplate" class="search-input" value="<?php if(isset($_GET['s'])) { echo $_GET['s']; } ?>" name="s" />
		<input type="hidden" name="post_type" value="product" />
		<button class="btn btn-submit btn-black btn-form-search">Tìm kiếm</button>
	</form>
	<div class="box-auto-response" style="display:none;"></div>
</div>