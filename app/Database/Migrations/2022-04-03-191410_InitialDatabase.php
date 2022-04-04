<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InitialDatabase extends Migration
{
	public function up()
	{
		$fields = [
			'users'		=>	[
				'id'			=> [
					'type' 				=> 'INT',
					'constraint' 		=> 11,
					'unsigned'			=> true,
					'auto_increment'	=> true
				],
				'firstName'		=> [
					'type' 				=> 'VARCHAR',
					'constraint' 		=> 255
				],
				'lastName'		=> [
					'type' 				=> 'VARCHAR',
					'constraint' 		=> 255
				],
				'email'			=> [
					'type' 				=> 'VARCHAR',
					'constraint' 		=> 255,
					'unique'			=> true
				],
				'password'		=> [
					'type' 				=> 'VARCHAR',
					'constraint' 		=> 255
				],
				'group'			=> [
					'type' 				=> 'INT',
					'constraint' 		=> 3,
					'default'			=> 3,
					'unsigned'			=> true
				],
				'isActive'		=> [
					'type' 				=> 'INT',
					'constraint' 		=> 1,
					'unsigned'			=> true
				],
				'lastLogin'		=> [
					'type' 				=> 'DATETIME',
					'null'				=> true,
				],
				'created_at' 	=> [
					'type'				=> 'DATETIME',
					'null'				=> true,
				],
				'updated_at' 	=> [
					'type'				=> 'DATETIME',
					'null'				=> true,
				],
				'deleted_at' 	=> [
					'type'				=> 'DATETIME',
					'null'				=> true,
				],
			],
			'news' 		=> [
				'id'			=> [
					'type' 				=> 'INT',
					'constraint' 		=> 11,
					'unsigned'			=> true,
					'auto_increment'	=> true
				],
				'title'			=> [
					'type' 				=> 'VARCHAR',
					'constraint' 		=> 255
				],
				'slug'			=> [
					'type' 				=> 'VARCHAR',
					'constraint' 		=> 255,
					'unique'			=> true
				],
				'content'		=> [
					'type' 				=> 'LONGTEXT'
				],
				'delta'			=> [
					'type' 				=> 'LONGTEXT'
				],
				'authorId'		=> [
					'type' 				=> 'INT',
					'constraint' 		=> 11,
					'unsigned'			=> true
				],
				'created_at' 	=> [
					'type'				=> 'DATETIME',
					'null'				=> true,
				],
				'updated_at' 	=> [
					'type'				=> 'DATETIME',
					'null'				=> true,
				],
				'deleted_at' 	=> [
					'type'				=> 'DATETIME',
					'null'				=> true,
				],
			],
			'gallery' 		=> [
				'id'			=> [
					'type' 				=> 'INT',
					'constraint' 		=> 11,
					'unsigned'			=> true,
					'auto_increment'	=> true
				],
				'title'			=> [
					'type' 				=> 'VARCHAR',
					'constraint' 		=> 255
				],
				'category'		=> [
					'type' 				=> 'VARCHAR',
					'constraint' 		=> 255
				],
				'description'	=> [
					'type' 				=> 'LONGTEXT',
					'null'				=> true
				],
				'client'		=> [
					'type' 				=> 'VARCHAR',
					'constraint'		=>	255,
					'null'				=> true
				],
				'date'			=> [
					'type' 				=> 'DATE'
				],
				'pictures'		=> [
					'type' 				=> 'LONGTEXT'
				],
				'authorId'		=> [
					'type' 				=> 'INT',
					'constraint' 		=> 11,
					'default'			=> 1,
					'unsigned'			=> true
				],
				'show'			=> [
					'type' 				=> 'INT',
					'constraint' 		=> 1,
					'default'			=> 1,
					'unsigned'			=> true
				],
				'created_at' 	=> [
					'type'				=> 'DATETIME',
					'null'				=> true,
				],
				'updated_at' 	=> [
					'type'				=> 'DATETIME',
					'null'				=> true,
				],
				'deleted_at' 	=> [
					'type'				=> 'DATETIME',
					'null'				=> true,
				],
			],
			'settings' 		=> [
				'id'			=> [
					'type' 				=> 'INT',
					'constraint' 		=> 11,
					'unsigned'			=> true,
					'auto_increment'	=> true
				],
				'field'			=> [
					'type' 				=> 'VARCHAR',
					'constraint' 		=> 255
				],
				'value'			=> [
					'type' 				=> 'LONGTEXT',
					'null'				=> true
				],
				'restricted'	=> [
					'type' 				=> 'INT',
					'constraints'		=> 1,
					'unsigned'			=> true
				],
			],
		];

		foreach ($fields as $key => $value) {
			$this->forge->addField($value);
			$this->forge->addPrimaryKey('id', true);
			$this->forge->createTable($key);
		}
	}

	public function down()
	{
		//
	}
}