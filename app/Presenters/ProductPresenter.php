<?php

namespace SIT\Presenters;


use Laracasts\Presenter\Presenter;

class ProductPresenter extends Presenter {

    public function description()
    {
        $thickness = (isset($this->entity->thickness) && $this->entity->thickness > 0) ? " x {$this->entity->metal_type->name}mm" : '';
        return "{$this->entity->metal_type->name} {$this->entity->cut_type->name} {$this->entity->grade} ({$this->entity->width}mm x {$this->entity->height}mm x {$this->entity->length}mm{$thickness})";
    }

}