

    <style>
        @media print {
            .no-print { display: none; }
        }
        .barcode-box {
            text-align: center;
            margin-bottom: 40px;
            page-break-inside: avoid;
        }
        .label {
            margin-top: 5px;
            font-weight: bold;
        }
    </style>

<h3>Print Barcodes</h3>
<div class="no-print" style="margin-bottom: 20px;">
    <button onclick="window.print()">Print Barcodes</button>
</div>

<?php foreach ($barcodes as $b): ?>
    <div class="barcode-box">
        <img src="<?= base_url('Menu/generate_barcode/' . $b['barcode_column']); ?>" alt="Barcode" />
        <div class="label"><?= $b['project_code'] ?? '' ?> <?= $b['school_name'] ?? '' ?></div>
    </div>
<?php endforeach; ?>

