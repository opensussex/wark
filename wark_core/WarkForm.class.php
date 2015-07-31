<?php 
    use Nette\Forms\Form;

    class WarkForm
    {
        private  $form = null;

        function __construct()
        {
            $this->form = new Form();
        }

        public function __get($property)
        {
          if (property_exists($this, $property)) {
            return $this->$property;
          }
        }

        public function removeTable()
        {
            $renderer = $this->form->getRenderer();
            $renderer->wrappers['form']['container'] = null;
            $renderer->wrappers['pair']['container'] = 'div';
            $renderer->wrappers['pair']['.error'] = 'error';
            $renderer->wrappers['control']['container'] = 'div';
            $renderer->wrappers['label']['container'] = 'div';
            $renderer->wrappers['control']['description'] = 'span';
            $renderer->wrappers['control']['errorcontainer'] = 'span';
        }
    }
