<?php
namespace Wark\App\Models;

use Wark\Wark\Model;

class Example extends Model
{
    public function createTable()
    {
    	$this->db->query('CREATE TABLE IF NOT EXISTS contacts (
    		contact_id INTEGER PRIMARY KEY,
    		first_name TEXT NOT NULL,
    		last_name TEXT NOT NULL,
    		email TEXT NOT NULL UNIQUE,
    		phone TEXT NOT NULL UNIQUE
		);');
    }

    public function getTable()
    {
    	return $this->db->fetchAll('SELECT sql FROM sqlite_master WHERE name=\'contacts\';');
    }
}
