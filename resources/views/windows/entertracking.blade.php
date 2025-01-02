<div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <style>
        .in-div {
            width: 50%;
            margin: auto;
            padding: 10px;
        }
    </style>
    <div class="in-div">
        <div class="row" style='padding:30px 0px;'>
            <h3 style='text-align:center; margin-bottom:40px;'> Track your Document </h3>
            <form method='post' action="{{route('tracking')}}" accept-charset="utf-8" enctype="multipart/form-data">
                @csrf
                <input type='text' class='form-control' name='trackingnumber' style='padding:30px; font-size:20px; text-align:center; margin-bottom:10px;' placeholder='Enter the Tracking code'/>
                <input type='submit' class='btn btn-primary' value="Start Tracking"/>
            </form>
                <?php 
                    if ( isset($errormsg) ) {
                        echo "<p style='background: #eeacac63;color: #694242;padding: 20px;text-align: center;'>";
                            echo "File not found";
                        echo "</p>";
                    }
                ?>
        </div>
    </div>
</div>