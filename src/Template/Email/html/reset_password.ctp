<tr>
    <td>
        <table width="100%">
            <tr>
                <td valign="middle">
                    <table width="580" style="margin:0 auto;color:#73879C;">
                        <tr>
                            <td>
                                <h1>
                                    <?= __d('mail', 'Hello') ?>
                                </h1>
                                <p style="font-size: 18px;line-height: 21px;">
                                    <?= __d('mail', 'You recently asked to change the password for the account <strong>{0}</strong>.', h($user->name)) ?>
                                </p>

                                   Your generated code: <?= $code?>
                                    <br/>

                                
                            </td>
                            <td class="expander"></td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>
    </td>
</tr>