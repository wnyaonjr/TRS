<!-- File: /app/View/Posts/index.ctp -->

<h1>Employees</h1>
<?php
echo $this->Form->button(
    'Timein', 
    array(
        'type'=>'button',
        'action'=>'/controller/insertTimein'
    )
);
?>
<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Company Name</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($timeinrecords as $timeinRecord): ?>
    <tr>
        <td><?php echo $timeinRecord['TimeinRecord']['id']; ?></td>
        <td><?php echo $timeinRecord['TimeinRecord']['employee_id']; ?></td>
        <td><?php echo $timeinRecord['TimeinRecord']['timestamp']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>

