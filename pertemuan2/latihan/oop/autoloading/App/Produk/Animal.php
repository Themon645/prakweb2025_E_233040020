<?php

// Abstract class dengan 1 minimal abstract method
abstract class Animal {
  public $name = 'kucing';

  // wajiib dimiliki oleh class turunannya
  public abstract function run();
}