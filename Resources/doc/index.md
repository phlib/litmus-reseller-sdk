

use Yzalis\Components\Litmus\Email\SubjectPreview;

$subjectPreview = new SubjectPreview("The email object", "The email body", "The sender name");
$clients = $subjectPreview->getClients();

foreach ($clients as $client) {

	<img src="<?php echo $url['url']; ?>" width="<?php echo $url['size']['width']; ?>" height="<?php echo $url['size']['height']; ?>" /><br />

    $urls[$cntr]['url'] = $gsp->getUrl($client['client']);
    $urls[$cntr]['size'] = $client['subjectSize'];

    if ($client['hasToast']) {
        $cntr++;
        $urls[$cntr]['url'] = $gsp->getUrl($client['client'], true);
        $urls[$cntr]['size'] = $client['toastSize'];
    }
    $cntr++;
}
foreach ($urls as  $url) {
?>
<img src="<?php echo $url['url']; ?>" width="<?php echo $url['size']['width']; ?>" height="<?php echo $url['size']['height']; ?>" /><br />
<?php
}
