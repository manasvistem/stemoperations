<style>
        @media print {
            .no-print { display: none; }
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
        }
        .barcode-img {
            width: 200px;
            height: auto;
        }
        .school-row {
            display: none;
        }
        .toggle-icon {
            cursor: pointer;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<h3>Print Barcodes</h3>
<div class="no-print" style="margin-bottom: 20px;">
    <button onclick="window.print()">Print Barcodes</button>
</div>

<table>
    <thead>
        <tr>
            <th>Project Code</th>
            <th>Project Barcode</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php 
  
    foreach ($barcodes as $index => $value):
        foreach ($value as $index => $project):
    ?>
        <tr class="project-row">
            <td><strong><?= $project['ProjectCode']; ?></strong></td>
            <td>
                <?php echo $project['ProjectBarcode'];?>
                <!-- <img class="barcode-img" src="<?= base_url('Menu/generate_barcode/' . $project['ProjectBarcode']); ?>" /> -->                
            </td>
            <td class="no-print">
                <span class="toggle-icon" data-target="schools-<?= $index ?>">▶ Show Schools</span>
            </td>
        </tr>
        <?php foreach ($project['Schools'] as $school): ?>
        <tr class="school-row schools-<?= $index ?>">
            <td><?= $school['SchoolName']; ?></td>
            <td>
            <?php  //  echo $project['SchoolBarcode'];
                $schoolname    = $school['SchoolName'];
                $schoolbarcode = $school['SchoolBarcode'];
                $src = "https://barcode.tec-it.com/barcode.ashx?data=".$schoolbarcode."&code=code128"; ?>
            <img class="barcode-img" src="<?php echo $src;?>" />
            </td>
            <td></td>
        </tr>
        <?php endforeach; ?>
        <?php endforeach; ?>
    <?php endforeach; ?>
    </tbody>
</table>
<script>
    $(document).ready(function() {
        $('.toggle-icon').click(function() {
            let target = $(this).data('target');
            $('.' + target).toggle();
            let isVisible = $('.' + target + ':visible').length > 0;
            $(this).text(isVisible ? '▼ Hide Schools' : '▶ Show Schools');
        });
    });
</script>

