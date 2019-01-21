<?php

/**
 * @see hook_form_FORM_ID_alter()
 */
function base_form_system_theme_settings_alter(&$form, $form_state) {
  $form['custom'] = [
    '#type' => 'fieldset',
    '#title' => 'Прочие настройки',
    '#tree' => FALSE,
  ];
  $form['custom']['show_front_page_title'] = [
    '#type' => 'checkbox',
    '#title' => 'Показывать название главной страницы',
    '#default_value' => theme_get_setting('show_front_page_title'),
  ];
  $form['custom']['show_front_page_tabs'] = [
    '#type' => 'checkbox',
    '#title' => 'Показывать вкладки главной страницы',
    '#default_value' => theme_get_setting('show_front_page_tabs'),
  ];
  $form['custom']['front_page_in_breadcrumbs'] = [
    '#type' => 'checkbox',
    '#title' => 'Показывать главную страницы в «хлебных крошках»',
    '#default_value' => theme_get_setting('front_page_in_breadcrumbs'),
  ];
  $form['custom']['current_page_in_breadcrumbs'] = [
    '#type' => 'checkbox',
    '#title' => 'Показывать заголовок текущей страницы в «хлебных крошках»',
    '#default_value' => theme_get_setting('current_page_in_breadcrumbs'),
  ];
}
