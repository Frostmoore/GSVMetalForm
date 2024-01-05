<div class="co_wrapper">
    <div class="co_pre_head">
        <p class="co_title">
            Quotazione monete
        </p>
    </div>
    <div class="co_body">
        <form class="co_form" method="post" id="co_form_monete">
            <?php wp_nonce_field('wp_rest'); ?>

            <!-- Roba del Form -->

            <div id="co_page1_monete">
                <div class="co_row_monete">
                    <div class="co_column_monete">
                        <img src="<?= PLUGIN_URL . '/sterlina-regno-unito.jpg'; ?>">
                        <h4 class="co_monete_title">Sterlina (Regno Unito)</h4>
                        <ul class="co_monete_ul">
                            <li><strong>Peso</strong>: 7.98 Gr.</li>
                            <li><strong>Oro Puro</strong>: 7.32 Gr.</li>
                            <li><strong>Titolo</strong>: 916/1000</li>
                        </ul>
                        <p class="co_monete_value">
                            Valutazione
                        </p>
                        <h2 class="co_value_monete" id="co_value_sterlina-regno-unito">
                            <span class="monete_valore"><?= do_shortcode('[metalpriceapi base="EUR" unit="gram" operation="(value)*7.32"]'); ?></span> €
                        </h2>
                        <p class="co_label">
                            Numero di Monete<span style="color: red;">*</span>:
                        </p>
                        <input type="number" id="co_sterlina-regno-unito" name="co_sterlina-regno-unito" class="co_field_short input_monete" value="0" placeholder="0" />
                    </div>

                    <div class="co_column_monete">
                        <img src="<?= PLUGIN_URL . '/20-franchi-francesi-marengo.jpg'; ?>">
                        <h4 class="co_monete_title">20 Franchi Francesi (Marengo)</h4>
                        <ul class="co_monete_ul">
                            <li><strong>Peso</strong>: 6.45 Gr.</li>
                            <li><strong>Oro Puro</strong>: 5.80 Gr.</li>
                            <li><strong>Titolo</strong>: 900/1000</li>
                        </ul>
                        <p class="co_monete_value">
                            Valutazione
                        </p>
                        <h2 class="co_value_monete" id="co_value_20-franchi-francesi-marengo">
                            <span class="monete_valore"><?= do_shortcode('[metalpriceapi base="EUR" unit="gram" operation="(value)*5.80"]'); ?></span> €
                        </h2>
                        <p class="co_label">
                            Numero di Monete<span style="color: red;">*</span>:
                        </p>
                        <input type="number" id="co_20-franchi-francesi-marengo" name="co_20-franchi-francesi-marengo" class="co_field_short input_monete" value="0" placeholder="0" />
                    </div>

                    <div class="co_column_monete">
                        <img src="<?= PLUGIN_URL . '/20-lire-italiane-marengo.jpg'; ?>">
                        <h4 class="co_monete_title">20 Lire Italiane (Marengo)</h4>
                        <ul class="co_monete_ul">
                            <li><strong>Peso</strong>: 6.45 Gr.</li>
                            <li><strong>Oro Puro</strong>: 5.80 Gr.</li>
                            <li><strong>Titolo</strong>: 900/1000</li>
                        </ul>
                        <p class="co_monete_value">
                            Valutazione
                        </p>
                        <h2 class="co_value_monete" id="co_value_20-lire-italiane-marengo">
                            <span class="monete_valore"><?= do_shortcode('[metalpriceapi base="EUR" unit="gram" operation="(value)*5.80"]'); ?></span> €
                        </h2>
                        <p class="co_label">
                            Numero di Monete<span style="color: red;">*</span>:
                        </p>
                        <input type="number" id="co_20-lire-italiane-marengo" name="co_20-lire-italiane-marengo" class="co_field_short input_monete" value="0" placeholder="0" />
                    </div>

                    <div class="co_column_monete">
                        <img src="<?= PLUGIN_URL . '/20-franchi-svizzeri-marengo.jpg'; ?>">
                        <h4 class="co_monete_title">20 Franchi Svizzeri (Marengo)</h4>
                        <ul class="co_monete_ul">
                            <li><strong>Peso</strong>: 6.45 Gr.</li>
                            <li><strong>Oro Puro</strong>: 5.80 Gr.</li>
                            <li><strong>Titolo</strong>: 900/1000</li>
                        </ul>
                        <p class="co_monete_value">
                            Valutazione
                        </p>
                        <h2 class="co_value_monete" id="co_value_20-franchi-svizzeri-marengo">
                            <span class="monete_valore"><?= do_shortcode('[metalpriceapi base="EUR" unit="gram" operation="(value)*5.80"]'); ?></span> €
                        </h2>
                        <p class="co_label">
                            Numero di Monete<span style="color: red;">*</span>:
                        </p>
                        <input type="number" id="co_20-franchi-svizzeri-marengo" name="co_20-franchi-svizzeri-marengo" class="co_field_short input_monete" value="0" placeholder="0" />
                    </div>

                    <div class="co_column_monete">
                        <img src="<?= PLUGIN_URL . '/krugerrand-sud-africa.jpg'; ?>">
                        <h4 class="co_monete_title">Krugerrand Sud Africa</h4>
                        <ul class="co_monete_ul">
                            <li><strong>Peso</strong>: 33.93 Gr.</li>
                            <li><strong>Oro Puro</strong>: 31.10 Gr.</li>
                            <li><strong>Titolo</strong>: 917/1000</li>
                        </ul>
                        <p class="co_monete_value">
                            Valutazione
                        </p>
                        <h2 class="co_value_monete" id="co_value_krugerrand-sud-africa">
                            <span class="monete_valore"><?= do_shortcode('[metalpriceapi base="EUR" unit="gram" operation="(value)*31.10"]'); ?></span> €
                        </h2>
                        <p class="co_label">
                            Numero di Monete<span style="color: red;">*</span>:
                        </p>
                        <input type="number" id="co_krugerrand-sud-africa" name="co_krugerrand-sud-africa" class="co_field_short input_monete" value="0" placeholder="0" />
                    </div>

                    <div class="co_column_monete">
                        <img src="<?= PLUGIN_URL . '/4-ducati-austriaci.jpg'; ?>">
                        <h4 class="co_monete_title">4 Ducati Austriaci</h4>
                        <ul class="co_monete_ul">
                            <li><strong>Peso</strong>: 13.96 Gr.</li>
                            <li><strong>Oro Puro</strong>: 13.76 Gr.</li>
                            <li><strong>Titolo</strong>: 986/1000</li>
                        </ul>
                        <p class="co_monete_value">
                            Valutazione
                        </p>
                        <h2 class="co_value_monete" id="co_value_4-ducati-austriaci">
                            <span class="monete_valore"><?= do_shortcode('[metalpriceapi base="EUR" unit="gram" operation="(value)*13.76"]'); ?></span> €
                        </h2>
                        <p class="co_label">
                            Numero di Monete<span style="color: red;">*</span>:
                        </p>
                        <input type="number" id="co_4-ducati-austriaci" name="co_4-ducati-austriaci" class="co_field_short input_monete" value="0" placeholder="0" />
                    </div>

                    <div class="co_column_monete">
                        <img src="<?= PLUGIN_URL . '/50-pesos-messicani.jpg'; ?>">
                        <h4 class="co_monete_title">50 Pesos Messicani</h4>
                        <ul class="co_monete_ul">
                            <li><strong>Peso</strong>: 41.66 Gr.</li>
                            <li><strong>Oro Puro</strong>: 37.50 Gr.</li>
                            <li><strong>Titolo</strong>: 986/1000</li>
                        </ul>
                        <p class="co_monete_value">
                            Valutazione
                        </p>
                        <h2 class="co_value_monete" id="co_value_50-pesos-messicani">
                            <span class="monete_valore"><?= do_shortcode('[metalpriceapi base="EUR" unit="gram" operation="(value)*37.50"]'); ?></span> €
                        </h2>
                        <p class="co_label">
                            Numero di Monete<span style="color: red;">*</span>:
                        </p>
                        <input type="number" id="co_50-pesos-messicani" name="co_50-pesos-messicani" class="co_field_short input_monete" value="0" placeholder="0" />
                    </div>

                    <div class="co_column_monete">
                        <img src="<?= PLUGIN_URL . '/20-marchi-tedeschi.jpg'; ?>">
                        <h4 class="co_monete_title">20 Marchi Tedeschi</h4>
                        <ul class="co_monete_ul">
                            <li><strong>Peso</strong>: 7.98 Gr.</li>
                            <li><strong>Oro Puro</strong>: 7.32 Gr.</li>
                            <li><strong>Titolo</strong>: 916/1000</li>
                        </ul>
                        <p class="co_monete_value">
                            Valutazione
                        </p>
                        <h2 class="co_value_monete" id="co_value_20-marchi-tedeschi">
                            <span class="monete_valore"><?= do_shortcode('[metalpriceapi base="EUR" unit="gram" operation="(value)*7.32"]'); ?></span> €
                        </h2>
                        <p class="co_label">
                            Numero di Monete<span style="color: red;">*</span>:
                        </p>
                        <input type="number" id="co_20-marchi-tedeschi" name="co_20-marchi-tedeschi" class="co_field_short input_monete" value="0" placeholder="0" />
                    </div>

                    <div class="co_column_monete">
                        <img src="<?= PLUGIN_URL . '/20-dollari-liberty.jpg'; ?>">
                        <h4 class="co_monete_title">20 Dollari Liberty</h4>
                        <ul class="co_monete_ul">
                            <li><strong>Peso</strong>: 33.43 Gr.</li>
                            <li><strong>Oro Puro</strong>: 30.08 Gr.</li>
                            <li><strong>Titolo</strong>: 900/1000</li>
                        </ul>
                        <p class="co_monete_value">
                            Valutazione
                        </p>
                        <h2 class="co_value_monete" id="co_value_20-dollari-liberty">
                            <span class="monete_valore"><?= do_shortcode('[metalpriceapi base="EUR" unit="gram" operation="(value)*30.08"]'); ?></span> €
                        </h2>
                        <p class="co_label">
                            Numero di Monete<span style="color: red;">*</span>:
                        </p>
                        <input type="number" id="co_20-dollari-liberty" name="co_20-dollari-liberty" class="co_field_short input_monete" value="0" placeholder="0" />
                    </div>

                    <div class="co_column_monete">
                        <img src="<?= PLUGIN_URL . '/10-dollari-liberty.jpg'; ?>">
                        <h4 class="co_monete_title">10 Dollari Liberty</h4>
                        <ul class="co_monete_ul">
                            <li><strong>Peso</strong>: 16.71 Gr.</li>
                            <li><strong>Oro Puro</strong>: 15.03 Gr.</li>
                            <li><strong>Titolo</strong>: 900/1000</li>
                        </ul>
                        <p class="co_monete_value">
                            Valutazione
                        </p>
                        <h2 class="co_value_monete" id="co_value_10-dollari-liberty">
                            <span class="monete_valore"><?= do_shortcode('[metalpriceapi base="EUR" unit="gram" operation="(value)*15.03"]'); ?></span> €
                        </h2>
                        <p class="co_label">
                            Numero di Monete<span style="color: red;">*</span>:
                        </p>
                        <input type="number" id="co_10-dollari-liberty" name="co_10-dollari-liberty" class="co_field_short input_monete" value="0" placeholder="0" />
                    </div>

                    <div class="co_column_monete">
                        <img src="<?= PLUGIN_URL . '/5-dollari-liberty.jpg'; ?>">
                        <h4 class="co_monete_title">5 Dollari Liberty</h4>
                        <ul class="co_monete_ul">
                            <li><strong>Peso</strong>: 8.35 Gr.</li>
                            <li><strong>Oro Puro</strong>: 7.51 Gr.</li>
                            <li><strong>Titolo</strong>: 900/1000</li>
                        </ul>
                        <p class="co_monete_value">
                            Valutazione
                        </p>
                        <h2 class="co_value_monete" id="co_value_5-dollari-liberty">
                            <span class="monete_valore"><?= do_shortcode('[metalpriceapi base="EUR" unit="gram" operation="(value)*7.51"]'); ?></span> €
                        </h2>
                        <p class="co_label">
                            Numero di Monete<span style="color: red;">*</span>:
                        </p>
                        <input type="number" id="co_5-dollari-liberty" name="co_5-dollari-liberty" class="co_field_short input_monete" value="0" placeholder="0" />
                    </div>

                    <div class="co_column_monete">
                        <img src="<?= PLUGIN_URL . '/20-dollari-statua.jpg'; ?>">
                        <h4 class="co_monete_title">20 Dollari Statua</h4>
                        <ul class="co_monete_ul">
                            <li><strong>Peso</strong>: 33.43 Gr.</li>
                            <li><strong>Oro Puro</strong>: 30.08 Gr.</li>
                            <li><strong>Titolo</strong>: 900/1000</li>
                        </ul>
                        <p class="co_monete_value">
                            Valutazione
                        </p>
                        <h2 class="co_value_monete" id="co_value_20-dollari-statua">
                            <span class="monete_valore"><?= do_shortcode('[metalpriceapi base="EUR" unit="gram" operation="(value)*30.08"]'); ?></span> €
                        </h2>
                        <p class="co_label">
                            Numero di Monete<span style="color: red;">*</span>:
                        </p>
                        <input type="number" id="co_20-dollari-statua" name="co_20-dollari-statua" class="co_field_short input_monete" value="0" placeholder="0" />
                    </div>

                    <div class="co_column_monete">
                        <img src="<?= PLUGIN_URL . '/10-dollari-indiani.jpg'; ?>">
                        <h4 class="co_monete_title">10 Dollari Indiani</h4>
                        <ul class="co_monete_ul">
                            <li><strong>Peso</strong>: 16.71 Gr.</li>
                            <li><strong>Oro Puro</strong>: 15.03 Gr.</li>
                            <li><strong>Titolo</strong>: 900/1000</li>
                        </ul>
                        <p class="co_monete_value">
                            Valutazione
                        </p>
                        <h2 class="co_value_monete" id="co_value_10-dollari-indiani">
                            <span class="monete_valore"><?= do_shortcode('[metalpriceapi base="EUR" unit="gram" operation="(value)*15.03"]'); ?></span> €
                        </h2>
                        <p class="co_label">
                            Numero di Monete<span style="color: red;">*</span>:
                        </p>
                        <input type="number" id="co_10-dollari-indiani" name="co_10-dollari-indiani" class="co_field_short input_monete" value="0" placeholder="0" />
                    </div>

                    <div class="co_column_monete">
                        <img src="<?= PLUGIN_URL . '/5-dollari-indiani.jpg'; ?>">
                        <h4 class="co_monete_title">5 Dollari Indiani</h4>
                        <ul class="co_monete_ul">
                            <li><strong>Peso</strong>: 8.35 Gr.</li>
                            <li><strong>Oro Puro</strong>: 7.51 Gr.</li>
                            <li><strong>Titolo</strong>: 900/1000</li>
                        </ul>
                        <p class="co_monete_value">
                            Valutazione
                        </p>
                        <h2 class="co_value_monete" id="co_value_5-dollari-indiani">
                            <span class="monete_valore"><?= do_shortcode('[metalpriceapi base="EUR" unit="gram" operation="(value)*7.51"]'); ?></span> €
                        </h2>
                        <p class="co_label">
                            Numero di Monete<span style="color: red;">*</span>:
                        </p>
                        <input type="number" id="co_5-dollari-indiani" name="co_5-dollari-indiani" class="co_field_short input_monete" value="0" placeholder="0" />
                    </div>

                    <div class="co_column_monete">
                        <img src="<?= PLUGIN_URL . '/50-dollari-oncia.jpg'; ?>">
                        <h4 class="co_monete_title">50 Dollari (oncia)</h4>
                        <ul class="co_monete_ul">
                            <li><strong>Peso</strong>: 33.93 Gr.</li>
                            <li><strong>Oro Puro</strong>: 31.10 Gr.</li>
                            <li><strong>Titolo</strong>: 917/1000</li>
                        </ul>
                        <p class="co_monete_value">
                            Valutazione
                        </p>
                        <h2 class="co_value_monete" id="co_value_50-dollari-oncia">
                            <span class="monete_valore"><?= do_shortcode('[metalpriceapi base="EUR" unit="gram" operation="(value)*31.10"]'); ?></span> €
                        </h2>
                        <p class="co_label">
                            Numero di Monete<span style="color: red;">*</span>:
                        </p>
                        <input type="number" id="co_50-dollari-oncia" name="co_50-dollari-oncia" class="co_field_short input_monete" value="0" placeholder="0" />
                    </div>

                    <div class="co_column_monete">
                        <img src="<?= PLUGIN_URL . '/25-dollari-mezza-oncia.jpg'; ?>">
                        <h4 class="co_monete_title">25 Dollari (1/2 oncia)</h4>
                        <ul class="co_monete_ul">
                            <li><strong>Peso</strong>: 16.96 Gr.</li>
                            <li><strong>Oro Puro</strong>: 15.55 Gr.</li>
                            <li><strong>Titolo</strong>: 917/1000</li>
                        </ul>
                        <p class="co_monete_value">
                            Valutazione
                        </p>
                        <h2 class="co_value_monete" id="co_value_25-dollari-mezza-oncia">
                            <span class="monete_valore"><?= do_shortcode('[metalpriceapi base="EUR" unit="gram" operation="(value)*15.55"]'); ?></span> €
                        </h2>
                        <p class="co_label">
                            Numero di Monete<span style="color: red;">*</span>:
                        </p>
                        <input type="number" id="co_25-dollari-mezza-oncia" name="co_25-dollari-mezza-oncia" class="co_field_short input_monete" value="0" placeholder="0" />
                    </div>

                    <div class="co_column_monete">
                        <img src="<?= PLUGIN_URL . '/10-dollari-un-quarto-di-oncia.jpg'; ?>">
                        <h4 class="co_monete_title">10 Dollari (1/4 oncia)</h4>
                        <ul class="co_monete_ul">
                            <li><strong>Peso</strong>: 8.48 Gr.</li>
                            <li><strong>Oro Puro</strong>: 7.77 Gr.</li>
                            <li><strong>Titolo</strong>: 917/1000</li>
                        </ul>
                        <p class="co_monete_value">
                            Valutazione
                        </p>
                        <h2 class="co_value_monete" id="co_value_10-dollari-un-quarto-di-oncia">
                            <span class="monete_valore"><?= do_shortcode('[metalpriceapi base="EUR" unit="gram" operation="(value)*7.77"]'); ?></span> €
                        </h2>
                        <p class="co_label">
                            Numero di Monete<span style="color: red;">*</span>:
                        </p>
                        <input type="number" id="co_10-dollari-un-quarto-di-oncia" name="co_10-dollari-un-quarto-di-oncia" class="co_field_short input_monete" value="0" placeholder="0" />
                    </div>

                    <div class="co_column_monete">
                        <img src="<?= PLUGIN_URL . '/5-dollari-un-decimo-di-oncia.jpg'; ?>">
                        <h4 class="co_monete_title">5 Dollari (1/10 oncia)</h4>
                        <ul class="co_monete_ul">
                            <li><strong>Peso</strong>: 3.39 Gr.</li>
                            <li><strong>Oro Puro</strong>: 3.10 Gr.</li>
                            <li><strong>Titolo</strong>: 917/1000</li>
                        </ul>
                        <p class="co_monete_value">
                            Valutazione
                        </p>
                        <h2 class="co_value_monete" id="co_value_5-dollari-un-decimo-di-oncia">
                            <span class="monete_valore"><?= do_shortcode('[metalpriceapi base="EUR" unit="gram" operation="(value)*3.10"]'); ?></span> €
                        </h2>
                        <p class="co_label">
                            Numero di Monete<span style="color: red;">*</span>:
                        </p>
                        <input type="number" id="co_5-dollari-un-decimo-di-oncia" name="co_5-dollari-un-decimo-di-oncia" class="co_field_short input_monete" value="0" placeholder="0" />
                    </div>

                    <div class="co_column_monete">
                        <img src="<?= PLUGIN_URL . '/100-soles-peruviani.jpg'; ?>">
                        <h4 class="co_monete_title">100 Soles Peruviani</h4>
                        <ul class="co_monete_ul">
                            <li><strong>Peso</strong>: 46.80 Gr.</li>
                            <li><strong>Oro Puro</strong>: 42.12 Gr.</li>
                            <li><strong>Titolo</strong>: 900/1000</li>
                        </ul>
                        <p class="co_monete_value">
                            Valutazione
                        </p>
                        <h2 class="co_value_monete" id="co_value_100-soles-peruviani">
                            <span class="monete_valore"><?= do_shortcode('[metalpriceapi base="EUR" unit="gram" operation="(value)*42.12"]'); ?></span> €
                        </h2>
                        <p class="co_label">
                            Numero di Monete<span style="color: red;">*</span>:
                        </p>
                        <input type="number" id="co_100-soles-peruviani" name="co_100-soles-peruviani" class="co_field_short input_monete" value="0" placeholder="0" />
                    </div>

                    <div class="co_column_monete">
                        <img src="<?= PLUGIN_URL . '/10-gulden-olandesi.jpg'; ?>">
                        <h4 class="co_monete_title">10 Gulden Olandesi</h4>
                        <ul class="co_monete_ul">
                            <li><strong>Peso</strong>: 6.72 Gr.</li>
                            <li><strong>Oro Puro</strong>: 6.04 Gr.</li>
                            <li><strong>Titolo</strong>: 900/1000</li>
                        </ul>
                        <p class="co_monete_value">
                            Valutazione
                        </p>
                        <h2 class="co_value_monete" id="co_value_10-gulden-olandesi">
                            <span class="monete_valore"><?= do_shortcode('[metalpriceapi base="EUR" unit="gram" operation="(value)*6.04"]'); ?></span> €
                        </h2>
                        <p class="co_label">
                            Numero di Monete<span style="color: red;">*</span>:
                        </p>
                        <input type="number" id="co_10-gulden-olandesi" name="co_10-gulden-olandesi" class="co_field_short input_monete" value="0" placeholder="0" />
                    </div>

                    <div class="co_column_monete">
                        <img src="<?= PLUGIN_URL . '/50-dollari-canadesi.jpg'; ?>">
                        <h4 class="co_monete_title">50 Dollari Canadesi</h4>
                        <ul class="co_monete_ul">
                            <li><strong>Peso</strong>: 31.10 Gr.</li>
                            <li><strong>Oro Puro</strong>: 31.10 Gr.</li>
                            <li><strong>Titolo</strong>: 999/1000</li>
                        </ul>
                        <p class="co_monete_value">
                            Valutazione
                        </p>
                        <h2 class="co_value_monete" id="co_value_50-dollari-canadesi">
                            <span class="monete_valore"><?= do_shortcode('[metalpriceapi base="EUR" unit="gram" operation="(value)*31.10"]'); ?></span> €
                        </h2>
                        <p class="co_label">
                            Numero di Monete<span style="color: red;">*</span>:
                        </p>
                        <input type="number" id="co_50-dollari-canadesi" name="co_50-dollari-canadesi" class="co_field_short input_monete" value="0" placeholder="0" />
                    </div>
                </div>
                <div id="co_error_monete_1"></div>
                <div class="co_row" style="margin-top: 15px;">
                    <button class="co_button_next" value="next1" id="next1_monete">BLOCCA PREZZO</button>
                </div>
            </div>

            <!-- Roba dopo -->

            <div id="co_page2_monete" class="co_hidden">
                <div class="co_row co_hidden" id="calcolatore_monete">
                    <p class="co_paragraph">
                        Il prezzo che ti proponiamo è di:
                    </p>
                    <h2 class="co_value">
                        <span id="calcolo_monete"></span> €
                    </h2>
                </div>
                <div class="co_row">
                    <div class="co_column">
                        <p class="co_label">
                            Nome e Cognome<span style="color: red;">*</span>
                        </p>
                        <input type="text" id="co_nome_monete" name="co_nome_monete" class="co_field_short" />
                    </div>
                    <div class="co_column">
                        <p class="co_label">
                            Indirizzo e-mail<span style="color: red;">*</span>
                        </p>
                        <input type="email" id="co_email_monete" name="co_email_monete" class="co_field_short" />
                    </div>
                </div>
                <div class="co_row">
                    <p class="co_label">
                        Punto Vendita
                    </p>
                    <select class="co_select_long" name="co_negozio_monete" id="co_negozio_monete">
                        <option value="<?= get_plugin_options('co_form_negozio1'); ?>"><?= get_plugin_options('co_form_negozio1'); ?></option>
                        <option value="<?= get_plugin_options('co_form_negozio2'); ?>"><?= get_plugin_options('co_form_negozio2'); ?></option>
                        <option value="<?= get_plugin_options('co_form_negozio3'); ?>"><?= get_plugin_options('co_form_negozio3'); ?></option>
                    </select>
                </div>
                <div class="co_row">
                    <input type="checkbox" id="co_checkbox_monete" class="co_checkbox" name="co_checkbox_monete" value="visto"><strong>ACCONSENTO</strong><span style="color: red;">*</span>
                    <p class="co_text">
                        Ho letto l'<a href="<?= get_plugin_options('co_form_privacy'); ?>">informativa sulla privacy</a> e acconsento alla memorizzazione dei miei dati, secondo quanto stabilito dal regolamento europeo per la protezione dei dati personali n. 679/2016 (GDPR), per avere informazioni sui servizi di <?= site_url(); ?>
                    </p>
                    <div id="co_error_monete_2"></div>
                    <input type="text" class="co_hidden super_hidden" id="totalone" name="totalone">
                    <button type="submit" class="co_button_submit" value="submit" id="submit_monete" name="submit_monete">BLOCCA IL PREZZO!</button>
                </div>
            </div>
            <div id="co_page3_monete" class="co_hidden">
                <div class="co_row">
                    <h2 class="co_success">Complimenti!</h2>
                    <p class="co_paragraph"><?= get_plugin_options('co_messaggio_di_conferma') ?></p>
                    <h2 class="co_value"></h2>
                </div>
            </div>
            <div id="co_page4_monete" class="co_hidden">
                <div class="co_row">
                    <h2 class="co_error">Errore!</h2>
                    <p class="co_paragraph">Si è verificato un errore nell'invio del messaggio. Contatta l'amministratore.</p>
                </div>
            </div>
            <div class="co_hidden" id="co_spinner_monete">
                <img src="<?= PLUGIN_URL . '/spinner.gif'; ?>">
            </div>
        </form>
    </div>
