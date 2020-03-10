<?php
namespace Wark\Wark;

class Model
{

	private $db = null;
    /**
     * Constructs a new instance.
     */
    public function __construct($db)
    {
        $this->db = $db;
    }
}
