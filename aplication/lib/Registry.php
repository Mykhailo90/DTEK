<?php
/**
 * Класс для создания единственного объкта с "глобальными переменными"
 */
namespace aplication\lib;

class Registry{
    // Переменная для объекта хранения глобальных переменных
    private static $instance;
    // Ассоциативный массив для хранения глобальных значений
    private $props = array();
    //Закрытый конструктор для создания объекта типа Singleton
    private function __construct(){}
    //Открытый статический метод для создания единственного экземпляра
    //Возвращает указатель на Объект с ассоциативным массивом
    public static function getInstance(){
        if (empty(self::$instance)){
            self::$instance = new Registry();
        }
        return self::$instance;
    }
    // Открытый метод для задания пар "ключ-значение"
    public function setProperty($key, $val){
        if (isset($this->props[$key]))
            throw new Exception('Невозможно создать переменную `' . $key .
                '`. Данное имя переменной уже сущестует.');
        $this->props[$key] = $val;
    }
    // Метод для изменения раннее сохраненного значения
    public function changeProperty($key, $val){
        $this->props[$key] = $val;
    }
    // Метод для удаления пары ключ-значение
    public function removeProperty($key, $val){
        unset($this->props[$key]);
    }
    // Метод для получения значения по ключу
    public function getProperty($key){
        if (isset($this->props[$key])){
            return $this->props[$key];
        }
        return null;
    }
}
?>
