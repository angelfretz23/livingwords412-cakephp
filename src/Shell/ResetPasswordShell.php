<?php
namespace App\Shell;

use Cake\Console\Shell;
use Cake\I18n\Time;

/**
 * Class HelloShell
 * @package App\Shell
 * @property \App\Model\Table\PasswordsResetsTable $PasswordsResets
 */
class ResetPasswordShell extends Shell
{


    public function initialize()
    {
        parent::initialize();
        $this->loadModel('PasswordsResets');
    }
    public function main()
    {
        $this->out(Time::now()->addMinutes(10)->format('Y-m-d H:i:s'));
        $this->out(Time::now()->format('Y-m-d H:i:s'));

        $records = $this->PasswordsResets->deleteAll([
            'created <=' => Time::now()->addMinutes(10)->format('Y-m-d H:i:s'),
        ]);
        $this->out('Deleted ' . $records);
    }
}