<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Applications;
use App\Call;
use App\Question;
use App\Reviews;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function news()
    {
        return view('news');
    }

    public function contact()
    {
        return view('contact');
    }
    public function aboutUs()
    {
        return view('aboutUs');
    }

    public function reviews()
    {
        return view('reviews');
    }

    public function adler()
    {
        return view('cities.adler');
    }
    public function alupka()
    {
        return view('cities.alupka');
    }

    public function alushta()
    {
        return view('cities.alushta');
    }
    public function anapa()
    {
        return view('cities.anapa');
    }
    public function armyansk()
    {
        return view('cities.armyansk');
    }
    public function bahchisaray()
    {
        return view('cities.bahchisaray');
    }

    public function dzhankoj()
    {
        return view('cities.dzhankoj');
    }
    public function dzhubga()
    {
        return view('cities.dzhubga');
    }
    public function evpatoria()
    {
        return view('cities.evpatoria');
    }
    public function feodosia()
    {
        return view('cities.feodosia');
    }
    public function gelendzhik()
    {
        return view('cities.gelendzhik');
    }
    public function kerch()
    {
        return view('cities.kerch');
    }

    public function krasnoperekopsk()
    {
        return view('cities.krasnoperekopsk');
    }
    public function lipetsk()
    {
        return view('cities.lipetsk');
    }
    public function mineral()
    {
        return view('cities.mineral');
    }
    public function sevastopol()
    {
        return view('cities.sevastopol');
    }
    public function shchelkino()
    {
        return view('cities.shchelkino');
    }
    public function simferopol()
    {
        return view('cities.simferopol');
    }
    public function sochi()
    {
        return view('cities.sochi');
    }

    public function sudak()
    {
        return view('cities.sudak');
    }

    public function tuapse()
    {
        return view('cities.tuapse');
    }

    public function yalta()
    {
        return view('cities.yalta');
    }

    public function saki()
    {
        return view('cities.saki');
    }
    public function send()
    {

        $TOKEN = '5702325943:AAHb_-L-aMshvdOBqxrRLru4l-1l-BbjF-o';
        $CHATID = '-577996329';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {


            if (!empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['date']) && !empty($_POST['time']) && !empty($_POST['notes'])) {
                if (
                    $_POST['from'] != '-1' && $_POST['to'] != '-1' && $_POST['rate'] != '-1'
                    && $_POST['count'] != '-1' && isset($_POST['child']) && isset($_POST['animals'])
                ) {
                    $txt = "";
                    if (isset($_POST['name']) && !empty($_POST['name'])) {
                        $txt .= "Имя: " . strip_tags(trim($_POST['name'])) . "\n";
                    }
                    if (isset($_POST['phone']) && !empty($_POST['phone'])) {
                        $txt .= "Телефон: " . strip_tags(trim($_POST['phone'])) . "\n";
                    }
                    if (isset($_POST['date']) && !empty($_POST['date'])) {
                        $txt .= "Дата: " . strip_tags(trim($_POST['date'])) . "\n";
                    }
                    if (isset($_POST['time']) && !empty($_POST['time'])) {
                        $txt .= "Время: " . strip_tags(trim($_POST['time'])) . "\n";
                    }
                    if (isset($_POST['from'])) {
                        $txt .= "Откуда: " . $_POST['from'] . "\n";
                    }

                    if (isset($_POST['to'])) {
                        $txt .= "Куда: " . $_POST['to'] . "\n";
                    }

                    if (isset($_POST['rate'])) {
                        $txt .= "Тариф: " . $_POST['rate'] . "\n";
                    }
                    if (isset($_POST['count'])) {
                        $txt .= "Количество человек: " . $_POST['count'] . "\n";
                    }
                    if (isset($_POST['child'])) {
                        $txt .= "Наличие детей: " . $_POST['child'] . "\n";
                    }
                    if (isset($_POST['animals'])) {
                        $txt .= "Наличие животных: " . $_POST['animals'] . "\n";
                    }
                    if (isset($_POST['notes']) && !empty($_POST['notes'])) {
                        $txt .= "Примечания: " . strip_tags(trim($_POST['notes'])) . "\n";
                    }



                    date_default_timezone_set('europe/moscow');


                    $app = new Applications();
                    $app->insert([
                        'name' => $_POST['name'],
                        'phone' => $_POST['phone'],
                        'date' => $_POST['date'],
                        'time' => $_POST['time'],
                        'appFrom' => $_POST['from'],
                        'appTo' => $_POST['to'],
                        'appRate' => $_POST['rate'],
                        'count' => $_POST['count'],
                        'child' => $_POST['child'],
                        'animals' => $_POST['animals'],
                        'notes' => $_POST['notes'],
                        'dateSent' => date('Y-m-d H:i:s'),
                        'processed' => false,
                        'dateProcessing' => null,

                    ]);

                    // параметры, которые отправятся в api телеграм
                    $params = array(
                        'chat_id' => $CHATID, // id получателя
                        'text' => $txt, // текст сообщения
                    );

                    $curl = curl_init();
                    curl_setopt($curl, CURLOPT_URL, 'https://api.telegram.org/bot' . $TOKEN . '/sendMessage'); // адрес вызова api функции телеграм
                    curl_setopt($curl, CURLOPT_POST, true); // отправка методом POST
                    curl_setopt($curl, CURLOPT_TIMEOUT, 10); // время выполнения запроса
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $params); // параметры запроса
                    $result = curl_exec($curl); // запрос к api
                    curl_close($curl);



                    if (isset(json_decode($result)->{'ok'}) && json_decode($result)->{'ok'}) {
                        echo json_encode('SUCCESS');
                    } else {
                        echo json_encode('ERROR');
                    }
                } else {
                    echo json_encode('NOTVALID');
                }
            } else {
                echo json_encode('NOTVALID');
            }
        } else {
            header("Location: /");
        }
    }


    public function backCall()
    {

        $TOKEN = '5702325943:AAHb_-L-aMshvdOBqxrRLru4l-1l-BbjF-o';
        $CHATID = '-577996329';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {


            if (!empty($_POST['name']) && !empty($_POST['phone'])) {

                $txt = "Заявка на звонок!\n";
                if (isset($_POST['name']) && !empty($_POST['name'])) {
                    $txt .= "Имя: " . strip_tags(trim($_POST['name'])) . "\n";
                }
                if (isset($_POST['phone']) && !empty($_POST['phone'])) {
                    $txt .= "Телефон: " . strip_tags(trim($_POST['phone'])) . "\n";
                }

                date_default_timezone_set('europe/moscow');
                $call = new Call();
                $call->insert([
                    'name' => $_POST['name'],
                    'phone' => $_POST['phone'],
                    'dateSent' => date('Y-m-d H:i:s'),
                    'processed' => false,
                    'dateProcessing' => null,
                ]);



                // параметры, которые отправятся в api телеграм
                $params = array(
                    'chat_id' => $CHATID, // id получателя
                    'text' => $txt, // текст сообщения
                );

                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, 'https://api.telegram.org/bot' . $TOKEN . '/sendMessage'); // адрес вызова api функции телеграм
                curl_setopt($curl, CURLOPT_POST, true); // отправка методом POST
                curl_setopt($curl, CURLOPT_TIMEOUT, 10); // время выполнения запроса
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $params); // параметры запроса
                $result = curl_exec($curl); // запрос к api
                curl_close($curl);



                if (isset(json_decode($result)->{'ok'}) && json_decode($result)->{'ok'}) {

                    echo json_encode('SUCCESS');
                } else {
                    echo json_encode('ERROR');
                }
            } else {
                echo json_encode('NOTVALID');
            }
        } else {
            header("Location: /");
        }
    }


    public function sendReview()
    {


        if ($_SERVER["REQUEST_METHOD"] == "POST") {


            if (!empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['email']) && !empty($_POST['review'])) {

                if (!empty($_POST['mark'])) {
                    if (isset($_POST['name']) && !empty($_POST['name'])) {
                        $name = strip_tags(trim($_POST['name']));
                    }
                    if (isset($_POST['phone']) && !empty($_POST['phone'])) {
                        $phone = strip_tags(trim($_POST['phone']));
                    }
                    if (isset($_POST['email']) && !empty($_POST['email'])) {
                        $email = strip_tags(trim($_POST['email']));
                    }
                    if (isset($_POST['review']) && !empty($_POST['review'])) {
                        $review = strip_tags(trim($_POST['review']));
                    }
                    if (isset($_POST['mark']) && !empty($_POST['mark'])) {
                        $mark = strip_tags(trim($_POST['mark']));
                    }

                    $sendReview = new Reviews();
                    $sendReview->insert([
                        'name' => $name,
                        'phone' => $phone,
                        'mark' => $mark,
                        'email' => $email,
                        'review' => $review,
                    ]);

                    echo json_encode('SUCCESS');
                } else {
                    echo json_encode('NOTVALIDMark');
                }
            } else {
                echo json_encode('NOTVALID');
            }
        } else {
            header("Location: /");
        }
    }
    public function question()
    {


        if ($_SERVER["REQUEST_METHOD"] == "POST") {


            if (!empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['email']) && !empty($_POST['question'])) {


                if (isset($_POST['name']) && !empty($_POST['name'])) {
                    $name = strip_tags(trim($_POST['name']));
                }
                if (isset($_POST['phone']) && !empty($_POST['phone'])) {
                    $phone = strip_tags(trim($_POST['phone']));
                }
                if (isset($_POST['email']) && !empty($_POST['email'])) {
                    $email = strip_tags(trim($_POST['email']));
                }
                if (isset($_POST['question']) && !empty($_POST['question'])) {
                    $question = strip_tags(trim($_POST['question']));
                }

                $addQuestion = new Question();
                $addQuestion->insert([
                    'name' => $name,
                    'phone' => $phone,
                    'email' => $email,
                    'question' => $question,
                ]);

                echo json_encode('SUCCESS');
            } else {
                echo json_encode('NOTVALID');
            }
        } else {
            header("Location: /");
        }
    }
}
