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
    }