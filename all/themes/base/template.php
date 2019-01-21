<?php

/**
 * @see template_preprocess_html()
 */
function base_preprocess_html(array &$variables) {
  // Сделать название сайта заголовком главной страницы.
  if (drupal_is_front_page()) {
    if (isset($variables['head_title_array']['title'])) {
      unset($variables['head_title_array']['title']);
    }
    $variables['head_title'] = implode(' | ', $variables['head_title_array']);
  }

  // Добавить фавикон для пользователей продукции Apple.
  foreach (drupal_add_html_head() as $key => $element) {
    if ($element['#type'] == 'html_tag' && $element['#tag'] == 'link') {
      if ($element['#attributes']['rel'] == 'shortcut icon') {
        if ($element['#attributes']['type'] == 'image/vnd.microsoft.icon') {
          $element['#attributes']['type'] = 'image/x-icon';
        }

        $element['#attributes']['rel'] = 'icon';
        drupal_add_html_head($element, $key);

        $element['#attributes']['rel'] = 'apple-touch-icon';
        drupal_add_html_head($element, str_replace(':shortcut icon:', ':apple-icon-touch:', $key));
        break;
      }
    }
  }
}

/**
 * Убрать с главной страницы заголовок и вкладки управления материалом.
 *
 * @see template_preprocess_page()
 */
function base_preprocess_page(array &$variables) {
  if (drupal_is_front_page()) {
    if (!theme_get_setting('show_front_page_title')) {
      $variables['title'] = '';
    }
    if (!theme_get_setting('show_front_page_tabs')) {
      $variables['tabs'] = [];
    }
  }
}

/**
 * @see template_preprocess_maintenance_page()
 */
function base_preprocess_maintenance_page(array &$variables) {
  //
}

/**
 * @see template_preprocess_region()
 */
function base_preprocess_region(array &$variables) {
  if ($variables['region'] == 'hidden') {
    $variables['classes_array'][] = 'hidden';
  }
}

/**
 * @see template_preprocess_block()
 */
function base_preprocess_block(array &$variables) {
  $variables['classes_array'][] = drupal_html_class('block-'. $variables['block']->module . '-' . $variables['block']->delta);
  $variables['title_attributes_array']['class'][] = 'block-title';
  $variables['content_attributes_array']['class'][] = 'block-content';
}

/**
 * @see template_preprocess_menu_tree()
 */
function base_preprocess_menu_tree(array &$variables) {
  //
}

/**
 * @see template_preprocess_forums()
 */
function base_preprocess_forums(array &$variables) {
  //
}

/**
 * @see template_preprocess_user_profile()
 */
function base_preprocess_user_profile(array &$variables) {
  $variables['classes_array'][] = drupal_html_class('user-' . $variables['user']->uid);
}

/**
 * @see template_preprocess_node()
 */
function base_preprocess_node(array &$variables) {
  $variables['classes_array'][] = drupal_html_class('node-' . $variables['node']->nid);
}

/**
 * @see template_preprocess_taxonomy_term()
 */
function base_preprocess_taxonomy_term(array &$variables) {
  $variables['classes_array'][] = drupal_html_class('taxonomy-term-' . $variables['term']->tid);
}

/**
 * @see template_preprocess_field()
 */
function base_preprocess_field(array &$variables) {
  //
}

/**
 * @see template_preprocess_search_results()
 */
function base_preprocess_search_results(array &$variables) {
  //
}

/**
 * @see template_preprocess_search_result()
 */
function base_preprocess_search_result(array &$variables) {
  //
}

/**
 * @see template_preprocess_comment_wrapper()
 */
function base_preprocess_comment_wrapper(array &$variables) {
  //
}

/**
 * @see template_preprocess_comment()
 */
function base_preprocess_comment(array &$variables) {
  //
}

/**
 * Убрать из «хлебных крошек» главную и текущую страницы.
 *
 * @see theme_breadcrumb()
 */
function base_breadcrumb(array &$variables) {
  $bc = &$variables['breadcrumb'];
  if (!drupal_is_front_page()) {
    if (!theme_get_setting('front_page_in_breadcrumbs')) {
      array_shift($bc);
    }
    if (theme_get_setting('current_page_in_breadcrumbs')) {
      $bc[] = drupal_get_title();
    }
  }
  return theme_breadcrumb($variables);
}
