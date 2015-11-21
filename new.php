<div class="port-sub"> 
<div class="container"> 
<div class="row"> 
<div class="col-lg-2"> 
<h1 class="port-sub__title">Портфолио</h1> 
</div> 
<div class="col-lg-10"> 
<?php 
$args = array( 
'orderby' => 'name', 
'order' => 'ASC', 
'hide_empty' => false, 
'exclude' => array(), 
'exclude_tree' => array(), 
'include' => array(), 
'fields' => 'all', 
'hierarchical' => true, 
'child_of' => 0, 
'childless' => false, 
'pad_counts' => false, 
'cache_domain' => 'core' 
); 
$allterms = get_terms('folio_type', $args); 
echo '<ul class="port-sub__menu"><li><a href="#" class="port-sub__item port-sub__item--all">Все работы</a></li>'; 
foreach($allterms as $term){ 
$link = get_term_link( $term ); 
echo "<li><a href=".$link." data-term=".$term->slug." class='port-sub__item'>".$term->name."</a></li>"; 
} 
echo '</ul>'; 
?> 
</div> 
</div> 
</div> 
</div> 
<div class="portfolio"> 
<?php 
query_posts(array( 
'post_type' => 'portfolio', 
'showposts' => 5 
)); 
?> 
<?php 
while (have_posts()) : the_post(); 
$idd = get_the_ID(); 
$cat = get_the_terms( $idd, 'folio_type'); 
?> 
<div class="portfolio__item" data-termid="<?php echo $cat[0]->slug; ?>" style="background: url(<?php the_field('portfolio__bgi'); ?>) center no-repeat; background-size: cover;"> 
<div class="container"> 
<div class="row"> 
<div class="col-lg-5"> 
<div class="portfolio__content"> 
<h3 class="portfolio__title"><?php the_title(); ?></h3> 
<div class="portfolio__text"> 
<?php the_content(); ?> 
</div> 
<div class="portfolio__button">Подробнее</div> 
</div> 
</div> 
</div> 
</div> 
</div> 
<?php endwhile;?> 
</div> 

<script type="text/javascript"> 
jQuery(document).ready(function($) { 
// показ/скрытие элементов по категории 
$('.port-sub__item').click(function(event) { 
var itemId = $(this).attr('data-term'); 
event.preventDefault(); 
$('.portfolio__item').each(function(index) { 
if ($(this).attr('data-termid') == itemId) { 
$('.portfolio__item').hide(400); 
$(this).show(400); 
} 
}); 
}); 
// показ всех элементов 
$('.port-sub__item--all').click(function(event) { 
$('.portfolio__item').show(400); 
}); 
}); 
</script>

</main>

<?php get_footer(); // Подключаем футер ?>