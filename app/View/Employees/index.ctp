<!-- File: /app/View/Posts/index.ctp -->

<h1>Employees</h1>
<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Company Name</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($employees as $employee): ?>
    <tr>
        <td><?php echo $employee['Employee']['name']; ?></td>
        <td><?php echo $employee['Employee']['email']; ?></td>
        <td><?php echo $employee['Employee']['company']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>