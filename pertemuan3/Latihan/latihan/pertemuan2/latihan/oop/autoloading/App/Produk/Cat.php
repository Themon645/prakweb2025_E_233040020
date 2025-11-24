<?php

// inheritance Animal dengan sebuah abstract method
class Cat extends Animal {
  // wajib di kontrakan/interface
  public function run() {
    return "$this->name itu Berlari";
  }
}