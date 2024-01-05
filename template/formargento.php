<div class="co_wrapper">
    <div class="co_pre_head">
        <p class="co_title">
            Quotazione Argento
        </p>
    </div>
    <div id="co_head_argento" class="co_head">
        <div class="co_row">
            <h2 class="co_value">
                <?= do_shortcode(get_plugin_options('co_shortcode_argento')); ?> €/Kg
            </h2>
        </div>
    </div>
    <div class="co_body">
        <form class="co_form" method="post" id="co_form_argento">
            <?php wp_nonce_field('wp_rest'); ?>
            <div id="co_page1_argento">
                <div class="co_row">
                    <div class="co_column">
                        <p class="co_label">
                            Chilogrammi<span style="color: red;">*</span>:
                        </p>
                        <input type="number" id="co_chili_argento" name="co_chili_argento" class="co_field_short" />
                    </div>
                    <div class="co_column">
                        <p class="co_label">
                            Caratura:
                        </p>
                        <select class="co_select_short" name="co_caratura_argento" id="co_caratura_argento">
                            <option value="800">800</option>
                            <option value="925">925</option>
                            <option value="999">999</option>
                        </select>
                    </div>
                </div>
                <div id="co_error_argento_1"></div>
                <div class="co_row">
                    <button class="co_button_next" value="next1" id="next1_argento">BLOCCA PREZZO</button>
                </div>
            </div>
            <div id="co_page2_argento" class="co_hidden">
                <div class="co_row co_hidden" id="calcolatore_argento">
                    <p class="co_paragraph">
                        Il prezzo che ti proponiamo è di:
                    </p>
                    <h2 class="co_value" id="calcolo_argento">

                    </h2>
                </div>
                <div class="co_row">
                    <div class="co_column">
                        <p class="co_label">
                            Nome e Cognome<span style="color: red;">*</span>
                        </p>
                        <input type="text" id="co_nome_argento" name="co_nome_argento" class="co_field_short" />
                    </div>
                    <div class="co_column">
                        <p class="co_label">
                            Indirizzo e-mail<span style="color: red;">*</span>
                        </p>
                        <input type="email" id="co_email_argento" name="co_email_argento" class="co_field_short" />
                    </div>
                </div>
                <div class="co_row">
                    <p class="co_label">
                        Punto Vendita
                    </p>
                    <select class="co_select_long" name="co_negozio_argento" id="co_negozio_argento">
                        <option value="<?= get_plugin_options('co_form_negozio1'); ?>"><?= get_plugin_options('co_form_negozio1'); ?></option>
                        <option value="<?= get_plugin_options('co_form_negozio2'); ?>"><?= get_plugin_options('co_form_negozio2'); ?></option>
                        <option value="<?= get_plugin_options('co_form_negozio3'); ?>"><?= get_plugin_options('co_form_negozio3'); ?></option>
                    </select>
                </div>
                <div class="co_row">
                    <input type="checkbox" id="co_checkbox_argento" class="co_checkbox" name="co_checkbox_argento" value="visto"><strong>ACCONSENTO</strong><span style="color: red;">*</span>
                    <p class="co_text">
                        Ho letto l'<a href="<?= get_plugin_options('co_form_privacy'); ?>">informativa sulla privacy</a> e acconsento alla memorizzazione dei miei dati, secondo quanto stabilito dal regolamento europeo per la protezione dei dati personali n. 679/2016 (GDPR), per avere informazioni sui servizi di <?= site_url(); ?>
                    </p>
                    <div id="co_error_argento_2"></div>
                    <button type="submit" class="co_button_submit" value="submit" id="submit_argento" name="submit_argento">BLOCCA IL PREZZO!</button>
                </div>
            </div>
            <div id="co_page3_argento" class="co_hidden">
                <div class="co_row">
                    <h2 class="co_success">Complimenti!</h2>
                    <p class="co_paragraph"><?= get_plugin_options('co_messaggio_di_conferma') ?></p>
                    <h2 class="co_value"></h2>
                </div>
            </div>
            <div id="co_page4_argento" class="co_hidden">
                <div class="co_row">
                    <h2 class="co_error">Errore!</h2>
                    <p class="co_paragraph">Si è verificato un errore nell'invio del messaggio. Contatta l'amministratore.</p>
                </div>
            </div>
            <div class="co_hidden" id="co_spinner_argento">
                <img src="<?= PLUGIN_URL . '/spinner.gif'; ?>">
            </div>
        </form>
    </div>
</div>

<script>
    jQuery(document).ready(function($) {
        var pageone_argento = $('#co_page1_argento');
        var pagetwo_argento = $('#co_page2_argento');
        var pagethree_argento = $('#co_page3_argento');
        var pagefour_argento = $('#co_page4_argento');
        var head_argento = $('#co_head_argento');
        var calcolo_argento = $('#calcolo_argento');
        var calcolatore_argento = $('#calcolatore_argento');
        var caratura_argento = $('#co_caratura_argento');
        var chili_argento = $('#co_chili_argento');
        var executed_argento = false;
        var spinner_argento = $('#co_spinner_argento');
        var checkbox_argento = $('#co_checkbox_argento');
        var error_argento_1 = $('#co_error_argento_1');
        var error_argento_2 = $('#co_error_argento_2');
        var nome_argento = $('#co_nome_argento');
        var email_argento = $('#co_email_argento');


        $("#co_form_argento").submit(function(event) {
            event.preventDefault();
            var form_argento = $(this);

            if (!checkbox_argento.is(':checked')) {
                error_argento_2.html('<p style="color:red;">ERRORE: per proseguire, accetta la liberatoria privacy!</p>');
            } else if (nome_argento.val().length == 0 || email_argento.val().length == 0 || (nome_argento.val().length == 0 && email_argento.val().length == 0)) {
                error_argento_2.html('<p style="color:red;">ERRORE: per proseguire, compila i campi obbligatori!</p>');
            } else {
                $.ajax({
                    type: "POST",
                    url: "<?= get_rest_url(null, 'v1/gsvmetal_argento/submit'); ?>",
                    data: form_argento.serialize(),
                    beforeSend: function() {
                        if (!executed_argento) {
                            pagetwo_argento.addClass('co_hidden');
                            spinner_argento.removeClass('co_hidden').fadeIn();
                            executed_argento = true;
                        }
                    },
                    success: function() {
                        spinner_argento.addClass("co_hidden");
                        pagethree_argento.removeClass("co_hidden").fadeIn();
                    },
                    error: function() {
                        spinner_argento.addClass("co_hidden");
                        pagefour_argento.removeClass("co_hidden").fadeIn();
                    }
                });
            }
        });

        $("#next1_argento").click(function() {
            event.preventDefault();

            if (chili_argento.val().length == 0) {
                error_argento_1.html('<p style="color:red;">ERRORE: per proseguire, compila i campi obbligatori!</p>')
            } else {
                head_argento.addClass("co_hidden");
                calcolatore_argento.removeClass("co_hidden");
                pageone_argento.addClass("co_hidden");
                pagetwo_argento.removeClass("co_hidden").fadeIn();
                console.log('ciao');
                calcolo_argento.html((((<?= (float)do_shortcode(get_plugin_options('co_shortcode_argento')); ?> / 1000) * caratura_argento.val()) * chili_argento.val()).toFixed(2) + " €");
            }
        });
    });
</script>