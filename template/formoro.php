<div class="co_wrapper">
    <div class="co_pre_head">
        <p class="co_title">
            Quotazione Oro
        </p>
    </div>
    <div id="co_head_oro" class="co_head">
        <div class="co_row">
            <h2 class="co_value">
                <?= do_shortcode(get_plugin_options('co_shortcode_oro')); ?> €/g
            </h2>
        </div>
    </div>
    <div class="co_body">
        <form class="co_form" method="post" id="co_form_oro">
            <?php wp_nonce_field('wp_rest'); ?>
            <div id="co_page1_oro">
                <div class="co_row">
                    <div class="co_column">
                        <p class="co_label">
                            Grammi<span style="color: red;">*</span>:
                        </p>
                        <input type="number" id="co_grammi_oro" name="co_grammi_oro" class="co_field_short" />
                    </div>
                    <div class="co_column">
                        <p class="co_label">
                            Caratura:
                        </p>
                        <select class="co_select_short" name="co_caratura_oro" id="co_caratura_oro">
                            <option value="333">333 - 8 carati</option>
                            <option value="375">375 - 9 carati</option>
                            <option value="500">500 - 12 carati</option>
                            <option value="585">585 - 14 carati</option>
                            <option value="750">750 - 18 carati</option>
                            <option value="900">900 - 20 carati</option>
                            <option value="916">916 - 22 carati</option>
                            <option value="999">999 - 24 carati</option>
                        </select>
                    </div>
                </div>
                <div id="co_error_oro_1"></div>
                <div class="co_row">
                    <button class="co_button_next" value="next1" id="next1_oro">BLOCCA PREZZO</button>
                </div>
            </div>
            <div id="co_page2_oro" class="co_hidden">
                <div class="co_row co_hidden" id="calcolatore_oro">
                    <p class="co_paragraph">
                        Il prezzo che ti proponiamo è di:
                    </p>
                    <h2 class="co_value" id="calcolo_oro">

                    </h2>
                </div>
                <div class="co_row">
                    <div class="co_column">
                        <p class="co_label">
                            Nome e Cognome<span style="color: red;">*</span>
                        </p>
                        <input type="text" id="co_nome_oro" name="co_nome_oro" class="co_field_short" />
                    </div>
                    <div class="co_column">
                        <p class="co_label">
                            Indirizzo e-mail<span style="color: red;">*</span>
                        </p>
                        <input type="email" id="co_email_oro" name="co_email_oro" class="co_field_short" />
                    </div>
                </div>
                <div class="co_row">
                    <p class="co_label">
                        Punto Vendita
                    </p>
                    <select class="co_select_long" name="co_negozio_oro" id="co_negozio_oro">
                        <option value="<?= get_plugin_options('co_form_negozio1'); ?>"><?= get_plugin_options('co_form_negozio1'); ?></option>
                        <option value="<?= get_plugin_options('co_form_negozio2'); ?>"><?= get_plugin_options('co_form_negozio2'); ?></option>
                        <option value="<?= get_plugin_options('co_form_negozio3'); ?>"><?= get_plugin_options('co_form_negozio3'); ?></option>
                    </select>
                </div>
                <div class="co_row">
                    <input type="checkbox" id="co_checkbox_oro" class="co_checkbox" name="co_checkbox_oro" value="visto"><strong>ACCONSENTO</strong><span style="color: red;">*</span>
                    <p class="co_text">
                        Ho letto l'<a href="<?= get_plugin_options('co_form_privacy'); ?>">informativa sulla privacy</a> e acconsento alla memorizzazione dei miei dati, secondo quanto stabilito dal regolamento europeo per la protezione dei dati personali n. 679/2016 (GDPR), per avere informazioni sui servizi di <?= site_url(); ?>
                    </p>
                    <div id="co_error_oro_2"></div>
                    <button type="submit" class="co_button_submit" value="submit" id="submit_oro" name="submit_oro">BLOCCA IL PREZZO!</button>
                </div>
            </div>
            <div id="co_page3_oro" class="co_hidden">
                <div class="co_row">
                    <h2 class="co_success">Complimenti!</h2>
                    <p class="co_paragraph"><?= get_plugin_options('co_messaggio_di_conferma') ?></p>
                    <h2 class="co_value"></h2>
                </div>
            </div>
            <div id="co_page4_oro" class="co_hidden">
                <div class="co_row">
                    <h2 class="co_error">Errore!</h2>
                    <p class="co_paragraph">Si è verificato un errore nell'invio del messaggio. Contatta l'amministratore.</p>
                </div>
            </div>
            <div class="co_hidden" id="co_spinner_oro">
                <img src="<?= PLUGIN_URL . '/spinner.gif'; ?>">
            </div>
        </form>
    </div>
</div>

<script>
    jQuery(document).ready(function($) {
        var pageone_oro = $('#co_page1_oro');
        var pagetwo_oro = $('#co_page2_oro');
        var pagethree_oro = $('#co_page3_oro');
        var pagefour_oro = $('#co_page4_oro');
        var head_oro = $('#co_head_oro');
        var calcolo_oro = $('#calcolo_oro');
        var calcolatore_oro = $('#calcolatore_oro');
        var caratura_oro = $('#co_caratura_oro');
        var grammi_oro = $('#co_grammi_oro');
        var executed_oro = false;
        var spinner_oro = $('#co_spinner_oro');
        var checkbox_oro = $('#co_checkbox_oro');
        var error_oro_1 = $('#co_error_oro_1');
        var error_oro_2 = $('#co_error_oro_2');
        var nome_oro = $('#co_nome_oro');
        var email_oro = $('#co_email_oro');


        $("#co_form_oro").submit(function(event) {
            event.preventDefault();
            var form_oro = $(this);

            if (!checkbox_oro.is(':checked')) {
                error_oro_2.html('<p style="color:red;">ERRORE: per proseguire, accetta la liberatoria privacy!</p>');
            } else if (nome_oro.val().length == 0 || email_oro.val().length == 0 || (nome_oro.val().length == 0 && email_oro.val().length == 0)) {
                error_oro_2.html('<p style="color:red;">ERRORE: per proseguire, compila i campi obbligatori!</p>');
            } else {
                $.ajax({
                    type: "POST",
                    url: "<?= get_rest_url(null, 'v1/gsvmetal_oro/submit'); ?>",
                    data: form_oro.serialize(),
                    beforeSend: function() {
                        if (!executed_oro) {
                            pagetwo_oro.addClass('co_hidden');
                            spinner_oro.removeClass('co_hidden').fadeIn();
                            executed_oro = true;
                        }
                    },
                    success: function() {
                        spinner_oro.addClass("co_hidden");
                        pagethree_oro.removeClass("co_hidden").fadeIn();
                    },
                    error: function() {
                        spinner_oro.addClass("co_hidden");
                        pagefour_oro.removeClass("co_hidden").fadeIn();
                    }
                });
            }
        });

        $("#next1_oro").click(function() {
            event.preventDefault();

            if (grammi_oro.val().length == 0) {
                error_oro_1.html('<p style="color:red;">ERRORE: per proseguire, compila i campi obbligatori!</p>')
            } else {
                head_oro.addClass("co_hidden");
                calcolatore_oro.removeClass("co_hidden");
                pageone_oro.addClass("co_hidden");
                pagetwo_oro.removeClass("co_hidden").fadeIn();
                console.log('ciao');
                calcolo_oro.html((((<?= (float)do_shortcode(get_plugin_options('co_shortcode_oro')); ?> / 1000) * caratura_oro.val()) * grammi_oro.val()).toFixed(2) + " €");
            }
        });
    });
</script>