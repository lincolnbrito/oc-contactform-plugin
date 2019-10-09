<?php namespace LincolnBrito\ContactForm\Reportwidgets;

use Backend\Classes\ReportWidgetBase;

class Statistics extends ReportWidgetBase
{
    public function render()
    {
        return $this->makePartial('widget');
    }
}
