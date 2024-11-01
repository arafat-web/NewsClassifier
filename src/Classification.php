<?php

namespace NewsClassifier;

use Rubix\ML\Classifiers\KNearestNeighbors;
use Rubix\ML\Datasets\Labeled;
use Rubix\ML\Datasets\Unlabeled;
use Rubix\ML\PersistentModel;
use Rubix\ML\Pipeline;
use Rubix\ML\Tokenizers\Word;
use Rubix\ML\Transformers\TfIdfTransformer;
use Rubix\ML\Transformers\WordCountVectorizer;
use Rubix\ML\Persisters\Filesystem;

class Classification
{
    private $modelPath;

    public function __construct($modelPath)
    {
        $this->modelPath = $modelPath;
    }

    public function train()
    {
        // Define sample data and labels
        $samples = [
            ['The team played an amazing game of soccer'],
            ['The new programming language has been released'],
            ['The match between the two teams was incredible'],
            ['The new tech gadget has been launched'],
        ];

        $labels = [
            'sports',
            'technology',
            'sports',
            'technology',
        ];

        // Create the labeled dataset
        $dataset = new Labeled($samples, $labels);

        // Set up the pipeline with text processing and K-Nearest Neighbors classifier
        $estimator = new Pipeline([
            new WordCountVectorizer(10000, 1, 1, new Word()),
            new TfIdfTransformer(),
        ], new KNearestNeighbors(4));

        // Train the model
        $estimator->train($dataset);

        // Save the trained model
        $this->saveModel($estimator);

        echo "Training completed and model saved.\n";
    }

    private function saveModel($estimator)
    {
        $persister = new Filesystem($this->modelPath);
        $model = new PersistentModel($estimator, $persister);
        $model->save();
    }

    public function predict(array $samples)
    {
        // Load the saved model
        $persister = new Filesystem($this->modelPath);
        $model = PersistentModel::load($persister);

        // Create an unlabeled dataset for the new samples
        $dataset = new Unlabeled($samples);

        // Predict categories for new samples
        return $model->predict($dataset);
    }
}
