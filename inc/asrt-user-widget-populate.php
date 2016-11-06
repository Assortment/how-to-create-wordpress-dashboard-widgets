<?php

/**
 * Create a user status table for use in widget
 */
function asrt_user_status_dashboard_widget() {

    // Get all users based on roles accepted
    $users = new WP_User_Query([
        'role__in' => ['administrator', 'editor', 'author'],
        'order'    => 'ASC',
        'orderby'  => 'name'
    ]);

    // If we have found any users
    if($users) {
        echo '<table class="user-status-table">';

            echo '<thead>';
                echo '<th>Name</th>';
                echo '<th>Email</th>';
                echo '<th>Status</th>';
            echo '</thead>';

            echo '<tbody>';

                // Loop through the users
                foreach($users->get_results() as $user) {
                    $last_login = get_user_meta($user->ID, 'asrt_last_online', true);
                    $elapsed_time = time() - $last_login;
                    $online_status = $elapsed_time <= 300 ? 'Online' : 'Offline';

                    echo '<tr>';
                        echo '<td>' . $user->display_name . '</td>';
                        echo '<td>' . $user->user_email . '</td>';
                        echo '<td class="'. $online_status .'">' . $online_status . '</td>';
                    echo '</tr>';
                }

            echo '</tbody>';

        echo '</table>';
    } else {
        // If no users, send error message
        echo 'It seems no users can be found, please contact your site administrator.';
    }

}
