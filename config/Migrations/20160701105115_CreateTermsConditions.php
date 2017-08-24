<?php
use Migrations\AbstractMigration;

class CreateTermsConditions extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
        $table = $this->table('terms_conditions');

        $table->addColumn('terms_conditions', 'text');

        $table->create();
    }

    public function down()
    {
        $this->dropTable('terms_conditions');
    }
}
