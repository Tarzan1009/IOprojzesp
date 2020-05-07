<?php
$nr_paczki = 0;

if (!empty($_GET['nr_paczki'])) {
    $nr_paczki = $_REQUEST['nr_paczki'];
}

if (!empty($_POST)) {
    // keep track post values
    $nr_paczki = $_POST['nr_paczki'];
}

$paczka = base_convert($nr_paczki, 10, 36);
?>
<!DOCTYPE html>
<html>
<body>
<canvas id="qr"></canvas>

<script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>
<script>
    (function() {
        var qr = new QRious({
            element: document.getElementById('qr'),
            value: '<?php echo $paczka ?>>'
        });
        qr.size = 500;
    })();
</script>
</body>
</html>
