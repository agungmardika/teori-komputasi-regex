<?php
$errors = [
    'booking_code' => '',
    'session_time' => '',
    'member_id'    => ''
];
$isValid = false;
$showModal = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $booking_code = $_POST['booking_code'] ?? '';
    $session_time = $_POST['session_time'] ?? '';
    $member_id    = $_POST['member_id'] ?? '';

    $regex_code   = "/^STU-[A-Z]{4}$/";
    $regex_time   = "/^([01]\d|2[0-3]):([0-5]\d)$/";
    $regex_member = "/^\d{8}$/";

    if (!preg_match($regex_code, $booking_code)) {
        $errors['booking_code'] = "Format: STU-HURUF (4 digit Contoh: STU-ROCK)";
    }

    if (!preg_match($regex_time, $session_time)) {
        $errors['session_time'] = "Format: HH:MM (24 jam)";
    }

    if (!preg_match($regex_member, $member_id)) {
        $errors['member_id'] = "Harus tepat 8 digit angka.";
    }

    if (empty($errors['booking_code']) && empty($errors['session_time']) && empty($errors['member_id'])) {
        $isValid = true;
        $showModal = true;
    }
}
