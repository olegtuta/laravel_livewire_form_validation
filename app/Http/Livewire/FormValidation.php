<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FormValidation extends Component
{
    public $name;
    public $email;
    public $phone;
    public $website;
    public $question;
    //нужно собрать комбо из всех true, это будет значить, что все поля заполнены верно
    public $isComboGood = [
        "name" => false,
        "email" => false,
        "phone" => false,
        "website" => false,
        "question" => false
    ];
    //форма заполнена и отправлена
    public $submitted = false;

    protected $rules = [
        "name" => "required|min:4",
        "email" => "required|email",
        "phone" => "required|regex:/[\+]{0,1}[0-9]{7,15}/",
        "website" => "required|url",
        "question" => "required|min:10"
    ];

    protected $messages = [
        "name.min" => "минимум 6 символов",
        "name.required" => "поле обязательно для ввода",
        "email.email" => "почта невалидна",
        "email.required" => "поле обязательно для ввода",
        "phone.regex" => "неверный формат телефона",
        "phone.required" => "поле обязательно для ввода",
        "website.url" => "неверный формат, пример: https://site.com",
        "website.required" => "поле обязательно для ввода",
        "question.min" => "минимум 10 символов",
        "question.required" => "поле обязательно для ввода"
    ];

    private function switchBool($bool, $propertyName)
    {
        switch ($propertyName) {
            case "name":
                $this->isComboGood["name"] = $bool;
                break;
            case "email":
                $this->isComboGood["email"] = $bool;
                break;
            case "phone":
                $this->isComboGood["phone"] = $bool;
                break;
            case "website":
                $this->isComboGood["website"] = $bool;
                break;
            case "question":
                $this->isComboGood["question"] = $bool;
                break;
        }
    }

    public function submit()
    {
        $this->submitted = true;
    }

    public function updated($propertyName)
    {
        /* зададим текущий проперти на дефолтный - false.
        Двойной переключатель нужен, потому что изначально человек может ввести валидное поле
        а потом сделать его невалидным, поэтому сначала задаем полю false */
        $this->switchBool(false, $propertyName);
        //отвалидируем текущий проперти
        $this->validateOnly($propertyName);
        /* до этой строчки дойдет только если валидация сработает
        поэтому переключим текущий проперти на true */
        $this->switchBool(true, $propertyName);
    }

}
