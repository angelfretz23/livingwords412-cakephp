<?php
use Migrations\AbstractMigration;

class AddSocialToUsers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('users');
        $table->addColumn('fb_id', 'string', [
            'default' => '',
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('user_photo', 'string', [
            'default' => null,
            'limit' => 255,
        ]);
        $table->addColumn('udid', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->update();
    }
}
