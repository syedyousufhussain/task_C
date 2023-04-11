<!DOCTYPE html>
<html>
    <head>
        <title>User List</title>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#usersTable').DataTable({
                "paging": true,
                "pagingType": "full_numbers",
                "lengthMenu": [[15, 30, 50, -1], [15, 30, 50, "All"]],
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "<?php echo base_url('users/get_users'); ?>",
                    "type": "POST"
                },});
            } );
        </script>
    </head>
    <body>
        <h1>User List</h1>
        <table id="usersTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user->id ?></td>
                    <td><?= $user->name ?></td>
                    <td><?= $user->email ?></td>
                    <td>
                        <a href="<?= site_url('users/edit/'.$user->id) ?>">Edit</a>
                        <a href="<?= site_url('users/delete/'.$user->id) ?>">Delete</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </body>
</html>
