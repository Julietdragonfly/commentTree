<?php
class view
{
    public $template_view; // здесь можно указать общий вид по умолчанию.

    function generate($content_view, $template_view = null, $data = null)
    {
        

        if ($template_view)
            include 'application/views/'.$template_view;
        else
            include 'application/views/'.$content_view;
       
    }
}