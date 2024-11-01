# NewsClassifier

A simple news classification project using PHP and Rubix ML. This project demonstrates how to use machine learning in PHP to classify news articles into categories like "Sports" and "Technology."

## Setup

### Prerequisites

- PHP (8.0+ recommended)
- Composer

### Installation

1. **Clone the Repository:**

   ```bash
   git clone https://github.com/arafat-web/NewsClassifier.git
   cd NewsClassifier
   ```

2. **Install Dependencies:**

   Run the following command to install the Rubix ML library and other dependencies:

   ```bash
   composer install
   ```

3. **Set Up the Project Structure:**

   Make sure the `storage` folder exists to save the trained model. If it’s missing, create it:

   ```bash
   mkdir storage
   ```

4. **Generate Autoload Files:**

   ```bash
   composer dump-autoload
   ```

## Usage

1. **Train the Model:**

   Run the training script to train and save the model.

   ```bash
   php src/train.php
   ```

2. **Predict New Samples:**

   Use the prediction script to classify new articles.

   ```bash
   php src/predict.php
   ```

## Project Structure

```
NewsClassifier/
├── src/
│   ├── Classification.php
│   ├── train.php
│   └── predict.php
├── storage/
│   └── model.rbx
├── vendor/
├── composer.json
└── README.md
```

## License

This project is open-source and available under the MIT License.

---
