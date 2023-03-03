<?php

/**
 * Plugin Name: Media MD5
 * Description: This plugin show md5 of your media file.
 * Plugin URI:  https://wpgraby.com/plugins/media-md5
 * Version:     1.0.0
 * Author:      Duc Nguyen [0936 770 119]
 * Author URI:  https://wpgraby.com
 * Text Domain: wpgraby
 */

add_filter('attachment_fields_to_edit', function ($form_fields, $post) {
  $file = get_attached_file($post->ID); //Full path of file

  $form_fields["get-media-md5"] = array(
    "label" => esc_html__("File MD5", "wpgraby"),
    "input" => "html",
    "html" => sprintf('<h5 style="margin: 1em 0;"><code>%s</code></h5>', md5_file($file)),
    "helps" => sprintf(__('Learn more: %s', 'wpgraby'), sprintf('<a href="%1$s" target="_blank" rel="nofollow">%1$s</a>', 'https://en.wikipedia.org/wiki/Md5sum'))
  );

  return $form_fields;
}, 10, 2);
