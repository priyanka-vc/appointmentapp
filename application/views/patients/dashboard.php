<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="py-5 text-center">
    <h2>Patients Dashboard</h2>
</div>

<div class="row">
    <div class="col-md-12 order-md-1">
        <h4 class="mb-3">List of available slots for today</h4>
        <table class="table">
            <thead>
                <tr>
                    <th class="tg-0lax">Date</th>
                    <th class="tg-0lax">From</th>
                    <th class="tg-0lax">To</th>
                    <th class="tg-0lax">Doctor</th>
                    <th class="tg-0lax">Action</th>
                </tr>
            </thead>

            <tbody>
            <?php
            if($slots->num_rows() > 0) {

                foreach ($slots->result() as $slot) {

                    ?>
                    <tr>
                        <td><?php echo $slot->date; ?></td>
                        <td><?php echo $slot->from_time; ?></td>
                        <td><?php echo $slot->to_time; ?></td>
                        <td><?php echo $slot->first_name, ' ', $slot->last_name; ?></td>
                        <td><a href="/patients/book/<?php echo $slot->id; ?>" class="btn btn-success">Book</a></td>
                    </tr>
                    <?php
                }
            }
            ?>
            </tbody>
        </table>

        <h4 class="mb-3">List of appointments</h4>
        <table class="table">
            <thead>
            <tr>
                <th class="tg-0lax">Date</th>
                <th class="tg-0lax">From</th>
                <th class="tg-0lax">To</th>
                <th class="tg-0lax">Doctor</th>
            </tr>
            </thead>

            <tbody>
            <?php
            if($appointments->num_rows() > 0) {

                foreach ($appointments->result() as $appointment) {

                    ?>
                    <tr>
                        <td><?php echo $slot->date; ?></td>
                        <td><?php echo $slot->from_time; ?></td>
                        <td><?php echo $slot->to_time; ?></td>
                        <td><?php echo $slot->first_name, ' ', $slot->last_name; ?></td>
                    </tr>
                    <?php
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
