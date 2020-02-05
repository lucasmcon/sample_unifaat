<?php
    $link_vmax = @ fsockopen('177.136.92.20', 3306, $numeroDoErro, $stringDoErro, 2); 
    $link_starnet= @ fsockopen('186.251.227.126', 3306, $numeroDoErro, $stringDoErro, 2); 
            
    if($link_vmax && !$link_starnet){
        $tr_vmax = '<tr class="success">';
        $status_vmax = '<td><b>Online</b></td>';
                        
        $tr_starnet = '<tr class="danger">';
        $status_starnet = '<td><b>Offline</b></td>';					
    }else if(!$link_vmax && $link_starnet){
                        
        $tr_vmax = '<tr class="danger">';
        $status_vmax = '<td><b>Offline</b></td>';
                        
        $tr_starnet = '<tr class="success">';
        $status_starnet = '<td><b>Online</b></td>';	
    }else if($link_vmax && $link_starnet){
                        
        $tr_vmax = '<tr class="success">';
        $status_vmax = '<td><b>Online</b></td>';
                        
        $tr_starnet = '<tr class="warning">';
        $status_starnet = '<td><b>Stand by</b></td>';
		
    }else{
                        
        $tr_vmax = '<tr class="danger">';
        $status_vmax = '<td><b>Offline</b></td>';
                        
        $tr_starnet = '<tr class="danger">';
        $status_starnet = '<td><b>Offline</b></td>';	
    }
?>

<div class="panel-body">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Operadora</th>
                    <th>Velocidade</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php echo $tr_vmax; ?>
                    <td>VMAX</td>
                    <td>40Mbps</td>
                    <?php echo $status_vmax; ?>
                </tr>
                <?php echo $tr_starnet; ?>
                    <td>Starnet</td>
                    <td>20Mbps dedicado</td>
                    <?php echo $status_starnet; ?>
                </tr>
            </tbody>
        </table>
    </div>
</div>