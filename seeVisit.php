<?php
include("./header.php");
$run = $conn->query("SELECT * FROM `pageview` WHERE 1");
$allVisist = [];
if($run->num_rows >0){
    while($row = $run->fetch_assoc()){        
        $allVisist[] = $row;        
    }
}
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.6.0/dt-1.11.3/b-2.0.1/b-html5-2.0.1/r-2.2.9/datatables.min.css"/>
 
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.6.0/dt-1.11.3/b-2.0.1/b-html5-2.0.1/r-2.2.9/datatables.min.js"></script>
 <br><br><br><br><br><br><br><br>
 <div class="row px-3">

     <table class="table ">
         <thead>
             <tr>
                 <th>country</th>
                 <th>region</th>
                 <th>city</th>
                 <th>Ip Address</th>
                 <th>totalview</th>
                 <th>date</th>
                </tr>
            </thead>
            <tbody>
                <?php
foreach($allVisist as $visit){
    ?>
        <tr>
            <td><?=$visit['country']?></td>
            <td><?=$visit['region']?></td>
            <td><?=$visit['city']?></td>
            
            <td><?=$visit['userip']?></td>
            <td><?=$visit['totalview']?></td>
            <td><?=$visit['date_visit']?></td>
        </tr>
        
        <?php
}?>
        
        
    </tbody>
</table>
</div>

<script>
    $(document).ready(function() {
        $('.table').DataTable();
    } );
</script>