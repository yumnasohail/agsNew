<style>
    .btn-export{
        margin-bottom: 2%;
        margin-top: 6%;
    }
</style>
<button class="btn btn-outline-primary btn-export" onclick="export_to_CSV('AGS Commission and Premium Report')">Export to CSV </button>


<?php
$column_totals = [];
foreach ($federation_table['federations'] as $fid => $name) {
    foreach ($federation_table['years'] as $year) {
        $column_totals[$year]['paid'] = ($column_totals[$year]['paid'] ?? 0) + ($federation_table['table_data'][$fid][$year]['paid'] ?? 0);
        $column_totals[$year]['comission'] = ($column_totals[$year]['comission'] ?? 0) + ($federation_table['table_data'][$fid][$year]['comission'] ?? 0);
    }
}
?>
<table class="table table-bordered border-theme1 table-responsive" id="tblReportData">
    <!-- GROSS PAID SECTION -->
    <thead class="bg-th background-theme1">
        <tr class="bg-col">
            <th>Gross Paid Premium (CR0021)</th>
            <?php foreach ($federation_table['years'] as $year): ?><th></th><?php endforeach; ?>
            <th></th>
        </tr>
        <tr class="bg-col">
            <th>UW years (1)</th>
            <?php foreach ($federation_table['years'] as $year): ?>
                <th><?= $year ?></th>
            <?php endforeach; ?>
            <th>Sum</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($federation_table['federations'] as $fid => $name): 
            $sum = 0; ?>
            <tr>
                <td><?= htmlspecialchars($name) ?></td>
                <?php foreach ($federation_table['years'] as $year): 
                    $paid = $federation_table['table_data'][$fid][$year]['paid'] ?? 0;
                    $sum += $paid;
                ?>
                    <td><?= number_format($paid, 2) ?></td>
                <?php endforeach; ?>
                <td><strong><?= number_format($sum, 2) ?></strong></td>
            </tr>
        <?php endforeach; ?>
        <!-- Total Row for Paid -->
        <tr style=" font-weight: bold;">
            <td>Sum</td>
            <?php 
                $total_paid_sum = 0;
                foreach ($federation_table['years'] as $year): 
                    $y_total = $column_totals[$year]['paid'] ?? 0;
                    $total_paid_sum += $y_total;
            ?>
                <td><?= number_format($y_total, 2) ?></td>
            <?php endforeach; ?>
            <td><?= number_format($total_paid_sum, 2) ?></td>
        </tr>
    </tbody>

    <!-- COMMISSION SECTION -->
    <thead class="bg-th background-theme1">
        <tr class="bg-col">
            <th>Commission for total underwriting year</th>
            <?php foreach ($federation_table['years'] as $year): ?><th></th><?php endforeach; ?>
            <th></th>
        </tr>
        <tr class="bg-col">
            <th>UW years (1)</th>
            <?php foreach ($federation_table['years'] as $year): ?>
                <th><?= $year ?></th>
            <?php endforeach; ?>
            <th>Sum</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($federation_table['federations'] as $fid => $name): 
            $sum = 0; ?>
            <tr>
                <td><?= htmlspecialchars($name) ?></td>
                <?php foreach ($federation_table['years'] as $year): 
                    $com = $federation_table['table_data'][$fid][$year]['comission'] ?? 0;
                    $sum += $com;
                ?>
                    <td><?= number_format($com, 2) ?></td>
                <?php endforeach; ?>
                <td><strong><?= number_format($sum, 2) ?></strong></td>
            </tr>
        <?php endforeach; ?>
        <!-- Total Row for Commission -->
        <tr style=" font-weight: bold;">
            <td>Sum</td>
            <?php 
                $total_com_sum = 0;
                foreach ($federation_table['years'] as $year): 
                    $y_com = $column_totals[$year]['comission'] ?? 0;
                    $total_com_sum += $y_com;
            ?>
                <td><?= number_format($y_com, 2) ?></td>
            <?php endforeach; ?>
            <td><?= number_format($total_com_sum, 2) ?></td>
        </tr>
    </tbody>
</table>
