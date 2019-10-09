<?php namespace LincolnBrito\ContactForm;

use Backend;
use System\Classes\PluginBase;

/**
 * ContactForm Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'ContactForm',
            'description' => 'A simple contact form plugin',
            'author'      => 'Lincoln Brito',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'LincolnBrito\ContactForm\Components\ContactForm' => 'contactForm',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'lincolnbrito.contactform.widgets.statistics' => [
                'label' => 'Manage widgets',
                'tab' => 'Contact Form',
                'order' => 200,
            ],    
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'contactform' => [
                'label'       => 'ContactForm',
                'url'         => Backend::url('lincolnbrito/contactform/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['lincolnbrito.contactform.*'],
                'order'       => 500,
            ],
        ];
    }

    public function registerMailTemplates()
    {
        return [
            'lincolnbrito.contactform::mail.contact',            
        ];
    }

    public function registerReportWidgets()
    {
        return [
            'LincolnBrito\ContactForm\ReportWidgets\Statistics' => [
                'label'   => 'Contact Form statistics',
                'context' => 'dashboard',                
            ]
        ];
    }
}
