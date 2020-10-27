<form class="header__search-panel" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>">
	<div class="posts-inner__search-field">
		<input type="text" value="<?php echo get_search_query() ?>" name="s" id="s"  placeholder="Search">
		<button id="searchsubmit"></button>
	</div>
</form>