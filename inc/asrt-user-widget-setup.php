<?php


add_action('init', 'asrt_set_user_last_online');

/**
 * Set user's last logged in datetime to database
 */
function asrt_set_user_last_online() {
    $date = date('U');
    $user = wp_get_current_user();

    update_user_meta($user->ID, 'asrt_last_online', $date);
}




add_action('wp_dashboard_setup', 'asrt_add_user_status_dashboard_widget' );

/**
 * Create a new widget on the WP dashboard
 */
function asrt_add_user_status_dashboard_widget() {
    wp_add_dashboard_widget('asrt-user-status-dashboard-widget', 'User status', 'asrt_user_status_dashboard_widget');
}
