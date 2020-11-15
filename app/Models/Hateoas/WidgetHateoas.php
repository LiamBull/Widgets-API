<?php

namespace App\Models\Hateoas;

use App\Models\Widget;
use GDebrauwer\Hateoas\Traits\CreatesLinks;

class WidgetHateoas
{
    use CreatesLinks;

    public function self(Widget $widget)
    {
        return $this->link('widget.get', ['widget' => $widget]);
    }

    public function update(Widget $widget)
    {
        return $this->link('widget.update', ['widget' => $widget]);
    }

    public function delete(Widget $widget)
    {
        return $this->link('widget.delete', ['widget' => $widget]);
    }
}
