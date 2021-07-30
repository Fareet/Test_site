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
    protected $method;
    public function __construct($class = '', $action = '', $enctype = '', $method = '')
    {
        $this->class = $class;
        $this->action = $action;
        $this->enctype = $enctype;
        $this->method = $method;
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

class H1Element extends RenderableGroup
{
    public function render(): string
    {
        return "<h1 class='$this->class'>" . $this->text . "</h1>";
    }
}
class H2Element extends RenderableGroup
{
    public function render(): string
    {
        return "<h2 class='$this->class'>" . $this->text . "</h2>";
    }
}
class H3Element extends RenderableGroup
{
    public function render(): string
    {
        return "<h3 class='$this->class'>" . $this->text . "</h3>";
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
    protected $class;
    protected $id;
    protected $name;
    protected $value;
    public function __construct($class = '', $id = '', $name = '', $value = '')
    {
        $this->class = $class;
        $this->id = $id;
        $this->name = $name;
        $this->value = $value;
    }


    public function render(): string
    {
        return "<input class='$this->class' type='$this->type' name='$this->name' id='$this->id' value='$this->value'  />" . $this->text;
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

class CheckBoxElement extends InputElement
{
    protected $type = 'checkbox';
    protected $class;
    protected $id;
    protected $name;
    protected $disabled;
    protected $checked;
    protected $text;
    public function __construct($class = '', $id = '', $name = '', $disabled = false, $checked = '', $text = '')
    {
        $this->class = $class;
        $this->id = $id;
        $this->name = $name;
        $this->disabled = $disabled;
        $this->checked = $checked;
        $this->text = $text;
    }

    public function render(): string
    {
        return "$this->text <input class='$this->class' type='$this->type' name='$this->name' id='$this->id' disabled='$this->disabled'  $this->checked /><br> ";
    }
}
class PasswordInputElement extends InputElement
{
    protected $type = 'password';
}
class TableElement extends RenderableGroup
{
    protected $cellspacing;
    protected $cellpadding;
    public function __construct($class = '', $cellspacing = '0', $cellpadding = '0')
    {
        $this->class = $class;
        $this->cellspacing = $cellspacing;
        $this->cellpadding = $cellpadding;
    }
    public function render(): string
    {
        return "<table class = '$this->class 'cellspacing = '$this->cellspacing 'cellpadding = '$this->cellpadding>" . parent::render() . "</table>";
    }
}
class TRElement extends RenderableGroup
{
    public function render(): string
    {
        return "<tr class = '$this->class'>" . parent::render() . "</tr>";
    }
}
class TDElement extends RenderableGroup
{
    public function render(): string
    {
        return "<td class = '$this->class'>" . parent::render() . "</td>";
    }
}
class ULElement extends RenderableGroup
{
    public function render(): string
    {
        return "<ul class = '$this->class'>" . parent::render() . "</ul>";
    }
}
class LIElement extends RenderableGroup
{
    public function render(): string
    {
        return "<li class = '$this->class'>" . parent::render() . "</li>";
    }
}
