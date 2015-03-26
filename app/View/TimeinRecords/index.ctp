<!-- File: /app/View/Posts/index.ctp -->
<?php

/*echo $this->Form->button(
    'Timein', 
    array(
        'type'=>'button',
        'action'=>'insertTimein()'
    )
);*/
    echo $this->Form->create('TimeinRecord');
    echo $this->Form->input('password');
    echo $this->Form->end('Timein');
?>
<h2>Timein Records</h2>
<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Time-in</th>
    </tr>

    <?php foreach ($timeinrecords as $timeinRecord): ?>
    <tr>
        <td><?php echo $timeinRecord['Employee']['name']; ?></td>
        <td><?php echo $timeinRecord['Employee']['email']; ?></td>
        <td><?php
            $date = new DateTime($timeinRecord['TimeinRecord']['timestamp']);
            $time = $date->format('h:i A');
            echo $time; ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>

