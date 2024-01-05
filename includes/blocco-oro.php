<?php

if (!defined('ABSPATH')) {
    die('Non puoi accedere a questo file');
}


add_shortcode('form-oro', 'mostra_form_oro');
add_action('rest_api_init', 'create_rest_endpoint');
add_action('init', 'create_submissions_page');
add_action('add_meta_boxes', 'create_meta_box');
add_action('manage_richiestaoro_posts_custom_column', 'fill_richiestaoro_columns', 10, 2);
add_filter('manage_richiestaoro_posts_columns', 'custom_colonne_richiestaoro');
add_action('admin_init', 'ricerca');
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');
add_action('wp_enqueue_scripts', 'enqueue_custom_font');

function enqueue_custom_font()
{
    wp_enqueue_style('albert', 'https://fonts.googleapis.com/css2?family=Albert+Sans:wght@600&family=Ubuntu&display=swap');
}

function enqueue_custom_scripts()
{
    wp_enqueue_style('gsvmetal_style', plugin_dir_url(__FILE__) . '../co_style.css');
}

function ricerca()
{
    global $typenow;

    if ($typenow === 'ricercaoro') {
        add_filter('posts_search', 'ricercaoro_search_override', 10, 2);
    }
}

function ricercaoro_search_override($search, $query)
{
    global $wpdb;

    if ($query->is_main_query() && !empty($query->query['s'])) {
        $sql    = "
              or exists (
                  select * from {$wpdb->postmeta} where post_id={$wpdb->posts}.ID
                  and meta_key in ('co_nome_oro','co_email_oro','co_grammi_oro', 'co_caratura_oro', 'co_negozio_oro')
                  and meta_value like %s
              )
          ";
        $like   = '%' . $wpdb->esc_like($query->query['s']) . '%';
        $search = preg_replace(
            "#\({$wpdb->posts}.post_title LIKE [^)]+\)\K#",
            $wpdb->prepare($sql, $like),
            $search
        );
    }

    return $search;
}

function fill_richiestaoro_columns($column, $post_id)
{


    //$prezzo_column_oro = (((float)do_shortcode(get_plugin_options('co_shortcode_oro')) / 1000) * (float)get_post_meta($post_id, 'co_caratura_oro', true)) * (float)get_post_meta($post_id, 'co_grammi_oro', true);
    $name_oro = esc_html(get_post_meta($post_id, 'co_nome_oro', true));
    $email_oro = esc_html(get_post_meta($post_id, 'co_email_oro', true));
    //$prezzo_column_oro = number_format($prezzo_column_oro, 2, '.', '');


    switch ($column) {
        case 'name':
            echo $name_oro;
            break;
        case 'email':
            echo $email_oro;
            break;
    }
}

function custom_colonne_richiestaoro($columns)
{
    $columns = array(
        'cb' => $columns['cb'],
        'name' => 'Nome',
        'email' => 'e-mail',

    );
    return $columns;
}

function create_meta_box()
{
    add_meta_box('custom_richiesta', 'richiestaoro', 'display_richiesta', 'richiestaoro');
}

function display_richiesta()
{
    $post_metas = get_post_meta(get_the_ID());
    unset($post_metas['_edit_lock']);
?>
    <ul>
        <?php
        foreach ($post_metas as $key => $value) {
            echo '<li><strong>' . ucfirst($key) . '</strong>: ' . esc_html($value[0]) . '</li>';
        }
        $prezzo_column_oro = (((float)do_shortcode(get_plugin_options('co_shortcode_oro')) / 1000) * $post_metas['co_caratura_oro'][0]) * $post_metas['co_grammi_oro'][0];
        $prezzo_column_oro = number_format($prezzo_column_oro, 2, '.', '');
        ?>
        <li><strong>Prezzo</strong>: <?= $prezzo_column_oro ?> €</li>
    </ul>
<?php
}

function create_submissions_page()
{
    $args = [
        'public' => true,
        'has_archive' => true,
        'labels' => [
            'name' => 'Richieste ORO',
            'singolar_name' => 'richiestaoro'
        ],
        'supports' => false,
        'capability_type' => 'post',
        'capabilities' => array(
            'create_posts' => false,
        ),
        'map_meta_cap' => true,
    ];

    register_post_type('richiestaoro', $args);
}

function mostra_form_oro()
{
    include PLUGIN_PATH . '/template/formoro.php';
}

function create_rest_endpoint()
{
    register_rest_route('v1/gsvmetal_oro', 'submit', array(
        'methods' => 'POST',
        'callback' => 'handle_enquiry_oro'
    ));
}

function handle_enquiry_oro($data)
{
    $params = $data->get_params();
    $field_co_nome_oro = sanitize_text_field($params['co_nome_oro']);
    $field_co_email_oro = sanitize_email($params['co_email_oro']);
    $field_co_negozio_oro = sanitize_text_field($params['co_negozio_oro']);
    $field_co_grammi_oro = sanitize_text_field($params['co_grammi_oro']);
    $field_co_caratura_oro = sanitize_text_field($params['co_caratura_oro']);



    if (!wp_verify_nonce($params['_wpnonce'], 'wp_rest')) {
        return new WP_Rest_Response('Messaggio non inviato', 422);
    }

    unset($params['_wpnonce']);
    unset($params['_wp_http_referer']);

    $headers = [];

    $sender_email = get_bloginfo('admin_email');
    $sender_name = get_bloginfo('name');

    //$valore = do_shortcode(((get_plugin_options('co_shortcode_oro') / 1000) * $field_co_caratura_oro) * $field_co_grammi_oro);
    $valore = (((float)do_shortcode(get_plugin_options('co_shortcode_oro')) / 1000) * (float) $field_co_caratura_oro) * (float)$field_co_grammi_oro;

    $headers[] = "From: {$sender_name} <{$sender_email}>";
    $headers[] = "Reply-to: {$field_co_nome_oro} <{$field_co_email_oro}>";
    $headers[] = "Content-Type: text/html";

    $subject = "Nuovo prezzo bloccato su: {$sender_name}";

    $message = '';
    $message .= "{$field_co_nome_oro} ha bloccato il prezzo presso il punto vendita di {$field_co_negozio_oro}.<br />";
    $message .= "Il suo prezzo è di {$valore}€ per {$field_co_grammi_oro} grammi di oro a {$field_co_caratura_oro} carati!";

    $postarr_oro = [
        'post_title' => $field_co_nome_oro,
        'post_type' => 'richiestaoro',
        'post_status' => 'publish'
    ];

    $post_id = wp_insert_post($postarr_oro);

    foreach ($params as $label => $value) {
        switch ($label) {
            case 'co_email_oro':
                $value = sanitize_email($value);
                break;
            default:
                $value = sanitize_text_field($value);
        }
        add_post_meta($post_id, sanitize_text_field($label), $value);
    }

    $subject_admin = "{$field_co_nome_oro} ha bloccato il suo prezzo!";
    wp_mail($field_co_email_oro, $subject, $message, $headers);
    wp_mail(get_plugin_options('co_form_email'), $subject_admin, $message, $headers);
    return new WP_Rest_Response('Messaggio Inviato', 200);
}
