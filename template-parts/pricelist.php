<?php
$args = array(
    'post_type' => 'custom_post', 
    'posts_per_page' => -1,
);

$custom_query = new WP_Query($args);
?>

<table id="pricelist">
    <thead>
        <tr>
            <th>Method</th>
            <?php
            
            $custom_field_names = array();
            while ($custom_query->have_posts()) :
                $custom_query->the_post();
                $custom_fields = get_post_custom();
                foreach ($custom_fields as $field_name => $field_values) {
                    if (in_array($field_name, array('_edit_lock', '_edit_last', '_thumbnail_id'))) {
                        continue;
                    }
                    if (!in_array($field_name, $custom_field_names)) {
                        $custom_field_names[] = $field_name;
                        echo '<th>' . esc_html($field_name) . '</th>';
                    }
                }
            endwhile;
            ?>
        </tr>
    </thead>
    <tbody>
        <?php while ($custom_query->have_posts()) :
            $custom_query->the_post();
        ?>
        <tr>
            <td><?php the_title(); ?></td>
            <?php
            foreach ($custom_field_names as $field_name) {
                $field_value = get_post_meta(get_the_ID(), $field_name, true);
                echo '<td>' . esc_html($field_value) . '</td>';
            }
            ?>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php wp_reset_postdata(); ?>