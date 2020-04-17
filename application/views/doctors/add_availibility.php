<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="py-5 text-center">
    <h2>Doctors Dashboard</h2>
</div>
<div class="row">
    <div class="col-md-12 order-md-1">
        <h4 class="mb-3">Add available time slots</h4>

        <form class="needs-validation" novalidate="" method="post">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="firstName">Date</label>
                    <input type="date" class="form-control" id="app-date" placeholder="Select a date" required="" name="date">
                </div>
                <div class="col-md-6 mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="firstName">From time</label>
                            <select class="form-control" placeholder="Select a time" required="" name="from_time">
                                <?php echo get_times(); ?>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="firstName">To time</label>
                            <select class="form-control" placeholder="Select a time" required="" name="to_time">
                                <?php echo get_times(); ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Add Appointment</button>
        </form>
    </div>
</div>

