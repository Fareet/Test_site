<?php

interface Renderable
{
    public function render(): string;
}

class RenderableGroup implements Renderable
{
    protected $text;
    protected $class;
    protected $elements = [];

    public function __construct($class = '', $text = '')
    {
        $this->class = $class;
        $this->text = $text;
    }

    public function addElement(Renderable $element)
    {
        $this->elements[] = $element;
        return $this;
    }

    public function render(): string
    {
        $result = '';
        foreach ($this->elements as $element) {
            $result .= $element->render();
        }
        return $result;
    }
}

class FormElement extends RenderableGroup
{
    protected $action;
    protected $enctype;
    public function __construct($class = '', $action = '', $enctype = '')
    {
        $this->class = $class;
        $this->action = $action;
        $this->enctype = $enctype;
    }
    public function render(): string
    {
        return "<form class = '$this->class' action = '$this->action' enctype=' $this->enctype'>" . parent::render() . "</form>";
    }
}

class DivElement extends RenderableGroup
{
    public function __construct($class = '')
    {
        $this->class = $class;
    }
    public function render(): string
    {
        return "<div class = '$this->class'>" . parent::render() . "</div>";
    }
}

class PElement extends RenderableGroup
{
    public function render(): string
    {
        return "<p class = '$this->class'>" . $this->text . "</p>";
    }
}

class H2Element extends RenderableGroup
{
    public function render(): string
    {
        return "<h2 class='$this->class'>" . $this->text . "</h2>";
    }
}
class LabelElement extends RenderableGroup
{
    public function __construct($class = '', $text = '', $for = '')
    {
        $this->class = $class;
        $this->text = $text;
        $this->for = $for;
    }
    public function render(): string
    {
        return "<label class='$this->class' for = '$this->for'> $this->text </label>";
    }
}

class ImageElement extends RenderableGroup
{
    public function __construct($class = '', $src = '', $alt = '')
    {
        $this->class = $class;
        $this->src = $src;
        $this->alt = $alt;
    }
    public function render(): string
    {
        return "<img class='$this->class' src='$this->src' alt='$this->alt'>";
    }
}

class AElement extends RenderableGroup
{
    public function __construct($class = '', $href = '', $text = '')
    {
        $this->class = $class;
        $this->href = $href;
        $this->text = $text;
    }
    public function render(): string
    {
        return "<a class='$this->class' href='$this->href'> $this->text </a>";
    }
}

class InputElement extends RenderableGroup
{
    protected $type = 'text';

    public function render(): string
    {
        return "<input class='$this->class' type='$this->type' />" . $this->text;
    }
}

class RadioInputElement extends InputElement
{
    protected $type = 'radio';
}

class FormButtonElement extends InputElement
{
    protected $type = 'submit';
}
