<?php

require __DIR__ . '/../vendor/autoload.php';

use NewsClassifier\Classification;

// Define the path to the saved model
$modelPath = __DIR__ . '/../storage/model.rbx';

// Initialize the Classification object
$classifier = new Classification($modelPath);

// Define new samples for classification
$samples = [
    ['The team played an amazing game of soccer, showing excellent teamwork and strategy.'],
    ['The latest programming language release introduces features that enhance coding efficiency.'],
    ['An incredible match between two top teams ended in a thrilling draw last night.'],
    ['This new tech gadget includes features never before seen, setting a new standard in the industry.'],
];

// Predict categories
$predictions = $classifier->predict($samples);

// Display predictions
foreach ($predictions as $index => $prediction) {
    echo "Sample: " . $samples[$index][0] . "\n";
    echo "Prediction: " . $prediction . "\n\n";
}
