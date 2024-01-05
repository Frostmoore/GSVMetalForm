<?php

if (!defined('ABSPATH')) {
    die('Non puoi accedere a questo file');
}


add_shortcode('form-monete', 'mostra_form_monete');
add_action('rest_api_init', 'create_rest_endpoint_monete');
add_action('init', 'create_submissions_page_monete');
add_action('add_meta_boxes', 'create_meta_box_monete');
add_action('manage_richiestamonete_posts_custom_column', 'fill_richiestamonete_columns', 10, 2);
add_filter('manage_richiestamonete_posts_columns', 'custom_colonne_richiestamonete');
add_action('admin_init', 'ricerca_monete');
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts_monete');
add_action('wp_enqueue_scripts', 'enqueue_custom_font_monete');

function enqueue_custom_font_monete()
{
    wp_enqueue_style('albert_monete', 'https://fonts.googleapis.com/css2?family=Albert+Sans:wght@600&family=Ubuntu&display=swap');
}

function enqueue_custom_scripts_monete()
{
    wp_enqueue_style('gsvmetal_style_monete', plugin_dir_url(__FILE__) . '../co_style.css');
}

function ricerca_monete()
{
    global $typenow;

    if ($typenow === 'ricercamonete') {
        add_filter('posts_search', 'ricercamonete_search_override', 10, 2);
    }
}

function ricercamonete_search_override($search, $query)
{
    global $wpdb;

    if ($query->is_main_query() && !empty($query->query['s'])) {
        $sql    = "
              or exists (
                  select * from {$wpdb->postmeta} where post_id={$wpdb->posts}.ID
                  and meta_key in ('co_nome_monete','co_email_monete','co_grammi_monete', 'co_caratura_monete', 'co_negozio_monete')
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

function fill_richiestamonete_columns($column, $post_id)
{


    //$prezzo_column_monete = (((float)do_shortcode(get_plugin_options('co_shortcode_monete')) / 1000) * (float)get_post_meta($post_id, 'co_caratura_monete', true)) * (float)get_post_meta($post_id, 'co_grammi_monete', true);
    $name_monete = esc_html(get_post_meta($post_id, 'co_nome_monete', true));
    $email_monete = esc_html(get_post_meta($post_id, 'co_email_monete', true));
    //$prezzo_column_monete = number_format($prezzo_column_monete, 2, '.', '');


    switch ($column) {
        case 'name':
            echo $name_monete;
            break;
        case 'email':
            echo $email_monete;
            break;
    }
}

function custom_colonne_richiestamonete($columns)
{
    $columns = array(
        'cb' => $columns['cb'],
        'name' => 'Nome',
        'email' => 'e-mail',

    );
    return $columns;
}

function create_meta_box_monete()
{
    add_meta_box('custom_richiesta_monete', 'richiestamonete', 'display_richiesta_monete', 'richiestamonete');
}

function display_richiesta_monete()
{
    $post_metas = get_post_meta(get_the_ID());
    unset($post_metas['_edit_lock']);
?>
    <ul>
        <?php
        foreach ($post_metas as $key => $value) {
            if ($key == 'totalone') {
                $key = 'Prezzo';
            }

            echo '<li><strong>' . ucfirst($key) . '</strong>: ' . esc_html($value[0]) . '</li>';
        }
        ?>
    </ul>
<?php
}

function create_submissions_page_monete()
{
    $args = [
        'public' => true,
        'has_archive' => true,
        'labels' => [
            'name' => 'Richieste monete',
            'singolar_name' => 'richiestamonete'
        ],
        'supports' => false,
        'capability_type' => 'post',
        'capabilities' => array(
            'create_posts' => false,
        ),
        'map_meta_cap' => true,
    ];

    register_post_type('richiestamonete', $args);
}

function mostra_form_monete()
{
    include PLUGIN_PATH . '/template/formmonete.php';
}

function create_rest_endpoint_monete()
{
    register_rest_route('v1/gsvmetal_monete', 'submit', array(
        'methods' => 'POST',
        'callback' => 'handle_enquiry_monete'
    ));
}

function handle_enquiry_monete($data)
{
    $params = $data->get_params();
    $field_co_nome_monete = sanitize_text_field($params['co_nome_monete']);
    $field_co_email_monete = sanitize_email($params['co_email_monete']);
    $field_co_negozio_monete = sanitize_text_field($params['co_negozio_monete']);
    $field_co_totale_monete = sanitize_text_field($params['totalone']);



    if (!wp_verify_nonce($params['_wpnonce'], 'wp_rest')) {
        return new WP_Rest_Response('Messaggio non inviato', 422);
    }

    unset($params['_wpnonce']);
    unset($params['_wp_http_referer']);

    $headers = [];

    $sender_email = get_bloginfo('admin_email');
    $sender_name = get_bloginfo('name');

    //$valore = do_shortcode(((get_plugin_options('co_shortcode_monete') / 1000) * $field_co_caratura_monete) * $field_co_grammi_monete);
    /*$valore = (((float)do_shortcode(get_plugin_options('co_shortcode_monete')) / 1000) * (float) $field_co_caratura_monete) * (float)$field_co_grammi_monete;*/

    $headers[] = "From: {$sender_name} <{$sender_email}>";
    $headers[] = "Reply-to: {$field_co_nome_monete} <{$field_co_email_monete}>";
    $headers[] = "Content-Type: text/html";

    $subject = "Nuovo prezzo bloccato su: {$sender_name}";

    $message = '';
    $message .= "{$field_co_nome_monete} ha bloccato il prezzo presso il punto vendita di {$field_co_negozio_monete}.<br />";
    $message .= "Il suo prezzo è di {$field_co_totale_monete} €";

    $postarr_monete = [
        'post_title' => $field_co_nome_monete,
        'post_type' => 'richiestamonete',
        'post_status' => 'publish'
    ];

    $post_id = wp_insert_post($postarr_monete);

    foreach ($params as $label => $value) {
        switch ($label) {
            case 'co_email_monete':
                $value = sanitize_email($value);
                break;
            default:
                $value = sanitize_text_field($value);
        }
        add_post_meta($post_id, sanitize_text_field($label), $value);
    }

    $subject_admin = "{$field_co_nome_monete} ha bloccato il suo prezzo!";
    wp_mail($field_co_email_monete, $subject, $message, $headers);
    wp_mail(get_plugin_options('co_form_email'), $subject_admin, $message, $headers);
    return new WP_Rest_Response('Messaggio Inviato', 200);
}
