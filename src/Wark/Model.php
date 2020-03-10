<?php
namespace Wark\Wark;

class Model
{

	public $db = null;
    /**
     * Constructs a new instance.
     */
    public function __construct($db)
    {
        $this->db = $db;
    }
}
