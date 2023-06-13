<?php

// Define your Bitcoin address where payments will be received
$bitcoinAddress = "YOUR_BITCOIN_ADDRESS";

// Set the required number of confirmations for the payment to be considered valid
$requiredConfirmations = 3;

// Retrieve the callback data sent by the payment gateway (assuming it's a POST request)
$transactionData = $_POST;

// Verify the transaction data and check if the required number of confirmations is met
if (isset($transactionData['address']) &&
    isset($transactionData['confirmations']) &&
    $transactionData['address'] === $bitcoinAddress &&
    $transactionData['confirmations'] >= $requiredConfirmations) {

    // Payment is valid, process the payment
    $amountPaid = $transactionData['value'];
    $transactionHash = $transactionData['transaction_hash'];

    // Process the payment and update your system accordingly
    // Example: update user balance, mark the order as paid, etc.

    // Send a response back to the payment gateway
    http_response_code(200); // Set the HTTP response code to indicate success
    echo "Payment received and processed successfully.";

} else {
    // Invalid payment or not enough confirmations yet
    // You may want to log the transaction for further investigation

    // Send a response back to the payment gateway
    http_response_code(400); // Set the HTTP response code to indicate an error
    echo "Payment is not valid or not enough confirmations yet.";
}
?>
