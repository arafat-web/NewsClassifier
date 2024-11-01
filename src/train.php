<?php

require __DIR__ . '/../vendor/autoload.php';

use NewsClassifier\Classification;

// Path to save the model
$modelPath = __DIR__ . '/../storage/model.rbx';

// Initialize the Classification object
$classifier = new Classification($modelPath);

// Train the model and save it
$classifier->train();
