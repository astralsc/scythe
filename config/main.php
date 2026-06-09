<?php
session_start();

foreach (glob($_SERVER['DOCUMENT_ROOT'] . '/config/classes/*.php') as $class) {
    include_once $class;
}