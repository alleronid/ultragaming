<?php 
function alert() {
	if (session('error')) {
		echo '
		<div class="alert p-3 alert-danger">
			<b>Gagal</b> '.session('error').'
		</div>
		';
	}

	if (session('success')) {
		echo '
		<div class="alert p-3 alert-success">
			<b>Berhasil</b> '.session('success').'
		</div>
		';
	}
}

function fix_date($date) {
	$date = explode('/', $date);

	return $date[2] . '-' . $date[0] . '-' . $date[1];
}

function reverse_date($date_1, $date_2) {
	$x1 = explode('-', $date_1);
	$x2 = explode('-', $date_2);

	$date_1 = $x1[1] . '/' . $x1[2] . '/' . $x1[0];
	$date_2 = $x2[1] . '/' . $x2[2] . '/' . $x2[0];

	return $date_1 . ' - ' . $date_2;
}

function insert_log($body, $header, $log_name = null, $ret = null){
    $logname = $log_name ?? 'callback.log';
    $logFile = "logs/$logname";
    if ($ret) {
        $message = "[" . date('Y-m-d H:i:s') . "]: BODY: ".$body ." HEADER: ". $header. " RESPONSE: ". $ret.PHP_EOL;
    }else{
        $message = "[" . date('Y-m-d H:i:s') . "]: BODY: ".$body ." HEADER: ". $header. PHP_EOL;
    }

    file_put_contents($logFile, $message, FILE_APPEND);
}
