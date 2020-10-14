<!-- Content -->
<section id="content">
    <div class="container">
        <?php
            // See if there are any types of messages at all
            if ($msg->hasMessages()) {
                $msg->display();
            }
        ?>
    
        <div class="row">
            <!-- Vehicles Data -->
            <div class="col-xs-12 col-md-9 col-lg-9">
                <div class="table-responsive mb-4">
                    <table class="display" id="vehicles_table">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Unique ID</th>
                                <th>Name</th>
                                <th class="text-center">Engine Displacement (CC/L)</th>
                                <th class="text-center">Engine Power (HP)</th>
                                <th>Price ($)</th>
                                <th class="text-center">Location</th>
                            </td>
                        </thead>
                        <tbody>
                            <?php if( $vehicles_data ): ?>
                                <?php $no=1; ?>
                                <?php foreach($vehicles_data as $row): ?>
                                    <?php
                                        $eng_dis_val = $row->engine_displacement;
                                        $cc_val = $eng_dis_val;
                                        $liter_val = cc_liter($eng_dis_val);
                                        
                                        $eng_dis_val_view = ucc_number($cc_val) . ' CC / '.ucc_number($liter_val).' L';
                                    ?>
                                    <tr>
                                        <td class="text-center"><?=$no;?></td>
                                        <td class="text-center"><?=$row->unique_id;?></td>
                                        <td><?=$row->name;?></td>
                                        <td class="text-center"><?=$eng_dis_val_view;?></td>
                                        <td class="text-center"><?=$row->engine_power;?></td>
                                        <td class="text-right"><?=ucc_number($row->price,0);?></td>
                                        <td class="text-center"><?=$row->location;?></td>
                                    </tr>
                                    <?php $no++; ?>
                                <?php endforeach ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7">No Record Found</td>
                                </tr>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End Vehicles Data -->
            
            <!-- Vehicles Input Form -->
            <div class="col-xs-12 col-md-3 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Vehicle Form</h2>
                        <form method="post" action="process/create.php" id="vehicle_form">
                            <div class="form-group">
                                <label for="UniqueID">Unique ID</label>
                                <input type="text" class="form-control" name="unique_id" id="UniqueID" required>
                            </div>
                            <div class="form-group">
                                <label for="Name">Name</label>
                                <input type="text" class="form-control" name="name" id="Name" required>
                            </div>
                            <div class="form-group">
                                <label for="EngineDisplacement">Engine Displacement (CC/L)</label>
                                <input type="text" class="form-control" name="engine_displacement" id="EngineDisplacement" aria-describedby="EDHelp" required>
                                <small id="EDHelp" class="form-text text-muted">
                                    Type value with CC or L. Default value is CC
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="EnginePower">Engine Power (HP)</label>
                                <input type="text" class="form-control" name="engine_power" id="EnginePower" required>
                            </div>
                            <div class="form-group">
                                <label for="Price">Price ($)</label>
                                <input type="text" class="form-control text-right" name="price" id="Price" required>
                            </div>
                            <div class="form-group">
                                <label for="Location">Location</label>
                                <input type="text" class="form-control" name="location" id="Location" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Vehicles Input Form -->
        </div>
    </div>
</section>
<!-- End Content -->