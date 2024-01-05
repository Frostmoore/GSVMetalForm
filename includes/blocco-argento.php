<?php

if (!defined('ABSPATH')) {
    die('Non puoi accedere a questo file');
}


add_shortcode('form-argento', 'mostra_form_argento');
add_action('rest_api_init', 'create_rest_endpoint_argento');
add_action('init', 'create_submissions_page_argento');
add_action('add_meta_boxes', 'create_meta_box_argento');
add_action('manage_richiestaargento_posts_custom_column', 'fill_richiestaargento_columns', 10, 2);
add_filter('manage_richiestaargento_posts_columns', 'custom_colonne_richiestaargento');
add_action('admin_init', 'ricerca_argento');
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts_argento');
add_action('wp_enqueue_scripts', 'enqueue_custom_font_argento');

function enqueue_custom_font_argento()
{
    wp_enqueue_style('albertone', 'https://fonts.googleapis.com/css2?family=Albert+Sans:wght@600&family=Ubuntu&display=swap');
}

function enqueue_custom_scripts_argento()
{
    wp_enqueue_style('gsvmetal_style_argento', plugin_dir_url(__FILE__) . '../co_style.css');
}

function ricerca_argento()
{
    global $typenow;

    if ($typenow === 'ricercaargento') {
        add_filter('posts_search', 'ricercaargento_search_override', 10, 2);
    }
}

function ricercaargento_search_override($search, $query)
{
    global $wpdb;

    if ($query->is_main_query() && !empty($query->query['s'])) {
        $sql    = "
              or exists (
                  select * from {$wpdb->postmeta} where post_id={$wpdb->posts}.ID
                  and meta_key in ('co_nome_argento','co_email_argento','co_chili_argento', 'co_caratura_argento', 'co_negozio_argento')
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

function fill_richiestaargento_columns($column, $post_id)
{


    //$prezzo_column_argento = (((float)do_shortcode(get_plugin_options('co_shortcode_argento')) / 1000) * (float)get_post_meta($post_id, 'co_caratura_argento', true)) * (float)get_post_meta($post_id, 'co_chili_argento', true);
    $name_argento = esc_html(get_post_meta($post_id, 'co_nome_argento', true));
    $email_argento = esc_html(get_post_meta($post_id, 'co_email_argento', true));
    //$prezzo_column_argento = number_format($prezzo_column_argento, 2, '.', '');


    switch ($column) {
        case 'name':
            echo $name_argento;
            break;
        case 'email':
            echo $email_argento;
            break;
    }
}

function custom_colonne_richiestaargento($columns)
{
    $columns = array(
        'cb' => $columns['cb'],
        'name' => 'Nome',
        'email' => 'e-mail',

    );
    return $columns;
}

function create_meta_box_argento()
{
    add_meta_box('custom_richiesta', 'richiestaargento', 'display_richiesta_argento', 'richiestaargento');
}

function display_richiesta_argento()
{
    $post_metas = get_post_meta(get_the_ID());
    unset($post_metas['_edit_lock']);
?>
    <ul>
        <?php
        foreach ($post_metas as $key => $value) {
            echo '<li><strong>' . ucfirst($key) . '</strong>: ' . esc_html($value[0]) . '</li>';
        }
        $prezzo_column_argento = (((float)do_shortcode(get_plugin_options('co_shortcode_argento')) / 1000) * $post_metas['co_caratura_argento'][0]) * $post_metas['co_chili_argento'][0];
        $prezzo_column_argento = number_format($prezzo_column_argento, 2, '.', '');
        ?>
        <li><strong>Prezzo</strong>: <?= $prezzo_column_argento ?> €</li>
    </ul>
<?php
}

function create_submissions_page_argento()
{
    $args = [
        'public' => true,
        'has_archive' => true,
        'labels' => [
            'name' => 'Richieste argento',
            'singolar_name' => 'richiestaargento'
        ],
        'supports' => false,
        'capability_type' => 'post',
        'capabilities' => array(
            'create_posts' => false,
        ),
        'map_meta_cap' => true,
    ];

    register_post_type('richiestaargento', $args);
}

function mostra_form_argento()
{
    include PLUGIN_PATH . '/template/formargento.php';
}

function create_rest_endpoint_argento()
{
    register_rest_route('v1/gsvmetal_argento', 'submit', array(
        'methods' => 'POST',
        'callback' => 'handle_enquiry_argento'
    ));
}

function handle_enquiry_argento($data)
{
    $params = $data->get_params();
    $field_co_nome_argento = sanitize_text_field($params['co_nome_argento']);
    $field_co_email_argento = sanitize_email($params['co_email_argento']);
    $field_co_negozio_argento = sanitize_text_field($params['co_negozio_argento']);
    $field_co_chili_argento = sanitize_text_field($params['co_chili_argento']);
    $field_co_caratura_argento = sanitize_text_field($params['co_caratura_argento']);



    if (!wp_verify_nonce($params['_wpnonce'], 'wp_rest')) {
        return new WP_Rest_Response('Messaggio non inviato', 422);
    }

    unset($params['_wpnonce']);
    unset($params['_wp_http_referer']);

    $headers = [];

    $sender_email = get_bloginfo('admin_email');
    $sender_name = get_bloginfo('name');

    //$valore = do_shortcode(((get_plugin_options('co_shortcode_argento') / 1000) * $field_co_caratura_argento) * $field_co_chili_argento);
    $valore = (((float)do_shortcode(get_plugin_options('co_shortcode_argento')) / 1000) * (float) $field_co_caratura_argento) * (float)$field_co_chili_argento;

    $headers[] = "From: {$sender_name} <{$sender_email}>";
    $headers[] = "Reply-to: {$field_co_nome_argento} <{$field_co_email_argento}>";
    $headers[] = "Content-Type: text/html";

    $subject = "Nuovo prezzo bloccato su: {$sender_name}";

    $message = '';
    $message .= "{$field_co_nome_argento} ha bloccato il prezzo presso il punto vendita di {$field_co_negozio_argento}.<br />";
    $message .= "Il suo prezzo è di {$valore}€ per {$field_co_chili_argento} chili di argento a {$field_co_caratura_argento} carati!";

    $postarr_argento = [
        'post_title' => $field_co_nome_argento,
        'post_type' => 'richiestaargento',
        'post_status' => 'publish'
    ];

    $post_id = wp_insert_post($postarr_argento);

    foreach ($params as $label => $value) {
        switch ($label) {
            case 'co_email_argento':
                $value = sanitize_email($value);
                break;
            default:
                $value = sanitize_text_field($value);
        }
        add_post_meta($post_id, sanitize_text_field($label), $value);
    }

    $subject_admin = "{$field_co_nome_argento} ha bloccato il suo prezzo!";
    wp_mail($field_co_email_argento, $subject, $message, $headers);
    wp_mail(get_plugin_options('co_form_email'), $subject_admin, $message, $headers);
    return new WP_Rest_Response('Messaggio Inviato', 200);
}
