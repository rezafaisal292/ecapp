<?php

namespace App\Providers;

use Collective\Html\FormFacade;
// use Collective\Html\HtmlFacade;

class HtmlServiceProvider extends \Collective\Html\HtmlServiceProvider
{
    
    public function boot()
    {
        FormFacade::component('fgText', 'master-component.text', ['label', 'name', 'value', 'attributes' => [], 'help' => null, 'type' => 'text', 'layout' => false]);       
        FormFacade::component('fgTextarea', 'master-component.text', ['label', 'name', 'value', 'attributes' => [], 'help' => null, 'type' => 'textarea', 'layout' => false]);
        // FormFacade::component('fgPassword', 'components.form.password', ['label', 'name', 'attributes' => [], 'help' => null, 'layout' => false]);
        // FormFacade::component('fgSelect', 'components.form.select', ['label', 'name', 'options', 'value', 'attributes' => [], 'help' => null, 'layout' => false]);
        // FormFacade::component('fgOption', 'components.form.option', ['label', 'name', 'options', 'value', 'help' => null, 'type' => 'radio', 'layout' => false]);
        // FormFacade::component('fgFormButton', 'components.form.button', ['uri', 'action' => null, 'parameter' => null]);
        // FormFacade::component('fgFilterButton', 'components.form.filter', []);

    }

   
}