</div>

<script>
    jQuery(document).ready(function($) {
        var pageone_monete = $('#co_page1_monete');
        var pagetwo_monete = $('#co_page2_monete');
        var pagethree_monete = $('#co_page3_monete');
        var pagefour_monete = $('#co_page4_monete');
        var head_monete = $('#co_head_monete');
        var calcolo_monete = $('#calcolo_monete');
        var calcolatore_monete = $('#calcolatore_monete');
        var caratura_monete = $('#co_caratura_monete');
        var grammi_monete = $('#co_grammi_monete');
        var executed_monete = false;
        var spinner_monete = $('#co_spinner_monete');
        var checkbox_monete = $('#co_checkbox_monete');
        var error_monete_1 = $('#co_error_monete_1');
        var error_monete_2 = $('#co_error_monete_2');
        var nome_monete = $('#co_nome_monete');
        var email_monete = $('#co_email_monete');

        //script per monete variabili
        var totalone = $('#totalone');
        var lista_monete = $('#lista_monete');
        var array_nome_monete = [
            'Sterlina (Regno Unito)',
            '20 Franchi francesi (Marengo)',
            '20 Lire italiane (Marengo)',
            '20 Franchi svizzeri (Marengo)',
            'Krugerrand Sud Africa',
            '4 Ducati austriaci',
            '50 Pesos messicani',
            '20 Marchi tedeschi',
            '20 dollari liberty',
            '10 dollari liberty',
            '5 dollari liberty',
            '20 dollari statua',
            '10 dollari indiani',
            '5 dollari indiani',
            '50 dollari (oncia)',
            '25 dollari (1/2 oncia)',
            '10 dollari (1/4 oncia)',
            '5 dollari (1/10 oncia)',
            '100 soles peruviani',
            '10 gulden olandesi',
            '50 dollari canadesi'
        ];
        var array_meta_monete = $('.input_monete');
        var array_numero_monete = [];
        var array_meta_monete_valore = $('.monete_valore');
        var array_monete_valore = [];
        var array_monete_totale = [];
        var totale_complessivo = 0;
        var serio;



        $("#next1_monete").click(function() {
            event.preventDefault();

            /*if (grammi_monete.val().length == 0) {
                error_monete_1.html('<p style="color:red;">ERRORE: per proseguire, compila i campi obbligatori!</p>')
            } else {
                head_monete.addClass("co_hidden");
                calcolatore_monete.removeClass("co_hidden");
                pageone_monete.addClass("co_hidden");
                pagetwo_monete.removeClass("co_hidden").fadeIn();
                console.log('ciao');
                calcolo_monete.html((((<?= (float)do_shortcode(get_plugin_options('co_shortcode_monete')); ?> / 1000) * caratura_monete.val()) * grammi_monete.val()).toFixed(2) + " €");
            }*/

            array_meta_monete.each(function(index) {
                array_numero_monete.push($(this).val());
            });

            array_meta_monete_valore.each(function(index) {
                array_monete_valore.push($(this).html());
            });

            $.each(array_numero_monete, function(index) {
                array_monete_totale.push((array_numero_monete[index] * array_monete_valore[index]).toFixed(2));
            });

            n = array_monete_totale.length;
            serio = '';
            while (n--) {
                totale_complessivo += parseFloat(array_monete_totale[n]);
                if (array_numero_monete[n] != 0) {
                    serio += array_numero_monete[n] + " x " + array_nome_monete[n] + "; ";
                }
            }

            //console.log(totale_complessivo.toFixed(2));
            //console.log(serio);
            pagetwo_monete.removeClass("co_hidden").fadeIn();
            pageone_monete.addClass("co_hidden");
            calcolatore_monete.removeClass("co_hidden");
            calcolo_monete.html(totale_complessivo.toFixed(2));
            totalone.val(totale_complessivo.toFixed(2));
            lista_monete = serio;
        });



        $("#co_form_monete").submit(function(event) {
            event.preventDefault();
            var form_monete = $(this);

            if (!checkbox_monete.is(':checked')) {
                error_monete_2.html('<p style="color:red;">ERRORE: per proseguire, accetta la liberatoria privacy!</p>');
            } else if (nome_monete.val().length == 0 || email_monete.val().length == 0 || (nome_monete.val().length == 0 && email_monete.val().length == 0)) {
                error_monete_2.html('<p style="color:red;">ERRORE: per proseguire, compila i campi obbligatori!</p>');
            } else {
                $.ajax({
                    type: "POST",
                    url: "<?= get_rest_url(null, 'v1/gsvmetal_monete/submit'); ?>",
                    data: form_monete.serialize(),
                    beforeSend: function() {
                        if (!executed_monete) {
                            pagetwo_monete.addClass('co_hidden');
                            spinner_monete.removeClass('co_hidden').fadeIn();
                            executed_monete = true;
                        }
                    },
                    success: function() {
                        spinner_monete.addClass("co_hidden");
                        pagethree_monete.removeClass("co_hidden").fadeIn();
                    },
                    error: function() {
                        spinner_monete.addClass("co_hidden");
                        pagefour_monete.removeClass("co_hidden").fadeIn();
                    }
                });
            }
        });
    });
</script>