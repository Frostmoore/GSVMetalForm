<?php

if (!defined('ABSPATH')) {
    die('Non puoi accedere a questo file');
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('after_setup_theme', 'load_carbon_fields');
add_action('carbon_fields_register_fields', 'create_options_page');

function load_carbon_fields()
{
    \Carbon_Fields\Carbon_Fields::boot();
}

function create_options_page()
{
    Container::make('theme_options', __('GSV Metal'))
        ->set_icon('dashicons-bank')
        ->add_fields(array(
            Field::make('text', 'co_shortcode_oro', __('Shortcode da usare per l\'oro'))
                ->set_attribute('placeholder', 'Ad es. [metalpriceapi base="EUR" symbol="XAU" unit="gram"]')
                ->set_help_text('Inserisci lo Shortcode per il valore dell\'oro. Sulla pagina di destinazione, inserisci lo shortcode [form-oro].'),
            Field::make('text', 'co_shortcode_argento', __('Shortcode da usare per l\'argento'))
                ->set_attribute('placeholder', 'Ad es. [metalpriceapi base="EUR" symbol="XAG" unit="kilogram"]')
                ->set_help_text('Inserisci lo Shortcode per il valore dell\'argento.  Sulla pagina di destinazione, inserisci lo shortcode [form-argento].'),
            Field::make('textarea', 'co_messaggio_di_conferma', __('Messaggio di conferma dopo aver compilato il form'))
                ->set_attribute('placeholder', 'Ad es. "Complimenti! Hai appena bloccato il tuo prezzo, vieni in negozio!"')
                ->set_help_text('Inserisci il messaggio che sarà visualizzato all\'invio del form completo'),
            Field::make('text', 'co_form_email', __('Email a cui mandare il messaggio di blocco prezzo'))
                ->set_attribute('placeholder', 'Ad es. ilaria@ilariaoro.it')
                ->set_help_text('Inserisci l\'indirizzo e-mail al quale dovrà essere inoltrato il risultato del form'),
            Field::make('text', 'co_form_negozio1', __('Indirizzo del negozio numero 1'))
                ->set_attribute('placeholder', 'Ad es. via del Babuino, 35')
                ->set_help_text('Inserisci l\'indirizzo del punto vendita numero 1'),
            Field::make('text', 'co_form_negozio2', __('Indirizzo del negozio numero 2'))
                ->set_attribute('placeholder', 'Ad es. via del Babuino, 35')
                ->set_help_text('Inserisci l\'indirizzo del punto vendita numero 2'),
            Field::make('text', 'co_form_negozio3', __('Indirizzo del negozio numero 3'))
                ->set_attribute('placeholder', 'Ad es. via del Babuino, 35')
                ->set_help_text('Inserisci l\'indirizzo del punto vendita numero 3'),
            Field::make('text', 'co_form_privacy', __('Pagina della Privacy'))
                ->set_attribute('placeholder', 'Ad es. https://www.ilariaoro.com/privacy-policy')
                ->set_help_text('Inserisci l\'indirizzo della pagina della Privacy Policy'),
        ));
}
