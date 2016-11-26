<?php
/*
Plugin Name: Mafu's WP Calendar Widget
Description: A calendar that shows the frequency of posts
Author: Matthew Dawkins
Version: 0.1
*/

class MDWP_Calendar extends WP_Widget {
  public function __construct() {
    parent::__construct('mdwp_calendar', 'Mafu\'s Calendar Widget', ['description' => 'Calendar widget that shows frequency of posts']);
  }

  public function widget($args, $instance) {
    global $wpdb;
    $title = apply_filters( 'widget_title', $instance['title'] );
    echo $args['before_widget'];
    if (!empty($title)) {
      echo $args['before_title'] . $title . $args['after_title'];
    }
    // Create empty Array
    $data = [];
    $numDates = 7*4;
    $startDate = strtotime(-$numDates . ' day');
    $endDate = strtotime('today');
    $startDateDate = date('Y-m-d', $startDate);
    for ($date = $startDate; $date < $endDate; $date += DAY_IN_SECONDS) {
        $data[date('Y-m-d', $date)] = 0;
    }
    // Get counts per day
    $result = $wpdb->get_results("SELECT date(post_date) as post_day, count(ID) as post_count from {$wpdb->posts} WHERE post_status = 'publish' and post_date > ''{$startDateDate}' GROUP BY post_day", OBJECT_K);
    foreach ($result as $row) {
        $data[$row->post_day] = $row->post_count;
    }
    // Show it
    include('widget.tpl.php');
    echo $args['after_widget'];
  }

  // Widget Backend
  public function form( $instance ) {
      $title = isset($instance['title']) ? $instance['title'] : 'New title';
      $mode = isset($instance['mode']) ? $instance['mode'] : 'month';
    // Widget admin form
    include('settings.tpl.php');
  }

  // Updating widget replacing old instances with new
  public function update( $new_instance, $old_instance ) {
    return [
        'title' => !empty($new_instance['title']) ? strip_tags($new_instance['title']) : '',
        'mode' => !empty($new_instance['mode']) ? strip_tags($new_instance['mode']) : ''
    ];
  }
} // Class wpb_widget ends here

// Register and load the widget
add_action( 'widgets_init', function() {
    register_widget( 'MDWP_Calendar' );
});
