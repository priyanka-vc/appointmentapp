<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="py-5 text-center">
    <h2>Patients Dashboard</h2>
</div>

<div class="row">
    <div class="col-md-12 order-md-1">
        <div style="row">
            <div class="col-md-12">
                <span class="">
                    <a class="btn btn-danger" href="/auth/logout">Logout</a>
                </span>
            </div>
        </div>
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
                        <td><?php echo date('d/m/Y',strtotime($slot->date)); ?></td>
                        <td><?php echo date("g:i a", strtotime($slot->from_time)); ?></td>
                        <td><?php echo date("g:i a", strtotime($slot->to_time)); ?></td>
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
                        <td><?php echo date('d/m/Y',strtotime($appointment->date)); ?></td>
                        <td><?php echo date("g:i a", strtotime($appointment->from_time)); ?></td>
                        <td><?php echo date("g:i a", strtotime($appointment->to_time)); ?></td>
                        <td><?php echo $appointment->first_name, ' ', $appointment->last_name; ?></td>
                    </tr>
                    <?php
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
