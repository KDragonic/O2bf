<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';

\Bitrix\Main\Loader::includeModule('iblock');

class SendMail
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;

        if($this->validate($this->data)) $this->send($data);
    }

    public function validate($validate)
    {
        $requires = ['phone', 'name'];

        foreach($validate as $key)
        {
            if(empty($validate[$key]) && in_array($key, $requires))
                $errors[] = $key;
        }

        if(!empty($errors))
        {
            $response = [
                "message" => "Заполните обезательное поле",
                "errors" => $errors
            ];

            echo json_encode($response);

            exit();
        }

        $validatePhone = preg_match("/^[8?\+7][0-9]{10}$/", str_replace(['+','-','(',')',' '], '', $validate['phone']));
        if(!$validatePhone)
        {
            $response = [
                "message" => "Неверный формат",
                "errors" => ["phone"],
            ];

            echo json_encode($response);

            exit();
        }
        return true;
    }

    public function send($date)
    {
        $PROP = [
            "USER_PHONE" => $_POST['phone']
        ];

        $arLoadProductArray = [
            "IBLOCK_ID" => 2,
            "NAME" => $_POST["name"],
            "PROPERTY_VALUES" => $PROP,
            "ACTIVE"         => "Y",
        ];

        $el = new CIBlockElement;
        // echo json_encode($arLoadProductArray); exit();



        $el->Add($arLoadProductArray);

        $response = [
            "message" => "Запрос выполнен удачно!",
        ];

        echo json_encode($response);

        exit();
    }
}
$send = new SendMail($_POST);