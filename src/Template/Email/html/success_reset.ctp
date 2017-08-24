<tr>
    <td>
        <table width="100%">
            <tr>
                <td valign="middle">
                    <table width="580" style="margin:0 auto;color:#73879C;">
                        <tr>
                            <td>
                                <h1>
                                    <?= __d('mail', 'Hi {0},', h($user->fullname)) ?>
                                </h1>
                                <p style="font-size: 18px;line-height: 21px;">
                                    <?= __d('mail', 'The new password for <strong>{0}</strong>.', h($user->nickname))?>
                                    <?= "Password: {$newpass}" ?>
                                    <?= __d('mail', 'You can change the new password in any time from your profile settings') ?>
                                </p>
                            </td>
                            <td class="expander"></td>
                        </tr>
                    </table>

                    <table width="580" style="margin:0 auto;color:#73879C;">
                        <tr>
                            <td>
                                <p>
                                    <?= __d('mail', 'Regards,') ?><br/>
                                    <?= __d('mail', "Bible's Team.") ?>
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </td>
</tr>