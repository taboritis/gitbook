<?php

namespace Taboritis\Gitbook\Filters;

use Taboritis\Gitbook\Filters;

class HintsFilter extends Filters
{
    protected $hints = [ 'primary', 'info', 'warning', 'danger', 'success' ];

    public function apply()
    {
        $this->applyHints();

        $this->file = str_replace('{% endhint %}', '</div>', $this->file);

        return $this->file;
    }

    private function applyHints(): void
    {
        foreach ($this->hints as $item) {
            $search = "{% hint style=&quot;{$item}&quot; %}";
            $replace = '<div class="hint hint-' . $item . '">';
            $this->file = str_replace($search, $replace, $this->file);
        }
    }
}
