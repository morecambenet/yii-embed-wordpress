<?php
/**
 * Plugin Name: Yii Embed
 * Plugin URI: https://github.com/cornernote/yii-embed-wordpress/
 * Description: Yii embedded into WordPress.
 * Version: 1.1.0
 * Author: Mr PHP
 * Author URI: http://mrphp.com.au
 * License: BSD-3-Clause
 */

/**
 * Copyright (c) 2014, Mr PHP <info@mrphp.com.au>
 * All rights reserved.
 *  _____     _____ _____ _____
 * |     |___|  _  |  |  |  _  |
 * | | | |  _|   __|     |   __|
 * |_|_|_|_| |__|  |__|__|__|
 *
 *
 * Redistribution and use in source and binary forms, with or without modification,
 * are permitted provided that the following conditions are met:
 *
 * * Redistributions of source code must retain the above copyright notice, this
 *   list of conditions and the following disclaimer.
 *
 * * Redistributions in binary form must reproduce the above copyright notice, this
 *   list of conditions and the following disclaimer in the documentation and/or
 *   other materials provided with the distribution.
 *
 * * Neither the name of the organization nor the names of its
 *   contributors may be used to endorse or promote products derived from
 *   this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR
 * ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON
 * ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */

// do not allow direct entry here
if (!function_exists('wp')) {
    echo 'Yii Embed cannot be called directly.';
    exit;
}

// define constants
define('YII_EMBED_VERSION', '1.1.0');
define('YII_EMBED_URL', plugin_dir_url(__FILE__));
define('YII_EMBED_PATH', __DIR__ . '/');

// load YiiEmbed and Yii
require_once(YII_EMBED_PATH . 'wordpress/YiiEmbed.php');
define('YII_EMBED_YII_VERSION', YiiEmbed::yiiVersion());

// add default options
add_option('yii_embed', array(
    'yii_path' => '',
));

// load language
load_plugin_textdomain('yii-embed', false, basename(YII_EMBED_PATH) . '/languages');

// setup admin pages
if (is_admin()) {
    require_once(YII_EMBED_PATH . 'wordpress/YiiEmbedAdmin.php');
    YiiEmbedAdmin::init();
}