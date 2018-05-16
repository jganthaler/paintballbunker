<?php if (!rex::isBackend()) : ?>
    <div id="contact-form-container"
         class="section-wrapper contact-form-container background-dark-gray padding-top padding-bottom">
        <?php

        $id = 'REX_SLICE_ID';
        $sid = "form-{$id}";

        $form = new rex_yform();

        $privacy_link = '<a href="' . rex_getUrl(\Project\Settings::PRIVACY_PAGE_ID) . '">###label.privacy_policy###</a>';
        $privacy_text = Sprog\Wildcard::get('label.accept_privacy') . ' ' . $privacy_link;

        // Options
        $form->addTemplatePath(\rex_path::addon('project', 'ytemplates'));
        $form->setObjectparams('form_action', rex_getUrl());
        $form->setObjectparams('main_id', $id);
        $form->setObjectparams('form_wrap_id', $sid);
        $form->setObjectparams('form_anchor', 'contact-form-container');
        $form->setObjectparams('form_name', $sid);
        $form->setObjectparams('submit_btn_show', false);
        $form->setObjectparams('real_field_names', true);
        $form->setObjectparams('form_ytemplate', 'foundation,bootstrap');
        $form->setObjectparams('form_class', 'contact-form');
        $form->setObjectparams('error_class', 'form-warning');

        // Row 1
        {
            $form->setValueField('html', ['opening_tag', '<div class="row">']);

            // NAME
            $form->setValueField('text', [
                'name' => 'name',
                'label' => '###label.name###',
                'placeholder' => '###label.name### *',
                'css_class' => 'medium-6 columns',
                'required' => 1,
            ]);
            $form->setValidateField('empty', ['name', strtr(\Sprog\Wildcard::get('text.field_empty'), ['{{fieldname}}' => '###label.name###'])]);

            // EMAIL
            $form->setValueField('text', [
                'name' => 'email',
                'label' => '###label.email###',
                'placeholder' => '###label.email### *',
                'css_class' => 'medium-6 columns',
                'required' => 1,
            ]);

            $form->setValidateField('empty', ['email', strtr(\Sprog\Wildcard::get('text.field_empty'), ['{{fieldname}}' => '###label.email###'])]);
            $form->setValidateField('email', ['email', \Sprog\Wildcard::get('text.email_not_valid')]);


            $form->setValueField('html', ['closing_tag', '</div>']);
        }



        // Row 3
        {
            $form->setValueField('html', ['opening_tag', '<div class="row">']);

            // SUBJECT
            $form->setValueField('text', [
                'name' => 'subject',
                'label' => '###label.subject###',
                'placeholder' => '###label.subject###',
                'css_class' => 'medium-6 columns',
            ]);

            $options = [];
            for ($i = 6; $i < 19; $i++) {
                $options[$i . ' Spieler'] = $i . ' ###label.players###';
            }

            // COUNTRY
            $form->setValueField('select', [
                'name' => 'players',
                'label' => '###label.players###',
                'placeholder' => '###label.players###',
                'options' => $options,
                'css_class' => 'medium-6 columns',
            ]);

            $form->setValueField('html', ['closing_tag', '</div>']);
        }

        // Row 4
        {
            $form->setValueField('html', ['opening_tag', '<div class="row column ">']);

            // MESSAGE
            $form->setValueField('textarea', [
                'name' => 'message',
                'label' => '###label.message###',
                'placeholder' => '###label.message###',
                'default' => rex_request('message', 'string'),
                'rows' => 5,
            ]);

            $form->setValueField('html', ['closing_tag', '</div>']);
        }

        // Terms & Conditions
        {
            $form->setValueField('html', ['opening_tag', '<div class="row submit-container">']);

            // Checkbox
            $form->setValueField('html', ['opening_tag', '<div class="large-8 columns">']);
            $form->setValueField('checkbox', [
                'name' => 'privacy',
                'label' => $privacy_text,
                'values' => 1,
                'default' => 0,
                'css_class' => 'margin-bottom margin-bottom-remove-for-large',
                'required' => 1,
            ]);
            $form->setValidateField('empty', ['privacy', strtr(\Sprog\Wildcard::get('text.privacy_not_set'), ['{{fieldname}}' => '###label.privacy_policy###'])]);
            $form->setValueField('html', ['closing_tag', '</div>']);

            // Submit
            $form->setValueField('html', ['opening_tag', '<div class="large-4 columns">']);
            $form->setValueField('submit', [
                'name' => 'submit',
                'labels' => '###label.submit###',
                'css_classes' => 'button primary expanded',
            ]);
            $form->setValueField('html', ['closing_tag', '</div>']);
            $form->setValueField('html', ['closing_tag', '</div>']);
        }

        echo $form->getForm();

        if (!count($form->getObjectparams('warning')) && $form->getObjectparams('send')) {

            $debug = 0;

            $value_pool = $form->getObjectparams('value_pool');
            $value_pool_email = $value_pool['email'];

            if ($tpl = \rex_yform_email_template::getTemplate('contact')) {

                if ($debug) {
                    echo '<hr /><pre>'; var_dump($tpl); echo '</pre><hr />';
                }

                $tpl = rex_yform_email_template::replaceVars($tpl, $value_pool_email);
                $tpl['mail_to'] = \Project\Settings::getValue('contact_email');
                $tpl['mail_to_name'] = $value_pool_email['name'];

                if (!\rex_yform_email_template::sendMail($tpl)) {
                    echo '<div class="row column"><div class="callout error">' . Sprog\Wildcard::get('text.submit_error') . '</div></div>';
                    return false;
                } else {
                    echo '<div class="row column"><div class="callout success">' . Sprog\Wildcard::get('text.submit_success') . '</div></div>';
                    return true;
                }

            } else {
                if ($debug) {
                    echo '<p>YForm E-Mail-Template wurde nicht gefunden.</p>';
                }
            }

        }
        ?>
    </div>
<?php else: ?>
    [Kontaktformular]
<?php endif; ?>