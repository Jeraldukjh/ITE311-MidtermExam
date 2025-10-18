<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddContentColumnToAnnouncements extends Migration
{
    public function up()
    {
        $this->forge->addColumn('announcements', [
            'content' => [
                'type' => 'TEXT',
                'after' => 'title'
            ]
        ]);

        // Copy data from body to content if body column exists
        $this->db->query('UPDATE announcements SET content = body WHERE body IS NOT NULL');

        // Drop the body column
        $this->forge->dropColumn('announcements', 'body');
    }

    public function down()
    {
        $this->forge->addColumn('announcements', [
            'body' => [
                'type' => 'TEXT',
                'after' => 'title'
            ]
        ]);

        // Copy data from content to body if content column exists
        $this->db->query('UPDATE announcements SET body = content WHERE content IS NOT NULL');

        // Drop the content column
        $this->forge->dropColumn('announcements', 'content');
    }
}
