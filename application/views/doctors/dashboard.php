<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="py-5 text-center">
    <h2>Doctors Dashboard</h2>
</div>

<div class="row">
    <div class="col-md-12 order-md-1">
        <h4 class="mb-3">List of available</h4>
        <span style="float: right">
            <a class="btn btn-success" href="/doctorController/add_availability">Add Availability</a>
        </span>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">SNO</th>
                <th scope="col">Date</th>
                <th scope="col">From</th>
                <th scope="col">Tp</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i = 1;
                foreach ($records as $data)
                {?>
            <tr>
                <th scope="row"><?php echo $i++;?></th>
                <td><?php echo date('d/m/Y',strtotime($data->date));?></td>
                <td><?php echo date("g:i a", strtotime($data->from_time));?></td>
                <td><?php echo  date("g:i a", strtotime($data->to_time));?></td>
            </tr>
            <?php }?>
            </tbody>
        </table>

    </div>
</div>
