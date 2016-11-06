<?php

add_action('admin_enqueue_scripts', 'asrt_enqueue_user_status_widget_styles');

function asrt_enqueue_user_status_widget_styles() {
    wp_enqueue_style( 'asrt-user-status-widget', get_template_directory_uri() . '/inc/asrt-user-status-widget.css');
}
