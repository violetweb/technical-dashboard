<h2>DASHBOARD</h2>
<style>
#dashboard-widgets .postbox-container{
    width:100%;
}
</style>
<?php
$args = array(
    'post_type' => 'listings',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => 'title',
    'order' => 'ASC'
);

$query = new WP_Query($args);

if ( $query->have_posts() ) {
  $html = '';
  $html .= '<table class="wp-list-table widefat fixed striped table-view-list posts">';  
  $html .= '<thead><tr><th>Title</th><th>Date</th><th>Author</th></tr></thead>';
  while ($query->have_posts()) : 
        $query->the_post();
        $html .= '<tr>';       
        $html .= '<td>' . get_the_title() . '</td>';
        $html .= '<td>' . get_the_date() . '</td>';
        $html .= '<td>' . get_the_author() . '</td>';     
        $html .= '</tr>';
    endwhile;
    $html .= '</table>';
    echo $html;
} else {
    // no posts found
    echo '<p>No records found.</p>';
}

/* Restore original Post Data */
wp_reset_postdata();
?>
