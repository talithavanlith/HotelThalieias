<?php

/**
 * Check to see if a string is composed entirely of the digits 0-9.
 * Note that this is different to checking if a string is numeric since
 * +/- signs and decimal points are not permitted.
 *
 * @param string $str The string to check.
 * @return True if $str is composed entirely of digits, false otherwise.
 */
function isDigits($str) {
    $pattern='/^[0-9]+$/';
    return preg_match($pattern, $str);
}

/**
 * Check to see if a string contains any content or not.
 * Leading and trailing whitespace are not considered to be 'content'.
 *
 * @param string $str The string to check.
 * @return True if $str is empty, false otherwise.
 */
function isEmpty($str) {
    return strlen(trim($str)) == 0;
}

/**
 * Check to see if a string looks like an email.
 * Email validation is actually fairly complex, so this is a thin wrapper
 * around a PHP filter function.
 *
 * @param string $str The string to check.
 * @return True if $str looks like a valid email address, false otherwise.
 */
function isEmail($str) {
    // There's a built in PHP tool that has a go at this
    return filter_var($str, FILTER_VALIDATE_EMAIL);
}

/**
 * Check to see if the length of a string is a given value, ignoring leading
 * and trailing whitespace.
 *
 * @param string $str The string to check.
 * @param integer $len The expected length of $str.
 * @return True if $str has length $len, false otherwise.
 */
function checkLength($str, $len) {
    return strlen(trim($str)) === $len;
}

/**
 * Check credit card number.
 * This provides some rudimentary validation of a credit card number.
 * These checks depend on the card type:
 * - American express ($cardType = 'amex') card numbers must be 15 digits long and start with a 3.
 * - MasterCard ($cardType = 'mcard') card numbers must be 16 digits long and start with a 5.
 * - Visa ($cardType = 'visa') card numbers must be 16 digits long and start with a 4.
 *
 * @param string $cardType The type of card, one of 'amex', 'mcard', or 'visa'.
 * @param string $cardNumber The credit card number.
 * @return True if $cardNumber passes some basic checks, false otherwise.
 */
function checkCardNumber($cardType, $cardNumber) {
    if (!isDigits($cardNumber)) {
        return false;
    }

    switch ($cardType) {
        case 'amex':
            return checkLength($cardNumber, 15) && (int)$cardNumber[0] === 3;
            break;
        case 'mcard':
            return checkLength($cardNumber, 16) && (int)$cardNumber[0] === 5;
            break;
        case 'visa':
            return checkLength($cardNumber, 16) && (int)$cardNumber[0] === 4;
            break;
        default:
            return false;
    }
}


/**
 * Check credit card verification code.
 * This provides some rudimentary validation of a credit card number.
 * These checks depend on the card type:
 * - American express ($cardType = 'amex') card verification codes must be 4 digits long.
 * - MasterCard ($cardType = 'mcard') card verification codes must be 3 digits long.
 * - Visa ($cardType = 'visa') card verification codes must be 3 digits long.
 *
 * @param string $cardType The type of card, one of 'amex', 'mcard', or 'visa'.
 * @param string $cardVerify The credit card verification code.
 * @return True if $cardVerify passes some basic checks, false otherwise.
 */
function checkCardVerification($cardType, $cardVerify) {
    if (!isDigits($cardVerify)) {
        return false;
    }

    switch ($cardType) {
        case 'amex':
            return checkLength($cardVerify, 4);
            break;
        case 'mcard':
        case 'visa':
            return checkLength($cardVerify, 3);
            break;
        default:
            return false;
    }
}

/**
 * Check credit card expiry date.
 * Checks that the date provided is in the future.
 *
 * @param string $cardMonth Numeric value of card expiry month.
 * @param string $cardYear Card expiry year.
 * @return True if $cardMonth/$cardYear is in the future, false otherwise.
 */
function checkCardDate($cardMonth, $cardYear) {
    $year = (int) date('Y');
    $month = (int) date('n');
    $cardYear = (int) $cardYear;
    $cardMonth = (int) $cardMonth;

    if ($year > $cardYear) {
        return false;
    } elseif ($year === $cardYear && $month >= $cardMonth) {
        return false;
    } else {
        return true;
    }
}

function validateCheckout(){

    $isCorrect = true;

    // Validate Personal Details

    // Check the name is filled out
    if (!(isset($_POST['name'])) || (isEmpty($_POST['name']))) {
        $isCorrect = false;
        ?>
        <p>A name must be provided</p>
        <?php
    }

    // Check Email is filled out correctly
    $email = $_POST['email'];
    if (!(isset($email)) || (isEmpty($email))) {
        $isCorrect = false;
        ?>
        <p>An email must be provided</p>
        <?php
    } else if (!(isEmail($email))) {
        $isCorrect = false;
        ?>
        <p>The email provided is not a valid email</p>
        <?php
    }

    // Validate Credit Card Details


    // This depends a bit on the type of card, so get that first
    $cardType = $_POST['cardType'];

    // Credit card number validation
    $cardNumber = $_POST['cardNumber'];
    if (!(isset($cardNumber)) || (isEmpty($cardNumber))) {
        $isCorrect = false;
        ?>
        <p>A credit card number must be provided</p>
        <?php
    } else if (!(checkCardNumber($cardType, $cardNumber))) {
        $isCorrect = false;
        ?>
        <p>The credit card number is incorrect</p>
        <?php
    }

    // Expiry date validation
    $cardMonth = $_POST['cardMonth'];
    $cardYear = $_POST['cardYear'];
    if (!(checkCardDate($cardMonth, $cardYear))) {
        $isCorrect = false;
        ?>
        <p>The credit card date is incorrect</p>
        <?php
    }

    // CVC validation
    $cardValidation = $_POST['cardValidation'];
    if (!(checkCardVerification($cardType, $cardValidation))) {
        $isCorrect = false;
        ?>
        <p>The credit card verification code is incorrect</p>
        <?php
    }

    return $isCorrect;
}


?>