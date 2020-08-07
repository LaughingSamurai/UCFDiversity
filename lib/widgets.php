<?php

function roots_widgets_init() {
  // Register widgetized areas
  register_sidebar(array(
    'name'          => __('Primary Sidebar', 'roots'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => __('Header Brand Text', 'roots'),
    'id'            => 'header-brand-text',
    'before_widget' => '<div class="widget-inner">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => __('Footer Address', 'roots'),
    'id'            => 'footer-address',
    'before_widget' => '<div class="footer-address widget-inner">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => __('Footer Mailing Address', 'roots'),
    'id'            => 'footer-mailing-address',
    'before_widget' => '<div class="footer-mailing-address widget-inner">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => __('Footer Contact Number', 'roots'),
    'id'            => 'footer-contact-numbers',
    'before_widget' => '<div class="footer-contact-numbers widget-inner">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => __('Contact Modal', 'roots'),
    'id'            => 'contact-modal',
    'before_widget' => '<div class="contact-modal widget-inner">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));

}
add_action('widgets_init', 'roots_widgets_init');


