<?php

namespace aplication\lib;

/**
 * Класс для создания единственного объкта с "глобальными переменными"
 * A class for creating a Singleton object with "global variables"
 */

class Registry{
    // Переменная для объекта хранения глобальных переменных
    // Variable for object Registry
    private static $instance;

    // Ассоциативный массив для хранения глобальных значений
    // Associative array for storing global values
    private $props = array();

    //Закрытый конструктор для создания объекта типа Singleton
    // Private constructor to create a singleton object
    private function __construct(){}

    //Открытый статический метод для создания единственного экземпляра
    //Возвращает указатель на Объект с ассоциативным массивом

    // Open the static method to create a single instance object
    // Returns a pointer to an Object with an associative array
    public static function getInstance(){
        if (empty(self::$instance)){
    // Если в переменной "instance" нет объекта - он создается
    // иначе возвращается указатель на него
    // If there is no object in the "instance" variable, it is created
    // otherwise it returns a pointer to it
            self::$instance = new Registry();
        }
        return self::$instance;
    }
    // Открытый метод для задания пар "ключ-значение"
    // Open method for specifying key-value pairs
    public function setProperty($key, $val){
        if (isset($this->props[$key]))
            throw new Exception('Невозможно создать переменную `' . $key .
                '`. Данное имя переменной уже сущестует.');
        $this->props[$key] = $val;
    }
    // Метод для изменения раннее сохраненного значения
    // Method for changing an earlier stored value
    public function changeProperty($key, $val){
        $this->props[$key] = $val;
    }
    // Метод для удаления пары ключ-значение
    // Method for remove key-value
    public function removeProperty($key, $val){
        unset($this->props[$key]);
    }
    // Метод для получения значения по ключу
    // Method to get the value by key
    public function getProperty($key){
        if (isset($this->props[$key])){
            return $this->props[$key];
        }
        return null;
    }
}
?>
