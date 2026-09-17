<?php

namespace App;

/** Register Customization Categories for Theme in Elementor */
add_action('elementor/elements/categories_registered', function ($elements_manager){
    $elements_manager->add_category(
        'bracelet-elements',
        [
            'title' => __('Bracelet Elements', 'sage'),
            'icon'  => 'fa fa-plug',
        ]
    );
});

/**Scan and register all widgets */
add_action('elementor/widgets/register', function ($widgets_manager){
    $widgets_dir = __Dir__ . '/Widgets';
    if(!is_dir($widgets_dir)){
        return;
    }

    foreach(glob($widgets_dir . '/*.php') as $file){
        require_once $file;
        $class_name = 'App\\Widgets\\' .basename($file, '.php');
        if(class_exists($class_name)){
            $widgets_manager->register(new $class_name());
        }
    }
});