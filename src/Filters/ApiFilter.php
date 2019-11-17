<?php

namespace Taboritis\Gitbook\Filters;

use Illuminate\Support\Str;
use Taboritis\Gitbook\Filters;

class ApiFilter extends Filters
{
    protected $modules = [
        'api-method-summary',
        'api-method-description',
        'api-method-spec',
        'api-method-request',
        'api-method-path-parameters',
        'api-method-query-parameters',
        'api-method-headers',
        'api-method-response',
        'api-method-response-example-description',
    ];

    protected $modulesWithParameters = [
        'api-method-response-example',
        'api-method-parameter',
        'api-method',
    ];

    public function apply()
    {
        $this->replace('&quot;', '"');

        $this->convertModulesToVueComponents();

        $this->convertModulesWithParametersToVueComponents();

        $this->replaceApiMethod();
        $this->replace(' %}', '>');
        
            $this->replace('<p>','');
            $this->replace('</p>','');

        return $this->file;
    }

    private function module($string)
    {
        $endingString = 'end' . $string;
        $this->replace("{% {$string} %}", "<{$string}>");
        $this->replace("{% {$endingString} %}", "</{$string}>");
    }

    private function convertModulesToVueComponents()
    {
        foreach ($this->modules as $module) {
            $this->module($module);
        }
    }

    private function convertModulesWithParametersToVueComponents()
    {
        foreach ($this->modulesWithParameters as $module) {
            $endingString = 'end' . $module;
            $this->replace("{% {$module}", "<{$module}");
            $this->replace("{% {$endingString} %}", "</{$module}>");
        }
    }

    private function replaceApiMethod()
    {
        $string = $this->getLineWithString();
        if ($string) {
            $arr = explode('<a ', $string);
            $result = $arr[0];
            $arr2 = explode('>', $arr[1]);
            $result .= str_replace('</a', '', $arr2[1]) . $arr2[2];
        }
        $this->replace($string, $result);
    }

    private function getLineWithString()
    {
        $lines = explode("\n", $this->file);
        foreach ($lines as $line) {
            if (Str::contains($line, 'api-method ')) return $line;
        }
        return null;
    }
}