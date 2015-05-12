<?php

include_once '../../config.php';
include_once 'includes/header.php';

use LearnositySdk\Request\Init;
use LearnositySdk\Utils\Uuid;

$item_ref = Uuid::generate();

$security = array(
    'consumer_key' => $consumer_key,
    'domain'       => $domain
);

$request = array(
    'id'   => 'learnosity_author',
    'type' => 'itemlist'
);

$Init = new Init('author', $security, $consumer_secret, $request);
$signedRequest = $Init->generate();

?>

<div class="jumbotron section">
    <div class="toolbar">
        <ul class="list-inline">
            <li data-toggle="tooltip" data-original-title="Preview API Initialisation Object"><a href="#"  data-toggle="modal" data-target="#initialisation-preview"><span class="glyphicon glyphicon-search"></span></a></li>
            <li data-toggle="tooltip" data-original-title="Visit the documentation"><a href="http://docs.learnosity.com/authorapi/" title="Documentation"><span class="glyphicon glyphicon-book"></span></a></li>
            <li data-toggle="tooltip" data-original-title="Toggle product overview box"><a href="#"><span class="glyphicon glyphicon-chevron-up jumbotron-toggle"></span></a></li>
        </ul>
    </div>
    <div class="overview">
        <h1>Author API</h1>
        <p>Learnosity's Author API allows searching and integration of Learnosity powered content into your content management system.<p>
        <p>Below is demo of the Author API editing a new item each time, questions can be created, edited and are persisted to our itembank.</p>
    </div>
</div>

<!-- Container for the items api to load into -->
<div class="section">
    <h3>Item List View</h3>
    <hr>
    <div id="learnosity_author"></div>
</div>

<script src="<?php echo $url_authorapi; ?>"></script>
<script>
    var initOptions = <?php echo $signedRequest; ?>;

    LearnosityAuthor.init(initOptions);
</script>

<?php
    include_once 'views/modals/initialisation-preview.php';
    include_once 'includes/footer.php';
