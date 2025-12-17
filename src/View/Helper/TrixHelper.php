<?php
declare(strict_types=1);

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Ckedtiro helper
 */
class TrixHelper extends Helper
{
    protected array $helpers = ['Html', 'Form'];

    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected array $_defaultConfig = [];

    public function input($input, $options = [], $TrixOptions = [], $trixUrl = null)
    {
        $lines = [];

        if (!$trixUrl) {
            $lines[] = $this->Html->script('//cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js');
            $lines[] = $this->Html->css('//cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css');
        }



        $defaultOptions = ['type' => 'hidden', 'required' => false, 'dir' => 'rtl', 'class' => 'trix-ar'];

        $options = array_merge($defaultOptions, $options);

        $lines[] = $this->Form->error($input);
        $lines[] = $this->Form->control($input, $options);
        $lines[] = '<trix-editor input="'.$input.'"></trix-editor>';
        $lines[] = $this->generateScript($input, $TrixOptions);

        return implode(PHP_EOL, $lines);
    }

    protected function generateScript($input, $options = [], $plugins = [])
    {
        $script = '<script type="text/javascript">';

        $script .= "
        // Create an elFinder button
        const button = document.createElement('button');
        button.type = 'button';
        button.textContent = '📁';
        button.className = 'trix-button';
        var trixEditor = document.querySelector('trix-editor')
        trixEditor.toolbarElement.querySelector('.trix-button-group.trix-button-group--text-tools').appendChild(button);
        // Define the file manager popup function
        window.insertFile = function(url) {
            const html = `<img src='`+url+`' />`;
            trixEditor.editor.insertHTML(html);
        };

        button.addEventListener('click', function() {
            window.open('/elfinder', 'File Manager', 'width=600,height=400');
        });
        const htmlToggle = document.getElementById('htmlToggle');

        htmlToggle.addEventListener('click', function() {
            if (trixEditor.getAttribute('input') === 'html') {
                trixEditor.setAttribute('input', '".$input."');
                htmlToggle.textContent = 'HTML Mode';
            } else {
                trixEditor.setAttribute('input', 'html');
                htmlToggle.textContent = 'Rich Text Mode';
            }
        });
    ";

        $script .= '</script>';

        return $script;
    }
}
